<?php 
session_start();
require_once "db.php";
require_once "adf/adf.php";

	$pid = $_GET['pid'];
	mysqli_query($connect, "DELETE FROM `products` WHERE id = $pid");
	// header("Location: ../pages/ecommerce/producs.php");


 ?>