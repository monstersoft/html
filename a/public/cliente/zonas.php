<?php
	include '../../php/funciones.php';
	$conexion = conectar();
	$empresasZonas = array();
	$empresasZonas = empresasZonas();    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../recursos/select2/select2.min.css">
    <link rel="stylesheet" href="../../recursos/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="../../recursos/pickadate/default.css">
    <link rel="stylesheet" href="../../recursos/pickadate/default.date.css">
    <link rel="stylesheet" href="../../recursos/pickadate/default.time.css">
    <link rel="stylesheet" href="../../recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../recursos/animate/animate.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/zonasCliente.css">
</head>
<body>
    <div id="bar"><a id="clickMenu"><i class="fa fa-bars"></i></a><p class="editarZona">Machine Monitors</p></div>
    <nav class="unDisplayNav">
        <ul>
            <li id="profile"><i class="fa fa-cogs fa-4x" id="iconProfile"></i><br><span id="titleProfile">Pato</span><br><span id="nameProfile">Arauco</span></li>
            <li><a href="zonas.php" class="selected"><i class="fa fa-globe icons"></i>Zonas</a></li>
            <li><a href="registro.php"><i class="fa fa-file-text icons"></i>Registro</a></li>
            <li><a href="historicos.php"><i class="fa fa-bar-chart icons"></i>Históricos</a></li>
            <li><a href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
            <li><a href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
            <li><a href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>
        </ul>
    </nav>
    <div id="content" class="animated fadeIn unLeftContent">
    <?php foreach($empresasZonas as $value) { echo'
    <div class="col-xs-12 col-sm-12 card">
        <div class="col-xs-12 shadowButtonDown cardContent">
            <div class="col-xs-12 titleCard"> <i class="fa fa-industry pull-left"></i>
                <p>'.$value['nombreEmpresa'].'</p>
            </div>
        </div>
        <div class="col-xs-12 shadow cardContent">
            <table>
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
                <tbody>'; echo '           
                    <tr>
                        <td class="tdPosition"><div class="btnPlus"><i class="fa fa-plus"></i></div>Patricio Andrés Villanueva Fuentes</td>
                        <td>
                            <div class="input-group input-xs"><input type="text" class="form-control datepicker" placeholder="27/03/17"><div class="input-group-btn"><button class="btn btn-basic" type="submit"><i class="glyphicon glyphicon-search"></i></button></div></div>
                        </td>
                        <td class="unDisplayColumn">Lunes</td>
                        <td class="unDisplayColumn">Patricio Andrés Villanueva Fuentes</td>
                        <td class="unDisplayColumn">Lunes<br>27 Abril 2017</td>
                        <td class="unDisplayColumn">08:55 AM</td>
                    </tr>
                    <tr class="accordion unActivated">
                        <td colspan="2">
                            <ul>
                                <li>Última actualización : 20 Febrero 2017</li>
                                <li>Subido por: Juanito Perez Perez</li>
                                <li>Fecha subida: 20 Febrero 2017</li>
                                <li>Hora subida: 08:55 AM</li>
                            </ul>
                        </td>
                    </tr>
                    '; echo '    
                </tbody>
            </table>
        </div>
    </div>
    ';}
    ?>
    <?php 
        debug($empresasZonas);
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
    <script src="../../js/funciones.js"></script>
    <script src="../../js/config.js"></script>
    <script>main();</script>
    <script>
       fechaHoy(); 
    </script>
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