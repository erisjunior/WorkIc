<body>

	<div class="row">
		<div class="col m3 center-align">
			<img class="responsive-img hide-on-small-only" src="img/entrada.gif"><br>
			<img class="responsive-img hide-on-small-only" src="img/entrada.gif">
		</div>
		<div class="col s12 m6 center-align">
			<h1 style="font-size: 40px;"><span class="light-blue-t">R$</span><span style="font-size: 85px;">

			<?php
				require('../conexao.php');

				$result = 0;

				$sql = "SELECT * FROM caixa";
				$query = mysqli_query($con, $sql);

				while ($dados =  mysqli_fetch_assoc($query)) {
					$result = $dados['valor'] + $result;
				}
				echo number_format($result, 2, '.', ' ')."</span> ";
				if ($result < 300) {
					echo " <img class='responsive-img' style='width: 10%;' src='img/danger.png'>";
				}
			?>
			</h1>
		</div>

		<div class="col m3 center-align">
			<img class="responsive-img hide-on-small-only" src="img/entrada.gif"><br>
			<img class="responsive-img hide-on-small-only" src="img/entrada.gif">
		</div>
	</div>
	<div class="divider"></div>

	<?php
		session_start();
		if ($_SESSION['cargo'] == "Presidente" || $_SESSION['cargo'] == "Tesoureiro") {
			echo "
			<br><h5>Adicionar Transação</h5>
			<form method='post' action='views/caixa_add.php'>
				<div class='row'>
					<div class='col s3 m2 input-field'>
						<input id='data' name='data' class='data' type='text'>
						<label for='data'>Data</label>
					</div>
					<div class='col s3 m2 input-field'>
						<input id='valor' name='valor' class='dinheiro' type='text'>
						<label for='valor'>Valor</label>
					</div>
					<div class='col s6 m6 input-field'>
					    <input name='id' type='text' class='hide'>
						<input id='origem' name='origem' type='text'>
						<label for='origem'>Origem</label>
					</div>
					<div class='col s2 offset-s4 m2 input-field'>
						<input type='submit' id='envia' class='btn waves-effect waves-light light-blue accent-3' value='ADICIONAR'>
					</div>
				</div>
			</form><br>";
			
			if(isset($_GET['edita'])){
    	        
                $sql = "SELECT * FROM caixa WHERE id = ".$_GET['edita'];
            	$query = mysqli_query($con, $sql);
            
            	$dados =  mysqli_fetch_assoc($query);
            	
            	$date = $dados['data'];
            
            	$d1 = substr($date, -2);
            	$d2 = substr($date, -5,2);
            	$d3 = substr($date, -10,4);
            
            	$data = $d1."/".$d2."/".$d3;
            
                echo "<div class='divider'></div>";
                
            	echo "
            	<br><h5>Editar Transação</h5>
            	<form method='post' action='views/caixa_add.php?edita=".$dados['id']."'>
            		<div class='row'>
            			<div class='col s3 m2 input-field'>
            				<input id='data' value='".$data."' name='data' class='data' type='text'>
            				<label class='active' for='data'>Data</label>
            			</div>
            			<div class='col s3 m2 input-field'>
            				<input id='valor' value='".number_format($dados['valor'], 2, '.', ' ')."' name='valor' class='dinheiro' type='text'>
            				<label class='active' for='valor'>Valor</label>
            			</div>
            			<div class='col s6 m6 input-field'>
            				<input id='origem' value='".$dados['origem']."' name='origem' type='text'>
            				<label class='active' for='origem'>Origem</label>
            			</div>
            			<div class='col s2 offset-s4 m2 input-field'>
            				<input type='submit' id='envia' class='btn waves-effect waves-light light-blue accent-3' value='EDITAR'>
            			</div>
            		</div>
            	</form><br>";
            }
		}
	?>

	<div class="divider"></div>

	<div class="row">
		<div class="col s12 center-align">
			<table class="responsive-table highlight bordered">
				<thead>
					<th width="15%">Data</th>
					<th width="15%">Valor</th>
					<th width="40%">Origem</th>
					<th width="15%">I/O</th>
					<?php
						if ($_SESSION['cargo'] == "Presidente" || $_SESSION['cargo'] == "Diretor de Tesouraria") {
							echo "<th width='15%' colspan='2'>Açôes</th>";
						}
					?>
				</thead>
				<tbody>
					<?php

						$sql = "SELECT * FROM caixa ORDER BY data DESC";
						$query = mysqli_query($con, $sql);

						while ($dados =  mysqli_fetch_assoc($query)) {

							$date = $dados['data'];

							$d1 = substr($date, -2);
							$d2 = substr($date, -5,2);
							$d3 = substr($date, -10,4);

							$data = $d1."/".$d2."/".$d3;

							echo "<tr><td>".$data."</td>
								<td>".number_format($dados['valor'], 2, '.', ' ')."</td>
								<td>".$dados['origem']."</td>";
								if ($dados['valor'] > 0) {
									echo "<td class='green-text' style='font-weight:bold'>IN</td>";
								}else{
									echo "<td class='red-text' style='font-weight:bold'>OUT</td>";
								}

							if ($_SESSION['cargo'] == "Presidente" || $_SESSION['cargo'] == "Tesoureiro") {
								echo "<td>
									<a class='btn waves-effect waves-light light-blue accent-3' href='views/caixa_remove.php?exclui=".$dados['id']."'>Excluir</a></td>
									<td><a class='btn waves-effect waves-light light-blue accent-3' href='index.php?p=caixa&edita=".$dados['id']."'>Editar</a></td>";
							}


							echo "</tr>";
						}

					?>
				</tbody>

			</table>

		</div>
	</div>

	<script type="text/javascript">
		$('.datepicker').pickadate({
		    selectMonths: true,
		    selectYears: 15,
		    today: 'Hoje',
		    clear: 'Limpar',
		    close: 'Ok',
		    closeOnSelect: false
		});
		
		$(document).ready(function(){
		    $('.data').mask('99/99/9999');
		    $("input.dinheiro").maskMoney({allowNegative:true, decimal:".", thousands:""});
		});
	</script>

</body>
</html>