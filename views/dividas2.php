<body>
	<?php
		require('../conexao.php');

		$mes = array("Julho","Agosto","Setembro","Outubro","Novembro","Dezembro","Janeiro","Fevereiro","Março","Abril","Maio","Junho");

        echo "
			<div class='row'>
				<div class='col s12 m5' style='margin-top:10px'>";?>
					<a class='btn waves-effect waves-light light-blue accent-3' href='javascript:void(0)' onclick="$('#mensalidades').slideToggle(1);">MENSALIDADES</a>
		<?php
		echo "
					<br>
					<table class='responsive-table highlight bordered' id='mensalidades'>
						<thead>
							<th>Mês</th>
							<th>Situação</th>
							<th>Alterar</th>
						</thead>
						<tbody>";

		$sql = "SELECT * FROM associados WHERE id='".$_GET['associado']."'";
		$query = mysqli_query($con,$sql);

		$dados = mysqli_fetch_assoc($query);
		$idd = $dados['id'];

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
			if($men[$i]=="1"){
			    echo "<td><a class='btn waves-effect waves-light light-blue accent-3' href='views/dividas3.php?deve=".$dados['id']."&mes=".$i."'>Dever";
			}else{
			    echo "<td><a class='btn waves-effect waves-light light-blue accent-3' href='views/dividas3.php?paga=".$dados['id']."&mes=".$i."'>Pagar";
			}
			
			echo "</a></td>
			
			</tr>";
		}

		echo "			</tbody>
					</table>
				</div>
				<div class='col m1'></div>
				<div class='col s12 m5' style='margin-top:10px'>";?>
					<a class='btn waves-effect waves-light light-blue accent-3' href='javascript:void(0)' onclick="$('#dividas').slideToggle(1);">Dívidas</a>
		<?php
		echo"		<div id='dividas'>
		            <table class='responsive-table highlight bordered'>
						<thead>
							<th>Divida</th>
							<th>Valor</th>
							<th>Deletar</th>
						</thead>
						<tbody>";

		$sql = "SELECT * FROM dividas WHERE idP='".$dados['id']."'";
		$query = mysqli_query($con,$sql);
		if(mysqli_num_rows($query)<1){
			echo "<tr>
				<td colspan=3><center>Não possui dividas</center></td>
			</tr>";
		}

		while($dados = mysqli_fetch_assoc($query)){
		    
			echo "<tr>
				<td>".$dados['origem']."</td>
				<td>".number_format($dados['valor'], 2, '.', ' ')."</td>
				<td><a class='btn waves-effect waves-light light-blue accent-3 white-text' href='views/dividas3.php?apaga=".$dados['id']."'>X</a></td>
			</tr>";
		}


        echo "	        </tbody>
					</table>
					<form action='views/dividas3.php' method='post'>
					    <br>
					    <h5>Adicionar Dívida</h5>
                        <div class='input-field'>
		                    <input name='valor' id='valor' type='text'>
		                    <label for='valor'>Valor</label>
		                </div>
		                <div class='input-field'>
		                    <input name='origem' id='origem' type='text'>
		                    <label for='origem'>Origem</label>
		                </div>
		                <div class='input-field'>
		                    <input name='idP' type='hidden' value='".$idd."'>
		                </div>
                        <div class='input-field'>
	                        <input type='submit' class='btn waves-effect waves-light light-blue accent-3 white-text' value='ENVIAR'>
		                </div>
                    </form>
                    </div>
				</div>
			</div>";
	?>
	<div id="prin"></div>
	<script type="text/javascript">
		$('#mensalidades').hide();
		$('#dividas').hide();
		
		$("input#valor").maskMoney({allowNegative:true, decimal:".", thousands:""});
	</script>
</body>