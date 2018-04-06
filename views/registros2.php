<?php
    require("../conexao.php");
    
    $a = "";
    
    if(isset($_GET['gestao']) && $_GET['gestao']!=""){
        if($a != ""){
            $a .=" AND";
        }else{
            $a .=" WHERE";
        }
        $gestao = $_GET['gestao'];
        $a .= " gestao = '".$_GET['gestao']."'";
    }
    if(isset($_GET['registros']) && $_GET['registros']!=""){
        if($a != ""){
            $a .=" AND";
        }else{
            $a .=" WHERE";
        }
        $registros = $_GET['registros'];
        $a .= " tipo = '".$_GET['registros']."'";
    }
    
    session_start();
	if ($_SESSION['cargo'] == "Presidente" || $_SESSION['cargo'] == "Secretário" || $_SESSION['cargo'] == "Diretor de Administração") {
		echo "
		<br><h5>Adicionar Registro</h5>
		<form method='post' enctype='multipart/form-data' action='views/registro_add.php'>
			<div class='row'>
				<div class='col m2 s12 input-field'>
					<input id='nome' name='nome' type='text'>
					<label for='nome'>Nome</label>
				</div>
				<div class='col m3 s12 input-field'>
    				<select id='gestao' name='gestao' class='icons'>
            	        <option value='' disabled selected>Escolha a Gestão</option>
            	        <option value='G.17.18' data-icon='img/Logo.png' class='left circle'>Gestão 17-18</option>
            	        <option value='G.16.17' data-icon='img/1617.png' class='left circle'>Gestão 16-17</option>
            	        <option value='G.15.16' data-icon='img/Gestao1516.png' class='left circle'>Gestão 15-16</option>
            	        <option value='G.14.15' data-icon='img/logoAntiga.jpg' class='left circle'>Gestão 14-15</option>
            	        <option value='G.13.14' data-icon='img/logoAntiga.jpg' class='left circle'>Gestão 13-14</option>
            	    </select>
    		    </div>
    		    <div class='input-field col m3 s12'>
        		    <select id='registros' name='registros'>
        		      	<option disabled selected>Escolha a opção</option>
        			    <option>Projetos</option>
        			    <option>Boletins</option>
        			    <option>Atas</option>
        			    <option>Relatorios</option>
        			    <option>Ofícios</option>
        			    <option>Arquivos</option>
        		    </select>
				</div>
				<div class='col m2 s12 file-field input-field'>
				    <div class='btn light-blue'>
				        <span>Arquivo</span>
				        <input name='arquivo' type='file'>
				    </div>
				</div>
				
				<div class='col m2 s12 input-field valign-wrapper'>
					<input type='submit' id='envia' class='btn waves-effect waves-light light-blue accent-3' value='ADICIONAR'>
				</div>
			</div>
		</form><br>";
	}
    
    $sql = "SELECT * FROM registros".$a." ORDER BY gestao DESC";
    $query = mysqli_query($con,$sql);
    
    echo "<table class='responsive-table highlight bordered' id='dividas'>
			<thead>
				<th width='40%'>Nome</th>
				<th width='20%'>Gestão</th>
				<th width='20%'>Categoria</th>
				<th width='20%'>Download</th>
			</thead>
			<tbody>";

		while($dados = mysqli_fetch_assoc($query)){
			echo "<tr>
				<td>".$dados['nome']."</td>
				<td>".$dados['gestao']."</td>
				<td>".$dados['tipo']."</td>
				<td><a class='btn waves-effect waves-light light-blue accent-3 white-text' href='registros/".$dados['nome']."' target='_blank'><i class='material-icons'>file_download</i></a></td>
			</tr>";
		}


		echo "	</tbody>
			</table>";
?>
<script>$('select').material_select();</script>