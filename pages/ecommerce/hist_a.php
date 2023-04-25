<?php 
session_start();
require_once "../../vendor/db.php";
require_once "../../vendor/adf/adf.php";
$uid = $_SESSION["user"]["id"];
 ?>
 <!DOCTYPE html>
<html lang="zxx">
<head>
	<title>D4E | History</title>
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
		<header class="header fixed-top d-flex align-content-center flex-wrap"><div class="logo"><a href="../../index.php" class="default-logo"><img src="../../assets/img/logo.png" alt=""></a><a href="../../index.php" class="mobile-logo"><img src="assets/img/mobile-logo.png" alt=""></a></div><div class="main-header"><div class="container-fluid"><div class="row justify-content-between"><div class="col-3 col-lg-1 col-xl-4"><div class="main-header-left h-100 d-flex align-items-center"><div class="main-header-user"><a href="#" class="d-flex align-items-center" data-toggle="dropdown">
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
						<li class="active">
			<a href="#">
				<i class="icofont-layout"></i>
				<span class="link-title">Склад</span>
			</a>
			<ul class="nav sub-menu">
				<li>
					<a href="products_a.php">Все товары</a>
				</li>
			
			<li>
				<a href="#">История списание</a>
			</li>
			<li class="active">
				<a href="hist_a">История продаж</a>
			</li>
		</ul>
	</li>

					
						</li>

						<li>
						 	<a href="club_a.php">
						 		<i class="icofont-clock-time"></i>
						 		<span class="link-title">Клуб</span>
						 	</a>
						 </li>
						</li>


			<li class="nav-category">Пользватель</li>



		<li>
			<a href="../apps/contact/plist_a.php">
				<i class="icofont-ui-user"></i>
				 <span class="link-title">Персонал</span>
			</a>
		</li>

		<li>
			<a href="#">
				<i class="#"></i>
				<span class="link-title">Заметки</span>
			</a>
			<ul class="nav sub-menu">
				<li>
					<a href="#">Все</a>
				</li>
				<li>
					<a href="#">Долги</a>
				</li>
			<li>
				<a href="#">Архив</a>
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
					</li>
					<li>
						<a href="#">Добавить новый</a>
					</li>
				</ul>
			</li>


	<li class="nav-category">Инструменты</li>
<!-- 	<li><a href="#">
		<i class="icofont-table"></i> <span class="link-title">Form Elements</span></a><ul class="nav sub-menu"><li><a href="pages/form&table/form-elements/base-input.html">Base Input</a></li><li><a href="pages/form&table/form-elements/input-group.html">Input Groups</a></li><li><a href="pages/form&table/form-elements/checkbox.html">Checkbox</a></li><li><a href="pages/form&table/form-elements/radio.html">radio</a></li><li><a href="pages/form&table/form-elements/switch.html">Switch</a></li><li><a href="pages/form&table/form-elements/number-input.html">Number Input</a></li><li><a href="pages/form&table/form-elements/textarea.html">Text Area</a></li><li><a href="pages/form&table/form-elements/text-editor.html">Text Editor (Quill Editor)</a></li><li><a href="pages/form&table/form-elements/file-uploader.html">File Uploader</a></li><li><a href="pages/form&table/form-elements/datetime-picker.html">Date & Time Picker</a>
			</li></ul></li> -->

			<li>
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

			
		

	
			</ul>

			</div>
		</nav>



					<div class="main-content">


	
					<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

					<script type="text/javascript">
						
$(document).ready(function() {

    // Обработчик события keyup, сработает после того как пользователь отпустит кнопку, после ввода чего-либо в поле поиска.
    // Поле поиска из файла 'index.php' имеет id='search'
    $("#search").keyup(function() {

        // Присваиваем значение из поля поиска, переменной 'name'.
        var name = $('#search').val();

        // Проверяем если значение переменной 'name' является пустым
        if (name === "") {

            // Если переменная 'name' имеет пустое значение, то очищаем блок div с id = 'display'
            $("#display").html("");

        }
        else {
            // Иначе, если переменная 'name' не пустая, то вызываем ajax функцию.

            $.ajax({

                type: "POST", // Указываем что будем обращатся к серверу через метод 'POST'
                url: "handler-b.php", // Указываем путь к обработчику. То есть указывем куда будем отправлять данные на сервере.
                data: {
                    // В этом объекте, добавляем данные, которые хотим отправить на сервер
                    search: name // Присваиваем значение переменной 'name', свойству 'search'.
                },
                success: function(response) {
                    // Если ajax запрос выполнен успешно, то, добавляем результат внутри div, у которого id = 'display'.
                    $("#display").html(response).show();
                }

            });

        }

    });

});

function fill(Value) {
    // Функция 'fill', является обработчиком события 'click'.
    // Она вызывается, когда пользователь кликает по элементу из результата поиска.

    $('#search').val(Value); // Берем значение элемента из результата поиска и добавляем его в значение поля поиска

    $('#display').hide(); // Скрываем результаты поиска

}

					</script>
 
			<!-- 		<div class="main-header-search" style="float: right; margin-top: 80px; margin-right: 310px;">
						<form action="#" class="search-form">
							<div class="theme-input-group header-search active">
								<input type="text" class="theme-input-style" id="search" placeholder="Поиск товара...">
								<button type="submit">
									<img src="../../assets/img/svg/search-icon.svg" alt="" class="svg">
								</button>
							</div>
						</form>
					</div> -->
					<br>


<div style="float: left; width: 100%;">
				<div class="col-xl-20 mb-30" style="margin-top: 20px; width: 100%;">
	<div class="card mb-30 mb-xl-0">
		<div class="card-body">
			<div class="d-flex justify-content-between media">
				<div class="d-flex justify-content-start justify-content-sm-between flex-column flex-sm-row mb-sm-n3 media-body">	<div class="title-content mb-4 mb-sm-0">
					<h4>Поиск товаров</h4>
				</div>

				<div class="main-header-search" style="float: right; margin-right: 10px;">
						<form action="#" class="search-form">
							<div class="theme-input-group header-search active">
								<input type="text" class="theme-input-style" id="search" placeholder="Поиск товара...">
								<button type="submit">
									<img src="../../assets/img/svg/search-icon.svg" alt="" class="svg">
								</button>
							</div>
						</form>
					</div>
			</div>
	
		</div>
	</div>
	<hr>
	<div class="table-responsive">
		<table class="style--four table-striped text-nowrap">

			<thead>
				<tr>
					<th>Название</th>
					<th>Категория</th>
					<th>Количество</th>
					<th>Цена</th>
					<th>Мод</th>
				</tr>
			</thead>

			<tbody id="display">
				
				
			</tbody>
		</table>
	</div>
</div>
</div>
</div>




<div class="col-12" style="float: left;">
	<div class="card mb-30">
<form action="#" method="get">
		<div class="card-body pt-30">
		<!-- <h4 class="font-20">Таблица товаров</h4> -->
		<div class="custom-select style--two">
									<select class="theme-input-style" id="exampleSelect1" name="cat">

										
										
                   						<option value="0">Все</option>

                   
                   						<?php
            $conn = $connect;
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            // sql query 

            $sql = "SELECT * FROM `cat_product`";
            if($result = $conn->query($sql)){
                $rowsCount = $result->num_rows; // ID - constant
                foreach($result as $row){

                    // chech new message
                    
                   ?>

                   						<option value="<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></option>

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

                   
										

									</select>
								
		</div>
		<button class="btn long">Фильтрировать</button>
	</div>
	</form>


<div class="col-xl-20" style="float: right;">
	<div class="card mb-30 mb-xl-0">
		<div class="card-body">
			<div class="d-flex justify-content-between media">
				<div class="d-flex justify-content-start justify-content-sm-between flex-column flex-sm-row mb-sm-n3 media-body">	

			
			</div>
	
		</div>
	</div>
	<hr>
	<div class="table-responsive">
		<table class="style--four table-striped text-nowrap">

			<thead>
				<tr>
					<th>Время продажи</th>
					<th>Товар</th>
					<th>Количество</th>
					<th>Цена</th>
					<th>Мод</th>
				</tr>
			</thead>

			<tbody>

				<?php
            $conn = $connect;
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }
            // sql query 

            	$sql = "SELECT * FROM `sell_hist` ORDER BY `id` DESC";
            
            
            if($result = $conn->query($sql)){
                $rowsCount = $result->num_rows; // ID - constant
                foreach($result as $row){

                    // check new message

                	if ($row["amount"] == 0) {
                		$real = 0;
                	}
                	else {
                    
                   ?>

				<tr>
				
					<td><?php echo $row["date"]; ?></td>
					<td><?php echo $row["product"]; ?></td>
					<td><?php echo $row["amount"]; ?></td>
					<td><?php echo $row["price"]; ?></td>
					<td><a href="re.php?id=<?php echo $row['id']; ?>" class="details-btn">Оформить возврат <i class="icofont-arrow-right"></i></a></td>
				</tr>

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




			</tbody>
		</table>
	</div>
	
</div>
</div>

				</div>



				</div>



						<footer class="footer" style="float: left;">D.4.E © 2022 created by <a href="https://jcode.space/">J.CODE.S</a></footer></div><script src="../../assets/js/jquery.min.js"></script><script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script><script src="../../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script><script src="../../assets/js/script.js"></script></body></html>