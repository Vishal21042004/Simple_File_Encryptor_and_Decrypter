<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href=0"../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../css/fl-bigmug-line.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  
<script type="text/javascript">
function checkPasswordMatch() {
    var password = $("#pass").val();
    var confirmPassword = $("#repass").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Passwords do not match!");
    else
        $("#divCheckPasswordMatch").html("");
}

function validate(){
    if(document.f.pass.value != document.f.repass.value){
        alert("Passwords does not match.");
        return false;
    }
    return true;
}
</script>

 <body>
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap bg-white">
      <div class="site-navbar-top">
        <div class="container py-2">
          <div class="row align-items-center">
            
            <div class="col-6 col-md-6 col-lg-2">
              <a href="../" class="d-flex align-items-center site-logo">
                <span class="fl-bigmug-line-cube29 mr-3 cube-bg"></span>
                <span>Cipher Lock</span>
              </a>
            </div>

            <div class="col-6 col-md-6 col-lg-10">
              <ul class="unit-4 ml-auto text-right">

                <li class="text-left">
                  <a href="#">
                    <div class="d-flex align-items-center block-unit">
                      <div class="icon mr-0 mr-md-4">
                        <span class="fl-bigmug-line-headphones32 h3"></span>
                      </div>
                      <div class="d-none d-lg-block">
                        <span class="d-block text-gray-500 text-uppercase">24/7 Support</span>
                        <span class="h6">6360430056</span>
                      </div>
                    </div>
                  </a>
                </li>


                <li class="text-left">
                  <a href="#">
                    <div class="d-flex align-items-center block-unit">
                      <div class="icon mr-0 mr-md-4">
                        <span class="fl-bigmug-line-email64 h5"></span>
                      </div>
                      <div class="d-none d-lg-block">
                        <span class="d-block text-gray-500 text-uppercase">Email</span>
                        <span class="h6">vishalk23064@gmail.com</span>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>

            

          </div>
          
        </div>
      </div>
      <div class="site-navbar bg-dark">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-left" role="navigation">
                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="">
                    <a href="">Register</a>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="col-8 col-md-8 col-lg-4 text-right">
              <a href="/cloudstore1/login" class="btn btn-primary btn-primary rounded-0 py-2 px-4">Login</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="unit-5 overlay" style="background-image: url('../images/hero_bg_1.jpg');">
      <div class="container text-center">
        <h2 class="mb-0">Register</h2>
      </div>
    </div>


    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
            <form name="f" action="" method="post" class="p-5 bg-white" onsubmit="javascript:return validate();">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold">First Name</label>
                  <input type="text" name="fname" pattern="[A-Za-z]+" title="Please enter only characters" id="fullname" class="form-control" placeholder="First Name" autofocus required />
                </div>
              </div>
                
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold">Last Name</label>
                  <input type="text" name="lname" pattern="[A-Za-z]+" title="Please enter only characters" id="fullname" class="form-control" placeholder="Last Name" required />
                </div>
              </div>
                
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold">Email Address</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required />
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold">Mobile Number</label>
                  <input type="text" name="mobile" pattern="[0-9]{10}" title="Please enter valid mobile number" class="form-control" placeholder="Mobile Number" required />
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold">Password</label>
                  <input type="password" id="pass" name="pass" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" title="Password should contain atleat 1 uppercase and 1 lowercase letter, digits and special characters" class="form-control" placeholder="Password" required />
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                    <label class="font-weight-bold">Re-enter Password</label>&nbsp;&nbsp;&nbsp;<label style="color: red" id="divCheckPasswordMatch"></label>
                  <input type="password" id="repass" name="repass" class="form-control" placeholder="Re-enter Password" onkeyup="checkPasswordMatch();" oncopy="return false" oncut="return false" onpaste="return false" required />
                  
                </div>                    
                </div>
              
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Register" name="reg" class="btn btn-primary  py-2 px-4 rounded-0">
                  <input type="reset" value="Reset" class="btn btn-primary  py-2 px-4 rounded-0">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
        
    if(isset($_REQUEST['reg'])){
        include '../config/dbConnection.php';
        
        $query="select * from tblusers where email='{$_POST['email']}' or mobile='{$_POST['mobile']}'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
            echo "<script> alert('Email or Mobile already exists'); </script>";
        }else{
            $pass=sha1($_POST['pass']);
            $query="insert into tblusers values('{$_POST['fname']}','{$_POST['lname']}','{$_POST['email']}','{$_POST['mobile']}','$pass')";
            $result=mysqli_query($conn,$query);
            if($result){
                echo "<script> alert('Registration done successfully. \\nPlease Login to Continue...'); 
                    window.location.href='/cloudstore1/login' </script>";
            }else{
                echo "<script> alert('User cannot be registered at the moment. Please try later....!'); </script>";
            }
        }
    }        
    ?>
          </div>
          </div>
        </div>
      </div>
    </div>
    
    
      <div class="site-navbar bg-dark">
        <div class="container py-1">
          <div class="row align-items-center">

            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-left" role="navigation">
                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="">
                    <a href="">Copyright &copy; Cipher Lock With Cryptography</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
  </div>

  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/jquery.countdown.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/bootstrap-datepicker.min.js"></script>
  <script src="../js/aos.js"></script>

  <script src="../js/main.js"></script>
    
  </body>
</html>