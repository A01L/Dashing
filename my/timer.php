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
$tover3 = 0;
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
									<div class="form-element py-30 mb-30">
										<h4 class="font-20 mb-30"><?php echo get_data_db($connect, "rents", "name", "id", $pid); ?></h4>
										<form action="../../vendor/system.php" method="POST">

											<?php 
													$stat = get_data_db($connect, "rents", "stat", "id", $pid);
													if ($stat == "1") {

														$stime = date("Y-m-d H:i");;
														$etime = get_data_db($connect, "rents", "etime", "id", $pid);

														$diff = strtotime($etime) - strtotime($stime);
														$second = abs($diff);

														$data1 = strtotime(\date("d/m/Y"));
														$data1 = date_create($stime);
														$data2 = date_create("$etime");
														$ds = 0;
														if($data1 > $data2 OR $data1 == $data2){
														  $tover3 = 1;
														  $ds = "style='display: none;'";
														}
														?>
															<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Время</label>
												</div>
												<div class="col-sm-8" <?php echo $ds; ?>>
													<?php 
													$ts = get_data_db($connect, "rents", "type", "id", $pid);
													if ($ts == "limit") {
														
														?>
															<center><div id="app3"></div></center>
														<?php

													}
													else{
														?>
														<label>Безлимит</label>
														<?php
													}

													 ?>
													
													<div id="wave"></div>

													<script type="text/javascript">
														const FULL_DASH_ARRAY3 = 283;
const WARNING_THRESHOLD3 = 300;
const ALERT_THRESHOLD3 = 120;

const COLOR_CODES3 = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD3
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD3
  }
};

const TIME_LIMIT3 = <?php echo $second; ?>;
let timePassed3 = 0;
let timeLeft3 = TIME_LIMIT3;
let timerInterval3 = null;
let remainingPathColor3 = COLOR_CODES3.info.color;

document.getElementById("app3").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining3"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor3}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label3" class="base-timer__label">${formatTime(
    timeLeft3
  )}</span>
</div>
`;

startTimer();

function onTimesUp() {
  clearInterval(timerInterval3);
  window.location.href = "push.php";
}

function startTimer() {
  timerInterval3 = setInterval(() => {
    timePassed3 = timePassed3 += 1;
    timeLeft3 = TIME_LIMIT3 - timePassed3;
    document.getElementById("base-timer-label3").innerHTML = formatTime(
      timeLeft3
    );
    setCircleDasharray();
    setRemainingPathColor3(timeLeft3);

    if (timeLeft3 === 0) {
      onTimesUp();
    }
  }, 1000);
}

function formatTime(time3) {
  const minutes3 = Math.floor(time3 / 60);
  let seconds3 = time3 % 60;

  if (seconds3 < 10) {
    seconds3 = `0${seconds3}`;
  }

  return `${minutes3}:${seconds3}`;
}

function setRemainingPathColor3(timeLeft3) {
  const { alert, warning, info } = COLOR_CODES3;
  if (timeLeft3 <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining3")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining3")
      .classList.add(alert.color);
   
  } else if (timeLeft3 <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining3")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining3")
      .classList.add(warning.color);
     
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft3 / TIME_LIMIT3;
  return rawTimeFraction - (1 / TIME_LIMIT3) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY3
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining3")
    .setAttribute("stroke-dasharray", circleDasharray);

}
function play() {document.getElementById("wave").innerHTML = "<audio src=\"https://dwweb.ru/__a-data/mp3/windows_xp_start.mp3\" autoplay></audio>"}

													</script>
													<style type="text/css">
														.base-timer {
  position: relative;
  width: 300px;
  height: 300px;
}

.base-timer__svg {
  transform: scaleX(-1);
}

.base-timer__circle {
  fill: none;
  stroke: none;
}

.base-timer__path-elapsed {
  stroke-width: 7px;
  stroke: grey;
}

.base-timer__path-remaining {
  stroke-width: 7px;
  stroke-linecap: round;
  transform: rotate(90deg);
  transform-origin: center;
  transition: 1s linear all;
  fill-rule: nonzero;
  stroke: currentColor;
}

.base-timer__path-remaining.green {
  color: rgb(65, 184, 131);
}

.base-timer__path-remaining.orange {
  color: orange;
}

.base-timer__path-remaining.red {
  color: red;
}

.base-timer__label {
  position: absolute;
  width: 300px;
  height: 300px;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 48px;
}

													</style>
												</div>
											</div>
														<?php

													}
													else{

														?>
													

														<?php

													}
												 ?>
											


											<?php 
													$stat = get_data_db($connect, "rents", "stat", "id", $pid);
													$tys = get_data_db($connect, "rents", "type", "id", $pid);
													if ($stat == "1") {
														
														?>
														<?php 
															if ($tover3 > 0 AND $tys == "limit") {
																echo "<h1 style='color: orange;'>Время Вышло!</h1><br>";
															}
														 ?>
															<div class="form-row mb-20">
												<div class="col-sm-4">
													<?php 
													$ts = get_data_db($connect, "rents", "type", "id", $pid);
													if ($ts == "limit") {
														
														?>
															<label class="font-14 bold">Оплачено</label>
														<?php

													}
													else{
														?>
														<label class="font-14 bold">За 1 минут</label>
														<?php
													}

													 ?>
													
												</div>
												<div class="col-sm-8">
													<div class="d-flex align-items-center">
														<div class="input-group addon">
															<div class="input-group-prepend">
																<div class="input-group-text px-3 bold" style="background-color: #50C878; color: white;">$</div>
															</div>
															<input type="text" class="form-control" readonly value=" +<?php echo get_data_db($connect, "rents", "sum", "id", $pid); ?>"></div>
															</div>
												</div>
											</div>
														<?php

													}
													else{

														?>
														

														<?php

													}
												 ?>


												 <?php 
													$stat = get_data_db($connect, "rents", "stat", "id", $pid);
													if ($stat == "1") {
														
														?>
															<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Тип сеанса</label>
												</div>
												<div class="col-sm-8">
													<div>
													<?php 
													$ts = get_data_db($connect, "rents", "type", "id", $pid);
													if ($ts == "limit") {
														
														?>
															<input class="form-control" type="text" name="" value="(Лимитный) до <?php
															 $t = get_data_db($connect, "rents", "etime", "id", $pid);
															 echo replace_simbols(10, $t, 3);
															?>">
														<?php

													}
													else{
														?>
														<input class="form-control" type="text" name="" value="(Открытый сеанс) с <?php
															 $t = get_data_db($connect, "rents", "stime", "id", $pid);
															 echo replace_simbols(10, $t, 3);
															?>">
														<?php
													}

													 ?>
															
															
														
													</div>
												</div>
												</div>
														<?php

													}
													else{

														?>
													

														<?php

													}
												 ?>

											
					
												<?php 
													$stat = get_data_db($connect, "rents", "stat", "id", $pid);
													if ($stat == "1") {
														
														?>
														<?php 
													$ts = get_data_db($connect, "rents", "type", "id", $pid);
													if ($ts == "limit") {
														
														?>
															<input type="text" readonly="" hidden="" name="mod" value="rsc">
															<input type="text" readonly="" hidden="" name="idro" value="<?php echo get_data_db($connect, "rents", "id", "id", $pid); ?>">
															
															
														<?php

													}
													else{
														?>
														<input type="text" readonly="" hidden="" name="mod" value="rscl">
															<input type="text" readonly="" hidden="" name="idro" value="<?php echo get_data_db($connect, "rents", "id", "id", $pid); ?>">
															
														<?php
													}

													 ?>
															
														<?php

													}
													else{

														?>
														

														<?php

													}
												 ?>

											</form>
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