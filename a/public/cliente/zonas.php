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
    <link rel="stylesheet" href="../../recursos/select2/select2.min.css">
    <link rel="stylesheet" href="../../recursos/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="../../recursos/pickadate/default.css">
    <link rel="stylesheet" href="../../recursos/pickadate/default.date.css">
    <link rel="stylesheet" href="../../recursos/pickadate/default.time.css">
    <link rel="stylesheet" href="../../recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../recursos/animate/animate.css">
    <link rel="stylesheet" href="../../recursos/responsiveTables/jquery.stickytable.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/a.css">
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
<!-- ............................................................................................................................ -->
<!--<div class="col-xs-12">
    <form method='POST' action='maquinas.php'>
        <div class="form-group">
            <label for="zonas" class="control-label">Zonas Asociadas</label>
            <select style="width: 100%;" id="zonas" name="zona" class="form-control select2-single">
                <?php foreach($arreglo as $value) { echo '<option value="'.$value['idZona'].'">'.$value['nombre'].'</option>';}?>
            </select>
        </div>
        <div class="form-group">
            <label for="zonas" class="control-label">Fecha Datos</label>
            <input type="date" id="fechaDatos" name="fechaDatos" class="form-control datepicker">
        </div>
        <div class="clearfix">
            <input type="submit" value="submit">
        </div>
    </form>
</div>-->
<div class="col-xs-12 col-sm-6 card">
    <div class="col-xs-12 shadow cardContent">
        <div class="col-xs-12 titleCard"> <i class="fa fa-industry pull-left"></i>
            <p>SERVICIOS BÍO BÍO</p>
        </div>
        <div class="col-xs-10 cardContent">
            <div class="sticky-table sticky-headers sticky-ltr-cells">
                <table>
                    <thead>
                        <tr>
                            <th class="sticky-cell">Zona</th>
                            <th class="sticky-cell">Fecha consulta</th>
                            <th>Ultima actualización</th>
                            <th>Subido por</th>
                            <th>Fecha subida</th>
                            <th>Hora subida</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="sticky-cell">Concepción</td>
                            <td class="sticky-cell"><span>Lunes</span><br>05/07/2017</td>
                            <td>Martes<br>07/05/2017</td>
                            <td>Patricio Andrés Villanueva Fuentes</td>
                            <td>Martes<br>07/05/2017</td>
                            <td>08:55: AM</td>
                        </tr>
                        <tr>
                            <td class="sticky-cell">Concepción</td>
                            <td class="sticky-cell">Lunes<br>05/07/2017</td>
                            <td>Martes<br>07/05/2017</td>
                            <td>Juan Antonio Pérez Pérez</td>
                            <td>Martes<br>07/05/2017</td>
                            <td>08:55 AM</td>
                        </tr>
                    </tbody>
                </table>
              </div>
        </div>
        <div class="col-xs-2 cardContent" style="margin-top: 27px;">
            <div class="buttonsContainer">
                <a href=""><i class="fa fa-calendar"></i></a><a href=""><i class="fa fa-search"></i></a>
            </div>
            <div class="buttonsContainer">
                <a href=""><i class="fa fa-calendar"></i></a><a href=""><i class="fa fa-search"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-6 card">
    <div class="col-xs-12 shadow cardContent">
        <div class="col-xs-12 titleCard"> <i class="fa fa-industry pull-left"></i>
            <p>SERVICIOS BÍO BÍO</p>
        </div>
        <div class="col-xs-10 cardContent">
            <div class="sticky-table sticky-headers sticky-ltr-cells">
                <table>
                    <thead>
                        <tr>
                            <th class="sticky-cell">Zona</th>
                            <th>Fecha consulta</th>
                            <th>Ultima actualización</th>
                            <th>Subido por</th>
                            <th>Fecha subida</th>
                            <th>Hora subida</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="sticky-cell">Concepción</td>
                            <td><span>Lunes</span><br>05/07/2017</td>
                            <td>Martes<br>07/05/2017</td>
                            <td>Patricio Andrés Villanueva Fuentes</td>
                            <td>Martes<br>07/05/2017</td>
                            <td>08:55: AM</td>
                        </tr>
                        <tr>
                            <td class="sticky-cell">Concepción</td>
                            <td>Lunes<br>05/07/2017</td>
                            <td>Martes<br>07/05/2017</td>
                            <td>Juan Antonio Pérez Pérez</td>
                            <td>Martes<br>07/05/2017</td>
                            <td>08:55 AM</td>
                        </tr>
                    </tbody>
                </table>
              </div>
        </div>
        <div class="col-xs-2 cardContent" style="margin-top: 27px;">
            <div class="buttonsContainer">
                <a href=""><i class="fa fa-calendar"></i></a><a href=""><i class="fa fa-search"></i></a>
            </div>
            <div class="buttonsContainer">
                <a href=""><i class="fa fa-calendar"></i></a><a href=""><i class="fa fa-search"></i></a>
            </div>
        </div>
    </div>
</div>


<!-- ............................................................................................................................ -->
    </div>
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../recursos/select2/select2.full.js"></script>
    <script src="../../recursos/pickadate/picker.js"></script>
    <script src="../../recursos/pickadate/picker.date.js"></script>
    <script src="../../recursos/pickadate/picker.time.js"></script>
    <script src="../../recursos/responsiveTables/jquery.stickytable.js"></script>
    <script src="../../recursos/moment/moment.js"></script>
    <script src="../../js/funciones.js"></script>
    <script src="../../js/config.js"></script>
    <script>main();</script>
    <script>
       fechaHoy(); 
       configSelect2();
    </script>
</body>
</html>