<?php
	include '../php/funciones.php'; 
	$id = $_POST['idEditar'];
	$rut = $_POST['rutEditar'];
	$name = $_POST['nombreEditar'];
	$email = $_POST['emailEditar'];
	$phone = $_POST['telefonoEditar'];
	$address= $_POST['direccionEditar'];
	$verificar = verificaFormularioEmpresa($name,$rut,$email,$phone,$address);
	if($verificar['exito']) == 0) {
		$returnedData = editarEmpresa($id,$rut,$name,$email,$phone,$address);
		echo json_encode($returnedData);
	}
	else {
		echo json_encode($verificar);
	}
?>