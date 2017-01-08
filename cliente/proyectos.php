<?php
	include '../php/funciones.php'; 
	$name = $_POST['nombre'];
	$rut = $_POST['rut'];
	$email = $_POST['email'];
	$phone = $_POST['telefono'];
	$returnedData = verificaFormularioEmpresa($name,$rut,$email,$phone);
	echo json_encode($returnedData);
?>