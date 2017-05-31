<?php
	include("conexion.php");
    $idZona = $_POST['idZona'];
    $c = conectar();
    $a = array();
    $q = "SELECT maquinas.idMaquina, maquinas.patente FROM maquinas WHERE maquinas.idZona = '$idZona'";
    if($re = mysqli_query($c,$q)) {
        while($r = mysqli_fetch_assoc($re)) {
            array_push($a,array('idMaquina' => $r['idMaquina'],'patente' => $r['patente']));
        }
    }
    mysqli_close($c);
    echo json_encode($a);
?>