<?php
	include '../../php/funciones.php';
	$conexion = conectar();
    $perfil = datosPerfil('usuario@arauco.cl');
    $datosRecientes = datosRecientes();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#262626"/>
    <link rel="stylesheet" href="../../recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../recursos/select2/select2.min.css">
    <link rel="stylesheet" href="../../recursos/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="../../recursos/pickadate/default.css">
    <link rel="stylesheet" href="../../recursos/pickadate/default.date.css">
    <link rel="stylesheet" href="../../recursos/pickadate/default.time.css">
    <link rel="stylesheet" href="../../recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../recursos/animate/animate.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/menuBarra.css">
</head>
<body>
    <?php barraMenu($perfil['correo'],$perfil['empresa'],'contraseña'); ?>
    <div id="content" class="animated fadeIn unLeftContent">
<!-- ............................................................................................................................ -->
        <div class="col-xs-12" style="margin-top: 20px;">
            <form id="formularioContactar">
                <div class="form-group">
                    <label>Cotraseña Actual</label>
                    <input type="text" class="form-control disabled" name="correoUsuario" id="correoUsuario">
                </div>
                <div class="form-group">
                    <label>Cotraseña Nueva</label>
                    <input type="text" class="form-control disabled" name="correoUsuario" id="correoUsuario">
                </div>
                <div class="form-group">
                    <label>Confirmar Contraseña Nueva</label>
                    <input type="text" class="form-control disabled" name="correoUsuario" id="correoUsuario">
                </div>
            </form>
            <div class="clearfix">
                <button type="submit" class="btn btn-normal pull-right montserrat" id="btnAñadirMaquina"><i class="cargar fa fa-refresh"></i>Cambiar</button>
            </div>
            <div class="message" style="margin: 15px 0px 0px 0px"></div>
        </div>
<!-- ............................................................................................................................ -->
    </div>
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../recursos/moment/moment.js"></script>
    <script src="../../js/funciones.js"></script>    
    <script>main();</script>
</body>
</html>