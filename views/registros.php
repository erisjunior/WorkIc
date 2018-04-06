<?php
//Reuniões, , , , Arquivos, Relatorios, Conselho, Presidente
?>

<body>
	<div class="row">
		<div class="input-field col m3 s12">
			<select id="gestao" class="icons">
		        <option value="" selected>Escolha a Gestão</option>
		        <option value="G.17.18" data-icon="img/Logo.png" class="left circle">Gestão 17-18</option>
		        <option value="G.16.17" data-icon="img/1617.png" class="left circle">Gestão 16-17</option>
		        <option value="G.15.16" data-icon="img/Gestao1516.png" class="left circle">Gestão 15-16</option>
		        <option value="G.14.15" data-icon="img/logoAntiga.jpg" class="left circle">Gestão 14-15</option>
		        <option value="G.13.14" data-icon="img/logoAntiga.jpg" class="left circle">Gestão 13-14</option>
		    </select>
		</div>
		<div class="input-field col m3 s12">
		    <select id="registros">
		      	<option value="" selected>Escolha a opção</option>
			    <option>Projetos</option>
			    <option>Boletins</option>
			    <option>Atas</option>
			    <option>Relatorios</option>
			    <option>Ofícios</option>
			    <option>Arquivos</option>
		    </select>
		  </div>
	</div>
	<div id="principal">
    </div>

	<script type="text/javascript">
		$(document).ready(function() {
		    $('select').material_select();

            var gestao = "";
            var registros ="";
            mudaPa(gestao,registros);

		    $("#gestao").change(function() {
				gestao = $("#gestao").val();
				mudaPa(gestao,registros);
		    });
		    $("#registros").change(function() {
				registros = $("#registros").val();
				mudaPa(gestao,registros);
		    });
		    
		    function mudaPa(a,c){
                var b = "views/registros2.php?gestao="+a+"&registros="+c;

			    $("#principal").fadeOut(100);
			    setTimeout(function(){
			        $("#principal").load(b);
			    }, 100);

			    $("#principal").fadeIn(100);
			}
		});
	</script>
</body>