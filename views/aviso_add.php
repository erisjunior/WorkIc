<?php

	require("../conexao.php");

	$login = $_POST['aviso'];

	$sqll = "INSERT INTO avisos (aviso) VALUES ('$login')";
	$queryy = mysqli_query($con,$sqll);

	header("location:/index.php?p=perfil");
?>