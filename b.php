<?php
	include 'php/conexion.php'; 
	$zonas = $_POST['zonasAsociadas'];
	$conexion = conectar();
	$arreglo = array();
	$arreglo['mensaje'] = 'tam: '.sizeof($zonas);
	$arreglo['m1'] = '1: '.$zonas[0];
	$arreglo['m2'] = '1: '.$zonas[1];
	echo json_encode($arreglo);
?>