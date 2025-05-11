<?php session_start();
    if(!isset ($_SESSION['id'])){
        echo "<script> window.location.href='../login'; </script>";
    }
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
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
    
    
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../css/fl-bigmug-line.css">
  
    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/style.css">
    
  </head>
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
              <a href="/cloudstore" class="d-flex align-items-center site-logo">
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
                  <li class="active">
                    <a href="">Welcome: <?php echo "<label style='color:red'>{$_SESSION['fn']} {$_SESSION['ln']}</label>"; ?></a>
                  </li>
                  <li><a href="#">Home</a></li>
                  <li class="has-children">
                    <a href="#">File Upload</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="./upprivate">Private File</a></li>
                      <li><a href="./uppublic">Public File</a></li>
                    </ul>
                  </li>
                  <li class="has-children">
                    <a href="#">File Download</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="./downprivate">Private File</a></li>
                      <li><a href="./downpublic">Public File</a></li>
                    </ul>
                  </li>
                  <li><a href="./settings">Settings</a></li>
                 
                </ul>
              </nav>
            </div>
           <div class="col-8 col-md-8 col-lg-4 text-right">
              <a href="/cloudstore1/logout.php" class="btn btn-primary btn-outline-primary rounded-0 text-white py-2 px-4">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="slide-one-item home-slider owl-carousel">

      <div class="site-blocks-cover overlay" style="background-image: url(../images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
              <h1 class="mb-2">Structured Storage</h1>
              <p class="mb-5">Fast Access Could Server</p>
            </div>
          </div>
        </div>
      </div>  

      <div class="site-blocks-cover overlay" style="background-image: url(../images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
              <h1 class="mb-5">24/7 Customer Support</h1>
              
            </div>
          </div>
        </div>
      </div>  
    </div>

    


    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
              <div class="col-md-6" data-aos="fade">
            <h2>Public Files</h2>
            <table width=90% align="center" border="1px" class="table-striped">
		<thead class="bg-dark">
                        <th style="color: yellow">Sl No.</th>
                        <th style="color: yellow">Uploaded on</th>
			<th style="color: yellow">File Name</th>
                        <th style="color: yellow">Delete</th>
		</thead>
		<tbody>
            <?php
            include '../config/dbConnection.php';
            $query="select * from tblupprivate where username='{$_SESSION['id']}'";
            $result=mysqli_query($conn,$query);
          ?>
            
                        			
            <?php
            
            
            
            
            $query="select * from tbluppublic where username='{$_SESSION['id']}'";
            $sl=1;
            $result=mysqli_query($conn,$query);
            
            while($row=mysqli_fetch_assoc($result)){
               ?> <tr>
            				<td align='center'><?php echo $sl; ?></td>
                                        <td align='center'><?php echo $row['dtdate']; ?></td>
            				<td align='center'><?php echo basename($row['filename']); ?></td>
                                        <td align='center'><a href='?puid=<?php echo $row['id']; ?>' onclick="return confirm('Do you really want to delete');">Delete</a></td>
            			</tr>
            <?php
                $sl++;
            }
            
            if(isset($_GET['prid'])){
                $query="delete from tblupprivate where id='{$_GET['prid']}'";
                mysqli_query($conn, $query);
                if(mysqli_affected_rows($conn)>0){
                    echo "<script> window.location.href='?'; </script>";
                }
                
            }
             if(isset($_GET['puid'])){
                $query="delete from tbluppublic where id='{$_GET['puid']}'";
                mysqli_query($conn, $query);
                if(mysqli_affected_rows($conn)>0){
                    echo "<script> window.location.href='?'; </script>";
                }
            }
            ?>
            </tbody>
            </table>
              </div></div>
            <br/><br/> 
         
        <div class="row hosting">
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">

            <div class="unit-2 text-center border py-5 h-100 bg-white">
              <span class="icon fl-bigmug-line-paper122 text-primary"></span>
              <h3 class="h4 text-black">Shared Hosting</h3>
              <p class="mb-4 text-gray-500">Plans start at Rs.999/month</p>
              <p><a href="#" class="btn btn-primary py-2 px-4 rounded-0">View Details</a></p>
            </div>

          </div>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            
            <div class="unit-2 text-center border py-5 h-100 bg-white">
              <span class="icon fl-bigmug-line-airplane86 text-primary"></span>
              <h3 class="h4 text-black">Dedicated Hosting</h3>
              <p class="mb-4 text-gray-500">Plans start at Rs.1999/month</p>
              <p><a href="#" class="btn btn-primary py-2 px-4 rounded-0">View Details</a></p>
            </div>

          </div>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="300">
            
            <div class="unit-2 text-center border py-5 h-100 bg-white">
              <span class="icon fl-bigmug-line-hot67 text-primary"></span>
              <h3 class="h4 text-black">Premium Hosting</h3>
              <p class="mb-4 text-gray-500">Plans start at Rs.2999/month</p>
              <p><a href="#" class="btn btn-primary py-2 px-4 rounded-0">View Details</a></p>
            </div>

          </div>
        </div>
      
      </div>
    </div>

    <div class="site-blocks-cover overlay" style="background-image: url(../images/hero_bg_3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center text-left">
            <div class="col-md-7">
              <h1 class="mb-2">Satisfied Clients</h1>
              <p class="mb-5">We are rated 4.99 / 5.00 (based on 4443 Reviews)</p>
            </div>
          </div>
        </div>
      </div>  

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-6" data-aos="fade" >
            <!-- Why Choose Us Section -->
<h2>Why Choose Us</h2>
</div>
</div>
<div class="row hosting">
  <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="100">
    <div class="unit-3 h-100 bg-white">
      <div class="d-flex align-items-center mb-3 unit-3-heading">
        <div class="unit-3-icon-wrap mr-4">
          <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
            <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
          </svg><span class="unit-3-icon icon fl-bigmug-line-equalization3"></span>
        </div>
        <h2 class="h5">Reliable Hardware</h2>
      </div>
      <div class="unit-3-body">
        <p>We use the best quality servers to ensure smooth and fast performance, no matter the workload.</p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="200">
    <div class="unit-3 h-100 bg-white">
      <div class="d-flex align-items-center mb-3 unit-3-heading">
        <div class="unit-3-icon-wrap mr-4">
          <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
            <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
          </svg><span class="unit-3-icon icon fl-bigmug-line-cube29"></span>
        </div>
        <h2 class="h5">Top-Tier Data Centers</h2>
      </div>
      <div class="unit-3-body">
        <p>Our servers are hosted in world-class data centers, ensuring maximum security and uptime.</p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="300">
    <div class="unit-3 h-100 bg-white">
      <div class="d-flex align-items-center mb-3 unit-3-heading">
        <div class="unit-3-icon-wrap mr-4">
          <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
            <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
          </svg><span class="unit-3-icon icon fl-bigmug-line-airplane86"></span>
        </div>
        <h2 class="h5">Fast Performance</h2>
      </div>
      <div class="unit-3-body">
        <p>Enjoy lightning-fast loading times and seamless browsing with our optimized infrastructure.</p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="400">
    <div class="unit-3 h-100 bg-white">
      <div class="d-flex align-items-center mb-3 unit-3-heading">
        <div class="unit-3-icon-wrap mr-4">
          <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
            <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
          </svg><span class="unit-3-icon icon fl-bigmug-line-hot67"></span>
        </div>
        <h2 class="h5">99.9% Uptime</h2>
      </div>
      <div class="unit-3-body">
        <p>We guarantee near-perfect uptime, so your website or service is always available to your users.</p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="500">
    <div class="unit-3 h-100 bg-white">
      <div class="d-flex align-items-center mb-3 unit-3-heading">
        <div class="unit-3-icon-wrap mr-4">
          <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
            <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
          </svg><span class="unit-3-icon icon fl-bigmug-line-headphones32"></span>
        </div>
        <h2 class="h5">24/7 Customer Support</h2>
      </div>
      <div class="unit-3-body">
        <p>Our friendly support team is available any time, day or night, to help you with any issues.</p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="600">
    <div class="unit-3 h-100 bg-white">
      <div class="d-flex align-items-center mb-3 unit-3-heading">
        <div class="unit-3-icon-wrap mr-4">
          <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
            <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
          </svg><span class="unit-3-icon icon fl-bigmug-line-user143"></span>
        </div>
        <h2 class="h5">Happy Clients</h2>
      </div>
      <div class="unit-3-body">
        <p>Trusted by many satisfied customers across India who rely on our services every day.</p>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Testimonials Section -->
<div class="site-section block-4 bg-light">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-6" data-aos="fade">
        <h2>What Our Clients Say</h2>
      </div>
    </div>

    <div class="nonloop-block-4 owl-carousel" data-aos="fade">
      <div class="item col-md-6 mx-auto">
        <div class="block-38 text-center">
          <div class="block-38-img">
            <div class="block-38-header">
              <img src="images/person_1.jpg" alt="Image placeholder">
              <h3 class="block-38-heading">Ritika Sharma</h3>
              <p class="block-38-subheading">Founder, Bright Web Solutions</p>
            </div>
            <div class="block-38-body">
              <p>Great hosting and customer care. Their uptime is solid and the team always resolves issues quickly.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="item col-md-6 mx-auto">
        <div class="block-38 text-center">
          <div class="block-38-img">
            <div class="block-38-header">
              <img src="images/person_2.jpg" alt="Image placeholder">
              <h3 class="block-38-heading">Amit Verma</h3>
              <p class="block-38-subheading">Tech Lead, CodeNation</p>
            </div>
            <div class="block-38-body">
              <p>I’ve used their hosting for multiple projects. Highly recommend for developers and startups.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="item col-md-6 mx-auto">
        <div class="block-38 text-center">
          <div class="block-38-img">
            <div class="block-38-header">
              <img src="images/person_3.jpg" alt="Image placeholder">
              <h3 class="block-38-heading">Neha Joshi</h3>
              <p class="block-38-subheading">Digital Marketer, AdZoom</p>
            </div>
            <div class="block-38-body">
              <p>The best thing about them is support. Quick replies and actual solutions every time I reach out.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="item col-md-6 mx-auto">
        <div class="block-38 text-center">
          <div class="block-38-img">
            <div class="block-38-header">
              <img src="images/person_4.jpg" alt="Image placeholder">
              <h3 class="block-38-heading">Karan Mehta</h3>
              <p class="block-38-subheading">Freelancer</p>
            </div>
            <div class="block-38-body">
              <p>Perfect for personal projects and client work. I’ve had no problems in over a year.</p>
            </div>
          </div>
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