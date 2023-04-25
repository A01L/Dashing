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
    <title>Dashing Client!</title>

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

<body class="body-scroll" data-page="profile">

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
                <p class="mt-4"><span class="text-secondary">Комфортнее с DClient!</span><br><strong>Загрузка...</strong></p>
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

        <!-- main page content -->
        <div class="main-container container">
            <div class="row">
                <div class="col-12 profile-page">
                    <div class="clearfix"></div>
                    <div class="circle small one"></div>
                    <div class="circle small two"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="282.062"
                        height="209.359" viewBox="0 0 282.062 209.359" class="menubg">
                        <defs>
                            <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                gradientUnits="objectBoundingBox">
                                <stop offset="0" stop-color="#09b2fd" />
                                <stop offset="1" stop-color="#6b00e5" />
                            </linearGradient>
                        </defs>
                        <path id="profilebg"
                            d="M751.177,233.459c-28.511,1.567-38.838,7.246-61.77,27.573s-27.623,71.926-65.15,70.883-27.624-21.369-79.744-40.132-47.13-53.005-23.676-84.8,4.009-57.671,33-75.867,83.269,30.223,127.232,21.5,64.157-41.353,82.329-26,5.953,29.138,8.773,46.369,13.786,23.5,13.786,37.91S779.688,231.893,751.177,233.459Z"
                            transform="translate(-503.892 -122.573)" fill="url(#linear-gradient)" />
                    </svg>


                    <div class="row my-3 py-4">
                        <div class="col-7 align-self-center">
                            <h1 class="mb-2"><span class="fw-light text-secondary">Привет!</span><br /><?php 
                            echo get_data_db($connect, "clients", "name", "id", $uid);
                             ?></h1>
                            <p class="text-muted size-12"><?php 
                            echo get_data_db($connect, "clients", "phone", "id", $uid);
                             ?></p>
                        </div>

                        <div class="col align-self-center">
                            <figure class="avatar avatar-100 rounded-20 p-1 bg-white shadow-sm">
                                <img src="assets/img/user1.jpg" alt="" class="rounded-18">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

            <!-- buttons -->
            <form method="post" action="../vendor/mysys.php">
            <div class="row mb-4">
                <div class="col">
                    <a href="index.php" class="btn btn-light btn-lg shadow-sm w-100">Назад</a>
                </div>
                <input type="text" value="updatep" name="mod" readonly hidden>
                <input type="text" value="<?php echo $uid; ?>" name="id" readonly hidden>
                <button style="border: none; background: transparent; width: 50%;">
                <div class="col">
                    <a class="btn btn-default btn-lg shadow-sm w-100">Сохранить</a>
                </div>
                </button>
            </div>
            <div class="form-group form-floating is-valid mb-3">
                        <input type="text" class="form-control " id="Subject" placeholder="Введите имя..." value="<?php 
                            echo get_data_db($connect, "clients", "name", "id", $uid);
                             ?>" name="name">
                        <label class="form-control-label" for="Subject">Имя</label>
            </div>
            <div class="form-group form-floating is-valid mb-3">
                        <input type="text" class="form-control " id="Subject" placeholder="Введите Фамилию..." value="<?php 
                            echo get_data_db($connect, "clients", "lname", "id", $uid);
                             ?>" name="lname">
                        <label class="form-control-label" for="Subject">Фамилия</label>
            </div>
            <div class="form-group form-floating is-valid mb-3">
                        <input type="text" class="form-control " id="Subject" placeholder="Введите номер телефона..." value="<?php 
                            echo get_data_db($connect, "clients", "phone", "id", $uid);
                             ?>" name="phone">
                        <label class="form-control-label" for="Subject">Номер</label>
            </div>
            </form>
<br>

            <!-- My Frequent Payments -->
            <div class="row mb-3">
                <div class="col">
                    <h6 class="title">Активные сервисы</h6>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-12 col-md-6">
                    <div class="card overflow-hidden mb-3">
                        <figure class="m-0 p-0 position-absolute top-0 end-0 w-50 h-100 coverimg">
                            <img src="assets/img/image2.jpg" alt="">
                        </figure>
                        <div class="card-body p-0">
                            <div class="row mx-0">
                                <div class="col-8 py-3 aftercircle">
                                    <div class="row">
                                        <div class="col-auto">
                                            <a href="#" class="card text-center">
                                                <div class="card-body p-1">
                                                    <div
                                                        class="position-absolute end-0 top-0 bg-success z-index-1 online-status">
                                                    </div>
                                                    <figure class="avatar avatar-70 shadow-sm rounded-18">
                                                        <img src="assets/img/company4.jpg" alt="" />
                                                    </figure>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col align-self-center px-0">
                                            <p class="text-secondary size-10 mb-0">Поплнение баланса</p>
                                            <p class="mb-2">PlayStation 5</p>
                                            <p>от 1000₸
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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