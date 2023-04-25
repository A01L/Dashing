<?php 
session_start();
date_default_timezone_set('Asia/Almaty');
require_once "../../vendor/db.php";
require_once "../../vendor/adf/adf.php";
$uid = $_SESSION["user"]["id"];
$tover1 = 0;
$tover2 = 0;
$tover3 = 0;
 ?>
 <!DOCTYPE html>
<html lang="zxx">
<head>
	<title>D4E | Club</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content=""><meta name="keywords" content="">
	<link rel="shortcut icon" href="../../assets/img/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/fonts/icofont/icofont.min.css">
	<link rel="stylesheet" href="../../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.css">
	<link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

	<div class="offcanvas-overlay">
	</div>
	<div class="wrapper">
		<header class="header fixed-top d-flex align-content-center flex-wrap"><div class="logo"><a href="../../index.php" class="default-logo"><img src="../../assets/img/logo.png" alt=""></a><a href="../../index.php" class="mobile-logo"><img src="../../assets/img/mobile-logo.png" alt=""></a></div><div class="main-header"><div class="container-fluid"><div class="row justify-content-between"><div class="col-3 col-lg-1 col-xl-4"><div class="main-header-left h-100 d-flex align-items-center"><div class="main-header-user"><a href="#" class="d-flex align-items-center" data-toggle="dropdown">
		<div class="menu-icon">
	<span></span> <span></span> <span></span></div>
	<div class="user-profile d-xl-flex align-items-center d-none">
		<div class="user-avatar">
			<img src="../../img/ava/<?php echo get_data_db($connect, "personals", "img", "id", $uid); ?>" alt="">
		</div>
		<div class="user-info">
			<h4 class="user-name"><?php echo get_data_db($connect, "personals", "name", "id", $uid); ?> <?php echo get_data_db($connect, "personals", "lname", "id", $uid); ?></h4>
			<p class="user-email"><?php echo get_data_db($connect, "personals", "email", "id", $uid); ?></p>
		</div>
	</div></a><div class="dropdown-menu"><!-- <a href="#">My Profile</a> <a href="#">task</a> <a href="#">Settings</a> --> 
		<a href="../../vendor/out.php">Выйти</a>
	</div></div><div class="main-header-menu d-block d-lg-none"><div class="header-toogle-menu"><img src="assets/img/menu.png" alt=""></div></div></div></div><div class="col-9 col-lg-11 col-xl-8"><div class="main-header-right d-flex justify-content-end"><ul class="nav">
		<!-- <li class="ml-0">
			<div class="main-header-language"><a href="#" data-toggle="dropdown"><img src="assets/img/svg/globe-icon.svg" alt=""></a><div class="dropdown-menu style--three"><a href="#"><span><img src="assets/img/usa.png" alt=""></span>USA </a><a href="#"><span><img src="assets/img/china.png" alt=""></span>China </a><a href="#"><span><img src="assets/img/russia.png" alt=""></span>Russia </a><a href="#"><span><img src="assets/img/spain.png" alt=""></span>Spain </a><a href="#"><span><img src="assets/img/brazil.png" alt=""></span>Brazil </a><a href="#"><span><img src="assets/img/france.png" alt=""></span>France </a><a href="#"><span><img src="assets/img/algeria.png" alt=""></span>Algeria</a></div></div>
		</li> -->
		<!-- <li class="ml-0 d-none d-lg-flex"><div class="main-header-print"><a href="#"><img src="assets/img/svg/print-icon.svg" alt=""></a></div></li> -->

		<li class="d-none d-lg-flex"><div class="main-header-date-time text-right"><h3 class="time"><span id="hours">21</span> <span id="point">:</span> <span id="min">06</span></h3><span class="date"><span id="date">Tue, 12 October 2019</span></span></div><button style="margin-left: 30px; background: #674FF0; padding: 10px; color: white; border-radius: 20px;" id="fullscr">Full Screen</button></li>

		<script type="text/javascript">
			let fullscreen;
let fsEnter = document.getElementById('fullscr');
let fsEnterIn = "Войти в полноэкранный режим";
let fsEnterOut = "Выйти из полноэкранного режима";
fsEnter.innerHTML = fsEnterIn;
fsEnter.addEventListener('click', function (e) {
    e.preventDefault();
    if (!fullscreen) {
        fullscreen = true;
        document.documentElement.requestFullscreen();
        fsEnter.innerHTML = fsEnterOut;
        } else {
        fullscreen = false;
        document.exitFullscreen();
        fsEnter.innerHTML = fsEnterIn;
    }
});
document.addEventListener("fullscreenchange", function() { 
    if((window.fullScreen) || (window.innerWidth == screen.width && window.innerHeight == screen.height)) {
        fullscreen = true;
        fsEnter.innerHTML = fsEnterOut;
        } else {
        fullscreen = false;
        fsEnter.innerHTML = fsEnterIn;
    }
}); 
		</script>

	<!-- 	<li class="d-none d-lg-flex">
			<div class="main-header-btn ml-md-1">
				<a href="#" class="btn">Pending Tasks</a>
			</div>
		</li>

		<li class="order-2 order-sm-0">
			<div class="main-header-search">
				<form action="#" class="search-form">
					<div class="theme-input-group header-search">
						<input type="text" class="theme-input-style" placeholder="Search Here">
						<button type="submit">
							<img src="assets/img/svg/search-icon.svg" alt="" class="svg">
						</button>
					</div>
				</form>
			</div>
		</li> -->

		<!-- <li><div class="main-header-message"><a href="#" class="header-icon" data-toggle="dropdown"><img src="assets/img/svg/message-icon.svg" alt="" class="svg"></a><div class="dropdown-menu dropdown-menu-right"><div class="dropdown-header d-flex align-items-center justify-content-between"><h5>3 Unread messages</h5><a href="#" class="text-mute d-inline-block">Clear all</a></div><div class="dropdown-body"><a href="#" class="item-single d-flex media align-items-center"><div class="figure"><img src="assets/img/avatar/m1.png" alt=""> <span class="avatar-status bg-teal"></span></div><div class="content media-body"><div class="d-flex align-items-center mb-2"><h6 class="name">Sender Name</h6><p class="time">2 min ago</p></div><p class="main-text">Donec dapibus mauris id odio ornare tempus. Duis sit amet accumsan justo.</p></div></a><a href="#" class="item-single d-flex media align-items-center"><div class="figure"><img src="assets/img/avatar/m2.png" alt=""> <span class="avatar-status bg-teal"></span></div><div class="content media-body"><div class="d-flex align-items-center mb-2"><h6 class="name">Tonya Lee</h6><p class="time">2 min ago</p></div><p class="main-text">Donec dapibus mauris id odio ornare tempus. Duis sit amet accumsan justo.</p></div></a><a href="#" class="item-single d-flex media align-items-center"><div class="figure"><img src="assets/img/avatar/m3.png" alt=""> <span class="avatar-status bg-teal"></span></div><div class="content media-body"><div class="d-flex align-items-center mb-2"><h6 class="name">Cathy Nichols</h6><p class="time">2 min ago</p></div><p class="main-text">Donec dapibus mauris id odio ornare tempus. Duis sit amet accumsan justo.</p></div></a><a href="#" class="item-single d-flex media align-items-center"><div class="figure"><img src="assets/img/avatar/m4.png" alt=""> <span class="avatar-status bg-teal"></span></div><div class="content media-body"><div class="d-flex align-items-center mb-2"><h6 class="name">Hubert Griffith</h6><p class="time">2 min ago</p></div><p class="main-text">Donec dapibus mauris id odio ornare tempus. Duis sit amet accumsan justo.</p></div></a></div></div></div></li><li><div class="main-header-notification"><a href="#" class="header-icon notification-icon" data-toggle="dropdown"><span class="count" data-bg-img="assets/img/count-bg.png">22</span> <img src="assets/img/svg/notification-icon.svg" alt="" class="svg"></a><div class="dropdown-menu style--two dropdown-menu-right"><div class="dropdown-header d-flex align-items-center justify-content-between"><h5>5 New notifications</h5><a href="#" class="text-mute d-inline-block">Clear all</a></div><div class="dropdown-body"><a href="#" class="item-single d-flex align-items-center"><div class="content"><div class="mb-2"><p class="time">2 min ago</p></div><p class="main-text">Donec dapibus mauris id odio ornare tempus amet.</p>
		</div></a><a href="#" class="item-single d-flex align-items-center"><div class="content"><div class="mb-2"><p class="time">2 min ago</p></div><p class="main-text">Donec dapibus mauris id odio ornare tempus. Duis sit amet accumsan justo.</p></div></a><a href="#" class="item-single d-flex align-items-center"><div class="content"><div class="mb-2"><p class="time">2 min ago</p></div><p class="main-text">Donec dapibus mauris id odio ornare tempus. Duis sit amet accumsan justo.</p></div></a><a href="#" class="item-single d-flex align-items-center"><div class="content"><div class="mb-2"><p class="time">2 min ago</p></div><p class="main-text">Donec dapibus mauris id odio ornare tempus. Duis sit amet accumsan justo.</p></div></a></div></div></div></li> --></ul></div></div></div></div></div>

	</header>




			<div class="main-wrapper">

				<link href="https://fonts.googleapis.com/css2?family=Lora:wght@700&amp;family=Roboto:wght@300;400&amp;display=swap" rel="stylesheet"/>

				<div class="follow-cursor"></div> 

				<style type="text/css">
					.container {
  max-width: 1140px;
  padding: 0 16px;
  margin: 0 auto;
}
.section {
  text-align: center;
  padding: 64px 0;
}
.h2 {
  font-size: 48px;
  font-weight: 700;
  margin-bottom: 32px;
}
.image {
  margin-bottom: 32px;
}
.image a {
  border-radius: 8px;
  max-width: 512px;
  width: 100%;
  height: 300px;
  display: block;
  margin: 0 auto;
  overflow: hidden;
}
.image img {
  width: 100%;
  height: 100%;
  display: block;
  -o-object-fit: cover;
  object-fit: cover;
}
.text {
  font-size: 18px;
  max-width: 512px;
  margin: 0 auto;
}

/* Начальные стили для элемента, который будет следовать за курсором, в нашем случае небольшой кружок */
.follow-cursor {
  display: block;
  width: 24px;
  height: 24px;
  border: 1px solid #674FF0;
  border-radius: 50%;
  transform: translateY(-50%) translateX(-50%); /* центрируем кружок */
  position: absolute; /* задаём абсолютное позиционирование, чтобы элемент не влиял на остальные элементы и его можно было бы позиционировать следом за курсором */
  z-index: 999; /* чтобы элемент был над остальными элементами */
  pointer-events: none; /* чтобы сквозь элемент можно было взаимодействовать с элементами, находящимися под ним */
  transition: width 0.64s, height 0.64s, border-radius 0.64s, background 0.64s;
}

/* Активный класс для кружка при наведении на ссылку */
.follow-cursor_active {
  height: 128px;
  width: 128px;
  border-width: 2px;
  background: rgba(13,110,253,0.32);
}

/* Скрываем декоративный элемент при ширине браузера меньше 992px */
@media (max-width: 991.98px) {
  .follow-cursor {
    display: none;
  }
}
				</style>

				<script type="text/javascript">
					document.addEventListener('DOMContentLoaded', () => {

  const followCursor = () => { // объявляем функцию followCursor
    const el = document.querySelector('.follow-cursor') // ищем элемент, который будет следовать за курсором

    window.addEventListener('mousemove', e => { // при движении курсора
      const target = e.target // определяем, где находится курсор
      if (!target) return

      if (target.closest('a')) { // если курсор наведён на ссылку
        el.classList.add('follow-cursor_active') // элементу добавляем активный класс
      } else { // иначе
        el.classList.remove('follow-cursor_active') // удаляем активный класс
      }

      el.style.left = e.pageX + 'px' // задаём элементу позиционирование слева
      el.style.top = e.pageY + 'px' // задаём элементу позиционирование сверху
    })
  }

  followCursor() // вызываем функцию followCursor

})
				</script>

				<nav class="sidebar" data-trigger="scrollbar">

			<div class="sidebar-header d-none d-lg-block"><div class="sidebar-toogle-pin"><i class="icofont-tack-pin"></i></div></div>

			<div class="sidebar-body">

			<ul class="nav">
				<li class="nav-category">Основные</li>

				<li>
					<a href="../../profile.php">
						<i class="icofont-pie-chart"></i>
						 <span class="link-title">Панель</span>
						</a>
					</li>
					
							<!-- <ul class="nav sub-menu">
								<li>
								<a href="pages/ecommerce/ecommerce.html">Dashboard 1</a>
							</li>
							<li>
								<a href="pages/ecommerce/orders.html">orders</a>
							</li>
								<li>
									<a href="pages/ecommerce/product-catelog.html">Products Catalog</a>
								</li>
								<li>
									<a href="pages/ecommerce/product-details.html">Product Details</a>
								</li>
								<li>
									<a href="pages/ecommerce/cartlist.html">cart list</a>
								</li>
							</ul>
						</li> -->
						

						 
						</li>

						<li class="active">
						 	<a href="club.php">
						 		<i class="icofont-clock-time"></i>
						 		<span class="link-title">Клуб</span>
						 	</a>
						 </li>
						</li>

						<li>
			<a href="dclient.php">
				<i class="icofont-ui-user"></i>
				 <span class="link-title">DClient</span>
			</a>
		</li>


			<li class="nav-category">Пользватель</li>

<!-- 
		<li>
			<a href="#">
				<i class="icofont-wechat"></i> 
				<span class="link-title">Чат</span>
			</a>
		</li> -->

		<li>
			<a href="#">
				<i class="icofont-listing-box"></i>
				<span class="link-title">Заметки</span>
			</a>
			<ul class="nav sub-menu">
				<li>
					<a href="../apps/contact/notes.php">Доска</a>
				</li>
			<li>
				<a href="../apps/contact/arhnotes.php">Архив</a>
			</li>
		</ul>
	</li>
			<!-- <li><a href="pages/apps/calendar.html">
			<i class="icofont-calendar"></i> <span class="link-title">Calendar</span></a></li> -->
			<li>
				<a href="#">
					<i class="icofont-contact-add"></i>
					<span class="link-title">Контакты</span>
				</a>
				<ul class="nav sub-menu">
					<li>
						<a href="../apps/contact/contact-grid.php">Список контактов</a>
					</li>
					<li>
						<a href="../../addcont.php">Добавить новый</a>
					</li>
				</ul>
			</li>


<!-- 	<li class="nav-category">Инструменты</li> -->
<!-- 	<li><a href="#">
		<i class="icofont-table"></i> <span class="link-title">Form Elements</span></a><ul class="nav sub-menu"><li><a href="pages/form&table/form-elements/base-input.html">Base Input</a></li><li><a href="pages/form&table/form-elements/input-group.html">Input Groups</a></li><li><a href="pages/form&table/form-elements/checkbox.html">Checkbox</a></li><li><a href="pages/form&table/form-elements/radio.html">radio</a></li><li><a href="pages/form&table/form-elements/switch.html">Switch</a></li><li><a href="pages/form&table/form-elements/number-input.html">Number Input</a></li><li><a href="pages/form&table/form-elements/textarea.html">Text Area</a></li><li><a href="pages/form&table/form-elements/text-editor.html">Text Editor (Quill Editor)</a></li><li><a href="pages/form&table/form-elements/file-uploader.html">File Uploader</a></li><li><a href="pages/form&table/form-elements/datetime-picker.html">Date & Time Picker</a>
			</li></ul></li> -->

		<!-- 	<li>
				<a href="#">
					<i class="icofont-ui-file"></i>
					<span class="link-title">Отчеты</span>
				</a>
			</li>

			<li>
				<a href="#">
					<i class="icofont-exclamation-circle"></i>
					<span class="link-title">Администрация</span>
				</a>
			</li>

			<li>
			 	<a href="#">
			 		<i class="icofont-settings-alt"></i>
			 		<span class="link-title">Калькулятор</span>
			 	</a>
			 </li> -->

			
		

	
			</ul>

			</div>
		</nav>



					<div class="main-content">

						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-element py-30 mb-30">
										<h4 class="font-20 mb-30"><?php echo get_data_db($connect, "rents", "name", "id", 1); ?></h4>
										<form action="../../vendor/system.php" method="POST">

											<?php 
													$stat = get_data_db($connect, "rents", "stat", "id", 1);
													if ($stat == "1") {

														$stime = date("Y-m-d H:i");;
														$etime = get_data_db($connect, "rents", "etime", "id", 1);

														// $start_date = new DateTime($stime);
														// $since_start = $start_date->diff(new DateTime($etime));
														// $hour = $since_start->h;
														// $minute = $since_start->i;

														$diff = strtotime($etime) - strtotime($stime);
														$second = abs($diff);

														$data1 = strtotime(\date("d/m/Y"));
														$data1 = date_create($stime);
														$data2 = date_create("$etime");
														$ds = 0;
														if($data1 > $data2 OR $data1 == $data2){
														  $tover1 = 1;
														  $ds = "style='display: none;'";
														}
														?>
															<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Время</label>
												</div>
												<div class="col-sm-8" <?php echo $ds; ?>>
													<?php 
													$ts = get_data_db($connect, "rents", "type", "id", 1);
													if ($ts == "limit") {
														
														?>
															<div id="app"></div>
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
														const FULL_DASH_ARRAY = 283;
const WARNING_THRESHOLD = 300;
const ALERT_THRESHOLD = 120;

const COLOR_CODES = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD
  }
};

const TIME_LIMIT = <?php echo $second; ?>;
let timePassed = 0;
let timeLeft = TIME_LIMIT;
let timerInterval = null;
let remainingPathColor = COLOR_CODES.info.color;

document.getElementById("app").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;

startTimer();

function onTimesUp() {
  clearInterval(timerInterval);
  window.location.href = "push.php";
}

function startTimer() {
  timerInterval = setInterval(() => {
    timePassed = timePassed += 1;
    timeLeft = TIME_LIMIT - timePassed;
    document.getElementById("base-timer-label").innerHTML = formatTime(
      timeLeft
    );
    setCircleDasharray();
    setRemainingPathColor(timeLeft);

    if (timeLeft === 0) {
      onTimesUp();
    }
  }, 1000);
}

function formatTime(time) {
  const minutes = Math.floor(time / 60);
  let seconds = time % 60;

  if (seconds < 10) {
    seconds = `0${seconds}`;
  }

  return `${minutes}:${seconds}`;
}

function setRemainingPathColor(timeLeft) {
  const { alert, warning, info } = COLOR_CODES;
  if (timeLeft <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(alert.color);
   
  } else if (timeLeft <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(warning.color);
     
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft / TIME_LIMIT;
  return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining")
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
														<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Время</label>
												</div>
												<div class="col-sm-8">
													<input type="time" class="theme-input-style" name="time">
												</div>
											</div>

														<?php

													}
												 ?>
											


											<?php 
													$stat = get_data_db($connect, "rents", "stat", "id", 1);
													$tys = get_data_db($connect, "rents", "type", "id", 1);
													if ($stat == "1") {
														
														?>
														<?php 
															if ($tover1 > 0 AND $tys == "limit") {
																echo "<h1 style='color: orange;'>Время Вышло!</h1><br>";
															}
														 ?>
														
															<div class="form-row mb-20">

												<div class="col-sm-4">
													<?php 
													$ts = get_data_db($connect, "rents", "type", "id", 1);
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
															<input type="text" class="form-control" readonly value=" +<?php echo get_data_db($connect, "rents", "sum", "id", 1); ?>"></div>
															</div>
												</div>
											</div>
														<?php

													}
													else{

														?>
														<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Цена</label>
												</div>
												<div class="col-sm-8">
													<div class="d-flex align-items-center">
														<div class="input-group addon">
															<div class="input-group-prepend">
																<div class="input-group-text px-3 bold">$</div>
															</div>
															<input type="number" class="form-control" name="sum"></div>
															</div>
												</div>
											</div>

														<?php

													}
												 ?>


												 <?php 
													$stat = get_data_db($connect, "rents", "stat", "id", 1);
													if ($stat == "1") {
														
														?>
															<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Тип сеанса</label>
												</div>
												<div class="col-sm-8">
													<div>
													<?php 
													$ts = get_data_db($connect, "rents", "type", "id", 1);
													if ($ts == "limit") {
														
														?>
															<input class="form-control" type="text" name="" value="(Лимитный) до <?php
															 $t = get_data_db($connect, "rents", "etime", "id", 1);
															 echo replace_simbols(10, $t, 3);
															?>">
														<?php

													}
													else{
														?>
														<input class="form-control" type="text" name="" value="(Открытый сеанс) с <?php
															 $t = get_data_db($connect, "rents", "stime", "id", 1);
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
														<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Открытый сеанс</label>
												</div>
												<div class="col-sm-8">
													<div>
														<label class="switch with-icon large">
															<input type="checkbox" name="ops">
															<span class="control">
																<span class="check"></span>
															</span>
														</label>
													</div>
												</div>
												</div>

														<?php

													}
												 ?>

											
					
												<?php 
													$stat = get_data_db($connect, "rents", "stat", "id", 1);
													if ($stat == "1") {
														
														?>
														<?php 
													$ts = get_data_db($connect, "rents", "type", "id", 1);
													if ($ts == "limit") {
														
														?>
															<input type="text" readonly="" hidden="" name="mod" value="rsc">
															<input type="text" readonly="" hidden="" name="idro" value="<?php echo get_data_db($connect, "rents", "id", "id", 1); ?>">
															
															<div class="form-row">

																<div class="col-12 text-right">
																	<div class="col-12 text-left">
																		<h4>
																	<a href="addt.php?id=1" style="background-color: #50C878; color: white; text-decoration: none; padding: 10px; border-radius: 20px; padding-left: 30px; padding-right: 30px;">
																	Продлить</a>
																</h4>
																</div>
																	<button class="btn long" style="background: orange;">Завершить</button>
																</div>
															</div>
														<?php

													}
													else{
														?>
														<input type="text" readonly="" hidden="" name="mod" value="rscl">
															<input type="text" readonly="" hidden="" name="idro" value="<?php echo get_data_db($connect, "rents", "id", "id", 1); ?>">
															<div class="form-row">
																<div class="col-12 text-right">
																	<button class="btn long" style="background: orange;">Закрыть сеанс</button>
																</div>
															</div>
														<?php
													}

													 ?>
															
														<?php

													}
													else{

														?>
														<input type="text" readonly="" hidden="" name="mod" value="rentsi">
														<input type="text" readonly="" hidden="" name="idro" value="<?php echo get_data_db($connect, "rents", "id", "id", 1); ?>">
														<div class="form-row">
															<div class="col-12 text-right">
																<button class="btn long">Начать сеанс</button>
															</div>
														</div>

														<?php

													}
												 ?>

											</form>
								</div>
							</div>


								<div class="col-lg-6">
									<div class="form-element py-30 mb-30">
										<h4 class="font-20 mb-30"><?php echo get_data_db($connect, "rents", "name", "id", 2); ?></h4>
										<form action="../../vendor/system.php" method="POST">

											<?php 
													$stat = get_data_db($connect, "rents", "stat", "id", 2);
													if ($stat == "1") {

														$stime = date("Y-m-d H:i");;
														$etime = get_data_db($connect, "rents", "etime", "id", 2);

														$diff = strtotime($etime) - strtotime($stime);
														$second = abs($diff);

														$data1 = strtotime(\date("d/m/Y"));
														$data1 = date_create($stime);
														$data2 = date_create("$etime");
														$ds = 0;
														if($data1 > $data2 OR $data1 == $data2){
														  $tover2 = 1;
														  $ds = "style='display: none;'";
														}
														?>
															<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Время</label>
												</div>
												<div class="col-sm-8" <?php echo $ds; ?>>
													<?php 
													$ts = get_data_db($connect, "rents", "type", "id", 2);
													if ($ts == "limit") {
														
														?>
															<div id="app2"></div>
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
const FULL_DASH_ARRAY2 = 283;
const WARNING_THRESHOLD2 = 300;
const ALERT_THRESHOLD2 = 120;

const COLOR_CODES2 = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD2
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD2
  }
};

const TIME_LIMIT2 = <?php echo $second; ?>;
let timePassed2 = 0;
let timeLeft2 = TIME_LIMIT2;
let timerInterval2 = null;
let remainingPathColor2 = COLOR_CODES2.info.color;

document.getElementById("app2").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining2"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor2}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label2" class="base-timer__label">${formatTime(
    timeLeft2
  )}</span>
</div>
`;

startTimer();

function onTimesUp() {
  clearInterval(timerInterval2);
  window.location.href = "push.php";
}

function startTimer() {
  timerInterval2 = setInterval(() => {
    timePassed2 = timePassed2 += 1;
    timeLeft2 = TIME_LIMIT2 - timePassed2;
    document.getElementById("base-timer-label2").innerHTML = formatTime(
      timeLeft2
    );
    setCircleDasharray();
    setRemainingPathColor2(timeLeft2);

    if (timeLeft2 === 0) {
      onTimesUp();
    }
  }, 1000);
}

function formatTime(time2) {
  const minutes2 = Math.floor(time2 / 60);
  let seconds2 = time2 % 60;

  if (seconds2 < 10) {
    seconds2 = `0${seconds2}`;
  }

  return `${minutes2}:${seconds2}`;
}

function setRemainingPathColor2(timeLeft2) {
  const { alert, warning, info } = COLOR_CODES2;
  if (timeLeft2 <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining2")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining2")
      .classList.add(alert.color);
   
  } else if (timeLeft2 <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining2")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining2")
      .classList.add(warning.color);
     
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft2 / TIME_LIMIT2;
  return rawTimeFraction - (1 / TIME_LIMIT2) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY2
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining2")
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
														<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Время</label>
												</div>
												<div class="col-sm-8">
													<input type="time" class="theme-input-style" name="time">
												</div>
											</div>

														<?php

													}
												 ?>
											


											<?php 
													$stat = get_data_db($connect, "rents", "stat", "id", 2);
													$tys = get_data_db($connect, "rents", "type", "id", 2);
													if ($stat == "1") {
														
														?>
														<?php 
															if ($tover2 > 0 AND $tys == "limit") {
																echo "<h1 style='color: orange;'>Время Вышло!</h1><br>";
															}
														 ?>
															<div class="form-row mb-20">
												<div class="col-sm-4">
													<?php 
													$ts = get_data_db($connect, "rents", "type", "id", 2);
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
															<input type="text" class="form-control" readonly value=" +<?php echo get_data_db($connect, "rents", "sum", "id", 2); ?>"></div>
															</div>
												</div>
											</div>
														<?php

													}
													else{

														?>
														<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Цена</label>
												</div>
												<div class="col-sm-8">
													<div class="d-flex align-items-center">
														<div class="input-group addon">
															<div class="input-group-prepend">
																<div class="input-group-text px-3 bold">$</div>
															</div>
															<input type="number" class="form-control" name="sum"></div>
															</div>
												</div>
											</div>

														<?php

													}
												 ?>


												 <?php 
													$stat = get_data_db($connect, "rents", "stat", "id", 2);
													if ($stat == "1") {
														
														?>
															<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Тип сеанса</label>
												</div>
												<div class="col-sm-8">
													<div>
													<?php 
													$ts = get_data_db($connect, "rents", "type", "id", 2);
													if ($ts == "limit") {
														
														?>
															<input class="form-control" type="text" name="" value="(Лимитный) до <?php
															 $t = get_data_db($connect, "rents", "etime", "id", 2);
															 echo replace_simbols(10, $t, 3);
															?>">
														<?php

													}
													else{
														?>
														<input class="form-control" type="text" name="" value="(Открытый сеанс) с <?php
															 $t = get_data_db($connect, "rents", "stime", "id", 2);
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
														<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Открытый сеанс</label>
												</div>
												<div class="col-sm-8">
													<div>
														<label class="switch with-icon large">
															<input type="checkbox" name="ops">
															<span class="control">
																<span class="check"></span>
															</span>
														</label>
													</div>
												</div>
												</div>

														<?php

													}
												 ?>

											
					
												<?php 
													$stat = get_data_db($connect, "rents", "stat", "id", 2);
													if ($stat == "1") {
														
														?>
														<?php 
													$ts = get_data_db($connect, "rents", "type", "id", 2);
													if ($ts == "limit") {
														
														?>
															<input type="text" readonly="" hidden="" name="mod" value="rsc">
															<input type="text" readonly="" hidden="" name="idro" value="<?php echo get_data_db($connect, "rents", "id", "id", 2); ?>">
															
															<div class="form-row">

																<div class="col-12 text-right">
																	<div class="col-12 text-left">
																		<h4>
																	<a href="addt.php?id=2" style="background-color: #50C878; color: white; text-decoration: none; padding: 10px; border-radius: 20px; padding-left: 30px; padding-right: 30px;">
																	Продлить</a>
																</h4>
																</div>
																	<button class="btn long" style="background: orange;">Завершить</button>
																</div>
															</div>
														<?php

													}
													else{
														?>
														<input type="text" readonly="" hidden="" name="mod" value="rscl">
															<input type="text" readonly="" hidden="" name="idro" value="<?php echo get_data_db($connect, "rents", "id", "id", 2); ?>">
															<div class="form-row">
																<div class="col-12 text-right">
																	<button class="btn long" style="background: orange;">Закрыть сеанс</button>
																</div>
															</div>
														<?php
													}

													 ?>
															
														<?php

													}
													else{

														?>
														<input type="text" readonly="" hidden="" name="mod" value="rentsi">
														<input type="text" readonly="" hidden="" name="idro" value="<?php echo get_data_db($connect, "rents", "id", "id", 2); ?>">
														<div class="form-row">
															<div class="col-12 text-right">
																<button class="btn long">Начать сеанс</button>
															</div>
														</div>

														<?php

													}
												 ?>

											</form>
								</div>
							</div>

							<div class="col-lg-6">
									<div class="form-element py-30 mb-30">
										<h4 class="font-20 mb-30"><?php echo get_data_db($connect, "rents", "name", "id", 3); ?></h4>
										<form action="../../vendor/system.php" method="POST">

											<?php 
													$stat = get_data_db($connect, "rents", "stat", "id", 3);
													if ($stat == "1") {

														$stime = date("Y-m-d H:i");;
														$etime = get_data_db($connect, "rents", "etime", "id", 3);

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
													$ts = get_data_db($connect, "rents", "type", "id", 3);
													if ($ts == "limit") {
														
														?>
															<div id="app3"></div>
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
														<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Время</label>
												</div>
												<div class="col-sm-8">
													<input type="time" class="theme-input-style" name="time">
												</div>
											</div>

														<?php

													}
												 ?>
											


											<?php 
													$stat = get_data_db($connect, "rents", "stat", "id", 3);
													$tys = get_data_db($connect, "rents", "type", "id", 3);
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
													$ts = get_data_db($connect, "rents", "type", "id", 3);
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
															<input type="text" class="form-control" readonly value=" +<?php echo get_data_db($connect, "rents", "sum", "id", 3); ?>"></div>
															</div>
												</div>
											</div>
														<?php

													}
													else{

														?>
														<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Цена</label>
												</div>
												<div class="col-sm-8">
													<div class="d-flex align-items-center">
														<div class="input-group addon">
															<div class="input-group-prepend">
																<div class="input-group-text px-3 bold">$</div>
															</div>
															<input type="number" class="form-control" name="sum"></div>
															</div>
												</div>
											</div>

														<?php

													}
												 ?>


												 <?php 
													$stat = get_data_db($connect, "rents", "stat", "id", 3);
													if ($stat == "1") {
														
														?>
															<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Тип сеанса</label>
												</div>
												<div class="col-sm-8">
													<div>
													<?php 
													$ts = get_data_db($connect, "rents", "type", "id", 3);
													if ($ts == "limit") {
														
														?>
															<input class="form-control" type="text" name="" value="(Лимитный) до <?php
															 $t = get_data_db($connect, "rents", "etime", "id", 3);
															 echo replace_simbols(10, $t, 3);
															?>">
														<?php

													}
													else{
														?>
														<input class="form-control" type="text" name="" value="(Открытый сеанс) с <?php
															 $t = get_data_db($connect, "rents", "stime", "id", 3);
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
														<div class="form-row mb-20">
												<div class="col-sm-4">
													<label class="font-14 bold">Открытый сеанс</label>
												</div>
												<div class="col-sm-8">
													<div>
														<label class="switch with-icon large">
															<input type="checkbox" name="ops">
															<span class="control">
																<span class="check"></span>
															</span>
														</label>
													</div>
												</div>
												</div>

														<?php

													}
												 ?>

											
					
												<?php 
													$stat = get_data_db($connect, "rents", "stat", "id", 3);
													if ($stat == "1") {
														
														?>
														<?php 
													$ts = get_data_db($connect, "rents", "type", "id", 3);
													if ($ts == "limit") {
														
														?>
															<input type="text" readonly="" hidden="" name="mod" value="rsc">
															<input type="text" readonly="" hidden="" name="idro" value="<?php echo get_data_db($connect, "rents", "id", "id", 3); ?>">
															
															<div class="form-row">

																<div class="col-12 text-right">
																	<div class="col-12 text-left">
																		<h4>
																	<a href="addt.php?id=3" style="background-color: #50C878; color: white; text-decoration: none; padding: 10px; border-radius: 20px; padding-left: 30px; padding-right: 30px;">
																	Продлить</a>
																</h4>
																</div>
																	<button class="btn long" style="background: orange;">Завершить</button>
																</div>
															</div>
														<?php

													}
													else{
														?>
														<input type="text" readonly="" hidden="" name="mod" value="rscl">
															<input type="text" readonly="" hidden="" name="idro" value="<?php echo get_data_db($connect, "rents", "id", "id", 3); ?>">
															<div class="form-row">
																<div class="col-12 text-right">
																	<button class="btn long" style="background: orange;">Закрыть сеанс</button>
																</div>
															</div>
														<?php
													}

													 ?>
															
														<?php

													}
													else{

														?>
														<input type="text" readonly="" hidden="" name="mod" value="rentsi">
														<input type="text" readonly="" hidden="" name="idro" value="<?php echo get_data_db($connect, "rents", "id", "id", 3); ?>">
														<div class="form-row">
															<div class="col-12 text-right">
																<button class="btn long">Начать сеанс</button>
															</div>
														</div>

														<?php

													}
												 ?>

											</form>
								</div>
							</div>

							


							</div>
						</div>
				<br>
			


						<footer class="footer" style="float: left;">D.4.E © 2022 created by <a href="https://jcode.space/">J.CODE.S</a></footer></div><script src="../../assets/js/jquery.min.js"></script><script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script><script src="../../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script><script src="../../assets/js/script.js"></script></body></html>