<?php
/*    include '../../php/conexion.php';
    $fechaDatos = $_POST['fechaDatos'];
    $zona = $_POST['zona'];
	$conexion = conectar();
	$arreglo = array();
    $arreglo2 = array();
	$con1 = "SELECT * FROM maquinas WHERE maquinas.idZona = '$zona'";
	if($res1 = mysqli_query($conexion,$con1)) {
		while($row = mysqli_fetch_assoc($res1)) {
			array_push($arreglo,array('idMaquina' => $row['idMaquina'], 'idZona' => $row['idZona'], 'identificador' => $row['identificador'], 'patente' => $row['patente'], 'fechaRegistro' => $row['fechaRegistro'], 'tara' => $row['tara'], 'cargaMaxima' => $row['cargaMaxima']));
        }
	}
    $consulta = "SELECT datos.identificador  FROM archivos LEFT JOIN datos ON archivos.idArchivo = datos.idArchivo WHERE archivos.idZona = '$zona' GROUP BY datos.identificador";
	if($resultado = mysqli_query($conexion,$consulta)) {
		while($row = mysqli_fetch_assoc($resultado)) {
			array_push($arreglo2,array('identificador' => $row['identificador']));
        }
	}*/
    $fecha = $_POST['fechaRecienteDatos'];
    $idZona = $_POST['idZona'];
    $idArchivo = $_POST['idArchivo'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../recursos/animate/animate.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/zonasCliente.css">
    <style>
        .cardContent {
            font-family: 'Montserrat';
        }

.legend .number {
    font-size: 20px;
    font-weight: bold;
}
.legend .subLegend {
    font-size: 12px;
}
        

        .info ul  {
            padding-left: 20px;
        }
        .info ul li {
            list-style: none;
        }
        .center {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
        .patente {
            font-size: 25px;
            font-weight: bold;
            color: #262626;
        }
        .numero {
            font-size: 20px;
            font-weight: bold;
        }
        .legend {
            font-size: 16px;
        }
        .disponible {
            position: absolute;
            top: 10px;
            left: 20px;
            color: #F5A214;
            z-index: 100;
            font-size: 40px;
        }

    </style>
</head>
<body>
    <div id="bar"><a id="clickMenu"><i class="fa fa-bars"></i></a><p class="editarZona">Machine Monitors</p></div>
    <nav class="unDisplayNav">
        <ul>
            <li id="profile"><i class="fa fa-cogs fa-4x" id="iconProfile"></i><br><span id="titleProfile">Pato</span><br><span id="nameProfile">Arauco</span></li>
            <li><a href="zonas.php"><i class="fa fa-globe icons"></i>Zonas</a></li>
            <li><a href="registro.php"><i class="fa fa-file-text icons"></i>Registro</a></li>
            <li><a href="historicos.php"><i class="fa fa-bar-chart icons"></i>Históricos</a></li>
            <li><a href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
            <li><a href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
            <li><a href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>
        </ul>
    </nav>
    <div id="content" class="animated fadeInUp unLeftContent">
<!-- ............................................................................................................................ -->


<?php 
        echo $idZona.'<br>';
        echo $fecha.'<br>';
        echo $idArchivo.'<br>';
        ?>
<div class="col-xs-12 col-sm-4 col-md-2 card"> 
    <div class="col-xs-12 shadowButtonDown cardContent"> 
        <div class="col-xs-12 titleCard"> 
            <i class="fa fa-check-circle pull-left"></i>
            <p>ABC 123 CD - 01</p>
        </div>
        <div class="col-xs-12" style="padding: 10px;">
            <div class="center">
                <img style="float: left;" src="excavator2.svg" width="60" height="60">
                <div style="float: left;" class="info">
                   <ul>
                    <li class="numero">1000 km </li>
                    <li class="legend">RECORRIDOS</li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <a href="registroZonas.php?id='.$value['idEmpresa'].'" class="boton">Detalle</a> 
</div>


<div class="col-xs-12 col-sm-4 col-md-2 card"> 
    <div class="col-xs-12 shadowButtonDown cardContent"> 
        <div class="col-xs-12 titleCard"> 
            <i class="fa fa-check-circle pull-left"></i>
            <p>ABC 123 CD - 01</p>
        </div>
        <div class="col-xs-12" style="padding: 10px;">
            <div class="center">
                <img style="float: left;" src="excavator2.svg" width="60" height="60">
                <div style="float: left;" class="info">
                   <ul>
                    <li class="numero">1000 km </li>
                    <li class="legend">RECORRIDOS</li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <a href="registroZonas.php?id='.$value['idEmpresa'].'" class="boton">Detalle</a> 
</div>
<div class="col-xs-12 col-sm-4 col-md-2 card"> 
    <div class="col-xs-12 shadowButtonDown cardContent"> 
        <div class="col-xs-12 titleCard"> 
            <i class="fa fa-check-circle pull-left"></i>
            <p>ABC 123 CD - 01</p>
        </div>
        <div class="col-xs-12" style="padding: 10px;">
            <div class="center">
                <img style="float: left;" src="excavator2.svg" width="60" height="60">
                <div style="float: left;" class="info">
                   <ul>
                    <li class="numero">1000 km </li>
                    <li class="legend">RECORRIDOS</li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <a href="registroZonas.php?id='.$value['idEmpresa'].'" class="boton">Detalle</a> 
</div>
<div class="col-xs-12 col-sm-4 col-md-2 card"> 
    <div class="col-xs-12 shadowButtonDown cardContent"> 
        <div class="col-xs-12 titleCard"> 
            <i class="fa fa-check-circle pull-left"></i>
            <p>ABC 123 CD - 01</p>
        </div>
        <div class="col-xs-12" style="padding: 10px;">
            <div class="center">
                <img style="float: left;" src="excavator2.svg" width="60" height="60">
                <div style="float: left;" class="info">
                   <ul>
                    <li class="numero">1000 km </li>
                    <li class="legend">RECORRIDOS</li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <a href="registroZonas.php?id='.$value['idEmpresa'].'" class="boton">Detalle</a> 
</div>
<div class="col-xs-12 col-sm-4 col-md-2 card"> 
    <div class="col-xs-12 shadowButtonDown cardContent"> 
        <div class="col-xs-12 titleCard"> 
            <i class="fa fa-check-circle pull-left"></i>
            <p>ABC 123 CD - 01</p>
        </div>
        <div class="col-xs-12" style="padding: 10px;">
            <div class="center">
                <img style="float: left;" src="excavator2.svg" width="60" height="60">
                <div style="float: left;" class="info">
                   <ul>
                    <li class="numero">1000 km </li>
                    <li class="legend">RECORRIDOS</li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <a href="registroZonas.php?id='.$value['idEmpresa'].'" class="boton">Detalle</a> 
</div>
<div class="col-xs-12 col-sm-4 col-md-2 card"> 
    <div class="col-xs-12 shadowButtonDown cardContent"> 
        <div class="col-xs-12 titleCard"> 
            <i class="fa fa-check-circle pull-left"></i>
            <p>ABC 123 CD - 01</p>
        </div>
        <div class="col-xs-12" style="padding: 10px;">
            <div class="center">
                <img style="float: left;" src="excavator2.svg" width="60" height="60">
                <div style="float: left;" class="info">
                   <ul>
                    <li class="numero">1000 km </li>
                    <li class="legend">RECORRIDOS</li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <a href="registroZonas.php?id='.$value['idEmpresa'].'" class="boton">Detalle</a> 
</div>


<div class="col-xs-12 col-sm-12 card">
        <div class="col-xs-12 shadowButtonDown cardContent">
            <div class="col-xs-12 titleCard"> <i style="color: #262626;" class="fa fa-times-circle pull-left"></i>
                <p>No Disponibles</p>
            </div>
        </div>
        <div class="col-xs-12 shadow cardContent">
            <table>
                <thead>
                    <tr>
                        <th>Patente</th>
                        <th>ID</th>
                        <th class="unDisplayColumn">Estado</th>
                        <th class="unDisplayColumn">Fecha registro</th>
                        <th class="unDisplayColumn">Días Disponible</th>
                        <th class="unDisplayColumn">Hora subida</th>
                    </tr>
                </thead>
                <tbody>          
                    <tr>
                        <td class="tdPosition"><div class="btnPlus"><i class="fa fa-plus"></i></div>ABC DE 123</td>
                        <td>1</td>
                        <td class="unDisplayColumn">No Disponible</td>
                        <td class="unDisplayColumn">Lunes<br>27 Abril 2017</td>
                        <td class="unDisplayColumn">20 / 100</td>
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
                </tbody>
            </table>
        </div>
    </div>




          


                       

                        
                        
       <!-- <div class="col-xs-12">
            <h1>Máquinas registradas</h1>
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th>idMaquina</th>
                        <th>idZona</th>
                        <th>identificador</th>
                        <th>patente</th>
                        <th>fechaRegistro</th>
                        <th>tara</th>
                        <th>cargaMaxima</th>
                    </tr>
                </thead>
                <tbody><?php $registrados = array(); foreach($arreglo as $value) { echo '<tr><td>'.$value['idMaquina'].'</td><td>'.$value['idZona'].'</td><td>'.$value['identificador'].'<a href="dashboard.php?i='.$value['identificador'].'&z='.$value['idZona'].'">Ver Resultados</a></td><td>'.$value['patente'].'</td><td>'.$value['fechaRegistro'].'</td><td>'.$value['tara'].'</td><td>'.$value['cargaMaxima'].'</td></tr>'; array_push($registrados,$value['identificador']);}?></tbody>
            </table>
        </div>
        <div class="col-xs-12">
            <h1>Máquinas en archivos</h1>
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th>identificador</th>
                    </tr>
                </thead>
                <tbody><?php $enArchivos = array(); foreach($arreglo2 as $value) { echo '<tr><td>'.$value['identificador'].'<a href="dashboard.php?i='.$value['identificador'].'">Ver Resultados</a></td></tr>'; array_push($enArchivos,$value['identificador']);}?></tbody>
            </table>
        </div>
        <div class="col-xs-12">
            <h1>Máquinas registradas que no están en archivos</h1>
            <?php
                $resultado = array_diff($registrados,$enArchivos);
                print_r($resultado);
            ?>
        </div>
        <div class="col-xs-12">
            <h1>Máquinas que están en archivos y  que no están registradas</h1>
            <?php
                $resultado = array_diff($enArchivos,$registrados);
                print_r($resultado);
            ?>
        </div>
        <div class="col-xs-12">
            <h1>Máquinas que no están disponibles</h1>
            <?php
                $resultado = array_diff($enArchivos,$registrados);
                print_r($resultado);
            ?>
        </div>-->
<!-- ............................................................................................................................ -->
    </div>
    <script src="../../recursos/jquery/jquery.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../recursos/moment/moment.js"></script>
    <script src="../../js/funciones.js"></script>    
    <script>main();</script>
</body>
</html>