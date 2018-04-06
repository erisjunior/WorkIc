<?php
	define("HOST", "mysql.hostinger.com.br");
	define("USER", "u277696104_work");
	define("PASS", "distrito4500");
	define("DB", "u277696104_work");
	header('Content-Type: text/html; charset=utf-8');
	$con = mysqli_connect(HOST,USER,PASS);
	$banco = mysqli_select_db($con, DB);
?>