<?php
session_start();
require('../phpmailer/class.phpmailer.php');
include '../../config/dbConnection.php';

// Check if user is authenticated
if (!isset($_SESSION['id'])) {
    echo "<script>window.location.href='../../login';</script>";
    exit;
}

// Validate and sanitize input
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('Invalid request'); window.location.href='/cloudstore1/home/downpublic/';</script>";
    exit;
}

$id = intval($_GET['id']); // Get the file ID from URL
$userId = $_SESSION['id']; // Get the user ID (email) from session

// Fetch file information from the database
$query = "SELECT * FROM tbluppublic WHERE id = '$id' AND username = '$userId'";
$result = mysqli_query($conn, $query);

// Debug: Output query and check result
if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // Output error message if query fails
}

if (mysqli_num_rows($result) == 0) {
    echo "<script>alert('File not found or access denied'); window.location.href='/cloudstore1/home/downpublic/';</script>";
    exit;
}

// Fetch the row containing file details
$row = mysqli_fetch_assoc($result);
$filename = basename($row['filename']);
$secretKey = $row['secretkey']; // Get the existing secret key

// Log the key retrieval for server logs only
error_log("Retrieved secret key from database for file ID: $id, filename: $filename");

// Store request in tblotppublic (optional audit) - using the existing secret key
$insertQuery = "INSERT INTO tblotppublic (username, filename, otp) VALUES ('$userId', '$filename', '$secretKey')";
if (!mysqli_query($conn, $insertQuery)) {
    die("Error inserting OTP record: " . mysqli_error($conn)); // Check if insert query fails
}

// Send email with the secret key
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->Username = "vishalk23064@gmail.com";  // Sender email
$mail->Password = "enter your app mail password";        // SMTP password
$mail->Host = "smtp.gmail.com";
$mail->Mailer = "smtp";

$mail->SetFrom("vishal23064@gmail.com", "Cloud Store");
$mail->AddReplyTo("vishal23064@gmail.com", "Cloud Store");
$mail->AddAddress($userId);  // Email address to send OTP to

$mail->Subject = "Cloud Store Secret Key";

// Email content with the secret key
$content = "<b>Secret Key</b><br/>
The secret key to decode and download your public file <strong>$filename</strong> is:
<pre style='font-size:18px;font-weight:bold;color:blue;'>$secretKey</pre>
<br/>Please do not share this key with anyone to avoid unauthorized access.<br/><br/><b>Thank You</b>";

$mail->MsgHTML($content);
$mail->IsHTML(true);

// Sending the email
if (!$mail->Send()) {
    echo "<script>alert('Error sending email.'); window.location.href='/cloudstore1/home/downpublic/';</script>";
} else {
    // Just show an alert and redirect back to the file list
    echo "<script>
        alert('Secret key has been sent to your email: " . htmlspecialchars($userId) . "');
        window.location.href='/cloudstore1/home/downpublic/';
    </script>";
}
