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
                <div class="col-auto">
                    <button type="button" class="btn btn-light btn-44 back-btn">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                </div>
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
                    <p class="text-muted size-12">ID: ID020581</p>
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
                    <input type="number" class="trasparent-input text-center" value="1000" placeholder="Сумма" name="sum">
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
                            <p>Кэшбек (5%)</p>
                        </div>
                        <div class="col-auto text-end">
                            <p class="text-muted">На баланс</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Saving targets -->
            <div class="row mb-2">
                <div class="col">
                    <h6 class="title">Депозит</h6>
                </div>
                <div class="col-auto">
                    <a href="" class="small">новый</a>
                </div>
            </div>
            <!-- swiper credit cards -->
            <div class="row mb-2">
                <div class="col-12 px-0">
                    <div class="swiper-container cardswiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card theme-bg shadow-sm shadow-purple mb-3">
                                    <img src="assets/img/card-bg.png" alt="" class="cardimg" />
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <div class="col-auto align-self-center">
                                                <img src="assets/img/maestro.png" alt="">
                                            </div>
                                            <div class="col align-self-center text-end">
                                                <p class="small">
                                                    <span class="text-muted size-10">Баланс</span><br>
                                                    <span class=""><?php echo get_data_db($connect, "clients", "ballance", "id", $uid); ?>₸</span>
                                                </p>
                                            </div>
                                        </div>
                                        <h6 class="fw-normal mb-3">
                                            <?php 
                                            $num = get_data_db($connect, "clients", "num", "id", $uid); 
                                            echo "Депозит: ";
                                            echo replace_simbols(0, $num, 4);
                                            echo " ";
                                            echo replace_simbols(2, $num, 2);
                                            echo " ";
                                            echo replace_simbols(4, $num, 0);
                                            echo " ";
                                            ?>
                                        </h6>
                                        <div class="row">
                                            <div class="col-auto">
                                                <p class="mb-0 text-muted size-10">Срок</p>
                                                <p>11/23</p>
                                            </div>
                                            <div class="col text-end">
                                                <p class="mb-0 text-muted size-10">Владелец</p>
                                                <p><?php echo get_data_db($connect, "clients", "login", "id", $uid); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="swiper-slide">
                                <div class="card bg-danger shadow-sm shadow-danger mb-3">
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <div class="col-auto align-self-center">
                                                <img src="assets/img/visa.png" alt="">
                                            </div>
                                            <div class="col align-self-center text-end">
                                                <p class="small">
                                                    <span class="text-muted size-10">City Bank</span><br>
                                                    <span class="">Credit Card</span>
                                                </p>
                                            </div>
                                        </div>
                                        <h6 class="fw-normal mb-3">
                                            000 0000 0001 546598
                                        </h6>
                                        <div class="row">
                                            <div class="col-auto">
                                                <p class="mb-0 text-muted size-10">Expiry</p>
                                                <p>09/023</p>
                                            </div>
                                            <div class="col text-end">
                                                <p class="mb-0 text-muted size-10">Card Holder</p>
                                                <p>Maxartkiller</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <input type="text" value="sendm" readonly hidden name="mod">
                <input type="text" value="<?php echo $uid; ?>" readonly hidden name="id">
                <button style="background: transparent; border: none;">
                <div class="col-12 ">
                    <a class="btn btn-default btn-lg shadow-sm w-100">
                        Оплатить
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