<?php
	$rut = $_POST['rut'];
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$arreglo = insertarEmpresa($rut,$nombre,$correo,$direccion,$telefono);
	echo json_encode($arreglo);
?>