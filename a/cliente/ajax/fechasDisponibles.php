<?php
	include '../../php/conexion.php'; 
	$idZona = $_POST['idZona'];
    $fechaDatos = $_POST['fechaDatos'];
    $arr = array();
    $arr['sadasd'] = $idZona.'/'.$fechaDatos;
    $arr['fechas'] = array([2017,03,27]);
    $arr['fechas'][] = [2017,03,26];
    echo json_encode($arr);
?>
