<?php
	include("conexion.php");
    $arr = array('zonas' => array(), 'maquinas' => array());
    $c = conectar();
    $q = 'SELECT * FROM zonas';
    if($re = mysqli_query($c,$q)) {
        while($r = mysqli_fetch_assoc($re)) {
            array_push($arr['zonas'],array('idZona' => $r['idZona'],'idEmpresa' => $r['idEmpresa'], 'nombre' => $r['nombre']));
        }
    }
    $idZona = $arr['zonas'][0]['idZona'];
    $idZona = 6;
    $q = "SELECT maquinas.idMaquina, maquinas.patente FROM maquinas WHERE maquinas.idZona = '$idZona'";
    if($re = mysqli_query($c,$q)) {
        while($r = mysqli_fetch_assoc($re)) {
            array_push($arr['maquinas'],array('idMaquina' => $r['idMaquina'],'patente' => $r['patente']));
        }
    }
    mysqli_close($c);
    echo json_encode($arr);
?>