<?php
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	if($id == 1)
		$arreglo['saludo'] = 'Funciono: '.$nombre;
	else  
		$arreglo['saludo'] = 'No funciona';
	echo json_encode($arreglo);
?>