<?php
	include("conexion.php");
    $c = conectar();
    $a = array();
    $q = 'SELECT * FROM zonas';
    if($re = mysqli_query($c,$q)) {
        while($r = mysqli_fetch_assoc($re)) {
            array_push($a,array('idZona' => $r['idZona'],'idEmpresa' => $r['idEmpresa'], 'nombre' => utf8_encode($r['nombre'])));
        }
    }
    mysqli_close($c);
    echo json_encode($a);
?>