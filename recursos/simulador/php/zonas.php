<?php
	include("conexion.php");
    $c = conectar();
    $a = array();
    $b = array();
    $arr = array();
    $q = 'SELECT * FROM zonas';
    if($re = mysqli_query($c,$q)) {
        while($r = mysqli_fetch_assoc($re)) {
            array_push($a,array('idZona' => $r['idZona'],'idEmpresa' => $r['idEmpresa'], 'nombre' => utf8_encode($r['nombre'])));
        }
    }
    $idZona = $a[0]['idZona'];
    $q = "SELECT maquinas.idMaquina, maquinas.patente FROM maquinas WHERE maquinas.idZona = '$idZona'";
    if($re = mysqli_query($c,$q)) {
        while($r = mysqli_fetch_assoc($re)) {
            array_push($b,array('idMaquina' => $r['idMaquina'],'patente' => $r['patente']));
        }
    }
    $arr['zonas'] = $a;
    $arr['maquinas'] = $b;
    mysqli_close($c);
    echo json_encode($arr);
?>