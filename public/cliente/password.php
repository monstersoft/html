<?php
    session_start();
    if(isset($_SESSION['datos'])) {
        if($_SESSION['datos']['tipoUsuario'] == 'Supervisor') {
            echo "<script>console.log('".$_SESSION['datos']['tipoUsuario']."')</script>";
            $_SESSION = [];
            session_destroy();
            header('Location: ../../index.php');
        }
        if($_SESSION['datos']['tipoUsuario'] == 'Cliente') {
            echo "<script>console.log('".$_SESSION['datos']['tipoUsuario']."')</script>";
            include '../../cliente/funciones.php';
            $conexion = conectar();
            $perfil = datosPerfil($_SESSION['datos']['correo']);
            $zonas = datosRecientes();
        }
    }
    else {
        echo '<script>console.log("No existe la sesión")</script>';
        header('Location: ../../index.php');
    }
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
    <style>
        label {
            font-family: 'Montserrat', fantasy;
        }
        input {
            font-family: 'Montserrat', fantasy;
        }
        .input-group-addon {
            background: white;
        }
    </style>
</head>
<body>
    <?php barraMenu($perfil,'contraseña'); ?>
    <div id="content" class="animated fadeIn unLeftContent">
<!-- ............................................................................................................................ -->
        <div class="col-xs-12" style="margin-top: 20px;">
            <form id="formularioCambiarPassword">
                <div class="form-group ">
                    <label class="control-label " for="email">Contraseña actual</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                        <input class="form-control" name="actual" id="actualPass" type="password" placeholder="entre 6 y 12 caracteres"/>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="control-label " for="email">Contraseña nueva</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                        <input class="form-control" name="nueva" id="nuevaPass" type="password" placeholder="entre 6 y 12 caracteres"/>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="control-label " for="email">Confirmar contraseña nueva</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-repeat"></i></div>
                        <input class="form-control" name="confirmada" id="confirmadaPass" type="password" placeholder="entre 6 y 12 caracteres"/>
                    </div>
                </div>
            </form>
            <div class="clearfix">
                <button type="button" class="btn btn-default pull-right montserrat" id="btnCambiarContraseña"><i class="cargar fa fa-refresh"></i> Cambiar</button>
            </div>
            <div class="message" style="margin: 15px 0px 0px 0px"></div>
        </div>
<!-- ............................................................................................................................ -->
    </div>
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../recursos/moment/moment.js"></script>
    <script src="../../js/funciones.js"></script>
    <script src="../../js/mensajes.js"></script>
    <script src="../../js/compruebaInputs.js"></script>
    <script src="../../cliente/js/cambiarContrasena.js"></script>   
    <script>main();</script>
</body>
</html>