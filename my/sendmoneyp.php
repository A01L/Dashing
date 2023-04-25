<?php 
require_once "../vendor/db.php";
require_once "../vendor/adf/adf.php";
session_set_cookie_params(172800,"/");
session_start();
if (!$_SESSION['client']) {
    header('Location: signin.php');
}

$uid = $_SESSION['client']['id'];
 ?>
 <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Dashing the Best!</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/favicon180.png" sizes="180x180">
    <link rel="icon" href="assets/img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="assets/img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- swiper carousel css -->
    <link rel="stylesheet" href="assets/vendor/swiperjs-6.6.2/swiper-bundle.min.css">

    <!-- style css for this template -->
    <link href="assets/css/style.css" rel="stylesheet" id="style">
</head>

<body class="body-scroll" data-page="addmoney">

    <!-- loader section -->
    <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                <div class="logo-wallet">
                    <div class="wallet-bottom">
                    </div>
                    <div class="wallet-cards"></div>
                    <div class="wallet-top">
                    </div>
                </div>
                <p class="mt-4"><span class="text-secondary">С нами веселее!</span><br><strong>Загрузка...</strong></p>
            </div>
        </div>
    </div>
    <!-- loader section ends -->

    <!-- Begin page -->
    <main class="h-100">

        <!-- Header -->
        <header class="header position-fixed">
            <div class="row">
                <a href="index.php">
                <div class="col-auto">
                    <button type="button" class="btn btn-light btn-44">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                </div>
                </a>
                <div class="col text-center">
                    <div class="logo-small">
                        <img src="assets/img/logo.png" alt="" />
                        <h5><span class="text-secondary fw-light">Dashing</span><br />Client</h5>
                    </div>
                </div>
                <div class="col-auto">
                    <a href="profile.php" target="_self" class="btn btn-light btn-44">
                        <i class="bi bi-person-circle"></i>
                        <span class="count-indicator"></span>
                    </a>
                </div>
            </div>
        </header>
        <!-- Header ends -->

        <!-- main page content -->
        <div class="main-container container">

            
            <?php
            $conn = $connect;
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            // sql query 

            $sql = "SELECT * FROM `rents`";
            if($result = $conn->query($sql)){
                $rowsCount = $result->num_rows; // ID - constant
                foreach($result as $row){
                    if ($row['stat'] == 0) {
                    
                   ?>
<a href="smp.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: white;">
                <div class="card mb-4" style="border: 3px solid #50C878;">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <p><?php echo $row['name']; ?></p>
                        </div>
                        <div class="col-auto text-end">
                            <p class="text-muted">Свободен</p>
                        </div>
                    </div>
                </div>
            </div>
</a>

                   <?php
               }
               elseif ($row['stat'] == 1) {
                   ?>
                   <div class="card mb-4">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <p><?php echo $row['name']; ?></p>
                        </div>
                        <div class="col-auto text-end">
                            <p class="text-muted">Занят до <?php echo replace_simbols(10, $row['etime'], 3); ?></p>
                        </div>
                    </div>
                </div>
            </div>
                   <?php
               }

                }
                if ($rowsCount == "0") {           
                                echo "<h2 class='msg_not'>Список пустой</h2>";
                }

                echo "</table>";
                $result->free();
            } else{
                echo "Ошибка: " . $conn->error;
            }
    
?>


            <div class="row mb-4">
                <input type="text" value="sendm" readonly hidden name="mod">
                <input type="text" value="<?php echo $uid; ?>" readonly hidden name="id">
               
                <div class="col-12 ">
                    <a href="index.php" class="btn btn-default btn-lg shadow-sm w-100">
                        Отмена
                    </a>
                </div>
            
            </div>

        </div>
        <!-- main page content ends -->


    </main>
    <!-- Page ends-->


    <!-- Required jquery and libraries -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <!-- Customized jquery file  -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/color-scheme.js"></script>

    <!-- PWA app service registration and works -->
    <script src="assets/js/pwa-services.js"></script>

    <!-- Chart js script -->
    <script src="assets/vendor/chart-js-3.3.1/chart.min.js"></script>

    <!-- Progress circle js script -->
    <script src="assets/vendor/progressbar-js/progressbar.min.js"></script>

    <!-- swiper js script -->
    <script src="assets/vendor/swiperjs-6.6.2/swiper-bundle.min.js"></script>

    <!-- page level custom script -->
    <script src="assets/js/app.js"></script>

</body>

</html>