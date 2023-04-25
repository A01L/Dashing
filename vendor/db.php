<?php
date_default_timezone_set('Asia/Almaty');
	$connect = mysqli_connect('localhost', 'root', '', 'modebyru_d4e');
	mysqli_set_charset($connect, 'utf8');
	$db = $connect;

	if (!$connect) {
		die('Error connect to Data base!');
	}

?>