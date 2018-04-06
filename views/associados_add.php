<?php

	require("../conexao.php");

	$acao="add";

	if (isset($_GET['acao'])) {
		$acao = $_GET['acao'];
	}

	if ($acao == "add") {
		$login = $_POST['login'];
		$nom = $_POST['nome'];
		$senhaa = $_POST['senha'];
		$cargo = $_POST['cargo'];
		$data_nasc = $_POST['data'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		$endereco = $_POST['endereco'];
		$data_adm = $_POST['data_adm'];
		$nome_mae = $_POST['nomeMae'];
		$telefone_mae = $_POST['telefoneMae'];
		$data_mae = $_POST['dataMae'];
		$nome_pai = $_POST['nomePai'];
		$telefone_pai = $_POST['telefonePai'];
		$data_pai = $_POST['dataPai'];

		$exassociado = "n";

		if (isset($_POST['exassociado'])){
			$exassociado = "s";
		}

		$senha = md5(base64_encode($senhaa));

		$boolean = True;

		$sql = "SELECT * FROM associados";
		$query = mysqli_query($con,$sql);

		while ($dados = mysqli_fetch_assoc($query)) {
			if ($dados['nome'] == $nome) {
				$boolean = False;
			}
			else if($dados['login'] == $login) {
				$boolean = False;
			}


		}


		if ($boolean == True) {
		    $novoNome = "";
			if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {

			    $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
			    $nome = $_FILES[ 'arquivo' ][ 'name' ];
			    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

			    $extensao = strtolower ( $extensao );
			    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
			        $novoNome = md5(uniqid(time())).'.'.$extensao;
			        $destino = '../profile/'.$novoNome;

			        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {}
			    }
			}

			$sqll = "INSERT INTO associados (nome,login,senha,cargo,email,dataNasc,telefone,endereco,ex,dataAdm,nomeMae,telefoneMae,dataMae,nomePai,telefonePai,dataPai,mensalidades,perfil) VALUES ('$nom','$login','$senha','$cargo','$email','$data_nasc','$telefone','$endereco','$exassociado','$data_adm','$nome_mae','$telefone_mae','$data_mae','$nome_pai','$telefone_pai','$data_pai','000000000000','$novoNome')";
			$queryy = mysqli_query($con,$sqll);
		}
	}else if($acao == "exassociar"){
		$sql = "UPDATE associados SET ex = 's' WHERE id ='".$_GET['id']."'";
		$query = mysqli_query($con,$sql);
	}else if($acao == "associar"){
		$sql = "UPDATE associados SET ex = 'n' WHERE id ='".$_GET['id']."'";
		$query = mysqli_query($con,$sql);
	}
	header("location:/index.php?p=associados");
?>