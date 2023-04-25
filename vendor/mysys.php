<?php 
session_start();
date_default_timezone_set('Asia/Almaty');
require_once "db.php";
require_once "adf/adf.php";
$today = date("Y-m-d H:i:s"); 
if ($_POST['mod']) {
	$mod = $_POST['mod'];
}
elseif ($_GET['mod']) {
	$mod = $_GET['mod'];
}
else {
	echo "Error mod for operation!";
}

if ($mod == "signup") {
	$login = $_POST['login'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];
	$num = rand(111111, 999999);
	if (!$login OR !$password) {
		header("Location: ../my/signup.php");
	}
	$result = mysqli_query($connect, "SELECT * FROM `clients` WHERE `login` = '$login'");
	$num_rows = mysqli_num_rows($result);
	$check = $num_rows;
	if ($check == 1) {
		header("Location: ../my/signup.php");
	}
	else {
	mysqli_query($connect, "INSERT INTO `clients`(`id`, `name`, `lname`, `phone`, `login`, `password`, `mod`, `ballance`, `num`) VALUES (NULL,'User','New','$phone','$login','$password','1','0','$num')");
	header("Location: ../my/thankyou2.html");
	}
	
}
if ($mod == "signin") {
	$login = $_POST['login'];
	$password = $_POST['password'];
	$check_user = mysqli_query($connect, "SELECT * FROM `clients` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

    	$user = mysqli_fetch_assoc($check_user);
        $_SESSION['client'] = [
            "id" => $user['id']
        ];
        ini_set('session.gc_maxlifetime', 172800);
        ini_set('session.cookie_lifetime', 172800);

        header('Location: ../my/index.php');

    } else {
        header('Location: ../my/signin.php');
    }
	}
if ($mod == "updatep") {
	$name = $_POST['name'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$cid = $_POST['id'];
    
    mysqli_query($connect, "UPDATE `clients` SET `name` = '$name', `lname` = '$lname', `phone` = '$phone' WHERE `id` = $cid");
    header('Location: ../my/profile.php');
}
if ($mod == "smp") {
	$id = $_POST['id'];
	$uid = $_POST['uid'];
	$hour = $_POST['time'];
	if ($id == 3) {
		$pr = 2000;
	}
	else{
		$pr = 1000;
	}

	$sum = $hour*$pr;
	$cb = get_data_db($connect, "clients", "ballance", "id", $uid);
	if ($sum > $cb) {
		header('Location: ../my/sendmoneyp.php');
	}
	else{
		$login = get_data_db($connect, "clients", "login", "id", $uid);
		$ndep = $cb-$sum;
		$cash = $sum*0.05;
		$ndep = $ndep+$cash;
		
		$times = date("Y-m-d H:i");
		$timee = date_create($times);
		$time = $hour*60;
		date_modify($timee, "$time minute");
		$timee = date_format($timee, 'Y-m-d H:i');
		$type = "limit";

		mysqli_query($connect, "UPDATE `rents` SET `stime` = '$times', `etime` = '$timee', `sum` = '$sum', `type` = '$type', `stat` = '1' WHERE `rents`.`id` = $id");

    	mysqli_query($connect, "UPDATE `clients` SET `ballance` = '$ndep' WHERE `id` = $uid");
   		 mysqli_query($connect, "INSERT INTO `depop`(`id`, `sum`, `date`, `title`, `comment`, `personal`, `type`) VALUES (NULL,'0','$today','С акаунта DClient','Оплата $sum, с баланса ($login)','Just Kassa', 'plus')");
   		 mysqli_query($connect, "INSERT INTO `dc_hist`(`id`, `date`, `user`, `type`, `sum`, `from`) VALUES (NULL,'$times','$uid','minus','$sum','PlayStation 5')");


    	header("Location: ../my/timer.php?id=$id");
	}
}
if ($mod == "sendm") {
	$cid = $_POST['id'];
	$sum = $_POST['sum'];
	$date = date("Y-m-d H:i");
	$dep = get_data_db($connect, "clients", "ballance", "id", $cid);
	$login = get_data_db($connect, "clients", "login", "id", $cid);
	if ($dep < $sum) {
		header('Location: ../my/sendmoney.php');
	}

	$ndep = $dep-$sum;
	$cash = $sum*0.05;
	$ndep = $ndep+$cash;
    mysqli_query($connect, "UPDATE `clients` SET `ballance` = '$ndep' WHERE `id` = $cid");
    mysqli_query($connect, "INSERT INTO `depop`(`id`, `sum`, `date`, `title`, `comment`, `personal`, `type`) VALUES (NULL,'0','$today','С акаунта DClient','Оплата $sum, с баланса ($login)','Just Kassa', 'plus')");
    mysqli_query($connect, "INSERT INTO `dc_hist`(`id`, `date`, `user`, `type`, `sum`, `from`) VALUES (NULL,'$date','$cid','minus','$sum','PlayStation 5')");
    ?>
    <!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Success!</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="../my/manifest.json" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../my/assets/img/favicon180.png" sizes="180x180">
    <link rel="icon" href="../my/assets/img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="../my/assets/img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- style css for this template -->
    <link href="../my/assets/css/style.css" rel="stylesheet" id="style">
</head>

<body class="body-scroll d-flex flex-column h-100" data-page="thankyou1">

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
                <p class="mt-4"><span class="text-secondary">Транзакция в процессе...</span></p>
            </div>
        </div>
    </div>
    <!-- loader section ends -->

    <!-- Begin page content -->
    <main class="container-fluid h-100 ">
        <div class="row h-100">
            <div class="col-11 col-sm-11 mx-auto">
                <!-- header -->
                <div class="row">
                    <header class="header">
                        <div class="row">
                            <div class="col">
                                <div class="logo-small">
                                    <img src="../my/assets/img/logo.png" alt="" />
                                    <h5><span class="text-secondary fw-light">Dashing</span><br />Client</h5>
                                </div>
                            </div>
                            <div class="col-auto align-self-center">
                                
                            </div>
                        </div>
                    </header>
                </div>
                <!-- header ends -->
            </div>
            <div class="col-12 align-self-center pb-3">
                <div class="row h-100">
                    <div class="col-12 px-0 align-self-center">
                        <div class="row mx-0">
                            <div class="col-ld-6 position-relative thankyouimg2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="442.994" height="323.173" viewBox="0 0 442.994 323.173" class="thankyoubg mb-4">
                                    <defs>
                                      <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                                        <stop offset="0" stop-color="#09b2fd"/>
                                        <stop offset="1" stop-color="#6b00e5"/>
                                      </linearGradient>
                                    </defs>
                                    <path id="verficationbg" d="M673.089,326.922c33.846,30,40.769,106.154,96.153,104.615S810.012,400,886.935,372.306s69.558-78.229,34.943-125.152-5.917-85.116-48.7-111.97S750.281,179.79,685.4,166.922s-61.285-31.4-87.179-48.505S517.759,104.545,506.2,140.15s24.507,55.951,16.184,90.169c-3.9,16.048-6.938,35.382,4.447,51.041,16,20.622,34.073,21.193,60.29,16.47C633.49,289.476,656.64,312.342,673.089,326.922Z" transform="translate(-503.892 -108.386)" fill="url(#linear-gradient)"/>
                                </svg>
                                  
                                  
                                <div class="text">Оплачено!</div>
                                <div class="circle small one"></div>
                                <div class="circle two"></div>
                                <div class="circle small three"></div>                                              
                                <img src="../my/assets/img/checkmark.svg" alt="" class="slideimg">
                            </div>
                            <div class="col-11 col-md-8 col-lg-4  col-ld-6 mx-auto">
                                <h1 class="mb-4"><span class="text-secondary fw-light">Оплачено</span><br/><?php echo $_POST['sum']."₸"; ?></h1>
                                <p class="text-secondary">Отправитель: <?php echo $login; ?></p>
                                <hr>
                                <p class="text-secondary">Получатель: <?php echo "PlayStation 5"; ?></p>
                                <hr>
                                <p class="text-secondary">Дата: <?php echo $date; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-11 col-sm-11 mt-auto mx-auto py-4">
                <div class="row ">
                    <div class="col-12 d-grid">
                        <a href="../my/index.php" class="btn btn-default btn-lg shadow-sm">На главную</a>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Required jquery and libraries -->
    <script src="../my/assets/js/jquery-3.3.1.min.js"></script>
    <script src="../my/assets/js/popper.min.js"></script>
    <script src="../my/assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <!-- Customized jquery file  -->
    <script src="../my/assets/js/main.js"></script>
    <script src="../my/assets/js/color-scheme.js"></script>

    <!-- PWA app service registration and works -->
    <script src="../my/assets/js/pwa-services.js"></script>

    <!-- page level custom script -->
    <script src="../my/assets/js/app.js"></script>

</body>

</html>
    <?php
}


 ?>