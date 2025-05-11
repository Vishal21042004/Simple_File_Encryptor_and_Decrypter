<?php
session_start();
include '../../config/dbConnection.php';

if (!isset($_SESSION['id'])) {
    header("Location: ../../login");
    exit();
}

// Debug: Log all POST parameters
error_log("POST parameters: " . print_r($_POST, true));

if (isset($_POST['download'])) {
    $userId = $_SESSION['id'];
    $userProvidedKey = $_POST['secretkey'];  // User-provided password
    $encryptedFilePath = $_POST['file_path'];  // Path to the encrypted file

    // Debug: Log the extracted parameters
    error_log("User ID: $userId, File Path: $encryptedFilePath");

    if (!file_exists($encryptedFilePath)) {
        echo "<script>
            alert('Encrypted file not found.');
            window.location.href='../downpublic/';
        </script>";
        exit();
    }

    // Get the correct key and ID from the database
    $query = "SELECT id, secretkey FROM tbluppublic WHERE username = ? AND filename = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $userId, $encryptedFilePath);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "<script>
            alert('File not found in database.');
            window.location.href='../downpublic/';
        </script>";
        exit();
    }

    $row = $result->fetch_assoc();
    $dbSecretKey = $row['secretkey'];

    // Debug: Log the keys for comparison
    error_log("User provided key: '$userProvidedKey'");
    error_log("Database key: '$dbSecretKey'");

    // We'll skip the key comparison and go straight to decryption

    $encryptedData = file_get_contents($encryptedFilePath);

    if ($encryptedData === false) {
        echo "<script>
            alert('Failed to read the encrypted file.');
            window.location.href='../downpublic/';
        </script>";
        exit();
    }

    // Extract salt, IV, and ciphertext
    $salt = substr($encryptedData, 0, 16);  // First 16 bytes as salt
    $iv = substr($encryptedData, 16, 16);  // Next 16 bytes as IV
    $ciphertext = substr($encryptedData, 32);  // Remaining as ciphertext

    // Debugging: Log extracted values
    error_log("Salt: " . bin2hex($salt));
    error_log("IV: " . bin2hex($iv));
    error_log("Ciphertext size: " . strlen($ciphertext));

    // First try with the user-provided key
    $key = hash_pbkdf2("sha256", $userProvidedKey, $salt, 10000, 32, true);  // Derive 32-byte key
    $plaintext = openssl_decrypt($ciphertext, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

    // Check if decryption was successful and the result is valid
    $isValidDecryption = ($plaintext !== false && strlen($plaintext) > 0);

    // If that fails, try with the database key
    if (!$isValidDecryption) {
        error_log("Decryption with user-provided key failed. Trying database key.");
        $key = hash_pbkdf2("sha256", $dbSecretKey, $salt, 10000, 32, true);  // Derive 32-byte key
        $plaintext = openssl_decrypt($ciphertext, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

        // Check if decryption with database key was successful
        $isValidDecryption = ($plaintext !== false && strlen($plaintext) > 0);

        // If both fail, show error
        if (!$isValidDecryption) {
            error_log("Decryption with database key also failed.");

            // Show detailed error with options
            echo "
            <div style='background-color: #f8d7da; color: #721c24; padding: 20px; margin: 20px; border-radius: 5px;'>
                <h3>Decryption Failed</h3>
                <p>We tried to decrypt your file with both the key you provided and the key from our database, but both failed.</p>

                <div style='background-color: #fff; padding: 15px; margin: 15px 0; border-radius: 5px;'>
                    <h4>Try One of These Options:</h4>

                    <div style='margin-bottom: 20px;'>
                        <h5>Option 1: Try with Database Key</h5>
                        <p>The key stored in our database is: <strong>" . htmlspecialchars($dbSecretKey) . "</strong></p>
                        <form method='POST' action='decrypt.php' style='margin-bottom: 10px;'>
                            <input type='hidden' name='download' value='true'>
                            <input type='hidden' name='file_path' value='" . htmlspecialchars($encryptedFilePath) . "'>
                            <input type='hidden' name='secretkey' value='" . htmlspecialchars($dbSecretKey) . "'>
                            <button type='submit' style='background-color: #28a745; color: white; border: none; padding: 8px 15px; border-radius: 4px;'>
                                One-Click Decrypt with Database Key
                            </button>
                        </form>
                    </div>

                    <div style='margin-bottom: 20px;'>
                        <h5>Option 2: Request Key Again</h5>
                        <p>Get the key sent to your email again.</p>
                        <a href='index.php' style='background-color: #007bff; color: white; border: none; padding: 8px 15px; border-radius: 4px; display: inline-block; text-decoration: none;'>
                            Back to File List
                        </a>
                    </div>

                    <div>
                        <h5>Option 3: Try Manual Decryption</h5>
                        <p>Use the manual form to enter the key.</p>
                        <a href='manual_decrypt.php' style='background-color: #6c757d; color: white; border: none; padding: 8px 15px; border-radius: 4px; display: inline-block; text-decoration: none;'>
                            Go to Manual Decryption
                        </a>
                    </div>
                </div>

                <p><a href='../downpublic/' style='color: #721c24; text-decoration: underline;'>Go back to files</a></p>
            </div>
            ";
            exit();
        } else {
            error_log("Decryption with database key successful.");
        }
    } else {
        error_log("Decryption with user-provided key successful.");
    }

    // Final check to make sure we have valid decrypted content
    if (!$isValidDecryption || strlen($plaintext) < 1) {
        echo "<script>
            alert('Decryption failed. The file may be corrupted or the key is incorrect.');
            window.location.href='../downpublic/';
        </script>";
        exit();
    }

    // Create a temporary file for the decrypted content
    $tempDir = sys_get_temp_dir();
    $decryptedFilename = basename($encryptedFilePath, '.enc');
    $tempFile = $tempDir . '/' . $decryptedFilename;

    // Save the decrypted content to the temporary file
    if (file_put_contents($tempFile, $plaintext) === false) {
        error_log("Failed to write decrypted content to temporary file");
        echo "<script>
            alert('Failed to prepare file for download.');
            window.location.href='../downpublic/';
        </script>";
        exit();
    }

    // Create a symbolic link or copy the file to a web-accessible location
    $downloadDir = "../../downloads/";
    if (!file_exists($downloadDir)) {
        mkdir($downloadDir, 0777, true);
    }

    $downloadFile = $downloadDir . $decryptedFilename;
    copy($tempFile, $downloadFile);

    // Output success page with download button and auto-redirect
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>File Decrypted Successfully</title>
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <style>
            body { padding: 20px; }
            .container { max-width: 600px; margin: 0 auto; text-align: center; }
            .success-message { margin: 30px 0; }
        </style>
        <script>
            // Function to redirect after download
            function redirectToFiles() {
                window.location.href = 'index.php';
            }

            // Function to trigger download and redirect
            function downloadAndRedirect() {
                // Create a hidden link and click it
                var link = document.createElement('a');
                link.href = '<?php echo $downloadFile; ?>';
                link.download = '<?php echo $decryptedFilename; ?>';
                document.body.appendChild(link);
                link.click();

                // Set a timeout to redirect after download starts
                setTimeout(redirectToFiles, 2000);

                // Prevent default action
                return false;
            }
        </script>
    </head>
    <body>
        <div class="container">
            <h2>File Decrypted Successfully</h2>

            <div class="alert alert-success success-message">
                Your file has been successfully decrypted and is ready for download.
            </div>

            <a href="<?php echo $downloadFile; ?>" download="<?php echo $decryptedFilename; ?>"
               class="btn btn-primary btn-lg" onclick="return downloadAndRedirect();">
                Download Decrypted File
            </a>

            <p class="mt-3">
                <a href="index.php" class="btn btn-secondary">Back to Files</a>
            </p>

            <div class="alert alert-info mt-4">
                <small>You will be automatically redirected to the file list after download starts.</small>
            </div>
        </div>
    </body>
    </html>
    <?php
    // Delete the temporary file after a delay (can be done with a cron job in production)
    @unlink($tempFile);
    exit();
}
// If we get here, it means the download parameter wasn't set or there was an issue
// Let's provide a fallback form for manual entry
?>
<!DOCTYPE html>
<html>
<head>
    <title>Decrypt Public File</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <style>
        body { padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Decrypt Public File</h2>

        <?php if (!isset($_POST['download'])): ?>
            <div class="alert alert-warning">
                No download request detected. Please use the form below to decrypt your file.
            </div>
        <?php endif; ?>

        <form method="POST" action="decrypt.php">
            <div class="form-group">
                <label for="file_path">File Path:</label>
                <input type="text" class="form-control" id="file_path" name="file_path"
                       value="<?php echo isset($_POST['file_path']) ? htmlspecialchars($_POST['file_path']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="secretkey">Secret Key:</label>
                <input type="password" class="form-control" id="secretkey" name="secretkey" required>
            </div>

            <input type="hidden" name="download" value="true">

            <button type="submit" class="btn btn-primary">Decrypt & Download</button>
            <a href="index.php" class="btn btn-secondary">Back to Files</a>
        </form>
    </div>
</body>
</html>