<?php 
session_start();
date_default_timezone_set('Asia/Almaty');
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

if ($mod == "add_cat_prod") {
	$name = $_POST['name'];
	$today = date("Y-m-d H:i:s"); 
	mysqli_query($connect, "INSERT INTO `cat_product`(`id`, `name`) VALUES (NULL,'$name')");
	mysqli_query($connect, "INSERT INTO `history`(`id`, `personal`, `date`, `operation`, `type`) VALUES (NULL,'$uid','$today','$name','Add category')");
	header("Location: ../pages/ecommerce/products.php");
}
if ($mod == "add_prod") {
	$name = $_POST['name'];
	$cat = $_POST['cat'];
	$buy = $_POST['buy'];
	$price = $_POST['price'];
	$today = date("Y-m-d H:i:s"); 
	mysqli_query($connect, "INSERT INTO `products`(`id`, `name`, `sum`, `price`, `cat`, `buy`) VALUES (NULL,'$name', 0,'$price','$cat', '$buy')");
	mysqli_query($connect, "INSERT INTO `history`(`id`, `personal`, `date`, `operation`, `type`) VALUES (NULL,'$uid','$today','$name','Add product')");
	header("Location: ../pages/ecommerce/products.php");
}
if ($mod == "update_prod") {
	$name = $_POST['name'];
	$sum = $_POST['sum'];
	$buy = $_POST['buy'];
	$price = $_POST['price'];
	$pid = $_POST['pid'];
	$today = date("Y-m-d H:i:s"); 

	$oldsum = get_data_db($connect, "products", "sum", "id", $pid);
	$oldprice = get_data_db($connect, "products", "price", "id", $pid);
	$oldname = get_data_db($connect, "products", "name", "id", $pid);


	mysqli_query($connect, "UPDATE `products` SET `name` = '$name', `sum` = '$sum', `price` = '$price', `buy` = '$buy' WHERE `products`.`id` = $pid");


	mysqli_query($connect, "INSERT INTO `history`(`id`, `personal`, `date`, `operation`, `type`) VALUES (NULL,'$uid','$today','$oldname,$oldsum,$oldprice ==> $name,$sum,$price','Update product')");

	header("Location: ../pages/ecommerce/products.php");
}
if ($_GET['mod'] == "del_prod") {
	$pid = $_GET['pid'];
	$today = date("Y-m-d H:i:s"); 
	$name = get_data_db($connect, "products", "name", "id", $pid);
	mysqli_query($connect, "DELETE FROM `products` WHERE `products`.`id` = $pid");
	mysqli_query($connect, "INSERT INTO `history`(`id`, `personal`, `date`, `operation`, `type`) VALUES (NULL,'$uid','$today','$name','Delete product')");
	header("Location: ../pages/ecommerce/products.php");
}
if ($mod == "buyp") {
	$name = $_POST['name'];
	$sum = $_POST['sum'];
	$sump = $_POST['sump'];
	$buy = $_POST['buy'];
	$pid = $_POST['pid'];
	$today = date("Y-m-d H:i:s"); 

	$rsum = get_data_db($connect, "products", "sum", "id", $pid);
	$nsum = $rsum+$sum+$sump;
	$totals = $sum*$buy;
	$gdeposit = get_data_db($connect, "base", "deposit", "id", 2);
	$ndeposit = $gdeposit-$totals;

	mysqli_query($connect, "UPDATE `products` SET `sum` = '$nsum', `buy` = '$buy' WHERE `products`.`id` = $pid");
	mysqli_query($connect, "UPDATE `base` SET `deposit` = '$ndeposit' WHERE `id` = 2");
	mysqli_query($connect, "INSERT INTO `depop`(`id`, `sum`, `date`, `title`, `comment`, `personal`, `type`) VALUES (NULL,'$totals','$today','Закуп','Закуп $name $sum шт',$uid, 'minus')");

	mysqli_query($connect, "INSERT INTO `history`(`id`, `personal`, `date`, `operation`, `type`) VALUES (NULL,'$uid','$today','$name,$sum,$price','Update product')");
	$_SESSION['msg'] = '<script type="text/javascript">alert("Закуп успешно совершен!");</script>';
	header("Location: ../pages/ecommerce/buy.php");
}
if ($mod == "updp_a") {
	$ava = $_POST['ava'];

	$email = $_POST['email'];
	$number = $_POST['number'];

	$sumb = $_POST['sum_bonus'];
	$comb = $_POST['com_bonus'];

	$summ = $_POST['sum_minus'];
	$comm = $_POST['com_minus'];

	$pid = $_POST['pid'];

	mysqli_query($connect, "UPDATE `personals` SET `number` = '$number', `email` = '$email' WHERE `personals`.`id` = $pid");

	if ($sumb != "") {
		$prb = get_data_db($connect, "personals", "balance", "id", $pid);
		$nb = $prb+$sumb;

		mysqli_query($connect, "UPDATE `personals` SET `balance` = '$nb' WHERE `personals`.`id` = $pid");
	}
	else{
		$true = 0;
	}

	if ($summ != "") {
		$prb = get_data_db($connect, "personals", "balance", "id", $pid);
		$nb = $prb-$summ;

		mysqli_query($connect, "UPDATE `personals` SET `balance` = '$nb' WHERE `personals`.`id` = $pid");
	}
	else{
		$true = 0;
	}

	header("Location: ../pages/apps/contact/plist_a.php");
}
if ($mod == "getav") {
	$sum = $_POST['sum'];
	$com = $_POST['comment'];

	$prb = get_data_db($connect, "personals", "balance", "id", $uid);
	$name = get_data_db($connect, "personals", "name", "id", $uid);
	$nb = $prb-$sum;

	mysqli_query($connect, "UPDATE `personals` SET `balance` = '$nb' WHERE `personals`.`id` = $uid");

	mysqli_query($connect, "INSERT INTO `depop`(`id`, `sum`, `date`, `title`, `comment`, `personal`, `type`) VALUES (NULL,'$sum','$today','Аванс $name','$com',$uid, 'minus')");

	header("Location: ../index.php");

}
if ($mod == "addcontact") {
	$title = $_POST['title'];
	$category = $_POST['cat'];
	$email = $_POST['email'];
	$number = $_POST['num'];
	$color = $_POST['color'];

	mysqli_query($connect, "INSERT INTO `contacts`(`id`, `title`, `category`, `color`, `email`, `number`) VALUES (NULL,'$title','$category','$color','$email','$number')");

	header("Location: ../pages/apps/contact/contact-grid.php");

}
if ($mod == "delcont") {
	$cid = $_GET['id'];

	mysqli_query($connect, "DELETE FROM `contacts` WHERE `id` = $cid");

	header("Location: ../pages/apps/contact/contact-grid.php");

}
if ($mod == "delnote") {
	$cid = $_GET['id'];

	mysqli_query($connect, "DELETE FROM `notes` WHERE `id` = $cid");

	header("Location: ../pages/apps/contact/notes.php");

}
if ($mod == "arhnote") {
	$cid = $_GET['id'];

	mysqli_query($connect, "UPDATE `notes` SET `mod` = '0' WHERE `id` = $cid");

	header("Location: ../pages/apps/contact/notes.php");

}
if ($mod == "uarhnote") {
	$cid = $_GET['id'];

	mysqli_query($connect, "UPDATE `notes` SET `mod` = '1' WHERE `id` = $cid");

	header("Location: ../pages/apps/contact/arhnotes.php");

}
if ($mod == "addnote") {
	$title = $_POST['title'];
	$data = $_POST['data'];
	$color = $_POST['color'];
	$today = date("Y-m-d H:i"); 
	mysqli_query($connect, "INSERT INTO `notes`(`id`, `title`, `date`, `color`, `mod`, `data`) VALUES (NULL,'$title','$today','$color','1','$data')");

	header("Location: ../pages/apps/contact/notes.php");

}
if ($mod == "updnote") {
	$data = $_POST['data'];
	$id = $_POST['idn'];
	$today = date("Y-m-d H:i"); 
	mysqli_query($connect, "UPDATE `notes` SET `date` = '$today', `data` = '$data' WHERE `id` = $id");

	header("Location: ../pages/apps/contact/notes.php");

}
if ($mod == "rentsi") {
	$id = $_POST['idro'];
	$sum = $_POST['sum'];
	$cb = $_POST['ops'];
	$time = $_POST['time'];
	$times = date("Y-m-d H:i");

	if ($cb == "on") {
		$type = "limitless";
		$timee = "0";
	}
	else{
	$timee = date_create($times);
	$hour = (int)replace_simbols(0, "$time", 3);
	$minute = (int)replace_simbols(3, "$time", 0);
	$time = ($hour*60)+$minute;
	date_modify($timee, "$time minute");
	$timee = date_format($timee, 'Y-m-d H:i');
	$type = "limit";

	mysqli_query($connect, "INSERT INTO `depop`(`id`, `sum`, `date`, `title`, `comment`, `personal`, `type`) VALUES (NULL,'$sum','$times','PS5','PS $hour час, $minute минут ',$uid, 'plus')");
	$gdeposit = get_data_db($connect, "base", "deposit", "id", 2);
	$ndeposit = $gdeposit + $sum;
	mysqli_query($connect, "UPDATE `base` SET `deposit` = '$ndeposit' WHERE `id` = 2");

	}

	mysqli_query($connect, "UPDATE `rents` SET `stime` = '$times', `etime` = '$timee', `sum` = '$sum', `type` = '$type', `stat` = '1' WHERE `rents`.`id` = $id");

	header("Location: ../pages/ecommerce/club.php");
}
if ($mod == "rsc") {
	$id = $_POST['idro'];

	mysqli_query($connect, "UPDATE `rents` SET `stime` = '0', `etime` = '0', `sum` = '0', `type` = 'null', `stat` = '0' WHERE `rents`.`id` = $id");

	header("Location: ../pages/ecommerce/club.php");
}
if ($mod == "addtr") {
	$id = $_POST['idro'];
	$sum = $_POST['sum'];
	$time = $_POST['time'];
	$hour = (int)replace_simbols(0, "$time", 3);
	$minute = (int)replace_simbols(3, "$time", 0);
	$time = ($hour*60)+$minute;
	$etime = get_data_db($connect, "rents", "etime", "id", $id);
	$etime = date_create($etime);
	$time = ($hour*60)+$minute;
	date_modify($etime, "+$time minute");
	$etime = date_format($etime, 'Y-m-d H:i');

	mysqli_query($connect, "INSERT INTO `depop`(`id`, `sum`, `date`, `title`, `comment`, `personal`, `type`) VALUES (NULL,'$sum','$today','PS5','PS $time минут ',$uid, 'plus')");

	mysqli_query($connect, "UPDATE `rents` SET `etime` = '$etime', `sum` = '$sum', `type` = 'limit', `stat` = '1' WHERE `rents`.`id` = $id");

	$gdeposit = get_data_db($connect, "base", "deposit", "id", 2);
	$ndeposit = $gdeposit + $sum;
	mysqli_query($connect, "UPDATE `base` SET `deposit` = '$ndeposit' WHERE `id` = 2");

	header("Location: ../pages/ecommerce/club.php");
}
if ($mod == "dc-addb") {
	$id = $_POST['id'];
	$sum = $_POST['sum'];
	$bonus = $_POST['bonus'];
	$date = date("Y-m-d H:i");
	$login = get_data_db($connect, "clients", "login", "id", $id);

	mysqli_query($connect, "INSERT INTO `dc_hist`(`id`, `date`, `user`, `type`, `sum`, `from`) VALUES (NULL,'$date','$id','plus','$sum','PlayStation 5')");

	$gdeposit = get_data_db($connect, "clients", "ballance", "id", $id);
	$ndeposit = $gdeposit + $sum;
	mysqli_query($connect, "UPDATE `clients` SET `ballance` = '$ndeposit' WHERE `id` = $id");

	if ($bonus > 0) {
		$gdeposit = get_data_db($connect, "clients", "ballance", "id", $id);
		$ndeposit = $gdeposit + $bonus;
		mysqli_query($connect, "UPDATE `clients` SET `ballance` = '$ndeposit' WHERE `id` = $id");
		mysqli_query($connect, "INSERT INTO `dc_hist`(`id`, `date`, `user`, `type`, `sum`, `from`) VALUES (NULL,'$date','$id','plus','$bonus','PlayStation 5 (+Бонус)')");
	}

	mysqli_query($connect, "INSERT INTO `depop`(`id`, `sum`, `date`, `title`, `comment`, `personal`, `type`) VALUES (NULL,'$sum','$today','DClient','Пополнение акаунта $login',$uid, 'plus')");
	$gdeposit = get_data_db($connect, "base", "deposit", "id", 2);
	$ndeposit = $gdeposit + $sum;
	mysqli_query($connect, "UPDATE `base` SET `deposit` = '$ndeposit' WHERE `id` = 2");
	header("Location: ../pages/ecommerce/dclient.php");
}
if ($mod == "rscl") {
	$id = $_POST['idro'];
	$etime = date("Y-m-d H:i");
	$stime = get_data_db($connect, "rents", "stime", "id", $id);
	$sum = get_data_db($connect, "rents", "sum", "id", $id);
	$diff = strtotime($etime) - strtotime($stime);
	$second = abs($diff);
	$time = round($second/60);
	echo $time;
	if ($id == "3") {
		$sum = 40;
	}
	else {
		$sum = 20;
	}
	$total = $sum*$time;

	mysqli_query($connect, "INSERT INTO `depop`(`id`, `sum`, `date`, `title`, `comment`, `personal`, `type`) VALUES (NULL,'$total','$etime','PS5','PS $time минут ',$uid, 'plus')");
	mysqli_query($connect, "UPDATE `rents` SET `stime` = '0', `etime` = '0', `sum` = '0', `type` = 'null', `stat` = '0' WHERE `rents`.`id` = $id");
	$gdeposit = get_data_db($connect, "base", "deposit", "id", 2);
	$ndeposit = $gdeposit + $total;
	mysqli_query($connect, "UPDATE `base` SET `deposit` = '$ndeposit' WHERE `id` = 2");
	header("Location: ../pages/ecommerce/clubca.php?t=$time&s=$total&i=$id");
}
 ?>