<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>WorkIC - Login</title>
</head>

<body class="light-blue accent-3">

    <div class="row">
        <div class="col s10 m4 offset-s1 offset-m4">
            <h1 class="center-align white-text flow-text" style="font-size: 48px;font-weight: bold;"><i>WorkIC</i></h1>
        </div>
    </div>

    <div class="row">
        <div class="col s8 m4 offset-s2 offset-m4 white z-depth-3" style="padding-left:20px;padding-right:20px">
            <br>
            <p class="center-align light-blue-t flow-text"> Faça seu Login</p>
            <form action="login_verifica.php" method="post">
                <div class="input-field">
                    <input name="login" id="login" type="text" class="validate">
                    <label for="login">Login</label>
                </div>
                <div class="input-field">
                    <input name="senha" id="senha" type="password" class="validate">
                    <label for="senha">Senha</label>
                </div>
                <div class="input-field center">
                    <input type="submit" id="envia" class="btn waves-effect waves-light light-blue accent-3" value="ENTRAR">
                </div>
                <br>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m4 offset-m4">
            <p class="center-align white-text flow-text" style="font-size: 15px"> contato.interactsaomiguel@gmail.com <br> erisvan.junior.a@gmail.com <br> (84) 9.9466-1363</p>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src=""></script>

</body>

</html>
