<?php 
session_start();
$uid = $_SESSION["user"]["id"];
require_once "../../vendor/db.php";
require_once "../../vendor/adf/adf.php";
$today = date("Y-m-d H:i:s"); 
$i = 0;
foreach ($_POST as $key => $value){
	$id = "{$key}";
	$s = $_POST["s_$id"];
	$name = get_data_db($connect, "products", "name", "id", $id);
	$ob = $_POST["_$id"];

	$price = get_data_db($connect, "products", "price", "id", $id);
	$total = $s*$price;
	$osum = get_data_db($connect, "products", "sum", "id", $id);
	$nsum = $osum-$s;
	mysqli_query($connect, "UPDATE `products` SET `sum` = '$nsum' WHERE `id` = $id");

	mysqli_query($connect, "INSERT INTO `sell_hist`(`id`, `date`, `personal`, `product`, `amount`, `price`) VALUES (NULL,'$today','$uid','$name','$s','$total')");



	$odep = get_data_db($connect, "base", "deposit", "id", 1);
	$ndep = $odep+$total;
	mysqli_query($connect, "UPDATE `base` SET `deposit` = '$ndep' WHERE `id` = 1");
	$i = $i + $total;
	$_SESSION['msg'] = '<script type="text/javascript">alert("Всего: '.$i.'");</script>';
  	header("Location: pos.php");
}
header("Location: pos.php");
 ?>