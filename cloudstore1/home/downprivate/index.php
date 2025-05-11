<?php session_start(); ?>
<?php
if (!isset($_SESSION['id'])) {
    echo "<script>window.location.href='../../login';</script>";
    exit();
}
include '../../config/dbConnection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Download Private File</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts and CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="../../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../css/aos.css">

    <style>
        input[type=text] {
            width: 130px;
            text-align: center;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: #F8F8F8;
            background-image: url('../../images/srch.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            transition: width 0.4s ease-in-out;
        }

        input[type=text]:focus {
            width: 100%;
        }
    </style>

    <script>
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
</head>

<body>
<div class="site-wrap">

    <!-- Navbar -->
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
                    <div class="col-6 col-md-6 col-lg-10 text-right">
                        <ul class="unit-4 ml-auto">
                            <li><span class="d-block text-gray-500 text-uppercase">Support</span> <span class="h6">1-800-200-3911</span></li>
                            <li><span class="d-block text-gray-500 text-uppercase">Email</span> <span class="h6">mail@domain.com</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <div class="site-navbar bg-dark">
            <div class="container py-1">
                <div class="row align-items-center">
                    <div class="col-8">
                        <nav class="site-navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li><a href="#">Welcome: <span style='color:red;'><?php echo htmlspecialchars($_SESSION['fn'] . ' ' . $_SESSION['ln']); ?></span></a></li>
                                <li><a href="../">Home</a></li>
                                <li class="has-children">
                                    <a href="#">File Upload</a>
                                    <ul class="dropdown">
                                        <li><a href="../upprivate">Private File</a></li>
                                        <li><a href="../uppublic">Public File</a></li>
                                    </ul>
                                </li>
                                <li class="has-children active">
                                    <a href="#">File Download</a>
                                    <ul class="dropdown">
                                        <li class="active"><a href="#">Private File</a></li>
                                        <li><a href="../downpublic">Public File</a></li>
                                    </ul>
                                </li>
                                <li><a href="../settings">Settings</a></li>
                                <li><a href="../../home/">Back</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-4 text-right">
                        <a href="../../logout.php" class="btn btn-primary btn-outline-primary text-white">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->
    <div class="unit-5 overlay" style="background-image: url('../../images/hero_bg_1.jpg');">
        <div class="container text-center">
            <h2 class="mb-0">Private File Download</h2>
        </div>
    </div>

    <!-- File Table Section -->
    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-10">
                    <form method="get" action="">
                        <input type="text" name="search" placeholder="Search...">
                    </form>
                    <br />
                    <h2>Download Private Files</h2>

                    <table class="table table-striped table-bordered" style="width:100%;">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>File Name</th>
                                <th>Download (Encrypted)</th>
                                <th>Decrypt & Download</th>
                                <th>Get Key</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $searchTerm = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
                        $userId = mysqli_real_escape_string($conn, $_SESSION['id']);

                        $query = $searchTerm
                            ? "SELECT * FROM tblupprivate WHERE username = '$userId' AND filename LIKE '%$searchTerm%'"
                            : "SELECT * FROM tblupprivate WHERE username = '$userId'";

                        $result = mysqli_query($conn, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $filename = htmlspecialchars(basename($row['filename']));
                                $filepath = htmlspecialchars($row['filename']);
                                $id = (int)$row['id'];
                                echo "<tr>
                                        <td>{$filename}</td>
                                        <td><a href='{$filepath}' download>Download</a></td>
                                        <td>
                                            <a href='javascript:decrypt(\"{$filepath}\", {$id});'>Decrypt & Download</a> |
                                            <a href='manual_decrypt.php?id={$id}' style='font-size: 0.8em;'>Manual</a>
                                        </td>
                                        <td><a href='getkey.php?id={$id}'>Request</a></td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No files found.</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="site-navbar bg-dark text-center py-3">
        <div class="container">
            <p class="text-white mb-0">Copyright &copy; Cloud Storage With Cryptography</p>
        </div>
    </div>

</div>

<!-- Scripts -->
<script src="../../js/jquery-3.3.1.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/aos.js"></script>
<script src="../../js/main.js"></script>

</body>
</html>
