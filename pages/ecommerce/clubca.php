<?php 
session_start();
require_once "../../vendor/db.php";
require_once "../../vendor/adf/adf.php";
$uid = $_SESSION["user"]["id"];
$time = $_GET['t'];
$sum = $_GET['s'];
$id = $_GET['i'];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Чек</title>
 </head>
 <style type="text/css">
 	body{
 		background-color: #060817;
 		color: white;
 		font-family: arial;
 	}
 	.b1{
 		margin-top: 150px;
 	}
 </style>
 <body>
 <center>
 	<div class="b1">
 		<h1>Открытый сеанс <?php echo get_data_db($connect, "rents", "name", "id", $id); ?> завершен!</h1>
 		<br>
 		<h2>Общее время: <?php echo $time ?> мин</h2>
 		<br>
 		<h2>Итоговая оплата: <span style="color: #50C878;"><?php echo $sum ?>тг</span></h2>
 		<br>	
 		<a href="club.php">
 		<button style="background-color: #6350E7; color: white; border: none; border-radius: 20px; font-family: arial; font-size: 1.5em; margin: 10px; padding: 10px; width: 30%;">
 			На главную
 		</button>
 		</a>
 	</div>
 </center>
 </body>
 </html>