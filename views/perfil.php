<head>
	<style type="text/css" media="screen">
		#perfil b{
			color: #00b0ff;
		}

		#qAvisos{
			background:url("img/verde.jpg");
		    border:3px solid rgb(153, 102, 51);
			padding: 10px;
			width: 100%;
			margin-top:10px;
		}
	</style>
</head>
<body>
	<?php
		session_start();
		require('../conexao.php');

		$sql = "SELECT * FROM associados WHERE login='".$_SESSION['login']."'";
        $query = mysqli_query($con, $sql);

        $dados =  mysqli_fetch_assoc($query);

		echo "
		<div class='row hide-on-large-only'>
		    <div class='col s12 center-align'>
			    <img src='profile/".$dados['perfil']."' class='circle responsive-img z-depth-2' style='width: 200px;height:200px'>
			</div>
		</div>
		<div class='row valign-wrapper' id='perfil'>
			<div class='col m12 l8'>
				<div class='row'>
					<div class='col s12'><p class='light-blue-t flow-text' style='font-size:24px;font-weight:bold'>".$dados['nome']."</p></div>
				</div>
				<div class='row'>
					<div class='col m4 s12'><b>Cargo:</b><div class='hide-on-small-only'></div> ".$dados['cargo']."</div>
					<div class='col m4 s12'><b>Data de Admissão:</b><div class='hide-on-small-only'></div> ".$dados['dataAdm']."</div>
					<div class='col m4 s12'><b>Email:</b><div class='hide-on-small-only'></div> ".$dados['email']."</div>
				</div>
				<div class='row'>
					<div class='col m4 s12'><b>Endereço:</b><div class='hide-on-small-only'></div> ".$dados['endereco']."</div>
					<div class='col m4 s12'><b>Telefone:</b><div class='hide-on-small-only'></div> ".$dados['telefone']."</div>
					<div class='col m4 s12'><b>Data Nascimento:</b><div class='hide-on-small-only'></div> ".$dados['dataNasc']."</div>
				</div>
				<div class='row'>
					<div class='col m4 s12'><b>Nome da Mãe:</b><div class='hide-on-small-only'></div> ".$dados['nomeMae']."</div>
					<div class='col m4 s12'><b>Telefone da Mãe:</b><div class='hide-on-small-only'></div> ".$dados['telefoneMae']."</div>
					<div class='col m4 s12'><b>Data Nascimento da Mãe:</b><div class='hide-on-small-only'></div> ".$dados['dataMae']."</div>
				</div>
				<div class='row'>
					<div class='col m4 s12'><b>Nome do Pai:</b><div class='hide-on-small-only'></div> ".$dados['nomePai']."</div>
					<div class='col m4 s12'><b>Telefone do Pai:</b><div class='hide-on-small-only'></div> ".$dados['telefonePai']."</div>
					<div class='col m4 s12'><b>Data Nascimento do Pai:</b><div class='hide-on-small-only'></div> ".$dados['dataPai']."</div>
				</div>
			</div>
			<div class='col l3 center-align hide-on-med-and-down'>
			    <img src='profile/".$dados['perfil']."' class='circle responsive-img z-depth-2' style='width: 200px;height:200px'>
			</div>
		</div>";

		$mes = array("Julho","Agosto","Setembro","Outubro","Novembro","Dezembro","Janeiro","Fevereiro","Março","Abril","Maio","Junho");

        echo "
        	<div class='divider'></div><br>
			<div class='row'>
				<div class='col s12 m4' style='margin-top:10px'>";?>
					<a class='btn waves-effect waves-light light-blue accent-3' href='javascript:void(0)' onclick="$('#mensalidades').slideToggle(1);">MENSALIDADES</a>
		<?php
		echo "
					<br>
					<table class='responsive-table highlight bordered' id='mensalidades'>
						<thead>
							<th width='50%'>Mês</th>
							<th width='50%'>Situação</th>
						</thead>
						<tbody>";

		$sql = "SELECT * FROM associados WHERE login='".$_SESSION['login']."'";
		$query = mysqli_query($con,$sql);

		$dados = mysqli_fetch_assoc($query);

		$men = str_split($dados['mensalidades']);

		for ($i=0; $i < 12; $i++) {
			echo "<tr>
				<td>".$mes[$i]."</td>";

			$val = intval(date('m'))+6;
			if($val > 12){
			    $val = $val -12;
			}

			if($men[$i]=="0" && ($i+1) > $val){
				echo "<td class='orange-text' style='font-weight:bold'>Devendo</td>";
			}else if($men[$i]=="0" && ($i+1) <= $val){
				echo "<td class='red-text' style='font-weight:bold'>ATRASADO</td>";
			}else if($men[$i]=="1"){
				echo "<td class='green-text' style='font-weight:bold'>Pago</td>";
			}
			echo "</tr>";
		}

		echo "			</tbody>
					</table>
				</div>
				<div class='col s12 m4' style='margin-top:10px'>";?>
					<a class='btn waves-effect waves-light light-blue accent-3' href='javascript:void(0)' onclick="$('#dividas').slideToggle(1);">Dívidas</a></td>
		<?php
		echo"		<table class='responsive-table highlight bordered' id='dividas'>
						<thead>
							<th width='50%'>Divida</th>
							<th width='50%'>Valor</th>
						</thead>
						<tbody>";

		$sql = "SELECT * FROM dividas WHERE idP='".$_SESSION['id']."'";
		$query = mysqli_query($con,$sql);
		if(mysqli_num_rows($query)<1){
			echo "<tr>
				<td colspan=2><center>Você não possui dividas<br>Parabéns e Obrigado</center></td>
			</tr>";
		}

		while($dados = mysqli_fetch_assoc($query)){
			echo "<tr>
				<td>".$dados['origem']."</td>
				<td>".number_format($dados['valor'], 2, '.', ' ')."</td>
			</tr>";
		}


		echo "			</tbody>
					</table>
				</div>
				<div class='col s12 m4'>
					<div id='qAvisos' class='z-depth-2 left-align'>
						<h6 class='white-text'><b>Avisos: </b></h6><br>";

		$sql = "SELECT * FROM avisos";
        $query = mysqli_query($con, $sql);

        while($dados =  mysqli_fetch_assoc($query)){
					echo "<p class='white-text'> - ".$dados['aviso']." ";
						if ($_SESSION['cargo'] == "Presidente" || $_SESSION['cargo'] == "Tesoureiro" || $_SESSION['cargo'] == "Secretário" || $_SESSION['cargo'] == "Diretor de Administração" || $_SESSION['cargo'] == "Diretor de Projetos Humanitários") {
								echo "<a href='views/aviso_remove.php?exclui=".$dados['id']." style='color=white'>X</a>";
						}
					echo "</p><br>";
		}
		if ($_SESSION['cargo'] == "Presidente" || $_SESSION['cargo'] == "Tesoureiro" || $_SESSION['cargo'] == "Secretário" || $_SESSION['cargo'] == "Diretor de Administração" || $_SESSION['cargo'] == "Diretor de Projetos Humanitários") {
			echo "		<form action='views/aviso_add.php' method='post'>
			                <div class='input-field'>
			                    <input name='aviso' type='text' class='white-text'>
			                </div>
			                <div class='input-field center-align'>
			                    <input type='submit' class='btn waves-effect waves-light white black-text' value='ENVIAR'>
			                </div>
			            </form>";
		}
		echo "		</div>
				</div>
			</div>";
	?>
	<script type="text/javascript">
		$('#mensalidades').hide();
		$('#dividas').hide();
	</script>
</body>