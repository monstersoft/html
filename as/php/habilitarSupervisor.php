<?php
	include('conexion.php'); 
	$idSupervisor = $_POST['idSupervisor'];
	$nuevo = $_POST['nuevoPassword'];
	$confirmar = $_POST['confirmarPassword'];
	$telefono = $_POST['telefono'];
	$fechaActual = date('Y-m-d');
	$arreglo = array();
	$conexion = conectar();
	$consulta = "UPDATE supervisores SET password = '$nuevo', celular = '$telefono', status = 1 , fechaRegistro = '$fechaActual' WHERE idSupervisor = '$idSupervisor'";
	if(mysqli_query($conexion,$consulta)){
		$arreglo['exito'] = 1;
	}
	else{
		$arreglo['exito'] = 0;
	}
	echo json_encode($arreglo);
?>