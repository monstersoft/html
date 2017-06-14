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
    <link rel="stylesheet" href="../../css/zonasCliente.css">
</head>
<body>
    <?php barraMenu($perfil['correo'],$perfil['empresa'],'zonas'); ?>
    <div id="content" class="animated fadeIn unLeftContent">
           <?php
                foreach($datosRecientes as $key => $value) { echo '
                    <div class="col-xs-12 col-sm-12 card">
                        <div class="col-xs-12 shadowButtonDown cardContent">
                            <div class="col-xs-12 titleCard"> <i class="fa fa-industry pull-left"></i>
                                <p id="'.$value['idEmpresa'].'">'.$value['nombreEmpresa'].'</p>
                            </div>
                        </div>
                        <div class="col-xs-12 shadow cardContent">
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
                                    foreach($datosRecientes[$key]['zonas'] as $v) { 
                                        if($v['idArchivo'] != null) { echo '
                                            <tr>
                                                <td class="tdPosition"><div class="btnPlus"><i class="fa fa-plus"></i></div>'.$v['nombreZona'].'</td>
                                                <td>
                                                    <form method="POST" action="maquinas.php"><input type="hidden" name="idArchivo" value="'.$v['idArchivo'].'"></input><input type="hidden" name="idZona" value="'.$v['idZona'].'"></input><div class="input-group input-xs"><input type="text" id="'.$v['idZona'].'" class="btnFecha form-control datepicker" data-value="'.$v['fechaRecienteDatos'].'" name="fechaRecienteDatos"><div class="input-group-btn"><button id="'.$v['idArchivo'].'" class="btnBuscar btn btn-basic" type="submit"><i class="glyphicon glyphicon-search"></i></button></div></div></form>
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
                                                <td class="tdPosition"><div class="btnPlus"><i class="fa fa-plus"></i></div id="'.$v['idZona'].'">'.$v['nombreZona'].'</td>
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
                            </table>
                        </div>
                    </div>
                ';}
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