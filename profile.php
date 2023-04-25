<?php 
require_once "vendor/db.php";
require_once "vendor/adf/adf.php";
session_set_cookie_params(172800,"/");
session_start();
if (!$_SESSION['user']) {
    header('Location: index.php');
}
$uid = $_SESSION["user"]["id"];
$tp = get_data_db($connect,"personals", "ptype", "id", $uid);
if ($tp == "admin") {
	header('Location: admin.php');
}
else {
	$tp = "kassa";
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
								

						 <!-- <li>
						 	<a href="#">
						 
						 		<i class="icofont-clock-time"></i>
						 		<span class="link-title">Бронь</span>
						 	</a>
						 </li> -->
						</li>
						<li>
						 	<a href="pages/ecommerce/club.php">
						 		<i class="icofont-clock-time"></i>
						 		<span class="link-title">Клуб</span>
						 	</a>
						 </li>
						</li>

						<li>
			<a href="pages/ecommerce/dclient.php">
				<i class="icofont-ui-user"></i>
				 <span class="link-title">DClient</span>
			</a>
		</li>


			<li class="nav-category">Пользватель</li>




		<li>
			<a href="#">
				<i class="icofont-listing-box"></i>
				<span class="link-title">Заметки</span>
			</a>
			<ul class="nav sub-menu">

				<li>
					<a href="pages/apps/contact/notes.php">Доска</a>
<!-- 					pages/apps/todolist/add-new.html
 -->				</li>
			<li>
				<a href="pages/apps/contact/arhnotes.php">Архив</a>
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
						<a href="pages/apps/contact/contact-grid.php">Список контактов</a>
						<!-- pages/apps/contact/contact-list.html -->
					</li>
					<li>
						<a href="addcont.php">Добавить новый</a>
						<!-- pages/apps/contact/contact-grid.html -->
					</li>
				</ul>
			</li>

<!-- 
	<li class="nav-category">Инструменты</li>

 -->
<!-- 			<li>
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
			 </li>

			 -->
		

	
			</ul>

			</div>
		</nav>


			<div class="main-content">
				<div class="container-fluid"><div class="row">
<div class="col-xl-2 col-md-4 col-sm-6">
	<div class="card area-chart-box mb-30">
		<div class="card-body">
			<div class="d-flex justify-content-between">
				<div class="">
					<h4 class="mb-1">Доход</h4>
					<p class="font-14 c3">Полная статистика</p>
				</div>
				<div class="">
					<h2>50<sup>%</sup></h2>
				</div>
			</div>
		</div>
		<div id="apex_area-chart" class="chart"></div>
	</div>
</div>

<div class="col-xl-2 col-md-4 col-sm-6">
	<div class="card area-chart-box mb-30">
		<div class="card-body">
			<div class="d-flex justify-content-between">
				<div class="">
					<h4 class="mb-1">Расходы</h4>
					<p class="font-14 soft-pink">Все расходы за день</p>
				</div>
				<div class="">
					<h2>0<sup>%</sup>
					</h2>
				</div>
			</div>
		</div><div id="apex_area2-chart" class="chart"></div>
	</div>
</div>



<div class="col-xl-2 col-md-4 col-sm-6">
<!-- 	<div class="card area-chart-box mb-30">
		<div class="card-body">
			<div class="">
				<h4 class="mb-1">Activity</h4>
				<p class="font-14 text_color">Hover to see detail</p>
			</div>
		</div>
		<div id="apex_area4-chart" class="chart">
			
		</div>
	</div> -->
</div>
</div>
<div class="row">
	<div class="col-xl-6 col-lg-12">
						<div class="card todo-list mb-30">
							<div class="card-body p-0">
								<div class="single-row border-bottom pt-3 pb-2">
									<div class="d-flex justify-content-between align-items-start mb-2">
										<div class="">
											<h4 class="card-title">Список расходов & приходов</h4>

										</div>
					<!-- pages/apps/todolist/add-new.html -->
					<div class="d-flex align-items-center">
						<a href="#" class="btn-circle">
							<img src="assets/img/svg/plus_white.svg" alt="" class="svg"></a>
					<div class="dropdown-button">
						<a href="#" class="d-flex align-items-center" data-toggle="dropdown">
					<div class="menu-icon style--two justify-content-center mr-0">
						<span></span>
						<span></span>
						<span></span>
					</div>
						</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="#">Очистить</a>
						<a href="#">Полный список</a>
						<a href="#">История</a>
					</div>
				</div>
			</div>
		</div>
	</div>


<div id="content">
<?php
include("vendor/db.php");

$result = mysqli_query($db, "SELECT * FROM depop ORDER BY `id` DESC LIMIT 5 ");
$comment = mysqli_fetch_array($result);
$i = 1;
do{
	?>

		<div class="single-row border-bottom pt-3 pb-3">
		<div class="d-flex justify-content-between align-items-center">
			<div class="d-flex position-relative">
				<!-- <label class="custom-checkbox">
					<input type="checkbox" checked="checked">
					<span class="checkmark"></span>
				</label> -->
				<div class="todo-text">
					<p class="card-text mb-1"><?php echo $comment['comment']; ?></p>
					<?php 
						if ($comment['type'] == "plus") {
							$sty = "color: #50C878;";
							$sums = "+";
						}
						else {
							$sty = "color: orange;";
							$sums = "-";
						}
					 ?>
					<p class="font-12 mb-0" style="<?php echo $sty; ?>"><?php echo $comment['title']; ?></p>
				</div>
			</div>
			<div class="d-flex">
				<h3 style="margin-right: 20px;"><?php echo $sums; ?><?php echo $comment['sum']; ?></h3>
			<div class="assign_to">
				
			</div>
			<div class="dropdown-button">
				<a href="#" class="d-flex align-items-center" data-toggle="dropdown">
					<div class="menu-icon style--two w-14 mr-0">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="#">Daily</a>
				<a href="#">Sort By</a>
				<a href="#">Monthly</a>
			</div>
		</div>
	</div>
			</div>
</div>
	<?php
	
	$i++;
	
}while($comment = mysqli_fetch_array($result));
?>

</div>
<div id="load" style="background-color: #6350E7; border-radius: 15px;">
	<center>
<div><p style="font-size: 1.2em;">Ещё расходы</p></div>
</center>
<center>
<div><p style="font-size: 1.2em;" id="imgLoad">загрузка...</p></div>
</center>
</div>

			</div></div>

		</div><div class="col-xl-6 col-lg-12"><div class="row">
						<!-- <div class="col-sm-6"><div class="card mb-30"><div class="card-body"><div id="apex_line-chart" class="chart"></div><div class="d-flex align-items-end justify-content-between mt-4"><div class=""><h4 class="mb-1">Website Analytics</h4><p class="font-14">Check out each column for more details</p></div><div class="dropdown-button"><a href="#" class="d-flex align-items-center" data-toggle="dropdown"><div class="menu-icon justify-content-end pb-1 style--two mr-0"><span></span> <span></span> <span></span></div></a><div class="dropdown-menu dropdown-menu-right"><a href="#">Daily</a> <a href="#">Sort By</a> <a href="#">Monthly</a></div></div></div></div></div>
					</div> -->
					<!-- <div class="col-sm-6"><div class="card mb-30"><div class="card-body"><div id="apex_line2-chart" class="chart"></div><div class="d-flex align-items-end justify-content-between mt-4"><div class=""><h4 class="mb-1">Company Growth</h4><p class="font-14">Company is growing 20% in average</p></div><div class="dropdown-button"><a href="#" class="d-flex align-items-center" data-toggle="dropdown"><div class="menu-icon justify-content-end pb-1 style--two mr-0"><span></span> <span></span> <span></span></div></a><div class="dropdown-menu dropdown-menu-right"><a href="#">Daily</a> <a href="#">Sort By</a> <a href="#">Monthly</a></div></div></div></div></div></div> -->
					<div class="form-element base-control mb-30" style="width: 48%; float: left;">
							<h4 class="font-20 mb-4">Расходы</h4>

							<form action="vendor/pcp.php" method="get">
								<div class="form-group mb-4">
									<label for="addonEmail" class="mb-2 font-14 bold">Заголовок</label>
									<div class="input-group addon">
										<div class="input-group-prepend">
											<div class="input-group-text bold">@</div>
										</div>
										<input type="text" id="addonEmail" name="title" class="form-control" placeholder="...">
									</div>
								</div>
								<label for="addonEmail" class="mb-2 font-14 bold" style="color: orange;">Сумма</label>
							<div class="d-flex align-items-center">

								<div class="input-group addon">

									<input type="number" name="sum" class="form-control style--two" placeholder="0.00">
									<div class="input-group-append">
										<div class="input-group-text px-3 bold">₸</div>
									</div>
								</div>
							</div>
							<br>
							
							<br>

							<div class="form-group mb-4">
								<label for="exampleSelect1" class="mb-2 bold d-block">Коментарий</label>
								<br>

								<textarea name="coment" id="task_description" class="theme-input-style" placeholder="..."></textarea>
								<div class="custom-select style--two">
									
								<input type="text" readonly="" hidden="" name="mod" value="consum">
								</div>
							</div>
							<div class="button-group pt-1">
								<button class="btn long">Записать расход</button>
								<!-- <button type="reset" class="link-btn bg-transparent ml-3 soft-pink">Cancel</button> -->
							</div>
						</form>
					</div>



					<div class="form-element base-control mb-30" style="width: 48%; float: right; margin-left: 15px;">
							<h4 class="font-20 mb-4">Приход</h4>

							<form action="vendor/pcp.php" method="get">
								<div class="form-group mb-4">
									<label for="addonEmail" class="mb-2 font-14 bold">Заголовок</label>
									<div class="input-group addon">
										<div class="input-group-prepend">
											<div class="input-group-text bold">@</div>
										</div>
										<input type="text" id="addonEmail" name="title" class="form-control" placeholder="...">
									</div>
								</div>
								<label for="addonEmail" class="mb-2 font-14 bold" style="color: #82CD99;">Сумма</label>
							<div class="d-flex align-items-center">

								<div class="input-group addon">

									<input type="number" name="sum" class="form-control style--two" placeholder="0.00">
									<div class="input-group-append">
										<div class="input-group-text px-3 bold">₸</div>
									</div>
								</div>
							</div>
							<br>
							
							<br>

							<div class="form-group mb-4">
								<label for="exampleSelect1" class="mb-2 bold d-block">Коментарий</label>
								<br>

								<textarea name="coment" id="task_description" class="theme-input-style" placeholder="..."></textarea>
								<div class="custom-select style--two">
									
								<input type="text" readonly="" hidden="" name="mod" value="addba">
								</div>
							</div>
							<div class="button-group pt-1">
								<button class="btn long">Записать приход</button>
								<!-- <button type="reset" class="link-btn bg-transparent ml-3 soft-pink">Cancel</button> -->
							</div>
						</form>
					</div>

					<script type="text/javascript" src="jquery-1.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#imgLoad").hide();
});

var num = 5;

$(function() {
	$("#load div").click(function(){
		
		$("#imgLoad").show(); 
		
		$.ajax({
			url: "action.php", 
			type: "GET",       
			data: {"num": num},
			cache: false,			
			success: function(response){
				if(response == 0){ 
					alert("loading");
					$("#imgLoad").hide();
				}else{
					$("#content").append(response);
					num = num + 5;
					$("#imgLoad").hide();
				}
			}
		});
	});
});
</script>

					<div class="col-12"></div>


		</div></div></div><div class="row">
						<!-- <div class="col-xl-3 col-md-5"><div class="card mb-30"><div class="card-body"><div class="mb-40 d-none"><h4 class="mb-2">Cloud Storage</h4><p class="font-14">72% space used</p></div><div id="apex_radar-chart" class="chart"></div><div class="upgrade_storage-btn mt-2"><a href="#" class="btn d-block">Upgrade Storage</a></div></div></div>
					</div> -->
						<!-- <div class="col-xl-4 col-md-7"><div class="card mb-30"><div class="card-body"><div class="row align-items-end"><div class="col-5 col-sm-6 col-lg-5"><div id="apex_column2-chart" class="chart"></div></div><div class="col-7 col-sm-6 col-lg-7"><div class=""><h4 class="mb-2">Registration</h4><p>Pellentesque tincidunt tristique neque, eget venenatis enim gravida.</p></div></div></div></div></div><div class="card mb-30"><div class="card-body"><div class="row align-items-end"><div class="col-5 col-sm-6 col-lg-5"><div id="apex_column3-chart" class="chart"></div></div><div class="col-7 col-sm-6 col-lg-7"><div class=""><h4 class="mb-2">Activity</h4><p>Pellentesque tincidunt tristique neque, eget venenatis enim gravida.</p></div></div></div></div></div><div class="card mb-30"><div class="card-body"><div class="row align-items-end"><div class="col-5 col-sm-6 col-lg-5"><div id="apex_column4-chart" class="chart"></div></div><div class="col-7 col-sm-6 col-lg-7"><div class=""><h4 class="mb-2">Completed Task</h4><p>Pellentesque tincidunt tristique neque, eget venenatis enim gravida.</p></div></div></div></div></div><div class="card mb-30"><div class="card-body"><div class="row align-items-end"><div class="col-6"><div class="d-flex justify-content-start"><div class="ProgressBar-wrap2 position-relative"><div class="ProgressBar ProgressBar_4" data-progress="67"><svg class="ProgressBar-contentCircle" viewBox="0 0 200 200"><circle transform="rotate(-90, 100, 100)" class="ProgressBar-background" cx="100" cy="100" r="85"/><circle transform="rotate(-90, 100, 100)" class="ProgressBar-circle" cx="100" cy="100" r="85"/></svg> <span class="ProgressBar-percentage ProgressBar-percentage--count"></span> <span class="ProgressBar-percentage--text">Bounce Rate</span></div></div></div></div><div class="col-6"><div class="d-flex justify-content-start progress_5"><div class="ProgressBar-wrap2 position-relative"><div class="ProgressBar ProgressBar_5" data-progress="48"><svg class="ProgressBar-contentCircle" viewBox="0 0 200 200"><circle transform="rotate(-90, 100, 100)" class="ProgressBar-background" cx="100" cy="100" r="85"/><circle transform="rotate(-90, 100, 100)" class="ProgressBar-circle" cx="100" cy="100" r="85"/></svg> <span class="ProgressBar-percentage ProgressBar-percentage--count style--two"></span> <span class="ProgressBar-percentage--text">Conversion</span></div></div></div></div></div></div></div></div> -->
					<!-- <div class="col-xl-5"><div class="card mb-30"><div class="card-body"><div class="mb-1"><h4 class="mb-2">Analytics</h4><p class="pt-1">Nunc scelerisque tincidunt elit. Vestibulum non mi ipsum. Cras pretium suscipit tellus sit amet aliquet. Vestibulum maximus lacinia massa non porttitor.</p></div><div id="apex_bar-chart" class="chart"></div></div></div>
				</div> -->

					<!-- <div class="col-xl-12"><div class="card"><div class="card-body"><div class="d-flex justify-content-start justify-content-sm-between align-items-start align-items-sm-center flex-column flex-sm-row mb-sm-n3"><div class="title-content mb-4 mb-sm-0"><h4 class="mb-2">Sale Reports</h4><p>Solicitude announcing as to sufficient my</p></div><div class=""><ul class="list-inline list-button m-0"><li>2015</li><li>2016</li><li>2017</li><li>2018</li><li class="active">2019</li></ul></div></div></div><div id="apex_line3-chart" class="chart"></div></div></div> -->
</div>
				</div>
			</div>
		</div></div><footer class="footer">D.4.E © 2022 created by  <a href="https://jcode.space/"> J.CODE.S</a></footer></div><script src="assets/js/jquery.min.js"></script><script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script><script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script><script src="assets/js/script.js"></script><script src="assets/plugins/apex/apexcharts.min.js"></script><script src="assets/plugins/apex/custom-apexcharts.js"></script>
				</body>
				</html>