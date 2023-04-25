<?php 
session_start();
require_once "../../vendor/db.php";
require_once "../../vendor/adf/adf.php";
$id = $_GET['id'];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Продлить</title>
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
    <form method="post" action="../../vendor/system.php">
 	<div class="b1">
 		<h1>Сеанс <?php echo get_data_db($connect, "rents", "name", "id", $id); ?></h1>
 		<br>
 		<h2>Добавить: <input type="time" name="time" style="border: 3px solid #50C878; border-radius: 20px; font-size: 1.5em;"></h2>
 		<br>
 		<h2>Сумма: <input type="number" name="sum" style="border: 3px solid #50C878; border-radius: 20px; font-size: 1.5em; width: 200px;"></h2>
 		<br>	
 		<input type="text" readonly="" hidden="" name="mod" value="addtr">
        <input type="text" readonly="" hidden="" name="idro" value="<?php echo $id; ?>">
 		<button style="background-color: #6350E7; color: white; border: none; border-radius: 20px; font-family: arial; font-size: 1.5em; margin: 10px; padding: 10px; width: 30%;">
 			Добавить
 		</button>
 		
 	</div>
    </form>
 </center>
 </body>
 </html>