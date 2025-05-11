<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Upload Private File</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="../../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/magnific-popup.css">
    <link rel="stylesheet" href="../../css/jquery-ui.css">
    <link rel="stylesheet" href="../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../../css/animate.css">
    
    
    <link rel="stylesheet" href="../../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../../css/fl-bigmug-line.css">
  
    <link rel="stylesheet" href="../../css/aos.css">

    <link rel="stylesheet" href="../../css/style.css">
    
  </head>
  <script>
function myFunction() {
  var x = document.getElementById("secretkey");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
  <body>
  <?php
    
    if(!isset ($_SESSION['id'])){
        echo "<script> window.location.href='../../login'; </script>";
    }
    
    $key = substr(str_shuffle("0123456789abcdefghijkmnopqrstuvwxyz<>!@#$%^*?|/ABCDEFGHJKLMNOPQRSTUVWXYZ"), 0, 8);
  ?>

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
              <a href="/cloudstore1" class="d-flex align-items-center site-logo">
                <span class="fl-bigmug-line-cube29 mr-3 cube-bg"></span>
                <span>Cloud Storage</span>
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
                        <span class="h6">1-800-200-3911</span>
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
                        <span class="h6">mail@domain.com</span>
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
                  <li class="active">
                    <a href="">Welcome: <?php echo "<label style='color:red'>{$_SESSION['fn']} {$_SESSION['ln']}</label>"; ?></a>
                  </li>
                  <li><a href="../">Home</a></li>
                  <li class="has-children">
                    <a href="#">File Upload</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="../upprivate">Private File</a></li>
                      <li><a href="../uppublic">Public File</a></li>
                    </ul>
                  </li>
                  
                  <li class="has-children">
                    <a href="#">File Download</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="../downprivate">Private File</a></li>
                      <li><a href="../downpublic">Public File</a></li>
                    </ul>
                  </li>
                  <li><a href="../settings">Settings</a></li>
			<li><a href="../../home/">Back</a></li>

                </ul>
              </nav>
            </div>
           <div class="col-8 col-md-8 col-lg-4 text-right">
              <a href="../../logout.php" class="btn btn-primary btn-outline-primary rounded-0 text-white py-2 px-4">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    
<div class="unit-5 overlay" style="background-image: url('../../images/hero_bg_1.jpg');">
      <div class="container text-center">
        <h2 class="mb-0">Public File Upload</h2>
      </div>
</div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-6" data-aos="fade">
            <h2>Upload Public File</h2>
            <form  class="p-5 bg-dark" method='post' name='phpaes' action='upload.php' enctype="multipart/form-data"> 
                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="font-weight-bold" Style="color:red">Please select a file to upload</label>
                      <input type="file" name="upfile" class="form-control" required />
                    </div>
                  </div>
                
                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="font-weight-bold" Style="color:red">Secret Key</label>
                      <input type="password" name="secretkey" id="secretkey" value="<?php echo $key; ?>" class="form-control" readonly />
                      <input type="checkbox" onclick="myFunction()">&nbsp; <label Style="color:red">Show Secret Key</label>
                    </div>
                  </div>
                
                 <div class="row form-group">
                    <div class="col-md-12">
                      <input type="submit" value="Upload" name="submit" class="btn btn-primary py-2 px-4 rounded-0">
                    </div>
                 </div>
            </form>
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
                    <a href="">Copyright &copy; Cloud Storage With Cryptography</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
  </div>

  <script src="../../js/jquery-3.3.1.min.js"></script>
  <script src="../../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../../js/jquery-ui.js"></script>
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/owl.carousel.min.js"></script>
  <script src="../../js/jquery.stellar.min.js"></script>
  <script src="../../js/jquery.countdown.min.js"></script>
  <script src="../../js/jquery.magnific-popup.min.js"></script>
  <script src="../../js/bootstrap-datepicker.min.js"></script>
  <script src="../../js/aos.js"></script>
  <script src="../../js/main.js"></script>
 </body>
</html>