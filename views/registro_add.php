<?php

	require("../conexao.php");

    $nomee = $_POST['nome'];
	$gestao = $_POST['gestao'];
	$registros = $_POST['registros'];
	
	$novoNome= "";
	if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {

	    $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
	    $nome = $_FILES[ 'arquivo' ][ 'name' ];
	    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

	    $extensao = strtolower ( $extensao );
        $novoNome = $nomee.'.'.$extensao;
        $destino = '../registros/'.$novoNome;

        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {}
	}

	$sql = "INSERT INTO registros (nome,gestao,tipo) VALUES ('$novoNome','$gestao','$registros')";
	$query = mysqli_query($con,$sql);

	header("location:/index.php?p=registros");

?>