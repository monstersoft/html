
    /*require 'conexion.php';
    $idZona = $_POST['idZona'];
    $conexion = conectar();
    $consulta = "SELECT zonas.idZona, zonas.nombre AS zona, proyectos.idProyecto, proyectos.nombre AS proyecto, empresas.idEmpresa, empresas.nombre AS empresa, supervisores.idSupervisor, supervisores.status, supervisores.nombreSupervisor FROM empresas LEFT JOIN proyectos ON empresas.idEmpresa = proyectos.idEmpresa LEFT JOIN zonas ON proyectos.idProyecto = zonas.idProyecto LEFT JOIN supervisoreszonas ON zonas.idZona = supervisoreszonas.idZona LEFT JOIN supervisores ON supervisoreszonas.idSupervisor = supervisores.idSupervisor WHERE zonas.idZona = '$idZona'";
    $arreglo = array();
    $supervisores = array();
    $numeroSupervisores = 0;
    $existenSupervisores = true;
    $flag = true;
    if($resultado = mysqli_query($conexion,$consulta)){
        while($r = mysqli_fetch_assoc($resultado)) {
            if($flag) {
                $arreglo['idZona'] = $r['idZona'];
                $arreglo['zona'] = $r['zona'];
                $arreglo['idProyecto'] = $r['idProyecto'];
                $arreglo['proyecto'] = $r['proyecto'];
                $arreglo['idEmpresa'] = $r['idEmpresa'];
                $arreglo['empresa'] = $r['empresa'];
            }
            if($r['idSupervisor'] == null) {
                $existenSupervisores = false;
                $arreglo['supervisores'] = 'No existen supervisores';
            }
            else
                array_push($supervisores,array('id' => $r['idSupervisor'],'nombre' => $r['nombreSupervisor'],'status' => $r['status']));
        }
        $arreglo['exito'] = 1;
    }
    else 
        $arreglo['exito'] = 0;
    $arreglo['existenSupervisores'] = $existenSupervisores;
    $arreglo['supervisores'] = $supervisores;
    echo json_encode($arreglo);*/<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#262626">
    <title>Simulador de datos</title>
    <link rel="stylesheet" href="semantic.css">
    <link rel="stylesheet" href="../cliente/css/panel.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <style>
        /** {
            margin: 0 !important;
            padding: 0 !important;
            box-sizing: border-box !important;
        }*/
        .b {
            border: 1px solid #262626;
        }
        .a {
            color: #F5A214 !important;
        }
        .g {
            color: #262626 !important;
        }
    </style>
</head>
<body>

    <!--<div class="ui grid b">
        <div class="four wide mobile column">
            <h6 class="ui icon header"><i class="map icon"></i><div class="content">LOS ACACIOS<div class="sub header">ZONA</div></div></h6>
        </div>
        <div class="four wide mobile column">
            <h6 class="ui icon header"><i class="users icon"></i><div class="content">LOS ACACIOS<div class="sub header">ZONA</div></div></h6>
        </div>
        <div class="four wide mobile column">
            <h6 class="ui icon header"><i class="users icon"></i><div class="content">LOS ACACIOS<div class="sub header">ZONA</div></div></h6>
        </div>
        <div class="four wide mobile column">
            <h6 class="ui icon header"><i class="fa fa-industry icon"></i><div class="content">LOS ACACIOS<div class="sub header">ZONA</div></div></h6>
        </div>
    </div>-->
    <div class="ui top fixed menu">
        <p id="letra" class="ui center aligned header">
            Machine Monitors
        </p>
    </div>
    <div class="ui four column grid">
      <div class="column">
            <h6 class="ui icon header"><i class="file icon a"></i><div class="content">3600<div class="sub header">ARCHIVO</div></div></h6>
      </div>
      <div class="column">
            <h6 class="ui icon header"><i class="map icon a"></i><div class="content">LOS ALERCES<div class="sub header">ZONA</div></div></h6>
      </div>
      <div class="column">
            <h6 class="ui icon header"><i class="file text icon a"></i><div class="content">LOS ACACIOS<div class="sub header">PROYECTO</div></div></h6>
      </div>
      <div class="column">
            <h6 class="ui icon header"><i class="industry icon a"></i><div class="content">SERVICIOS BIO BIO<div class="sub header">EMPRESA</div></div></h6>
      </div>
    </div>
    <div class="ui equal width column grid">
      <div class="column">
            <h6 class="ui icon header"><i class="file icon a"></i><div class="content">ARCHIVO<div class="sub header">3600</div></div></h6>
      </div>
      <div class="column">
            <h6 class="ui icon header"><i class="map icon a"></i><div class="content">ZONA<div class="sub header">LOS ALERCES</div></div></h6>
      </div>
      <div class="column">
            <h6 class="ui icon header"><i class="file icon a"></i><div class="content">PROYECTO<div class="sub header">LOS ACACIOS</div></div></h6>
      </div>
      <div class="column">
            <h6 class="ui icon header"><i class="industry icon a"></i><div class="content">EMPRESA<div class="sub header">SERVICIOS BIO BIO</div></div></h6>
      </div>
    </div>
    <div class="ui four column grid">
      <div class="column">
            <h6 class="ui icon header"><i class="attach icon"></i><div class="content">3600<div class="sub header">ARCHIVO</div></div></h6>
      </div>
      <div class="column">
            <h6 class="ui icon header"><i class="map icon"></i><div class="content">LOS ALERCES<div class="sub header">ZONA</div></div></h6>
      </div>
      <div class="column">
            <h6 class="ui icon header"><i class="file text icon"></i><div class="content">LOS ACACIOS<div class="sub header">PROYECTO</div></div></h6>
      </div>
      <div class="column">
            <h6 class="ui icon header"><i class="industry icon"></i><div class="content">SERVICIOS BIO BIO<div class="sub header">EMPRESA</div></div></h6>
      </div>
    </div>
    <div class="ui equal width column grid">
      <div class="column">
            <h6 class="ui icon header"><i class="archive icon"></i><div class="content">ARCHIVO<div class="sub header">3600</div></div></h6>
      </div>
      <div class="column">
            <h6 class="ui icon header"><i class="map icon"></i><div class="content">ZONA<div class="sub header">LOS ALERCES</div></div></h6>
      </div>
      <div class="column">
            <h6 class="ui icon header"><i class="file text icon"></i><div class="content">PROYECTO<div class="sub header">LOS ACACIOS</div></div></h6>
      </div>
      <div class="column">
            <h6 class="ui icon header"><i class="industry icon"></i><div class="content">EMPRESA<div class="sub header">SERVICIOS BIO BIO</div></div></h6>
      </div>
    </div>
    <div class="ui equal width column grid">
      <div class="column">
            <h6 class="ui icon header"><i class="file icon"></i><div class="content">ARCHIVO<div class="sub header">3600</div></div></h6>
      </div>
      <div class="column">
            <h6 class="ui icon header"><i class="map icon"></i><div class="content">ZONA<div class="sub header">LOS ALERCES</div></div></h6>
      </div>
      <div class="column">
            <h6 class="ui icon header"><i class="file text icon"></i><div class="content">PROYECTO<div class="sub header">LOS ACACIOS</div></div></h6>
      </div>
      <div class="column">
            <h6 class="ui icon header"><i class="industry icon"></i><div class="content">EMPRESA<div class="sub header">SERVICIOS BIO BIO</div></div></h6>
      </div>
    </div>
    <script src="jquery2.js"></script>
    <script src="semantic.js"></script>
    <script src="chart.min.js"></script>
</body>
</html>