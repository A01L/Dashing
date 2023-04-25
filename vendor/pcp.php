<?php 
session_start();

if (!$_SESSION['user']) {
    header('Location: ../index.php');
}

$uid = $_SESSION["user"]["id"];
require_once "db.php";
require_once "adf/adf.php";
$today = date("Y-m-d H:i:s"); 


if ($_POST['mod']) {
	$mod = $_POST['mod'];
}
elseif ($_GET['mod']) {
	$mod = $_GET['mod'];
}
else {
	echo "Error mod for operation!";
}

if ($mod == "con2p") {
	$ch = get_data_db($connect, "base", "turn", "id", 1);
	if ($ch == "null") {
		$pers = get_data_db($connect, "personals", "email", "id", $uid);
		$persb = get_data_db($connect, "personals", "balance", "id", $uid);

		mysqli_query($connect, "UPDATE `base` SET `turn` = '$pers' WHERE `base`.`id` = 1;");

		$nbp = $persb+4000;
		mysqli_query($connect, "UPDATE `personals` SET `balance` = '$nbp' WHERE `id` = $uid");
		header("Location: ../profile.php");		
	}
	else {
		$_SESSION['msg'] = '<script type="text/javascript">alert("Соединился другой акаунт!");</script>';
		header("Location: ../profile.php");		
	}

}
if ($mod == "ccop") {
	mysqli_query($connect, "UPDATE `base` SET `turn` = 'null' WHERE `id` = 1");
	$depositc = get_data_db($connect, "base", "deposit", "id", 1);
	$gdeposit = get_data_db($connect, "base", "deposit", "id", 2);
	$mdeposit = get_data_db($connect, "base", "deposit", "id", 3);
	$pdeposit = get_data_db($connect, "base", "deposit", "id", 4);
	$ndeposit = $depositc + $gdeposit;

	$persb = get_data_db($connect, "personals", "balance", "id", $uid);
	$a = $depositc/100;
	$b = $a*5;

	$nbp = $persb+$b;
	mysqli_query($connect, "UPDATE `personals` SET `balance` = '$nbp' WHERE `id` = $uid");

	mysqli_query($connect, "UPDATE `base` SET `deposit` = '0' WHERE `id` = 1");
	mysqli_query($connect, "UPDATE `base` SET `deposit` = '0' WHERE `id` = 3");
	mysqli_query($connect, "UPDATE `base` SET `deposit` = '0' WHERE `id` = 4");
	mysqli_query($connect, "UPDATE `base` SET `deposit` = '$ndeposit' WHERE `id` = 2");

	mysqli_query($connect, "INSERT INTO `sessions`(`id`, `date`, `personal`, `total`, `income`, `plus`, `minus`) VALUES (NULL,'$today','$uid','$depositc','$b','$pdeposit','$mdeposit')");

	header("Location: ../profile.php");
}
if ($mod == "consum") {
	$title = $_GET['title'];
	$sum = $_GET['sum'];
	$coment = $_GET['coment'];

	$gdeposit = get_data_db($connect, "base", "deposit", "id", 2);
	$ndeposit = $gdeposit-$sum;

	mysqli_query($connect, "UPDATE `base` SET `deposit` = '$ndeposit' WHERE `id` = 2");
	mysqli_query($connect, "INSERT INTO `depop`(`id`, `sum`, `date`, `title`, `comment`, `personal`, `type`) VALUES (NULL,'$sum','$today','$title','$coment',$uid, 'minus')");
	$_SESSION['msg'] = '<script type="text/javascript">alert("Расход записан!");</script>';
	header("Location: ../profile.php");

}
if ($mod == "addba") {
	$title = $_GET['title'];
	$sum = $_GET['sum'];
	$coment = $_GET['coment'];

	$gdeposit = get_data_db($connect, "base", "deposit", "id", 2);

	$ndeposit = $gdeposit+$sum;

	mysqli_query($connect, "UPDATE `base` SET `deposit` = '$ndeposit' WHERE `id` = 2");

	mysqli_query($connect, "INSERT INTO `depop`(`id`, `sum`, `date`, `title`, `comment`, `personal`, `type`) VALUES (NULL,'$sum','$today','$title','$coment',$uid, 'plus')");
	$_SESSION['msg'] = '<script type="text/javascript">alert("Приход записан!");</script>';
	header("Location: ../profile.php");
}	

 ?>