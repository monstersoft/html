<?php
	include '../php/funciones.php'; 
	$id = $_POST['idEditar'];
	$rut = $_POST['rutEditar'];
	$name = $_POST['nombreEditar'];
	$email = $_POST['emailEditar'];
	$phone = $_POST['telefonoEditar'];
	$address= $_POST['direccionEditar'];
	/*$id = 3;
	$name = 'A';
	$rut = 'B';
	$email = 'C';
	$phone = '9';
	$address= 'KSAKLDKASDJ';*/
	$returnedData = editarEmpresa($id,$rut,$name,$email,$phone,$address);
	echo json_encode($returnedData);
?>