<?php 
require_once "../../../vendor/db.php";
require_once "../../../vendor/adf/adf.php";
session_start();
$uid = $_SESSION['user']['id'];
 ?>
}
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>D4E | Personals</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"><meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1"><meta name="description" content="">
	<meta name="keywords" content=""><link rel="shortcut icon" href="../../../assets/img/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../assets/fonts/icofont/icofont.min.css">
	<link rel="stylesheet" href="../../../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.css">
	<link rel="stylesheet" href="../../../assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="../../../assets/css/style.css"></head>

	<body>


	<div class="offcanvas-overlay">
	</div>
	<div class="wrapper">
		<header class="header fixed-top d-flex align-content-center flex-wrap"><div class="logo"><a href="../../../index.php" class="default-logo"><img src="../../../assets/img/logo.png" alt=""></a><a href="../../../index.php" class="mobile-logo"><img src="../../../assets/img/mobile-logo.png" alt=""></a></div><div class="main-header"><div class="container-fluid"><div class="row justify-content-between"><div class="col-3 col-lg-1 col-xl-4"><div class="main-header-left h-100 d-flex align-items-center"><div class="main-header-user"><a href="#" class="d-flex align-items-center" data-toggle="dropdown">
		<div class="menu-icon">
	<span></span> <span></span> <span></span></div>
	<div class="user-profile d-xl-flex align-items-center d-none">
		<div class="user-avatar">
			<img src="../../../img/ava/<?php echo get_data_db($connect, "personals", "img", "id", $uid); ?>" alt="">
		</div>
		<div class="user-info">
			<h4 class="user-name"><?php echo get_data_db($connect, "personals", "name", "id", $uid); ?> <?php echo get_data_db($connect, "personals", "lname", "id", $uid); ?></h4>
			<p class="user-email"><?php echo get_data_db($connect, "personals", "email", "id", $uid); ?></p>
		</div>
	</div>
	</a>
	<div class="dropdown-menu"><!-- <a href="#">My Profile</a> <a href="#">task</a> <a href="#">Settings</a> --> 
		<a href="../../../vendor/out.php">Выйти</a>
	</div></div><div class="main-header-menu d-block d-lg-none"><div class="header-toogle-menu"><img src="../../../assets/img/menu.png" alt=""></div></div></div></div><div class="col-9 col-lg-11 col-xl-8"><div class="main-header-right d-flex justify-content-end"><ul class="nav">
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

					<nav class="sidebar" data-trigger="scrollbar">

			<div class="sidebar-header d-none d-lg-block"><div class="sidebar-toogle-pin"><i class="icofont-tack-pin"></i></div></div>

			<div class="sidebar-body">

			<ul class="nav">
				<li class="nav-category">Основные</li>

				<li>
					<a href="../../../profile.php">
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
						<li>
						 	<a href="../../../pages/ecommerce/club.php">
						 		<i class="icofont-clock-time"></i>
						 		<span class="link-title">Клуб</span>
						 	</a>
						 </li>
						</li>


			<li class="nav-category">Пользватель</li>



		<li class="active">
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
					<a href="notes.php">Все</a>
<!-- 					pages/apps/todolist/todolist.html
 -->				</li>
			<li>
				<a href="arhnotes.php">Архив</a>
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
						<a href="contact-grid.php">Список контактов</a>
						<!-- pages/apps/contact/contact-list.html -->
					</li>
					<li>
						<a href="../../../addcont.php">Добавить новый</a>
						<!-- pages/apps/contact/contact-grid.html -->
					</li>
				</ul>
			</li>


	<li class="nav-category">Инструменты</li>


			<li>
				<a href="../../ecommerce/filt.php">
			
					<i class="icofont-ui-file"></i>
					<span class="link-title">Отчеты</span>
				</a>
			</li>

<!-- 			<li>
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



	<div class="main-content d-flex flex-column flex-md-row">

		<div class="container-fluid">
			<div class="row">

				<div class="col-12">
					<div class="card bg-transparent">
					<!-- 	<div class="contact-header d-flex align-items-sm-center media flex-column flex-sm-row card_color-bg mb-30">
							<div class="contact-header-left media-body d-flex align-items-center mr-4">
								<div class="add-new-contact mr-20">
									<a href="#" class="btn-circle" data-toggle="modal" data-target="#contactAddModal">
										<img src="../../../assets/img/svg/plus_white.svg" alt="" class="svg">
									</a>
								</div>

								<p><h4 style="margin-left: 40px;">Управление акаунтами сотрудников</h4></p>

							</div>
				<div class="contact-header-right d-flex align-items-center justify-content-end mt-3 mt-sm-0">
					<div class="grid">
						<a href="contact-grid.html">
							<img src="../../../assets/img/svg/grid-icon.svg" alt="" class="svg">
						</a>
					</div>
					<div class="star">
						<a href="#">
							<img src="../../../assets/img/svg/star.svg" alt="" class="svg">
						</a>
					</div>
					<div class="delete_mail">
						<a href="#">
							<img src="../../../assets/img/svg/delete.svg" alt="" class="svg">
						</a>
					</div>
					</div>
				</div> -->
				<div class="table-responsive">
			<table class="contact-list-table text-nowrap card_color-bg">
				<thead>
					<tr>
						

						<th class="text-center">Имя 
							<img src="../../../assets/img/svg/table-down-arrow.svg" alt="" class="svg">
						</th>

						<th>Email</th>
						<th>Телефон</th>
					
						<th>Должность</th>
						<!-- <th>Joining Date 
							<img src="../../../assets/img/svg/table-down-arrow.svg" alt="" class="svg">
						</th> -->
						<th>Баланс
							<img src="../../../assets/img/svg/table-down-arrow.svg" alt="" class="svg">
						</th>
						<th>Мод</th>
					</tr>
				</thead>

				<tbody>
						<?php
            $conn = $connect;
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }

            	$sql = "SELECT * FROM `personals`";
            
            
            if($result = $conn->query($sql)){
                $rowsCount = $result->num_rows; // ID - constant
                foreach($result as $row){

                    // check new message
                    
                   ?>

				<tr>
						
						<td>
							<div class="d-flex align-items-center">
								<div class="img mr-20">
									<img src="../../../img/ava/<?php echo $row["img"]; ?>" class="img-40" alt="">
								</div>
								<div class="name bold"><?php echo $row["name"]; ?> <?php echo $row["lname"]; ?></div>
							</div>
						</td>
						<td><?php echo $row["email"]; ?></td>
						<td><?php echo $row["number"]; ?></td>
						
						<td><?php echo $row["ptype"]; ?></td>
						<!-- <td>June 20, 2015</td> -->
						<td><?php echo $row["balance"]; ?>₸</td>
						<td class="actions">
							<?php 
								$uipid = $row['id'];
								$did = "#contactEditModals$uipid";
							 ?>
							<span class="contact-edit" data-toggle="modal" data-target="<?php echo $did?>">
								<img src="../../../assets/img/svg/c-edit.svg" alt="" class="svg">
							</span>
							<span class="contact-close">
								<img src="../../../assets/img/svg/c-close.svg" alt="" class="svg">
							</span>
						</td>
					</tr>

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
					</tbody>
				</table>
				</div>
			</div>

			<div id="contactAddModal" class="modal fade">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<form action="#">
								<div class="media flex-column flex-sm-row">
									<div class="modal-upload-avatar mr-0 mr-sm-3 mr-md-5 mb-5 mb-sm-0">
										<div class="attach-file style--two mb-3">
											<img src="../../../assets/img/img-placeholder.png" class="profile-avatar" alt="">
											<div class="upload-button">
												<img src="../../../assets/img/svg/gallery.svg" alt="" class="svg mr-2">
												<span>Upload Photo</span>
												<input class="file-input" type="file" id="fileUpload" accept="image/*">
											</div>
										</div>
										<div class="content">
											<h4 class="mb-2">Upload a Photo</h4>
											<p class="font-12 c4">Allowed JPG, GIF or PNG. Max size<br>of 800kB</p>
										</div>
									</div>
									<div class="contact-account-setting media-body">
										<h4 class="mb-4">Account Settings</h4>
										<div class="mb-4">
											<label class="bold mb-2" for="as_name">Name</label>
											<input type="text" id="as_name" class="theme-input-style" placeholder="Type Here" required>
										</div>
									<div class="mb-4">
										<label class="bold mb-2" for="as_email">Email</label>
										<input type="email" id="as_email" class="theme-input-style" placeholder="Type Here" required>
									</div>
									<div class="mb-4">
										<label class="bold mb-2" for="as_phone">Phone</label>
										<input type="number" id="as_phone" class="theme-input-style" placeholder="Type Here" required>
									</div>
									<div class="mb-4">
										<label class="bold mb-2" for="as_age">Age</label>
										<input type="text" id="as_age" class="theme-input-style" placeholder="Type Here" required>
									</div>
									<div class="mb-4">
										<label class="bold mb-2" for="as_post">Post</label> 
									<input type="text" id="as_post" class="theme-input-style" placeholder="Type Here" required>
								</div>
								<div class="mb-30">
									<label class="bold mb-2">Joining Date</label>
									<div class="date datepicker dashboard-date style--two" id="datePickerExample">
										<span class="input-group-addon mr-0">
											<img src="../../../assets/img/svg/calender.svg" alt="" class="svg">
										</span>
										<input type="text" class="pl-2" required>
									</div>
								</div>
								<div class="">
									<a href="#" class="btn mr-4">Save св</a>
									<a href="#" class="cancel font-14 bold" data-dismiss="modal">Cancel</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>



<?php
            $conn = $connect;
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }

            	$sql = "SELECT * FROM `personals`";
            
            
            if($result = $conn->query($sql)){
                $rowsCount = $result->num_rows; // ID - constant
                foreach($result as $row){

                    // check new message
                    
                   ?>
                   <?php 
                   $uipid = $row['id'];
                   $did = "contactEditModals$uipid";
                    ?>
				<div id="<?php echo $did; ?>" class="modal fade">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content" style="width: 1200px;">
				<div class="modal-body">

					<form action="../../../vendor/system.php" method="post">
						<div class="media flex-column flex-sm-row">
							<div class="modal-upload-avatar mr-0 mr-sm-3 mr-md-5 mb-5 mb-sm-0">
								<div class="attach-file style--two mb-3">
									<img src="../../../img/ava/<?php echo $row['img']; ?>" class="profile-avatar" alt="">
									<div class="upload-button">
										<img src="../../../assets/img/svg/gallery.svg" alt="" class="svg mr-2">
										<span>Изменить фото</span>
										<input class="file-input" type="file" id="fileUpload2" accept="image/*" name="ava">
									</div>
								</div>
								<div class="content">
									<h4 class="mb-2">Загрузить фото</h4>
									<p class="font-12 c4">Формат JPG, PNG, GIF. Максимальный размер<br> 800kB</p>

									<a href="#" class="btn mr-4" style="float: left; border-radius: 5px 20px 20px 5px; margin-top: 10px;" data-dismiss="modal">Назад</a>
								</div>
							</div>

							<div class="contact-account-setting media-body"><h4 class="mb-4"><?php echo $row['name']." ".$row['lname'];; ?>
							</h4>
							<div class="mb-4"><label class="bold mb-2" for="as_email2">Email</label>
								<input type="email" id="as_email2" class="theme-input-style" value="<?php echo $row['email']; ?>" name="email" required>
							</div>
							<div class="mb-4">
								<label class="bold mb-2" for="as_phone2">Телефон</label>
								<input type="text" id="as_phone2" class="theme-input-style" value="<?php echo $row['number']; ?>" name="number" required>
							</div>
							<!-- <div class="mb-4">
								<label class="bold mb-2" for="as_age2">Age</label>
								<input type="text" id="as_age2" class="theme-input-style" value="28" required>
							</div> -->

							<div class="mb-4" style="border: 2px solid #50C878; padding: 8px; border-radius: 10px;">
								<label class="bold mb-2" for="as_age2">Бонус</label>
								<input type="number" class="theme-input-style" placeholder="0.0 ₸" name="sum_bonus">
								<!-- <hr>
								<textarea id="readOnlyTextarea1" class="theme-input-style style--three" placeholder="Коментарий..." name="com_bonus"></textarea> -->
							</div>



							<div class="mb-4" style="border: 2px solid orange; padding: 8px; border-radius: 10px;">
								<label class="bold mb-2" for="as_age2">Штраф</label>
								<input type="number"  class="theme-input-style" placeholder="0.0 ₸" name="sum_minus">
								<!-- <hr>
								<textarea id="readOnlyTextarea1" class="theme-input-style style--three" placeholder="Коментарий..." name="com_minus"></textarea> -->
							</div>
							<!-- <div class="mb-30">
								<label class="bold mb-2">Joining Date</label>
								<div class="date datepicker dashboard-date style--two" id="datePickerExample2">
									<span class="input-group-addon mr-0">
										<img src="../../../assets/img/svg/calender.svg" alt="" class="svg">
									</span>
									<input type="text" class="pl-2" required>
								</div>
							</div> -->
							<input type="text" name="mod" readonly hidden value="updp_a">
							<input type="text" name="pid" readonly hidden value="<?php echo $row["id"]; ?>">
							<div class="">
								<button style="background-color: #5C46DA; border: none; border-radius: 25px; padding: 10px; color: white; padding-right: 15px; padding-left: 15px; float: right;">Сохранить</button></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

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



		</div></div></div>

	</div>
</div>
<footer class="footer">D.4.E © 2022 created by <a href="https://jcode.space/"> J.CODE.S</a></footer>
</div>
<script src="../../../assets/js/jquery.min.js"></script>
<script src="../../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../../../assets/js/script.js"></script>
<script src="../../../assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="../../../assets/plugins/bootstrap-datepicker/custom-datepicker.js"></script>
</body>
</html>