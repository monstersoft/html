<?php 
    include 'php/funciones.php';
debug(datosRecientes());

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#262626" />
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
                <h2 class="titulo montserrat">Reestablecer Contraseña</h2>
                <form class="ui form">
                    <div class="ui segment" >
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="at icon"></i>
                                <input type="text" id="txtCorreo" placeholder="Correo electrónico">
                            </div>
                        </div>
                        <div id="btnReestablecer" style="background: #262626;font-family: 'Montserrat', cursive;" class="ui fluid large submit button">Enviar correo</div>
                    </div>     
                </form>
            </div>
        </div>  
        <script src="recursos/jquery/jquery.min.js"></script>
        <script src="recursos/semantic/semantic.min.js"></script>
        <script src="recursos/toast/toast.js"></script>
        <script src="recursos/hammer/hammer.min.js"></script>
        <script src="js/reestablecer.js"></script>
        <script src="js/funciones.js"></script>
        <script src="js/mensajes.js"></script>
        <script src="js/compruebaInputs.js"></script>
    </body>
</html>

