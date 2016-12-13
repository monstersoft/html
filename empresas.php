<?php
	include 'php/funciones.php';
	$name = $_POST['nombre'];
	$rut = $_POST['rut'];
	$email = $_POST['email'];
	$phone = $_POST['telefono'];
	$adrress= $_POST['direccion'];
	$returnedData = verificaFormularioEmpresa($name,$rut,$email);
	$returnedData['phone'] = $phone;
	$returnedData['adrress'] = $adrress;
	echo json_encode($returnedData);
?>