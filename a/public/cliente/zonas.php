<?php
	include '../../php/conexion.php';
	$conexion = conectar();
	$arreglo = array();
	$consulta = "SELECT zonas.idZona, zonas.nombre FROM zonas";
	if($resultado = mysqli_query($conexion,$consulta)) {
		while($row = mysqli_fetch_assoc($resultado)) {
			array_push($arreglo,array('idZona' => $row['idZona'], 'nombre' => utf8_encode($row['nombre'])));
        }
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../recursos/jqueryUi/jquery-ui.min.css">
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
    <div class="col-xs-12 col-sm-12 card">
        <div class="col-xs-12 shadowButtonDown cardContent">
            <div class="col-xs-12 titleCard"> <i class="fa fa-industry pull-left"></i>
                <p>SERVICIOS BÍO BÍO</p>
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>            
                    <tr>
                        <td class="tdPosition"><div class="plusIcon"><i class="fa fa-plus"></i></div>Patricio Andrés Villanueva Fuentes</td>
                        <td>Lunes<br>27 Abril 2017</td>
                        <td class="unDisplayColumn">Lunes<br>27 Abril 2017</td>
                        <td class="unDisplayColumn">Patricio Andrés Villanueva Fuentes</td>
                        <td class="unDisplayColumn">Lunes<br>27 Abril 2017</td>
                        <td class="unDisplayColumn">08:55 AM</td>
                        <td><button class="btn btn-primary btn-xs">Ver</button></td>
                    </tr>
                    <tr class="accordion">
                        <td colspan="7" class="activeAccordion">
                            <ul>
                                <li>Última actualización: Lunes 27 Abril 2017</li>
                                <li>Subido por: Patricio Andrés Villanueva Fuentes</li>
                                <li>Fecha Subida: Lunes 27 Abril 2017</li>
                                <li>Hora Subida: 08:52 AM</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                </tbody>
            </table>
        </div>
    </div>
<!-- ............................................................................................................................ -->
    </div>
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/jqueryUi/jquery-ui.min.js"></script>
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
       configSelect2();
    </script>
   <script>
       $(document).ready(function(){
           $( "#accordion" ).accordion();
           var flag = false;
           $('.btnPlus').click(function(){
               $('.accordion').css('display','none');
               var accordion = $(this).parent().parent().next();
               accordion.toggle(function(){
                   $(this).css('display','table-row');
                });
           });
           $(window).resize(function(){
               if($(window).width() > 970)
                   $($('.accordion').css('display','none'));
           });
       });
   </script>
</body>
</html>