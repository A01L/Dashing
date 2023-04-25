<?php 
require_once "../vendor/db.php";
require_once "../vendor/adf/adf.php";
session_set_cookie_params(172800,"/");
session_start();
if (!$_SESSION['client']) {
    header('Location: signin.php');
}

$uid = $_SESSION['client']['id'];
$pid = $_GET['id'];
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
        <form method="post" action="../vendor/mysys.php">
            <!-- select contacts -->
            <div class="row mb-3">
                <div class="col-auto">
                    <div class="card">
                        <div class="card-body p-1">
                            <div class="avatar avatar-44 rounded-15 shadow-sm">
                                <img src="assets/img/company3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col align-self-center ps-0">
                    <p class="mb-1 text-color-theme">PlayStation 5</p>
                    <p class="text-muted size-12"><?php echo get_data_db($connect, "rents", "name", "id", $pid); ?></p>
                </div>
                <div class="col-auto">
                    <a href="#" class="btn btn-default btn-44 shadow-sm">
                        <i class="bi bi-receipt"></i>
                    </a>
                </div>
            </div>
         
            <!-- select Amount -->
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <input type="number" class="trasparent-input text-center" value="1" placeholder="Время" name="time"><h3>Час</h3>
                </div>
            </div>
            <!-- coupon code-->
            <!-- <div class="row">
                <div class="col-12 mb-4">
                    <div class="form-group form-floating is-valid">
                        <input type="text" class="form-control " id="coupon" placeholder="Coupon Code"
                            value="CASHBACK05NEW">
                        <label class="form-control-label" for="coupon">Coupon Code</label>
                        <div class=" tooltip-btn">
                            <span class="tag bg-success text-white border-0 px-2 float-end mt-1">Applied</span>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Amount breakdown -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <p>За час <?php 
                            if ($pid == 3) {
                                echo "2000";
                            }
                            else{
                                echo "1000";
                            }

                             ?>₸</p>
                        </div>
                        <div class="col-auto text-end">
                            <p class="text-muted">С баланса</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <p>Кэшбек (5%)</p>
                        </div>
                        <div class="col-auto text-end">
                            <p class="text-muted">На баланс</p>
                        </div>
                    </div>
                </div>
            </div>
       
            <div class="row mb-4">
                <input type="text" value="smp" readonly hidden name="mod">
                <input type="text" value="<?php echo $pid; ?>" readonly hidden name="id">
                <input type="text" value="<?php echo $uid; ?>" readonly hidden name="uid">
                <button style="background: transparent; border: none;">
                <div class="col-12 ">
                    <a class="btn btn-default btn-lg shadow-sm w-100">
                        Купить
                    </a>
                </div>
                </button>
            </div>
        </form>
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