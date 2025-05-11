<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Recover Pass</title>
    </head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/animate.css">
    
    
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../css/fl-bigmug-line.css">
  
    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/style.css">
    <body bgcolor="#DDDDDD"><center>
        
        <form name="frm" class="p-5 bg-white" action="" method="post"><br/><br/>
            <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold">Email Address</label>
                  <input type="text" name="user" id="email" class="form-control" placeholder="Email Address" autofocus required />
                </div>
              </div>
         <input type="Submit" class="btn btn-primary py-2 px-4 rounded-0" name="send" value="Get Password"/>
        </form>

<?php 
include '../config/dbConnection.php';
if(isset ($_REQUEST['send'])){
$query="Select * from tblusers where email='{$_POST['user']}'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){

    $pass = substr(str_shuffle("0123456789abcdefghijkmnopqrstuvwxyz<>!@#$%^*?|/ABCDEFGHJKLMNOPQRSTUVWXYZ"), 0, 8);
    $pass1=sha1($pass);
    $query="update tblusers set password='$pass1' where email='{$_POST['user']}'";
    $result=mysqli_query($conn,$query);
    
    require('../home/phpmailer/class.phpmailer.php');

    $mail = new PHPMailer();
    $subject = "Password Reset";
    $content = "<b>Cloud Store, </b><br/>The password for login to Cloud Store application is: <b>$pass</b>. Please do not share this password with anyone.<br/><br/>Team,<br/>Cloud Store";
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port     = 587;  
    $mail->Username = "cloudstorezcl@gmail.com";
    $mail->Password = "chilwyqfijpkvoic";
    $mail->Host     = "smtp.gmail.com";
    $mail->Mailer   = "smtp";
    $mail->SetFrom("cloudstorezcl@gmail.com", "Cloud Store");
    $mail->AddReplyTo("cloudstorezcl@gmail.com", "Cloud Store");
    $mail->AddAddress($_POST['user']);
    $mail->Subject = "Password Reset";
    $mail->WordWrap = 80;
    $mail->MsgHTML($content);
    $mail->IsHTML(true);

    if(!$mail->Send()) {
            echo "Problem on sending mail";
    }
    else {
        echo "<script> alert('Please check your Registered Email for password');
                         window.close(); </script>";
    }
       }else{
           echo "Username does not exists";
       }
}
?>       
    </center></body>
</html>