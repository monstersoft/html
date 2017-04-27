<?php
	include '../../php/conexion.php'; 
	$idZona = $_POST['idZona'];
    $fechaDatos = $_POST['fechaDatos'];
    $arr = array();
    $arr = $idZona.'-'.$fechaDatos;
    echo json_encode($arr);
?>
	