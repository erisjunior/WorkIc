<?php

	require("../conexao.php");

    $date = $_POST['data'];
	$origem = $_POST['origem'];
	$valor = $_POST['valor'];

	$d1 = substr($date, -4);
	$d2 = substr($date, -7,2);
	$d3 = substr($date, -10,2);

	$date = $d1."-".$d2."-".$d3;

	if ($_GET['edita']) {
		$sql = "UPDATE caixa SET data='$date',valor='$valor',origem='$origem' WHERE id='".$_GET['edita']."'";
		$query = mysqli_query($con,$sql);
	}else{
		$sql = "INSERT INTO caixa (data,valor,origem) VALUES ('$date','$valor','$origem')";
		$query = mysqli_query($con,$sql);
	}

	header("location:/index.php?p=caixa");

?>