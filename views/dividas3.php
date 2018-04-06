<?php

	require("../conexao.php");
	
	if($_GET['apaga']){
	    $a = $_GET['apaga'];
	    $sql = "DELETE FROM dividas WHERE id=".$a;
		$query = mysqli_query($con,$sql);
	}else if($_GET){
    	if ($_GET['deve']) {
    	    $sql = "SELECT * FROM associados WHERE id = ".$_GET['deve']."";
    	}else if ($_GET['paga']) {
    	    $sql = "SELECT * FROM associados WHERE id = ".$_GET['paga']."";
    	}
            $query = mysqli_query($con,$sql);
            
            $dados = mysqli_fetch_assoc($query);
            
            $mensalidades = $dados['mensalidades'];
            
            $array = str_split($mensalidades);
            
        if ($_GET['deve']) {
    	    $array[$_GET['mes']] = "0";
    	}else if ($_GET['paga']) {
    	    $array[$_GET['mes']] = "1";
    	}
            
            $mensalidades="";
            for ($u=0; $u <12; $u++) {
            	$mensalidades .= $array[$u];
            }
        if ($_GET['deve']) {
    		$sql = "UPDATE associados SET mensalidades='$mensalidades' WHERE id='".$_GET['deve']."'";
        }else if ($_GET['paga']) {
            $sql = "UPDATE associados SET mensalidades='$mensalidades' WHERE id='".$_GET['paga']."'";
        }
    		$query = mysqli_query($con,$sql);
    }else{
        $sql = "INSERT INTO dividas (idP,valor,origem) VALUES ('".$_POST['idP']."','".$_POST['valor']."','".$_POST['origem']."')";
		$query = mysqli_query($con,$sql);
    }
    header("location:/index.php?p=dividas");
?>