<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="recursos/pickadate/default.css">
    <link rel="stylesheet" href="recursos/pickadate/default.date.css">
    <link rel="stylesheet" href="recursos/pickadate/default.time.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/base.css">
    <style>
        .montserrat {
            font-family: 'Montserrat';
        }
        .nw {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 5px;
        }
        .bor {
            border-left: 1px solid #D4D4D5;
            border-right: 1px solid #D4D4D5;
            border-bottom: 1px solid #D4D4D5;
        }
        .headTable {
            border-left: 1px solid #D4D4D5;
            border-right: 1px solid #D4D4D5;
            font-size: 12px;
            font-weight: 600;
            padding: 0;
        }
        .bodyTable {
            padding: 0;
        }
        .listTable {
            padding: 10px;
            background: rgba(0,0,0,0.1);
            font-size: 10px;
        }
        .row {
            padding: 0;
        }
        .iXs {
            height: 22px;
        }
        .activado {
            display: inline-block;
        }
        .desactivado {
            display: none;
        }
        @media (max-width: 992px) {
            .dn {
                display: none;
            }
        }
        @media (min-width: 993px) {
            .btnPlus {
                display: none;
            }
            .ai {
                text-align: left;
            }
            .ad {
                text-align: right;
            }
            .listTable {
                display: none;
            }
        }
        @media (min-width: 1200px) {
            .ai {
                text-align: center;
            }
            .ad {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="col-xs-12 card montserrat">
        <div class="col-xs-12 shadowButtonDown cardContent">
            <div class="col-xs-12 titleCard"><i class="fa fa-industry pull-left"></i><p>Empresa</p></div>
        </div>
        <div class="headTable col-xs-12" style="border-bottom: 3px solid #F5A214;">
            <div class="col-xs-8 col-md-3 nw text-center">Zona</div>
            <div class="col-xs-4 col-md-2 nw text-center">Seleccionar</div>
            <div class="col-md-2 dn nw text-center">Última actualización</div>
            <div class="col-md-2 dn nw text-center">Subido por</div>
            <div class="col-md-2 dn nw text-center">Fecha subida</div>
            <div class="col-md-1 dn nw text-center">Hora subida</div>
        </div>
        <div class="bodyTable col-xs-12 bor">
            <div class="col-xs-8 col-md-3 nw ai"><button class="btn btn-xs btnPlus"><i class="fa fa-chevron-right"></i></button> SERVICIOS BIO BIO, SECTOR AVENIDA PEDRO MONTT</div>
            <div class="col-xs-4 col-md-2 nw"><form> <div class="input-group"><input type="text" class="form-control iXs" placeholder="Search"><div class="input-group-btn"> <button class="btn btn-xs" type="submit"><i class="fa fa-search"></i></button></div></div></form></div>
            <div class="col-md-2 dn nw text-center">2017-05-07</div>
            <div class="col-md-2 dn nw text-center">JUAN PEREZ AVILES DEL MONTE ROSARIO</div>
            <div class="col-md-2 dn nw text-center">2017-05-03</div>
            <div class="col-md-1 dn nw ad">16:09:00</div>
        </div>
        <div class="listTable desactivado col-xs-12">
            <div class="row"><div class="col-xs-6 text-right" style="padding-right: 5px;">Última actualización :</div><div class="col-xs-6" style="padding-left: 0px;">2017-05-07</div></div>
            <div class="row"><div class="col-xs-6 text-right" style="padding-right: 5px;">Subido por :</div><div class="col-xs-6" style="padding-left: 0px;">JUAN PEREZ AVILES DEL MONTE ROSARIO</div></div>
            <div class="row"><div class="col-xs-6 text-right" style="padding-right: 5px;">Fecha subida :</div><div class="col-xs-6" style="padding-left: 0px;">2017-05-03</div></div>
            <div class="row"><div class="col-xs-6 text-right" style="padding-right: 5px;">Hora subida :</div><div class="col-xs-6" style="padding-left: 0px;">16:09:00</div></div>
        </div>
    </div>
    <script src="recursos/jquery/jquery.min.js"></script>
    <script src="recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="recursos/pickadate/picker.js"></script>
    <script src="recursos/pickadate/picker.date.js"></script>
    <script src="recursos/pickadate/picker.time.js"></script>
    <script>
        $('.datepicker').pickadate({
            format: 'yyyy-mm-dd'
        })
    </script>
    <script>
       $(document).ready(function(){
           $('.btnPlus').click(function(){
               var accordion = $(this).parent().parent().next();
               if(accordion.hasClass('desactivado')) {
                   $('.listTable').removeClass('activado').addClass('desactivado');
                   accordion.removeClass('desactivado').addClass('activado');
               }
               else {
                   $('.listTable').removeClass('activado').addClass('desactivado');
                   accordion.removeClass('activado').addClass('desactivado');
               }
           });
       });
    </script>
</body>
</html>






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
    <link rel="stylesheet" href="../../css/zonasCliente.css">
    <style>
        .cent {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <?php barraMenu($perfil,'zonas'); ?>
    <div id="content" class="animated fadeIn unLeftContent">
           <?php
                if(sizeof($zonas) == 0) echo '<div class="alert"><div class="row vertical-align"> <div class="col-xs-2"> <i class="fa fa-exclamation-circle fa-3x"></i> </div><div class="col-xs-10"> <strong class="montserrat">No existen empresas </strong>, debes agregar una empresa y luego una zona en el menú<strong> Ajustes </strong>de la barra de navegación. </div></div></div>';
                else {
                    foreach($zonas as $key => $value) { echo '
                        <div class="col-xs-12 col-sm-12 card">
                            <div class="col-xs-12 shadowButtonDown cardContent">
                                <div class="col-xs-12 titleCard"> <i class="fa fa-industry pull-left"></i>
                                    <p id="'.$value['idEmpresa'].'">'.$value['nombreEmpresa'].'</p>
                                </div>
                            </div>
                            <div class="col-xs-12 shadow cardContent">'; 
                                if($zonas[$key]['zonas'][0]['idZona'] == null) 
                                    echo '<div class="montserrat cent" style="padding: 10px;"><i class="fa fa-exclamation-circle" style="margin-right: 5px;"></i>No hay zonas registradas</div>'; 
                                else { echo '
                                <table class="tableStyle">
                                        <thead>
                                            <tr>
                                                <th>Zona</th>
                                                <th>Seleccionar fecha</th>
                                                <th class="unDisplayColumn">Ultima actualización</th>
                                                <th class="unDisplayColumn">Subido por</th>
                                                <th class="unDisplayColumn">Fecha subida</th>
                                                <th class="unDisplayColumn">Hora subida</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                            foreach($zonas[$key]['zonas'] as $v) {
                                                if($v['idArchivo'] != null) { echo '
                                                    <tr>
                                                        <td class="tdPosition"><div class="btnPlus"><i class="fa fa-expand"></i></div>'.$v['nombreZona'].'</td>
                                                        <td>
                                                            <form method="GET" action="maquinas.php">
                                                                <input type="text" name="idArchivo" value="'.$v['idArchivo'].'"></input>
                                                                <div class="input-group input-xs">
    <input type="text" id="'.$v['idZona'].'" class="btnFecha form-control datepicker" data-value="'.$v['fechaRecienteDatos'].'" name="fechaRecienteDatos">
                                                                    <div class="input-group-btn">
                                                                        <button id="'.$v['idArchivo'].'" class="btnBuscar btn btn-basic" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td class="unDisplayColumn">'.$v['fechaRecienteDatos'].'</td>
                                                        <td class="unDisplayColumn">'.$v['nombreSupervisor'].'</td>
                                                        <td class="unDisplayColumn">'.$v['fechaSubida'].'</td>
                                                        <td class="unDisplayColumn">'.$v['horaSubida'].'</td>
                                                    </tr>
                                                    <tr class="accordion unActivated">
                                                        <td colspan="2">
                                                            <ul>
                                                                <li>Última actualización : '.$v['fechaRecienteDatos'].'</li>
                                                                <li>Subido por: '.$v['nombreSupervisor'].'</li>
                                                                <li>Fecha subida: '.$v['fechaSubida'].'</li>
                                                                <li>Hora subida: '.$v['horaSubida'].'</li>
                                                            </ul>
                                                        </td>
                                                    </tr>';
                                                }
                                                else { echo '
                                                    <tr>
                                                        <td class="tdPosition"><div class="btnPlus"><i class="fa fa-expand"></i></div id="'.$v['idZona'].'">'.$v['nombreZona'].'</td>
                                                        <td>No hay archivos disponibles</td>
                                                        <td class="unDisplayColumn">-</td>
                                                        <td class="unDisplayColumn">-</td>
                                                        <td class="unDisplayColumn">-</td>
                                                        <td class="unDisplayColumn">-</td>
                                                    </tr>
                                                    <tr class="accordion unActivated">
                                                        <td colspan="2">
                                                            <ul>
                                                                <li>Última actualización : -</li>
                                                                <li>Subido por: -</li>
                                                                <li>Fecha subida: -</li>
                                                                <li>Hora subida: -</li>
                                                            </ul>
                                                        </td>
                                                    </tr>';
                                                }
                                             } echo '
                                        </tbody>
                                    </table>';
                                } echo '
                            </div>
                        </div>';
                    }
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
    <script>main();</script>
   <script>
       $(document).ready(function(){
           $('.btnPlus').click(function(){
               var accordion = $(this).parent().parent().next();
               if(accordion.hasClass('unActivated')) {
                   $('.accordion').removeClass('activated');
                   $('.accordion').addClass('unActivated');
                   accordion.removeClass('unActivated');
                   accordion.addClass('activated');
               }
               else {
                   $('.accordion').removeClass('activated');
                   $('.accordion').addClass('unActivated');
                   accordion.removeClass('activated');
                   accordion.addClass('unActivated');
               }
           });
           $(window).resize(function(){
               if($(window).width() > 970)
                   if($('.accordion').hasClass('activated')) 
                        $($('.accordion').removeClass('activated').addClass('unActivated'));
           });
       });
   </script>
</body>
</html>