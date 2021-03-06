<?php
    session_start();
    if(isset($_SESSION['datos'])) {
        if($_SESSION['datos']['tipoUsuario'] == 'Cliente')
            header('Location: public/cliente/zonas.php');
        if($_SESSION['datos']['tipoUsuario'] == 'Supervisor')
            header('Location: public/supervisor/panel.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#262626"/>
        <title>Machine Monitors</title>
        <link rel="stylesheet" href="recursos/semantic/semantic.css">
        <link rel="stylesheet" href="recursos/toast/toast.css">
        <link rel="stylesheet" href="recursos/awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <div class="ui aligned center aligned grid">
            <div class="margen column">
                <h2 class="ui icon header">
                    <i class="settings icon" style="color: #F5A214;"></i>
                    <div class="content montserrat" style="color: white;">
                    Machine Monitors
                        <div class="sub header montserrat" style="color: white;">Plan de vigilancia de maquinaria pesada</div>
                    </div>
                </h2>
                <h2 class="titulo montserrat">Iniciar Sesión</h2>
                <form class="ui form">
                    <div class="ui segment" >
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" id="email" placeholder="(*) Correo electrónico">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" id="password" placeholder="(*) Contraseña">
                            </div>
                        </div>
                        <div id="btnLogin" style="background: #262626;" class="ui fluid large submit button montserrat"><i class="fa fa-sign-in" style="margin-right: 10px;"></i>Iniciar sesión</div>
                    </div>
                </form>
                <div class="ui message">
                    <a href="reestablecer.php" class="montserrat">¿ Olvidaste tu contraseña ?</a>
                </div>
            </div>
        </div>  
        <script src="recursos/jquery/jquery.min.js"></script>
        <script src="recursos/semantic/semantic.min.js"></script>
        <script src="recursos/toast/toast.js"></script>
        <script src="recursos/hammer/hammer.min.js"></script>
        <script src="js/funciones.js"></script>
        <script src="js/validaLogin.js"></script>
    </body>
</html>