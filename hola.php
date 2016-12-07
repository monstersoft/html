<?php 
	$nombre = $_POST['nombre'];
	$rut = $_POST['rut'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$direccion = $_POST['direccion'];
	$i=0;
	while($i<200000){
		$i++;
	}
	$arreglo = array();
	$arreglo['mensaje'] = 'FUNCIONA'.$nombre.$rut.$correo.$telefono.$direccion.$telefono;
	echo json_encode($arreglo);
?>