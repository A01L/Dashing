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
    <title>Dashing client!</title>

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

<body class="body-scroll" data-page="index">

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
                <p class="mt-4"><span class="text-secondary">Добро пожаловать!</span><br><strong>Загрузка...</strong></p>
            </div>
        </div>
    </div>
    <!-- loader section ends -->

    <!-- Sidebar main menu -->
    <div class="sidebar-wrap  sidebar-overlay">
        <!-- Add pushcontent or fullmenu instead overlay -->
        <div class="closemenu text-muted">Закрыть меню</div>
        <div class="sidebar ">
            <!-- user information -->
            <div class="row my-3">
                <div class="col-12 profile-sidebar">
                    <div class="clearfix"></div>
                    <div class="circle small one"></div>
                    <div class="circle small two"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 194.287 141.794" class="menubg">
                        <defs>
                            <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                gradientUnits="objectBoundingBox">
                                <stop offset="0" stop-color="#09b2fd" />
                                <stop offset="1" stop-color="#6b00e5" />
                            </linearGradient>
                        </defs>
                        <path id="menubg"
                            d="M672.935,207.064c-19.639,1.079-25.462-3.121-41.258,10.881s-24.433,41.037-49.5,34.15-14.406-16.743-50.307-29.667-32.464-19.812-16.308-41.711S500.472,130.777,531.872,117s63.631,21.369,93.913,15.363,37.084-25.959,56.686-19.794,4.27,32.859,6.213,44.729,9.5,16.186,9.5,26.113S692.573,205.985,672.935,207.064Z"
                            transform="translate(-503.892 -111.404)" fill="url(#linear-gradient)" />
                    </svg>

                    <div class="row mt-3">
                        <div class="col-auto">
                            <figure class="avatar avatar-80 rounded-20 p-1 bg-white shadow-sm">
                                <img src="assets/img/user1.jpg" alt="" class="rounded-18">
                            </figure>
                        </div>
                        <div class="col px-0 align-self-center">
                            <h5 class="mb-2"><?php 
                            echo get_data_db($connect, "clients", "lname", "id", $uid);
                            echo " ";
                            echo get_data_db($connect, "clients", "name", "id", $uid);
                             ?></h5>
                            <p class="text-muted size-12"><?php 
                            echo get_data_db($connect, "clients", "phone", "id", $uid);
                             ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- user emnu navigation -->
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">
                                <div class="avatar avatar-40 icon"><i class="bi bi-house-door"></i></div>
                                <div class="col">Главаная</div>
                               <!--  <div class="arrow"><i class="bi bi-chevron-right"></i></div> -->
                            </a>
                        </li>

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-cart"></i></div>
                                <div class="col">Магазин</div>
                               
                            </a>
                        </li> -->
                       

                        <li class="nav-item">
                            <a class="nav-link" href="#" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-bell"></i></div>
                                <div class="col">Уведомление</div>
                               
                            </a>
                        </li>

                        
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="pages.html" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-file-earmark-text"></i></div>
                                <div class="col">Профиль <span class="badge bg-info fw-light">new</span></div>
                               
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="../vendor/outc.php" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-box-arrow-right"></i></div>
                                <div class="col">Выйти</div>
                                
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar main menu ends -->

    <!-- Begin page -->
    <main class="h-100">

        <!-- Header -->
        <header class="header position-fixed">
            <div class="row">
                <div class="col-auto">
                    <a href="javascript:void(0)" target="_self" class="btn btn-light btn-44 menu-btn">
                        <i class="bi bi-list"></i>
                    </a>
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
        <!-- Dark mode switch -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="darkmodeswitch">
                                <label class="form-check-label text-muted px-2 " for="darkmodeswitch">Ультра тема</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- main page content -->
        <div class="main-container container">
            <!-- balance -->
            <div class="row my-4 text-center">
                <div class="col-12">
                    <h1 class="fw-light mb-2">₸ <?php echo get_data_db($connect, "clients", "ballance", "id", $uid); ?></h1>
                    <p class="text-secondary">Депозит: <?php echo get_data_db($connect, "clients", "num", "id", $uid); ?></p>
                </div>
            </div>

            <!-- income expense-->
            <div class="row mb-4">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-40 p-1 shadow-sm shadow-success rounded-15">
                                        <div class="icons bg-success text-white rounded-12">
                                            <i class="bi bi-arrow-down-left"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="size-10 text-secondary mb-0">Пополнение</p>
                                    <p>
                                    <?php
            $conn = $connect;
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            // sql query 

            $sql = "SELECT * FROM `dc_hist` WHERE type = 'plus' AND user = $uid";
            $tb = 0;
            if($result = $conn->query($sql)){
                $rowsCount = $result->num_rows; // ID - constant
                foreach($result as $row){
                    $tb = $tb+$row['sum'];
                }
              
            } else{
                echo "Ошибка: " . $conn->error;
            }

            echo $tb."₸";
                                     ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-40 p-1 shadow-sm shadow-danger rounded-15">
                                        <div class="icons bg-danger text-white rounded-12">
                                            <i class="bi bi-arrow-up-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="size-10 text-secondary mb-0">Расход</p>
                                    <p><?php
            $conn = $connect;
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            // sql query 

            $sql = "SELECT * FROM `dc_hist` WHERE type = 'minus' AND user = $uid";
            $tb = 0;
            if($result = $conn->query($sql)){
                $rowsCount = $result->num_rows; // ID - constant
                foreach($result as $row){
                    $tb = $tb+$row['sum'];
                }
            } else{
                echo "Ошибка: " . $conn->error;
            }

            echo $tb."₸";
                                     ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- categories list -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card bg-theme text-white">
                        <div class="card-body pb-0">
                            <div class="row justify-content-between gx-0 mx-0 pb-3">
                                <div class="col-auto text-center">
                                    <a href="history.php" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                        <div class="icons bg-success text-white rounded-12 bg-opac">
                                            <i class="bi bi-receipt-cutoff size-22"></i>
                                        </div>
                                    </a>
                                    <p class="size-10">История</p>
                                </div>

                                <div class="col-auto text-center">
                                    <a href="sendmoney.php" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                        <div class="icons bg-success text-white rounded-12 bg-opac">
                                            <i class="bi bi-arrow-up-right size-22"></i>
                                        </div>
                                    </a>
                                    <p class="size-10">Оплата</p>
                                </div>

                                <div class="col-auto text-center">
                                    <a href="sendmoneyp.php" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                        <div class="icons bg-success text-white rounded-12 bg-opac">
                                            <i class="bi bi-arrow-down-left size-22"></i>
                                        </div>
                                    </a>
                                    <p class="size-10">Покупка</p>
                                </div>

                                <div class="col-auto text-center">
                                    <a href="#" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                        <div class="icons bg-success text-white rounded-12 bg-opac">
                                            <i class="bi bi-bank size-22"></i>
                                        </div>
                                    </a>
                                    <p class="size-10">Депозит</p>
                                </div>
                            </div>

                           <!--  <div class="row justify-content-between gx-0 mx-0 collapse" id="collpasemorelink">
                                <div class="col-auto text-center">
                                    <a href="bills.html" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                        <div class="icons bg-success text-white rounded-12 bg-opac">
                                            <i class="bi bi-tv size-22"></i>
                                        </div>
                                    </a>
                                    <p class="size-10">TV</p>
                                </div>

                                <div class="col-auto text-center">
                                    <a href="addmoney.html" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                        <div class="icons bg-success text-white rounded-12 bg-opac">
                                            <i class="bi bi-wallet2 size-22"></i>
                                        </div>
                                    </a>
                                    <p class="size-10">Add Money</p>
                                </div>

                                <div class="col-auto text-center">
                                    <a href="shop.html" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                        <div class="icons bg-success text-white rounded-12 bg-opac">
                                            <i class="bi bi-cart size-22"></i>
                                        </div>
                                    </a>
                                    <p class="size-10">Buy</p>
                                </div>

                                <div class="col-auto text-center">
                                    <a href="rewards.html" class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                        <div class="icons bg-success text-white rounded-12 bg-opac">
                                            <i class="bi bi-cash-coin size-22"></i>
                                        </div>
                                    </a>
                                    <p class="size-10">Cashback</p>
                                </div>
                            </div> -->

                            <button class="btn btn-link mt-0 py-1 w-100 bar-more collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collpasemorelink" aria-expanded="false"
                                aria-controls="collpasemorelink">
                                <span class=""></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Companies -->

<!-- 
            <div class="row mb-2">
                <div class="col">
                    <h6 class="title">Companies</h6>
                </div>
                <div class="col-auto">
                    <a href="bills.html" class="small">Pay Bill</a>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12 px-0">
                 
                    <div class="swiper-container connectionwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="tag border active">
                                    <i class="bi bi-building"></i>
                                    <span class="text-uppercase">All</span>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="tag border ">
                                    <i class="bi bi-tv"></i>
                                    <span class="text-uppercase">Electronics</span>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="tag border ">
                                    <i class="bi bi-truck"></i>
                                    <span class="text-uppercase">Transport</span>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="tag border ">
                                    <i class="bi bi-speaker"></i>
                                    <span class="text-uppercase">Music</span>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="tag border ">
                                    <i class="bi bi-wallet2"></i>
                                    <span class="text-uppercase">Accessories</span>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="tag border ">
                                    <i class="bi bi-camera"></i>
                                    <span class="text-uppercase">Camera</span>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="tag border ">
                                    <i class="bi bi-gem"></i>
                                    <span class="text-uppercase">Jwellery</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 px-0">
                 
                    <div class="swiper-container connectionwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="paybill.html" class="card text-center">
                                    <div class="card-body p-1">
                                        <figure class="avatar avatar-80 shadow-sm rounded-18">
                                            <img src="assets/img/company2.png" alt="">
                                        </figure>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="paybill.html" class="card text-center">
                                    <div class="card-body p-1">
                                        <figure class="avatar avatar-80 shadow-sm rounded-20">
                                            <img src="assets/img/company3.jpg" alt="">
                                        </figure>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="paybill.html" class="card text-center">
                                    <div class="card-body p-1">
                                        <figure class="avatar avatar-80 shadow-sm rounded-20">
                                            <img src="assets/img/company4.jpg" alt="">
                                        </figure>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="paybill.html" class="card text-center">
                                    <div class="card-body p-1">
                                        <figure class="avatar avatar-80 shadow-sm rounded-20">
                                            <img src="assets/img/company5.png" alt="">
                                        </figure>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="paybill.html" class="card text-center">
                                    <div class="card-body p-1">
                                        <figure class="avatar avatar-80 shadow-sm rounded-20">
                                            <img src="assets/img/company2.png" alt="">
                                        </figure>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="paybill.html" class="card text-center">
                                    <div class="card-body p-1">
                                        <figure class="avatar avatar-80 shadow-sm rounded-20">
                                            <img src="assets/img/company3.jpg" alt="">
                                        </figure>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="paybill.html" class="card text-center">
                                    <div class="card-body p-1">
                                        <figure class="avatar avatar-80 shadow-sm rounded-20">
                                            <img src="assets/img/company4.jpg" alt="">
                                        </figure>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="paybill.html" class="card text-center">
                                    <div class="card-body p-1">
                                        <figure class="avatar avatar-80 shadow-sm rounded-20">
                                            <img src="assets/img/company5.png" alt="">
                                        </figure>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 -->

            

            <!-- offers banner -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card theme-bg overflow-hidden">
                        <figure class="m-0 p-0 position-absolute top-0 start-0 w-100 h-100 coverimg right-center-img">
                            <img src="assets/img/offerbg.png" alt="">
                        </figure>
                        <div class="card-body py-4">
                            <div class="row">
                                <div class="col-9 align-self-center">
                                    <h1 class="mb-3"><span class="fw-light">30% Бонус</span><br />Пополни!</h1>
                                    <p>Пополни акаунт на 5000₸ и получи 30% бонус (время ограничено).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transactions -->
            <div class="row mb-3">
                <div class="col">
                    <h6 class="title">Транзакций<br><small class="fw-normal text-muted">4 Последних транзакций</small>
                    </h6>
                </div>
                <div class="col-auto align-self-center">
                    <a href="history.php" class="small">Все</a>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush bg-none">
                                <?php
            $conn = $connect;
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            // sql query 

            $sql = "SELECT * FROM `dc_hist` WHERE user = $uid ORDER BY `id` DESC LIMIT 4";
            if($result = $conn->query($sql)){
                $rowsCount = $result->num_rows; // ID - constant
                foreach($result as $row){

                    // chech new message
                    
                   ?>

                                        <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-60 shadow-sm card rounded-15 p-1">
                                                <img src="assets/img/company4.jpg" alt="" class="rounded-15">
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-secondary size-10 mb-0">Пополнение</p>
                                            <p><?php echo $row['from']; ?></p>
                                        </div>
                                        <div class="col align-self-center text-end">
                                            <p class="text-secondary text-muted size-10 mb-0"><?php echo $row['date']; ?></p>
                                            
                                            <?php  
                                            if ($row['type'] == "plus") {
                                                echo "<p style='color: #50C878;'>+".$row['sum']."</p>";
                                            }
                                            else{
                                                echo "<p style='color: #EB4C42;'>-".$row['sum']."</p>";
                                            }

                                             ?>
                                        </div>
                                    </div>
                                </li>

                   <?php

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
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blogs -->
            <!-- <div class="row mb-3">
                <div class="col">
                    <h6 class="title">News and Upcomming</h6>
                </div>
                <div class="col-auto align-self-center">
                    <a href="blog.html" class="small">Read more</a>
                </div>
            </div> -->
            <!-- <div class="row"> --><!-- 
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="blogdetails.html" class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">
                                        <img src="assets/img/news.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-1">Do share and Earn a lot</p>
                                    <p class="text-muted size-12">Get $10 instant as reward while your friend or invited
                                        member join finwallapp</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="blogdetails.html" class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">
                                        <img src="assets/img/news1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-1">Walmart news latest picks</p>
                                    <p class="text-muted size-12">Get $10 instant as reward while your friend or invited
                                        member join finwallapp</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="blogdetails.html" class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">
                                        <img src="assets/img/news2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-1">Do share and Help us</p>
                                    <p class="text-muted size-12">Get $10 instant as reward while your friend or invited
                                        member join finwallapp</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
             --><!-- </div> -->

        </div>
        <!-- main page content ends -->


    </main>
    <!-- Page ends-->

    <!-- Footer -->
    <!-- <footer class="footer">
        <div class="container">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" href="index.html">
                        <span>
                            <i class="nav-icon bi bi-house"></i>
                            <span class="nav-text">Дом</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="stats.html">
                        <span>
                            <i class="nav-icon bi bi-binoculars"></i>
                            <span class="nav-text">Statistics</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item centerbutton">
                    <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#menumodal"
                        id="centermenubtn">
                        <span class="theme-radial-gradient">
                            <i class="bi bi-grid size-22"></i>
                        </span>
                    </button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.html">
                        <span>
                            <i class="nav-icon bi bi-bag"></i>
                            <span class="nav-text">Shop</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="wallet.html">
                        <span>
                            <i class="nav-icon bi bi-wallet2"></i>
                            <span class="nav-text">Wallet</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </footer> -->
    <!-- Menu Modal -->
    <!-- <div class="modal fade" id="menumodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content shadow">
                <div class="modal-body">
                    <h1 class="mb-4"><span class="text-secondary fw-light">Quick</span><br />Actions!</h1>
                    <div class="text-center">
                        <img src="assets/img/QRCode.png" alt="" class="mb-2" />
                        <p class="small text-secondary mb-4">Ask to scan this QR-Code<br />to accept money</p>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-auto text-center">
                            <a href="bills.html" class="avatar avatar-70 p-1 shadow-sm shadow-danger rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                                <div class="icons text-danger">
                                    <i class="bi bi-receipt-cutoff size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Pay Bill</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="sendmoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-purple rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                                <div class="icons text-purple">
                                    <i class="bi bi-arrow-up-right size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Send Money</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="receivemoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-success rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                                <div class="icons text-success">
                                    <i class="bi bi-arrow-down-left size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Receive Money</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-auto text-center">
                            <a href="withdraw.html" class="avatar avatar-70 p-1 shadow-sm shadow-secondary rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                                <div class="icons text-secondary">
                                    <i class="bi bi-bank size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Withdraw</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="addmoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-warning rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                                <div class="icons text-warning">
                                    <i class="bi bi-wallet2 size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Add Money</p>
                        </div>

                        <div class="col-auto text-center">
                            <div class="avatar avatar-70 p-1 shadow-sm shadow-info rounded-20 bg-opac mb-2"  data-bs-dismiss="modal">
                                <div class="icons text-info">
                                    <i class="bi bi-tv size-24"></i>
                                </div>
                            </div>
                            <p class="size-10 text-secondary">Recharge</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Footer ends-->

    <!-- PWA app install toast message -->
    <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-99">
        <div class="toast mb-3" role="alert" aria-live="assertive" aria-atomic="true" id="toastinstall"
            data-bs-animation="true">
            <div class="toast-header">
                <img src="assets/img/favicon32.png" class="rounded me-2" alt="...">
                <strong class="me-auto">CDashing на главную!</strong>
                <small>Нет</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <div class="row">
                    <div class="col">
                        Кликните на "Установить" что бы добавить на главную страницу.
                    </div>
                    <div class="col-auto align-self-center ps-0">
                        <button class="btn-default btn btn-sm" id="addtohome">Установить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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