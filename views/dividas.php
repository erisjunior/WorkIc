<body>
	<div class="row">
		<div class="input-field col m4 s12">
			<select id="associados">
		        <option value="" disabled selected>Escolha o Associado</option>
		        <?php
		            require("../conexao.php");

                	$sqll = "SELECT * FROM associados WHERE ex = 'n'";
                	$queryy = mysqli_query($con,$sqll);
                	
                	while($dados = mysqli_fetch_assoc($queryy)){
                	    echo "<option value='".$dados['id']."'>".$dados['nome']."</option>";
                	}
		        ?>
		    </select>
		    <label>Associados</label>
		</div>
	</div>
	<div id="principal">
    </div>

	<script type="text/javascript">
		$(document).ready(function() {
		    $('select').material_select();

		    $("#associados").change(function() {
				associado = $("#associados").val();
				mudaPa(associado);
		    });
		    
		    function mudaPa(a){
                var b = "views/dividas2.php?associado="+a;

			    $("#principal").fadeOut(100);
			    setTimeout(function(){
			        $("#principal").load(b);
			    }, 100);

			    $("#principal").fadeIn(100);
			}
		});
	</script>
</body>