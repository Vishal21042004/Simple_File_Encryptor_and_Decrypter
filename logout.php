<?php session_start(); 
 include './config/dbConnection.php';
 mysqli_query($conn, "delete from tblotpprivate where username='{$_SESSION['id']}'");
 mysqli_query($conn, "delete from tblotppublic where username='{$_SESSION['id']}'");
 $_SESSION['id']=null;
 $_SESSION['fn']=null;
 $_SESSION['ln']=null;
 session_destroy();
 header("location:../cloudstore1")
?>
