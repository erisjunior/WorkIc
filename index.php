<?php
	session_start();
    require('conexao.php');
	if (isset($_SESSION['login'])) {

	}else{
		unset($_SESSION['login']);
		header('location:login.php');

	}

	if (isset($_GET['sair'])) {
		unset($_SESSION['login']);
		header("Location:index.php");
	}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/efeitofade.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>WorkIC</title>
</head>


<body style="animation: fadein .5s;">
    <ul id="slide-out" class="side-nav fixed z-depth-3">
        <div class="row">
            <br>
            <div class="col s10 offset-s1 center-align">
                <a href="javascript:void(0)" onclick="mudaPag('perfil')">
                    <?php
                        $sql = "SELECT * FROM associados WHERE login='".$_SESSION['login']."'";
                        $query = mysqli_query($con, $sql);

                        $dados =  mysqli_fetch_assoc($query);
                        echo "<img src='profile/".$dados['perfil']."' class='circle responsive-img z-depth-2' style='width: 140px;height:140px'>
                            <p class='light-blue-t flow-text' style='font-size:24px'>".$dados['nome']."</p>
                </a>
            </div>";
                $sql = "SELECT * FROM avisos";
                $query = mysqli_query($con, $sql);
                if(mysqli_num_rows($query) > 0){
                    echo "<div class='col s1'><a href='index.php?p=perfil'><span class='new badge light-blue z-depth-2' id='news'>NEWS</span></a></div>";
                }
            ?>
        </div>
        <li>
            <a href="javascript:void(0)" onclick="mudaPag('associados')"><i class="material-icons">people</i>Associados</a>
        </li><li>
            <a href="javascript:void(0)" onclick="mudaPag('caixa')"><i class="material-icons">attach_money</i>Caixa</a>
        </li><li>
            <a href="javascript:void(0)" onclick="mudaPag('calendario')"><i class="material-icons">event</i>Calendário</a>
        </li><li>
            <a href="javascript:void(0)" onclick="mudaPag('registros')"><i class="material-icons">assignment</i>Registros</a>
        </li><li id="divida">
            <a href="javascript:void(0)" onclick="mudaPag('dividas')"><i class="material-icons">equalizer</i>Dívidas</a>
        </li>
		<?php
			if ($_SESSION['cargo'] == "Presidente" || $_SESSION['cargo'] == "Tesoureiro") {
				echo "<script>$('#divida').show();</script>";
			}else{
				echo "<script>$('#divida').hide();</script>";
			}
		?>
        
        <!--<li>-->
        <!--    <a href="javascript:void(0)" onclick="mudaPag('galeria')"><i class="material-icons">photo</i>Galeria</a>-->
        <!--</li>-->
        <div class="row">
            <br>
            <div class="col s8 offset-s2 center-align">
                <img src="img/Logo.png" class="responsive-img " style="max-width: 30%">
            </div>
        </div>
        <div class="row">
            <div class="col s8 offset-s2 center-align">
                <a href="index.php?sair=" class="btn light-blue"><i class="material-icons white-text">power_settings_new</i></a>
            </div>
        </div>
    </ul>
    <div id="body">
        <div class="row light-blue accent-3 z-depth-1 valign-wrapper" id="header">
			<div class="col s8">
				<p class="white-text" style='margin-bottom:10px'><span style="font-weight: bold;font-size: 28px">WorkIC </span><i style="font-size: 28px" id="titulo"></i></p>
			</div>
			<div class="col s4 right-align"><a href="#" data-activates="slide-out" class="button-collapse" id="colapse"><i class="material-icons white-text">menu</i></a></div>
        </div>
        <div id="main" style="padding:30px">
        </div>
        <div class="row light-blue accent-3 valign-wrapper white-text" id="footer">
			<div class="col s12"><center>Copyright © <b>WorkIC</b> 2018</center></div>
        </div>
    </div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.js"></script>
    <script type="text/javascript" src="js/jquery.maskMoney.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

    <?php
        if (isset($_GET['p'])) {
            if(isset($_GET['edita'])){
                echo "<script>mudaPag('".$_GET['p']."','edita','".$_GET['edita']."')</script>";
            }else{
                echo "<script>mudaPag('".$_GET['p']."')</script>";
            }
        }else{
            echo "<script>Materialize.toast('Bem Vindo!', 1000)</script>";
            echo "<script>mudaPag('perfil')</script>";
        }
    ?>

</body>

</html>