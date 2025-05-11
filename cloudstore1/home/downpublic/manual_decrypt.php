<?php
session_start();
include '../../config/dbConnection.php';

if (!isset($_SESSION['id'])) {
    header("Location: ../../login");
    exit();
}

// Get file ID from URL
$fileId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$filePath = '';
$fileName = '';

// If file ID is provided, get the file path
if ($fileId > 0) {
    $userId = $_SESSION['id'];
    $query = "SELECT * FROM tbluppublic WHERE id = ? AND username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $fileId, $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filePath = $row['filename'];
        $fileName = basename($filePath);
        $dbSecretKey = $row['secretkey']; // Get the database key
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manual Decrypt</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <style>
        body { padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Manual File Decryption</h2>
        
        <div class="alert alert-info">
            Use this form to manually decrypt a file if the automatic process is not working.
        </div>
        
        <form method="POST" action="decrypt.php">
            <div class="form-group">
                <label for="file_path">File Path:</label>
                <input type="text" class="form-control" id="file_path" name="file_path" 
                       value="<?php echo htmlspecialchars($filePath); ?>" required>
                <small class="form-text text-muted">The full path to the encrypted file.</small>
            </div>
            
            <div class="form-group">
                <label for="secretkey">Secret Key:</label>
                <input type="text" class="form-control" id="secretkey" name="secretkey" 
                       value="<?php echo isset($dbSecretKey) ? htmlspecialchars($dbSecretKey) : ''; ?>" required>
                <small class="form-text text-muted">The secret key from the database is pre-filled. If this doesn't work, try the key sent to your email.</small>
            </div>
            
            <input type="hidden" name="download" value="true">
            
            <button type="submit" class="btn btn-primary">Decrypt & Download</button>
            <a href="index.php" class="btn btn-secondary">Back to Files</a>
        </form>
        
        <?php if ($fileId > 0): ?>
        <div class="mt-4">
            <h4>File Information</h4>
            <p><strong>File ID:</strong> <?php echo $fileId; ?></p>
            <p><strong>File Name:</strong> <?php echo htmlspecialchars($fileName); ?></p>
            <p><strong>File Path:</strong> <?php echo htmlspecialchars($filePath); ?></p>
            <p><strong>Database Key:</strong> <?php echo htmlspecialchars($dbSecretKey); ?></p>
            
            <div class="mt-3">
                <a href="getkey.php?id=<?php echo $fileId; ?>" class="btn btn-sm btn-info">Request Key Again</a>
                
                <!-- One-click decrypt button -->
                <form method="POST" action="decrypt.php" class="d-inline ml-2">
                    <input type="hidden" name="download" value="true">
                    <input type="hidden" name="file_path" value="<?php echo htmlspecialchars($filePath); ?>">
                    <input type="hidden" name="secretkey" value="<?php echo htmlspecialchars($dbSecretKey); ?>">
                    <button type="submit" class="btn btn-sm btn-success">One-Click Decrypt</button>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
