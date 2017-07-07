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
            include '../../php/funciones.php';
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
    <link rel="stylesheet" href="../../css/tables.css">
</head>
<body>
    <?php barraMenu($perfil,'zonas'); ?>sizeof($zonas) == 0 $zonas[$key]['zonas'] as $v
    <div id="content" class="animated fadeIn unLeftContent">
           <?php
                if(sizeof($zonas) == 0) echo '<div class="alert"><div class="row vertical-align"> <div class="col-xs-2"> <i class="fa fa-exclamation-circle fa-3x"></i> </div><div class="col-xs-10"> <strong class="montserrat">No existen empresas </strong>, debes agregar una empresa y luego una zona en el menú<strong> Ajustes </strong>de la barra de navegación. </div></div></div>';
                else
                    foreach($zonas as $key => $value) {
                        echo'<div class="col-xs-12 card montserrat">
                                <div class="col-xs-12 shadowButtonDown cardContent">
                                    <div class="col-xs-12 titleCard"><i class="fa fa-industry pull-left"></i><p>'.$value['nombreEmpresa'].'</p></div>
                                </div>
                                <div class="headTable col-xs-12" style="border-bottom: 3px solid #F5A214;">
                                    <div class="col-xs-8 col-md-3 nw text-center">Zona</div>
                                    <div class="col-xs-4 col-md-2 nw text-center">Seleccionar</div>
                                    <div class="col-md-2 dn nw text-center">Última actualización</div>
                                    <div class="col-md-2 dn nw text-center">Subido por</div>
                                    <div class="col-md-2 dn nw text-center">Fecha subida</div>
                                    <div class="col-md-1 dn nw text-center">Hora subida</div>
                                </div>';
                                foreach($zonas[$key]['zonas'] as $k => $v) {
                                    if($v['idArchivo'] == null)
                                        echo'<div class="bodyTable col-xs-12 bor">
                                                <div class="col-xs-8 col-md-3 nw ai">'.$v['nombreZona'].'</div>
                                                <div class="col-xs-4 col-md-2 nw">No hay archivos disponibles</div>
                                                <div class="col-md-2 dn nw ce">-</div>
                                                <div class="col-md-2 dn nw ce">-</div>
                                                <div class="col-md-2 dn nw ce">-</div>
                                                <div class="col-md-1 dn nw ce">-</div>
                                            </div>';
                                    else
                                        echo'<div class="bodyTable col-xs-12 bor">
                                                <div class="col-xs-8 col-md-3 nw ai"><button class="btn btn-xs btnPlus"><i class="fa fa-chevron-right"></i></button>'.$v['nombreZona'].'</div>
                                                <div class="col-xs-4 col-md-2 nw">
                                                    <form method="GET" action="maquinas.php" style="margin: 0;">
                                                        <input type="hidden" name="idArchivo" value="'.$v['idArchivo'].'"></input>
                                                        <div class="input-group">
                                                            <input type="text" id="'.$v['idZona'].'" class="btnFecha form-control datepicker text-center iXs" data-value="'.$v['fechaRecienteDatos'].'" placeholder="Buscar" name="fechaRecienteDatos">
                                                            <div class="input-group-btn">
                                                                <button id="'.$v['fechaRecienteDatos'].'" class="btn btn-xs iXs" type="submit"><i class="fa fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-2 dn nw ce">'.$v['fechaRecienteDatos'].'</div>
                                                <div class="col-md-2 dn nw text-center">'.$v['nombreSupervisor'].'</div>
                                                <div class="col-md-2 dn nw ce">'.$v['fechaSubida'].'</div>
                                                <div class="col-md-1 dn nw ad">'.$v['horaSubida'].'</div>
                                            </div>
                                            <div class="listTable desactivado col-xs-12">
                                                <div class="row"><div class="col-xs-6 text-right" style="padding-right: 5px;">Última actualización :</div><div class="col-xs-6" style="padding-left: 0px;">'.$v['fechaRecienteDatos'].'</div></div>
                                                <div class="row"><div class="col-xs-6 text-right" style="padding-right: 5px;">Subido por :</div><div class="col-xs-6" style="padding-left: 0px;">'.$v['nombreSupervisor'].'</div></div>
                                                <div class="row"><div class="col-xs-6 text-right" style="padding-right: 5px;">Fecha subida :</div><div class="col-xs-6" style="padding-left: 0px;">'.$v['fechaSubida'].'</div></div>
                                                <div class="row"><div class="col-xs-6 text-right" style="padding-right: 5px;">Hora subida :</div><div class="col-xs-6" style="padding-left: 0px;">'.$v['horaSubida'].'</div></div>
                                            </div>';       
                                }
                        echo'</div>';
                    }
           ?>
<!-- ............................................................................................................................ -->
    </div>
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../recursos/select2/select2.full.js"></script>
    <script src="../../recursos/pickadate/picker.js"></script>
    <script src="../../recursos/pickadate/picker.date.js"></script>
    <script src="../../recursos/pickadate/picker.time.js"></script>
    <script src="../../recursos/moment/moment.js"></script>
    <script src="../../cliente/js/fechasDisponibles.js"></script>
    <script src="../../js/funciones.js"></script>
    <script src="../../js/config.js"></script>
    <script src="../../js/tables.js"></script>
    <script>main();</script>
</body>
</html>