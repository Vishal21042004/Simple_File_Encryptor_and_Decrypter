<?php session_start();
include '../../config/dbConnection.php';

if (!isset($_SESSION['id'])) {
    echo "<script>window.location.href='../../login';</script>";
    exit;
}

if (isset($_POST['submit'])) {
    $userId = $_SESSION['id'];
    $password = $_POST['secretkey']; // User-provided password

    // Derive a secure key using PBKDF2
    $salt = openssl_random_pseudo_bytes(16);  // 16-byte salt
    $key = hash_pbkdf2("sha256", $password, $salt, 10000, 32, true);  // 32-byte key for AES-256

    $originalName = $_FILES['upfile']['name'];
    $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

    if ($extension === "doc") {
        echo "<script>
            alert('Please change the extension from .doc to .docx and then upload...!');
            window.location.href='../uppublic/';
        </script>";
        exit();
    }

    $uploadDir = "../../uploads/public/{$userId}/{$extension}/";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadedFilePath = $uploadDir . basename($originalName);
    $encryptedFilePath = $uploadedFilePath . ".enc";

    // Check if file already exists
    $stmt = $conn->prepare("SELECT * FROM tbluppublic WHERE filename = ?");
    $stmt->bind_param("s", $encryptedFilePath);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows > 0) {
        echo "<script>
            alert('File with same name already exists');
            window.location.href='../uppublic/';
        </script>";
        exit();
    }

    // Move uploaded file
    if (!move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadedFilePath)) {
        echo "<script>
            alert('Possible file upload attack!');
        </script>";
        exit();
    }

    // Encrypt file with AES-256-CBC
    $plaintext = file_get_contents($uploadedFilePath);
    $ivLength = openssl_cipher_iv_length('AES-256-CBC');
    $iv = openssl_random_pseudo_bytes($ivLength);  // 16-byte IV
    $ciphertext = openssl_encrypt($plaintext, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

    // Save encrypted file (prepend salt and IV)
    $encryptedData = $salt . $iv . $ciphertext;

    // Debugging: Log salt, IV, ciphertext size
    error_log("Salt: " . bin2hex($salt));
    error_log("IV: " . bin2hex($iv));
    error_log("Ciphertext size: " . strlen($ciphertext));

    if (file_put_contents($encryptedFilePath, $encryptedData) === false) {
        echo "<script>
            alert('Encryption failed');
        </script>";
        exit();
    }

    // Debug: Log the password being stored
    error_log("Storing password in database: '$password'");

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO tbluppublic (username, filename, secretkey, dtdate) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("sss", $userId, $encryptedFilePath, $password);

    if ($stmt->execute()) {
        // Delete original file
        @unlink($uploadedFilePath);

        echo "<script>
            alert('File is encrypted and uploaded successfully');
            window.location.href='/cloudstore1/home/uppublic';
        </script>";
    } else {
        echo "<script>
            alert('File was not uploaded. Please try again.');
            window.location.href='/cloudstore1/home/uppublic';
        </script>";
    }
}
?>