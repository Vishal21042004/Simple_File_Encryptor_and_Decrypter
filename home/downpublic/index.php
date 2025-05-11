<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Download Public File</title>
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

<script language='javascript'>
function decrypt(filename, fileId) {
    // Simple prompt for the secret key
    const secretkey = prompt("Please enter the secret key to decrypt the file:");
    if (!secretkey) return;

    // Create a form to submit the data
    const form = document.createElement("form");
    form.method = "POST";
    form.action = "decrypt.php";

    // Add download parameter
    const inputDownload = document.createElement("input");
    inputDownload.type = "hidden";
    inputDownload.name = "download";
    inputDownload.value = "true";
    form.appendChild(inputDownload);

    // Add file path
    const input1 = document.createElement("input");
    input1.type = "hidden";
    input1.name = "file_path";
    input1.value = filename;
    form.appendChild(input1);

    // Add the secret key (trimmed to remove any whitespace)
    const input2 = document.createElement("input");
    input2.type = "hidden";
    input2.name = "secretkey";
    input2.value = secretkey.trim();
    form.appendChild(input2);

    document.body.appendChild(form);
    form.submit();
}
</script>

<style>
input[type=text] {
  width: 130px;
  text-align: center;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: #F8F8F8;
  background-image: url('../../images/srch.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 100%;
}
</style>

  <body>
  <?php

    if(!isset ($_SESSION['id'])){
        echo "<script> window.location.href='../../login'; </script>";
    }
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
        <h2 class="mb-0">Public File download</h2>
      </div>
</div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-6" data-aos="fade">
              <form method="get" action="">
                  <input type="text" name="search" placeholder="Search..."/>
              </form><br/>
            <h2>Download Public File</h2>
                <table width=90% align="center" border="1px" class="table-striped">
		<thead class="bg-dark">
			<th style="color: yellow">File Name</th>
			<th style="color: yellow">Download encrypted file</th>
			<th style="color: yellow">Decrypt and Download file</th>
                        <th style="color: yellow">Get Key</th>
		</thead>
		<tbody>
            <?php
            include '../../config/dbConnection.php';
            if(isset($_GET['search']))
               $query="select * from tbluppublic where filename like '%{$_GET['search']}%'";
            else
                $query="select * from tbluppublic";

            $result=mysqli_query($conn,$query);

            while($row=mysqli_fetch_assoc($result)){
                $id = (int)$row['id'];
                $filename = basename($row['filename']);
                $filepath = $row['filename'];
               ?> <tr>
            				<td align='center'><?php echo $filename; ?></td>
            				<td align='center'><a href='<?php echo $filepath; ?>' download>Download</a></td>
            				<td align='center'>
                                <a href='javascript:decrypt("<?php echo $filepath; ?>", <?php echo $id; ?>);'>Decrypt & Download</a> |
                                <a href='manual_decrypt.php?id=<?php echo $id; ?>' style='font-size: 0.8em;'>Manual</a>
                            </td>
                            <td align='center'><a href='getkey.php?id=<?php echo $id; ?>'>Request</a></td>
            			</tr>
            <?php

            }?>
		</tbody>
	</table>


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