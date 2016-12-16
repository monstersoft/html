<?php
	include '../funciones.php';
	$name = $_POST['nombre'];
	$rut = $_POST['rut'];
	$email = $_POST['email'];
	$phone = $_POST['telefono'];
	$address= $_POST['direccion'];
	$returnedData = verificaFormularioEmpresa($name,$rut,$email,$phone,$address);
	echo json_encode($returnedData);
?>