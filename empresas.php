<?php
	include 'php/funciones.php';
	$name = $_POST['nombre'];
	$rut = $_POST['rut'];
	$email = $_POST['email'];
	$phone = $_POST['telefono'];
	$address= $_POST['direccion'];
	/*$name = 'Servicios bio bio';
	$rut = 762454181;
	$email = 'contacto@serviciosbiobio.cl';
	$phone = '412424026';*/
	$returnedData = verificaFormularioEmpresa($name,$rut,$email);
	echo json_encode($returnedData);
?>