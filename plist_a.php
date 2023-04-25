<?php 
require_once "vendor/db.php";
require_once "vendor/adf/adf.php";
session_start();
if (!$_SESSION['user']) {
    header('Location: index.php');
}
$uid = $_SESSION["user"]["id"];
$tp = get_data_db($connect,"personals", "ptype", "id", $uid);
if ($tp != "admin") {
	header('Location: profile.php');
}
else {
	$tp = "admin";
}

 ?>
<!DOCTYPE html>
<html lang="zxx"><head>
	<title>D4E panel</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="shortcut icon" href="assets/img/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/fonts/icofont/icofont.min.css">
	<link rel="stylesheet" href="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.css">
	<link rel="stylesheet" href="assets/plugins/apex/apexcharts.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<?php
    if ($_SESSION['msg']) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
	<div class="offcanvas-overlay"></div><div class="wrapper">

		<header class="header fixed-top d-flex align-content-center flex-wrap"><div class="logo"><a href="index.php" class="default-logo"><img src="assets/img/logo.png" alt=""></a><a href="index.php" class="mobile-logo"><img src="assets/img/mobile-logo.png" alt=""></a></div><div class="main-header"><div class="container-fluid"><div class="row justify-content-between"><div class="col-3 col-lg-1 col-xl-4"><div class="main-header-left h-100 d-flex align-items-center"><div class="main-header-user"><a href="#" class="d-flex align-items-center" data-toggle="dropdown">
		<div class="menu-icon">
	<span></span> <span></span> <span></span></div>
	<div class="user-profile d-xl-flex align-items-center d-none">
		<div class="user-avatar">
			<img src="img/ava/<?php echo get_data_db($connect, "personals", "img", "id", $uid); ?>" alt="">
		</div>
		<div class="user-info">
			<h4 class="user-name"><?php echo get_data_db($connect, "personals", "name", "id", $uid); ?> <?php echo get_data_db($connect, "personals", "lname", "id", $uid); ?></h4>
			<p class="user-email"><?php echo get_data_db($connect, "personals", "email", "id", $uid); ?></p>
		</div>
	</div>
	</a>
	<div class="dropdown-menu"><!-- <a href="#">My Profile</a> <a href="#">task</a> <a href="#">Settings</a> --> 
		<a href="vendor/out.php">Выйти</a>
	</div></div><div class="main-header-menu d-block d-lg-none"><div class="header-toogle-menu"><img src="assets/img/menu.png" alt=""></div></div></div></div><div class="col-9 col-lg-11 col-xl-8"><div class="main-header-right d-flex justify-content-end"><ul class="nav">
		<!-- <li class="ml-0">
			<div class="main-header-language"><a href="#" data-toggle="dropdown"><img src="assets/img/svg/globe-icon.svg" alt=""></a><div class="dropdown-menu style--three"><a href="#"><span><img src="assets/img/usa.png" alt=""></span>USA </a><a href="#"><span><img src="assets/img/china.png" alt=""></span>China </a><a href="#"><span><img src="assets/img/russia.png" alt=""></span>Russia </a><a href="#"><span><img src="assets/img/spain.png" alt=""></span>Spain </a><a href="#"><span><img src="assets/img/brazil.png" alt=""></span>Brazil </a><a href="#"><span><img src="assets/img/france.png" alt=""></span>France </a><a href="#"><span><img src="assets/img/algeria.png" alt=""></span>Algeria</a></div></div>
		</li> -->
		<!-- <li class="ml-0 d-none d-lg-flex"><div class="main-header-print"><a href="#"><img src="assets/img/svg/print-icon.svg" alt=""></a></div></li> -->

		<li class="d-none d-lg-flex"><div class="main-header-date-time text-right"><h3 class="time"><span id="hours">21</span> <span id="point">:</span> <span id="min">06</span></h3><span class="date"><span id="date">Tue, 12 October 2019</span></span></div>

			

			<button style="margin-left: 30px; background: #674FF0; padding: 10px; color: white; border-radius: 20px;" id="fullscr">Full Screen</button></li>

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

				<li class="active">
					<a href="profile.php">
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
						<li>
			<a href="#">
				<i class="icofont-layout"></i>
				<span class="link-title">Склад</span>
			</a>
			<ul class="nav sub-menu">
				<li>
					<a href="pages/ecommerce/products_a.php">Все товары</a>
				</li>
				<li>
					<a href="pages/ecommerce/buy.php">Поступление</a>
					<!-- pages/apps/todolist/add-new.html -->
				</li>
			<li>
				<a href="#">История списание</a>
				<!-- pages/apps/todolist/task-details.html -->
			</li>
			<li>
				<a href="pages/ecommerce/hist.php">История продаж</a>
				<!-- pages/apps/todolist/task-details.html -->
			</li>
		</ul>
	</li>

					
						</li>
						<li>
						 	<a href="pages/ecommerce/club.php">
						 		<i class="icofont-clock-time"></i>
						 		<span class="link-title">Клуб</span>
						 	</a>
						 </li>
						</li>


			<li class="nav-category">Пользватель</li>



		<li>
			<a href="#">
				<i class="icofont-ui-user"></i>
				 <span class="link-title">Персоналы</span>
			</a>
		</li>

	

		<li>
			<a href="#">
				<i class="icofont-listing-box"></i>
				<span class="link-title">Заметки</span>
			</a>
			<ul class="nav sub-menu">
				<li>
					<a href="#">Все</a>
<!-- 					pages/apps/todolist/todolist.html
 -->				</li>
				<li>
					<a href="#">Долги</a>
<!-- 					pages/apps/todolist/add-new.html
 -->				</li>
			<li>
				<a href="#">Архив</a>
				<!-- pages/apps/todolist/task-details.html -->
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
						<a href="#">Список контактов</a>
						<!-- pages/apps/contact/contact-list.html -->
					</li>
					<li>
						<a href="#">Добавить новый</a>
						<!-- pages/apps/contact/contact-grid.html -->
					</li>
				</ul>
			</li>


	<li class="nav-category">Инструменты</li>
<!-- 	<li><a href="#">
		<i class="icofont-table"></i> <span class="link-title">Form Elements</span></a><ul class="nav sub-menu"><li><a href="pages/form&table/form-elements/base-input.html">Base Input</a></li><li><a href="pages/form&table/form-elements/input-group.html">Input Groups</a></li><li><a href="pages/form&table/form-elements/checkbox.html">Checkbox</a></li><li><a href="pages/form&table/form-elements/radio.html">radio</a></li><li><a href="pages/form&table/form-elements/switch.html">Switch</a></li><li><a href="pages/form&table/form-elements/number-input.html">Number Input</a></li><li><a href="pages/form&table/form-elements/textarea.html">Text Area</a></li><li><a href="pages/form&table/form-elements/text-editor.html">Text Editor (Quill Editor)</a></li><li><a href="pages/form&table/form-elements/file-uploader.html">File Uploader</a></li><li><a href="pages/form&table/form-elements/datetime-picker.html">Date & Time Picker</a>
			</li></ul></li> -->

			<li>
				<a href="#">
					<!-- pages/form&table/form-wizard.html -->
					<i class="icofont-ui-file"></i>
					<span class="link-title">Отчеты</span>
				</a>
			</li>

			<li>
				<a href="#">
					<!-- pages/form&table/form-validation.html -->
					<i class="icofont-exclamation-circle"></i>
					<span class="link-title">Администрация</span>
				</a>
			</li>

			<li>
			 	<a href="#">
			 		<!-- pages/pages/account-setting.html -->
			 		<i class="icofont-settings-alt"></i>
			 		<span class="link-title">Калькулятор</span>
			 	</a>
			 </li>

			
		

	
			</ul>

			</div></nav>



			<div class="main-content">


<div class="row">

	<div class="col-12">
		<div class="card bg-transparent">

			<div class="table-responsive"><table class="contact-list-table text-nowrap card_color-bg"><thead><tr><th><label class="custom-checkbox"><input type="checkbox"> <span class="checkmark"></span></label><div class="star"><a href="#"><img src="../../../assets/img/svg/star.svg" alt="" class="svg"></a></div></th><th class="text-center">Name <img src="../../../assets/img/svg/table-down-arrow.svg" alt="" class="svg"></th><th>Email</th><th>Phone</th><th>Age <img src="../../../assets/img/svg/table-down-arrow.svg" alt="" class="svg"></th><th>Post</th><th>Joining Date <img src="../../../assets/img/svg/table-down-arrow.svg" alt="" class="svg"></th><th>Salary <img src="../../../assets/img/svg/table-down-arrow.svg" alt="" class="svg"></th><th>Actions</th></tr></thead><tbody><tr><td><label class="custom-checkbox"><input type="checkbox"> <span class="checkmark"></span></label><div class="star"><a href="#"><img src="../../../assets/img/svg/star.svg" alt="" class="svg"></a></div></td><td><div class="d-flex align-items-center"><div class="img mr-20"><img src="../../../assets/img/avatar/m16.png" class="img-40" alt=""></div><div class="name bold">Arden Spencer</div></div></td><td>Evangeline62@yahoo.com</td><td>(023) 708-6818 x4267</td><td>28</td><td>UX Researcher</td><td>June 20, 2015</td><td>$26253.0</td><td class="actions"><span class="contact-edit" data-toggle="modal" data-target="#contactEditModal"><img src="../../../assets/img/svg/c-edit.svg" alt="" class="svg"> </span><span class="contact-close"><img src="../../../assets/img/svg/c-close.svg" alt="" class="svg"></span></td></tr><tr><td><label class="custom-checkbox"><input type="checkbox"> <span class="checkmark"></span></label><div class="star"><a href="#"><img src="../../../assets/img/svg/star.svg" alt="" class="svg"></a></div></td><td><div class="d-flex align-items-center"><div class="img mr-20"><img src="../../../assets/img/avatar/m20.png" class="img-40" alt=""></div><div class="name bold">Favian Maggio DDS</div></div></td><td>Electa_Conroy@hotmail.com</td><td>1-076-628-3095 x7154</td><td>28</td><td>UX Researcher</td><td>October 11, 2019</td><td>$26253.0</td><td class="actions"><span class="contact-edit" data-toggle="modal" data-target="#contactEditModal"><img src="../../../assets/img/svg/c-edit.svg" alt="" class="svg"> </span><span class="contact-close"><img src="../../../assets/img/svg/c-close.svg" alt="" class="svg"></span></td></tr><tr><td><label class="custom-checkbox"><input type="checkbox"> <span class="checkmark"></span></label><div class="star"><a href="#"><img src="../../../assets/img/svg/star.svg" alt="" class="svg"></a></div></td><td><div class="d-flex align-items-center"><div class="img mr-20"><img src="../../../assets/img/avatar/m21.png" class="img-40" alt=""></div><div class="name bold">Jacey Considine</div></div></td><td>Garry23@yahoo.com</td><td>1-016-234-2482</td><td>28</td><td>UX Researcher</td><td>January 2, 2016</td><td>$6162.0</td><td class="actions"><span class="contact-edit" data-toggle="modal" data-target="#contactEditModal"><img src="../../../assets/img/svg/c-edit.svg" alt="" class="svg"> </span><span class="contact-close"><img src="../../../assets/img/svg/c-close.svg" alt="" class="svg"></span></td></tr><tr><td><label class="custom-checkbox"><input type="checkbox"> <span class="checkmark"></span></label><div class="star"><a href="#"><img src="../../../assets/img/svg/star.svg" alt="" class="svg"></a></div></td><td><div class="d-flex align-items-center"><div class="img mr-20"><img src="../../../assets/img/avatar/m22.png" class="img-40" alt=""></div><div class="name bold">Kolby Torphy II</div></div></td><td>Phyllis75@hotmail.com</td><td>1-345-656-4163 x373</td><td>28</td><td>UX Researcher</td><td>August 9, 2017</td><td>$4022.0</td><td class="actions"><span class="contact-edit" data-toggle="modal" data-target="#contactEditModal"><img src="../../../assets/img/svg/c-edit.svg" alt="" class="svg"> </span><span class="contact-close"><img src="../../../assets/img/svg/c-close.svg" alt="" class="svg"></span></td></tr><tr><td><label class="custom-checkbox"><input type="checkbox"> <span class="checkmark"></span></label><div class="star"><a href="#"><img src="../../../assets/img/svg/star.svg" alt="" class="svg"></a></div></td><td><div class="d-flex align-items-center"><div class="img mr-20"><img src="../../../assets/img/avatar/m23.png" class="img-40" alt=""></div><div class="name bold">Mattie Daugherty</div></div></td><td>Jessika.Conroy@yahoo.com</td><td>721-969-9795 x09197</td><td>28</td><td>UX Researcher</td><td>December 24, 2016</td><td>$11588.0</td><td class="actions"><span class="contact-edit" data-toggle="modal" data-target="#contactEditModal"><img src="../../../assets/img/svg/c-edit.svg" alt="" class="svg"> </span><span class="contact-close"><img src="../../../assets/img/svg/c-close.svg" alt="" class="svg"></span></td></tr><tr><td><label class="custom-checkbox"><input type="checkbox"> <span class="checkmark"></span></label><div class="star"><a href="#"><img src="../../../assets/img/svg/star.svg" alt="" class="svg"></a></div></td><td><div class="d-flex align-items-center"><div class="img mr-20"><img src="../../../assets/img/avatar/m24.png" class="img-40" alt=""></div><div class="name bold">Timothy Littel</div></div></td><td>Nannie_Kling49@hotmail.com</td><td>1-251-141-2444 x275</td><td>28</td><td>UX Researcher</td><td>February 8, 2019</td><td>$14283.0</td><td class="actions"><span class="contact-edit" data-toggle="modal" data-target="#contactEditModal"><img src="../../../assets/img/svg/c-edit.svg" alt="" class="svg"> </span><span class="contact-close"><img src="../../../assets/img/svg/c-close.svg" alt="" class="svg"></span></td></tr><tr class="selected"><td><label class="custom-checkbox"><input type="checkbox" checked="checked"> <span class="checkmark"></span></label><div class="star"><a href="#"><img src="../../../assets/img/svg/star.svg" alt="" class="svg"></a></div></td><td><div class="d-flex align-items-center"><div class="img mr-20"><img src="../../../assets/img/avatar/m19.png" class="img-40" alt=""></div><div class="name bold">Karli Braun</div></div></td><td>Ruthe_Gleichner@gmail.com</td><td>697.704.7326</td><td>28</td><td>UX Researcher</td><td>October 25, 2016</td><td>$13329.0</td><td class="actions"><span class="contact-edit" data-toggle="modal" data-target="#contactEditModal"><img src="../../../assets/img/svg/c-edit.svg" alt="" class="svg"> </span><span class="contact-close"><img src="../../../assets/img/svg/c-close.svg" alt="" class="svg"></span></td></tr><tr class="selected"><td><label class="custom-checkbox"><input type="checkbox" checked="checked"> <span class="checkmark"></span></label><div class="star"><a href="#"><img src="../../../assets/img/svg/star.svg" alt="" class="svg"></a></div></td><td><div class="d-flex align-items-center"><div class="img mr-20"><img src="../../../assets/img/avatar/m16.png" class="img-40" alt=""></div><div class="name bold">Arden Spencer</div></div></td><td>Evangeline62@yahoo.com</td><td>(023) 708-6818 x4267</td><td>28</td><td>UX Researcher</td><td>June 20, 2015</td><td>$26253.0</td><td class="actions"><span class="contact-edit" data-toggle="modal" data-target="#contactEditModal"><img src="../../../assets/img/svg/c-edit.svg" alt="" class="svg"> </span><span class="contact-close"><img src="../../../assets/img/svg/c-close.svg" alt="" class="svg"></span></td></tr><tr><td><label class="custom-checkbox"><input type="checkbox"> <span class="checkmark"></span></label><div class="star"><a href="#"><img src="../../../assets/img/svg/star.svg" alt="" class="svg"></a></div></td><td><div class="d-flex align-items-center"><div class="img mr-20"><img src="../../../assets/img/avatar/m20.png" class="img-40" alt=""></div><div class="name bold">Favian Maggio DDS</div></div></td><td>Electa_Conroy@hotmail.com</td><td>1-076-628-3095 x7154</td><td>28</td><td>UX Researcher</td><td>October 11, 2019</td><td>$26253.0</td><td class="actions"><span class="contact-edit" data-toggle="modal" data-target="#contactEditModal"><img src="../../../assets/img/svg/c-edit.svg" alt="" class="svg"> </span><span class="contact-close"><img src="../../../assets/img/svg/c-close.svg" alt="" class="svg"></span></td></tr><tr><td><label class="custom-checkbox"><input type="checkbox"> <span class="checkmark"></span></label><div class="star"><a href="#"><img src="../../../assets/img/svg/star.svg" alt="" class="svg"></a></div></td><td><div class="d-flex align-items-center"><div class="img mr-20"><img src="../../../assets/img/avatar/m21.png" class="img-40" alt=""></div><div class="name bold">Jacey Considine</div></div></td><td>Garry23@yahoo.com</td><td>1-016-234-2482</td><td>28</td><td>UX Researcher</td><td>January 2, 2016</td><td>$6162.0</td><td class="actions"><span class="contact-edit" data-toggle="modal" data-target="#contactEditModal"><img src="../../../assets/img/svg/c-edit.svg" alt="" class="svg"> </span><span class="contact-close"><img src="../../../assets/img/svg/c-close.svg" alt="" class="svg"></span></td></tr><tr><td><label class="custom-checkbox"><input type="checkbox"> <span class="checkmark"></span></label><div class="star"><a href="#"><img src="../../../assets/img/svg/star.svg" alt="" class="svg"></a></div></td><td><div class="d-flex align-items-center"><div class="img mr-20"><img src="../../../assets/img/avatar/m22.png" class="img-40" alt=""></div><div class="name bold">Kolby Torphy II</div></div></td><td>Phyllis75@hotmail.com</td><td>1-345-656-4163 x373</td><td>28</td><td>UX Researcher</td><td>August 9, 2017</td><td>$4022.0</td><td class="actions"><span class="contact-edit" data-toggle="modal" data-target="#contactEditModal"><img src="../../../assets/img/svg/c-edit.svg" alt="" class="svg"> </span><span class="contact-close"><img src="../../../assets/img/svg/c-close.svg" alt="" class="svg"></span></td></tr><tr><td><label class="custom-checkbox"><input type="checkbox"> <span class="checkmark"></span></label><div class="star"><a href="#"><img src="../../../assets/img/svg/star.svg" alt="" class="svg"></a></div></td><td><div class="d-flex align-items-center"><div class="img mr-20"><img src="../../../assets/img/avatar/m23.png" class="img-40" alt=""></div><div class="name bold">Timothy Littel</div></div></td><td>Nannie_Kling49@hotmail.com</td><td>1-251-141-2444 x275</td><td>28</td><td>UX Researcher</td><td>February 8, 2019</td><td>$14283.0</td><td class="actions"><span class="contact-edit" data-toggle="modal" data-target="#contactEditModal"><img src="../../../assets/img/svg/c-edit.svg" alt="" class="svg"> </span><span class="contact-close"><img src="../../../assets/img/svg/c-close.svg" alt="" class="svg"></span></td></tr><tr><td><label class="custom-checkbox"><input type="checkbox"> <span class="checkmark"></span></label><div class="star"><a href="#"><img src="../../../assets/img/svg/star.svg" alt="" class="svg"></a></div></td><td><div class="d-flex align-items-center"><div class="img mr-20"><img src="../../../assets/img/avatar/m2.png" class="img-40" alt=""></div><div class="name bold">Birdie Thiel</div></div></td><td>Kenya.Stanton@yahoo.com</td><td>209-225-4857</td><td>28</td><td>UX Researcher</td><td>August 7, 2015</td><td>$18037.0</td><td class="actions"><span class="contact-edit" data-toggle="modal" data-target="#contactEditModal"><img src="../../../assets/img/svg/c-edit.svg" alt="" class="svg"> </span><span class="contact-close"><img src="../../../assets/img/svg/c-close.svg" alt="" class="svg"></span></td></tr><tr><td><label class="custom-checkbox"><input type="checkbox"> <span class="checkmark"></span></label><div class="star"><a href="#"><img src="../../../assets/img/svg/star.svg" alt="" class="svg"></a></div></td><td><div class="d-flex align-items-center"><div class="img mr-20"><img src="../../../assets/img/avatar/m19.png" class="img-40" alt=""></div><div class="name bold">Karli Braun</div></div></td><td>Ruthe_Gleichner@gmail.com</td><td>697.704.7326</td><td>28</td><td>UX Researcher</td><td>October 25, 2016</td><td>$13329.0</td><td class="actions"><span class="contact-edit" data-toggle="modal" data-target="#contactEditModal"><img src="../../../assets/img/svg/c-edit.svg" alt="" class="svg"> </span><span class="contact-close"><img src="../../../assets/img/svg/c-close.svg" alt="" class="svg"></span></td></tr></tbody></table></div></div><div id="contactAddModal" class="modal fade"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-body"><form action="#"><div class="media flex-column flex-sm-row"><div class="modal-upload-avatar mr-0 mr-sm-3 mr-md-5 mb-5 mb-sm-0"><div class="attach-file style--two mb-3"><img src="../../../assets/img/img-placeholder.png" class="profile-avatar" alt=""><div class="upload-button"><img src="../../../assets/img/svg/gallery.svg" alt="" class="svg mr-2"> <span>Upload Photo</span> <input class="file-input" type="file" id="fileUpload" accept="image/*"></div></div><div class="content"><h4 class="mb-2">Upload a Photo</h4><p class="font-12 c4">Allowed JPG, GIF or PNG. Max size<br>of 800kB</p></div></div><div class="contact-account-setting media-body"><h4 class="mb-4">Account Settings</h4><div class="mb-4"><label class="bold mb-2" for="as_name">Name</label> <input type="text" id="as_name" class="theme-input-style" placeholder="Type Here" required=""></div><div class="mb-4"><label class="bold mb-2" for="as_email">Email</label> <input type="email" id="as_email" class="theme-input-style" placeholder="Type Here" required=""></div><div class="mb-4"><label class="bold mb-2" for="as_phone">Phone</label> <input type="number" id="as_phone" class="theme-input-style" placeholder="Type Here" required=""></div><div class="mb-4"><label class="bold mb-2" for="as_age">Age</label> <input type="text" id="as_age" class="theme-input-style" placeholder="Type Here" required=""></div><div class="mb-4"><label class="bold mb-2" for="as_post">Post</label> <input type="text" id="as_post" class="theme-input-style" placeholder="Type Here" required=""></div><div class="mb-30"><label class="bold mb-2">Joining Date</label><div class="date datepicker dashboard-date style--two" id="datePickerExample"><span class="input-group-addon mr-0"><img src="../../../assets/img/svg/calender.svg" alt="" class="svg"></span><input type="text" class="pl-2" required=""></div></div><div class=""><a href="#" class="btn mr-4">Save Changes</a> <a href="#" class="cancel font-14 bold" data-dismiss="modal">Cancel</a></div></div></div></form></div></div></div></div><div id="contactEditModal" class="modal fade"> 
	<div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-body"><form action="#"><div class="media flex-column flex-sm-row"><div class="modal-upload-avatar mr-0 mr-sm-3 mr-md-5 mb-5 mb-sm-0"><div class="attach-file style--two mb-3"><img src="../../../assets/img/product/pg2.png" class="profile-avatar" alt=""><div class="upload-button"><img src="../../../assets/img/svg/gallery.svg" alt="" class="svg mr-2"> <span>Upload Photo</span> <input class="file-input" type="file" id="fileUpload2" accept="image/*"></div></div><div class="content"><h4 class="mb-2">Upload a Photo</h4><p class="font-12 c4">Allowed JPG, GIF or PNG. Max size<br>of 800kB</p></div></div><div class="contact-account-setting media-body"><h4 class="mb-4">Account Settings</h4><div class="mb-4"><label class="bold mb-2" for="as_name2">Name</label> <input type="text" id="as_name2" class="theme-input-style" value="Arden Spencer" required=""></div><div class="mb-4"><label class="bold mb-2" for="as_email2">Email</label> <input type="email" id="as_email2" class="theme-input-style" value="Evangeline62@yahoo.com" required=""></div><div class="mb-4"><label class="bold mb-2" for="as_phone2">Phone</label> <input type="text" id="as_phone2" class="theme-input-style" value="(023) 708-6818 x4267" required=""></div><div class="mb-4"><label class="bold mb-2" for="as_age2">Age</label> <input type="text" id="as_age2" class="theme-input-style" value="28" required=""></div><div class="mb-4"><label class="bold mb-2" for="as_post2">Post</label> <input type="text" id="as_post2" class="theme-input-style" value="UX Researcher" required=""></div><div class="mb-30"><label class="bold mb-2">Joining Date</label><div class="date datepicker dashboard-date style--two" id="datePickerExample2"><span class="input-group-addon mr-0"><img src="../../../assets/img/svg/calender.svg" alt="" class="svg"></span><input type="text" class="pl-2" required=""></div></div><div class=""><a href="#" class="btn mr-4">Save Changes</a> <a href="#" class="cancel font-14 bold" data-dismiss="modal">Cancel</a></div></div></div></form></div></div></div></div></div></div>

			</div></div><footer class="footer">D.4.E © 2022 created by  <a href="https://jcode.space/"> J.CODE.S</a></footer></div><script src="assets/js/jquery.min.js"></script><script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script><script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script><script src="assets/js/script.js"></script><script src="assets/plugins/apex/apexcharts.min.js"></script><script src="assets/plugins/apex/custom-apexcharts.js"></script>
				</body>
				</html>