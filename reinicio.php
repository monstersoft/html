<?php 
    if(isset($_GET['token'])) {
        $token = $_GET['token'];
        include ('php/raiz.php');
        if(!(strlen($token) == 65 and (substr($token, -1) == 'c' or substr($token, -1) == 's'))) 
            header('Location: '.raiz());
        else {
            include ('php/funciones.php');
            $datos = valida($token,substr($token,-1));
            if($datos['cantidadToken'] == 0)
                header('Location: '.raiz());
        }
    }
    else
        header('Location: '.raiz());
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
                <form class="ui form" id="formularioReinicio">
                    <div class="ui segment" >
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="nuevaContrasena" id="nuevaContraseña" placeholder="(*) Nueva contraseña">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="repeat icon"></i>
                                <input type="password" name="contrasenaConfirmada" id="contraseñaConfirmada" placeholder="(*) Confirmar contraseña">
                            </div>
                        </div>
                        <?php 
                            if($datos['cantidadToken'] == 1 and $datos['tipoUsuario'] == 'Cliente') {
                                echo '<div class="field" style="display: none;"><div class="ui left icon input"><i class="hide icon"></i><input type="hidden" value="'.$datos['tipoUsuario'].'" name="tipoUsuario"></input></div></div>';
                                echo '<div class="field" style="display: none"><div class="ui left icon input"><i class="hide icon"></i><input type="hidden" value="'.$datos['idUsuario'].'" name="id"></input></div></div>';
                            }
                            if($datos['cantidadToken'] == 1 and $datos['tipoUsuario'] == 'Supervisor' and $datos['status'] == 'deshabilitado') {
                                echo '<div class="field" style="display: none;"><div class="ui left icon input"><i class="phone icon"></i><input type="hidden" placeholder="Teléfono Móvil - 9 9 500 78 12" id="telefono" name="celular"></input></div></div>';
                            }
                            if($datos['cantidadToken'] == 1 and $datos['tipoUsuario'] == 'Supervisor') {
                                echo '<div class="field" style="display: none;"><div class="ui left icon input"><i class="hide icon"></i><input type="hidden" value="'.$datos['tipoUsuario'].'" name="tipoUsuario"></input></div></div>';
                                echo '<div class="field" style="display: none;"><div class="ui left icon input"><i class="hide icon"></i><input type="hidden" value="'.$datos['idUsuario'].'" name="id"></input></div></div>';
                            }
                        ?>
                        <div id="btnReestablecer" style="background: #262626;" class="ui fluid large submit button montserrat"><i class="fa fa-exchange" style="margin-right: 10px;"></i>Reestablecer</div>
                    </div>
                </form>
            </div>
        </div>  
        <script src="recursos/jquery/jquery.min.js"></script>
        <script src="recursos/semantic/semantic.min.js"></script>
        <script src="recursos/toast/toast.js"></script>
        <script src="recursos/hammer/hammer.min.js"></script>
        <script src="js/funciones.js"></script>
        <script src="js/raiz.js"></script>
        <script src="js/compruebaInputs.js"></script>
        <script src="js/mensajes.js"></script>
        <script src="js/validaReinicio.js"></script>
    </body>
</html>