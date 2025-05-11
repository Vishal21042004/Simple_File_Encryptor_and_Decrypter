<?php
// This is a test script to verify the parameters being sent to decrypt.php

echo "<h2>POST Parameters Received:</h2>";
echo "<pre>";
print_r($_POST);
echo "</pre>";

echo "<p>The decrypt.php script is expecting:</p>";
echo "<ul>";
echo "<li>download - should be set</li>";
echo "<li>secretkey - the decryption key</li>";
echo "<li>file_path - the path to the encrypted file</li>";
echo "</ul>";

echo "<p>Click <a href='javascript:history.back()'>here</a> to go back.</p>";
?>
