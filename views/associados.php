<head>
	<meta charset="utf-8">
</head>
<body>
	<?php
		if (isset($_GET['alterar'])) {
			echo "<script>alteraPag('#alterar')</script>";
		}
	?>

	<div class="row">
		<div class="col m4 s12 center">
			<a href="javascript:void(0)" class="btn light-blue" onclick="alteraPag('#associados')">Associados</a>
		</div>
		<div class="col m4 s12 center">
			<a href="javascript:void(0)" class="btn light-blue" onclick="alteraPag('#exassociados')">Ex-Associados</a>
		</div>
		<div id="cadastrar" class='col m4 s12 center'>
			<a href="javascript:void(0)" class="btn light-blue" onclick="alteraPag('#cadastro')">Cadastrar</a>
		</div>
		<?php
			session_start();
			if ($_SESSION['cargo'] == "Presidente" || $_SESSION['cargo'] == "Secretário" || $_SESSION['cargo'] == "Diretor de Administração") {
				echo "<script>$('#cadastrar').show();</script>";
			}else{
				echo "<script>$('#cadastrar').hide();</script>";
			}
		?>
	</div>

	<ul id="associados" class="collapsible popout" data-collapsible="accordion">
	    <?php
	    	require('../conexao.php');

	    	$sql = "SELECT * FROM associados WHERE ex='n' ORDER BY nome ASC";
			$query = mysqli_query($con, $sql);

			while ($dados =  mysqli_fetch_assoc($query)) {
				echo "
				<li>
					<div class='collapsible-header valign-wrapper' style='font-weight:bold'>".$dados['nome']."</div>
					<div class='collapsible-body'>
						<div class='row'>
							<div class='col m12 center-align'><b> ".$dados['nome']."</b></div>
						</div><br>
						<div class='row'>
							<div class='col m4 s12'><b>Cargo:</b> ".$dados['cargo']."</div>
							<div class='col m4 s12'><b>Email:</b> ".$dados['email']."</div>
							<div class='col m4 s12'><b>Data de Admissão:</b> ".$dados['dataAdm']."</div>
						</div>
						<div class='row'>
							<div class='col m4 s12'><b>Endereço:</b> ".$dados['endereco']."</div>
							<div class='col m4 s12'><b>Telefone:</b> ".$dados['telefone']."</div>
							<div class='col m4 s12'><b>Data Nascimento:</b> ".$dados['dataNasc']."</div>
						</div>
						<div class='row'>
							<div class='col m4 s12'><b>Nome da Mãe:</b> ".$dados['nomeMae']."</div>
							<div class='col m4 s12'><b>Telefone da Mãe:</b> ".$dados['telefoneMae']."</div>
							<div class='col m4 s12'><b>Data Nascimento da Mãe:</b> ".$dados['dataMae']."</div>
						</div>
						<div class='row'>
							<div class='col m4 s12'><b>Nome do Pai:</b> ".$dados['nomePai']."</div>
							<div class='col m4 s12'><b>Telefone do Pai:</b> ".$dados['telefonePai']."</div>
							<div class='col m4 s12'><b>Data Nascimento do Pai:</b> ".$dados['dataPai']."</div>
						</div>
						<div class='row valign-wrapper hide-on-small-only'>
							<div class='col m4 center-align' style='margin-top:10px'>
							    <a href='views/associados_add.php?acao=exassociar&id=".$dados['id']."' class='btn light-blue'>desligar</a>
							</div>
							<div class='col m4 center-align' style='margin-top:10px'>
							    <img src='profile/".$dados['perfil']."' class='circle responsive-img z-depth-2' style='width: 200px;height:200px'>
							</div>
							<div class='col m4 s12 center-align' style='margin-top:10px'></div>
						</div>
						<div class='row valign-wrapper hide-on-med-and-up'>
							<div class='col s12 center-align' style='margin-top:10px'>
							    <img src='profile/".$dados['perfil']."' class='circle responsive-img z-depth-2' style='width: 200px;height:200px'>
							</div>
						</div>
						<div class='row valign-wrapper hide-on-med-and-up'>
							<div class='col s12 center-align' style='margin-top:10px'>
							    <a href='views/associados_add.php?acao=exassociar&id=".$dados['id']."' class='btn light-blue'>desligar</a>
							</div>
						</div>


					</div>
	    		</li>";
			}
	    ?>
  	</ul>

  	<ul id="exassociados" class="collapsible popout" data-collapsible="accordion">
	    <?php
	    	$sql = "SELECT * FROM associados WHERE ex='s' ORDER BY nome ASC";
			$query = mysqli_query($con, $sql);

			while ($dados =  mysqli_fetch_assoc($query)) {
				echo "
				<li>
					<div class='collapsible-header valign-wrapper' style='font-weight:bold'>".$dados['nome']."</div>
					<div class='collapsible-body'>
						<div class='row'>
							<div class='col m4 s12'><b>Nome:</b> ".$dados['nome']."</div>
							<div class='col m4 s12'><b>Cargo:</b> ".$dados['cargo']."</div>
							<div class='col m4 s12'><b>Email:</b> ".$dados['email']."</div>
						</div>
						<div class='row'>
							<div class='col m4 s12'><b>Endereço:</b> ".$dados['endereco']."</div>
							<div class='col m4 s12'><b>Telefone:</b> ".$dados['telefone']."</div>
							<div class='col m4 s12'><b>Data Nascimento:</b> ".$dados['dataNasc']."</div>
						</div>
						<div class='row'>
							<div class='col m4 s12'><b>Nome da Mãe:</b> ".$dados['nomeMae']."</div>
							<div class='col m4 s12'><b>Telefone da Mãe:</b> ".$dados['telefoneMae']."</div>
							<div class='col m4 s12'><b>Data Nascimento da Mãe:</b> ".$dados['dataMae']."</div>
						</div>
						<div class='row'>
							<div class='col m4 s12'><b>Nome do Pai:</b> ".$dados['nomePai']."</div>
							<div class='col m4 s12'><b>Telefone do Pai:</b> ".$dados['telefonePai']."</div>
							<div class='col m4 s12'><b>Data Nascimento do Pai:</b> ".$dados['dataPai']."</div>
						</div>
						<div class='row valign-wrapper hide-on-small-only'>
							<div class='col m4 s12 center-align' style='margin-top:10px'><a href='views/associados_add.php?acao=associar&id=".$dados['id']."' class='btn light-blue'>Associar</a></div>
							<div class='col m4 s12 center-align' style='margin-top:10px'><img src='profile/".$dados['perfil']."' class='circle responsive-img z-depth-2' style='width: 200px;height:200px'></div>
							<div class='col m4 s12 center-align' style='margin-top:10px'></div>
						</div>


					</div>
	    		</li>";
			}
	    ?>
  	</ul>

  	<div id="cadastro">
		<form method='post' enctype="multipart/form-data" action='views/associados_add.php?acao=add'>
			<div class='row'>
				<div class='col m4 s12 input-field'>
					<input name="nome" id="nome" type="text" class="validate">
                    <label for="nome">Nome</label>
                </div>
				<div class='col m4 s12 input-field'>
					<input name="login" id="login" type="text" class="validate">
                    <label for="login">Login</label>
                </div>
				<div class='col m4 s12 input-field'>
					<input name="senha" id="senha" type="password" class="validate">
                    <label for="senha">Senha</label>
                </div>
			</div>
			<div class='row'>
				<div class='col m4 s12 input-field'>
					<input name="cargo" id="cargo" type="text" class="validate">
                    <label for="cargo">Cargo</label>
                </div>
                <div class='col m4 s12 input-field'>
					<input name="data_adm" id="data_adm" type="text" class="validate">
                    <label for="data_adm">Data de Admissão</label>
                </div>
				<div class='col m4 s12 input-field'>
					<input name="email" id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
			</div>
			<div class='row'>
				<div class='col m4 s12 input-field'>
					<input name="endereco" id="endereco" type="text" class="validate">
                    <label for="endereco">Endereco</label>
                </div>
				<div class='col m4 s12 input-field'>
					<input name="telefone" id="telefone" class="tel validate" type="text">
                    <label for="telefone">Telefone</label>
                </div>
                <div class='col m4 s12 input-field'>
					<input name="data" id="data" type="text" class="dat validate">
                    <label for="data">Data de Nascimento</label>
                </div>
			</div>
			<div class='row'>
				<div class='col m4 s12 input-field'>
					<input name="nomeMae" id="nomeMae" type="text" class="validate">
                    <label for="nomeMae">Nome da Mãe</label>
                </div>
                <div class='col m4 s12 input-field'>
					<input name="telefoneMae" id="telefoneMae" class="tel validate" type="text">
                    <label for="telefoneMae">Telefone da Mãe</label>
                </div>
                <div class='col m4 s12 input-field'>
					<input name="dataMae" id="dataMae" type="text" class="dat validate">
                    <label for="dataMae">Data de Nascimento da Mãe</label>
                </div>
			</div>
			<div class='row'>
				<div class='col m4 s12 input-field'>
					<input name="nomePai" id="nomePai" type="text" class="validate">
                    <label for="nomePai">Nome do Pai</label>
                </div>
                <div class='col m4 s12 input-field'>
					<input name="telefonePai" id="telefonePai" class="tel validate" type="text">
                    <label for="telefonePai">Telefone do Pai</label>
                </div>
                <div class='col m4 s12 input-field'>
					<input name="dataPai" id="dataPai" type="text" class="dat validate">
                    <label for="dataPai">Data de Nascimento do Pai</label>
                </div>
			</div>
			<div class='row'>
				<div class='col m4 s12 center-align' style="margin-top: 20px" >
					<input type="checkbox" id="exassociado"/>
      				<label for="exassociado">Ex-Associado</label>
                </div>
				<div class='col m4 s12 file-field input-field'>
					<div class="btn light-blue">
				        <span>Foto</span>
				        <input name="arquivo" type="file">
				    </div>
				    <div class="file-path-wrapper">
				        <input class="file-path validate" type="text">
				    </div>
				</div>
				<div class='col m4 s12 center-align'>
					<input type='submit' class='btn btn-large light-blue accent-3' value='CADASTRAR'>
				</div>
			</div>

		</form>
  	</div>

  	<div id="alterar">
  		<form method='post' enctype="multipart/form-data" action='views/associados_add.php?acao=add'>
			<div class='row'>
				<div class='col m4 s12 input-field'>
					<input name="nome" id="nome" type="text" class="validate">
                    <label for="nome">Nome</label>
                </div>
				<div class='col m4 s12 input-field'>
					<input name="login" id="login" type="text" class="validate">
                    <label for="login">Login</label>
                </div>
				<div class='col m4 s12 input-field'>
					<input name="senha" id="senha" type="password" class="validate">
                    <label for="senha">Senha</label>
                </div>
			</div>
			<div class='row'>
				<div class='col m4 s12 input-field'>
					<input name="cargo" id="cargo" type="text" class="validate">
                    <label for="cargo">Cargo</label>
                </div>
                <div class='col m4 s12 input-field'>
					<input name="data_adm" id="data_adm" type="text" class="validate">
                    <label for="data_adm">Data de Admissão</label>
                </div>
				<div class='col m4 s12 input-field'>
					<input name="email" id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
			</div>
			<div class='row'>
				<div class='col m4 s12 input-field'>
					<input name="endereco" id="endereco" type="text" class="validate">
                    <label for="endereco">Endereco</label>
                </div>
				<div class='col m4 s12 input-field'>
					<input name="telefone" id="telefone" class="tel validate" type="text">
                    <label for="telefone">Telefone</label>
                </div>
                <div class='col m4 s12 input-field'>
					<input name="data" id="data" type="text" class="dat validate">
                    <label for="data">Data de Nascimento</label>
                </div>
			</div>
			<div class='row'>
				<div class='col m4 s12 input-field'>
					<input name="nomeMae" id="nomeMae" type="text" class="validate">
                    <label for="nomeMae">Nome da Mãe</label>
                </div>
                <div class='col m4 s12 input-field'>
					<input name="telefoneMae" id="telefoneMae" class="tel validate" type="text">
                    <label for="telefoneMae">Telefone da Mãe</label>
                </div>
                <div class='col m4 s12 input-field'>
					<input name="dataMae" id="dataMae" type="text" class="dat validate">
                    <label for="dataMae">Data de Nascimento da Mãe</label>
                </div>
			</div>
			<div class='row'>
				<div class='col m4 s12 input-field'>
					<input name="nomePai" id="nomePai" type="text" class="validate">
                    <label for="nomePai">Nome do Pai</label>
                </div>
                <div class='col m4 s12 input-field'>
					<input name="telefonePai" id="telefonePai" class="tel validate" type="text">
                    <label for="telefonePai">Telefone do Pai</label>
                </div>
                <div class='col m4 s12 input-field'>
					<input name="dataPai" id="dataPai" type="text" class="dat validate">
                    <label for="dataPai">Data de Nascimento do Pai</label>
                </div>
			</div>
			<div class='row'>
				<div class='col m4 s12 center-align' style="margin-top: 20px" >
					<input type="checkbox" id="exassociado"/>
      				<label for="exassociado">Ex-Associado</label>
                </div>
				<div class='col m4 s12 file-field input-field'>
					<div class="btn light-blue">
				        <span>Foto</span>
				        <input name="arquivo" type="file">
				    </div>
				    <div class="file-path-wrapper">
				        <input class="file-path validate" type="text">
				    </div>
				</div>
				<div class='col m4 s12 center-align'>
					<input type='submit' class='btn btn-large light-blue accent-3' value='CADASTRAR'>
				</div>
			</div>

		</form>
  	</div>

  	<script type="text/javascript">
		$(document).ready(function(){
		    $('.collapsible').collapsible();
		    $("#exassociados").hide();
		    $("#cadastro").hide();
		    $("#alterar").hide();

		    $('.dat').mask('99/99/9999');
		    $('.tel').mask('(99)9.9999-9999');
		    $('select').material_select();
		});
		function alteraPag(a){
		    $("#associados").fadeOut(100);
		    $("#exassociados").fadeOut(100);
		    $("#cadastro").fadeOut(100);
		    $("#alterar").fadeOut(100);
		    setTimeout(function(){
		        $(a).fadeIn(100);
		    }, 100);
		}
	</script>
</body>