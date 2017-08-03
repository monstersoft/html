<?php
	include '../../php/conexion.php';
	$conexion = conectar();
	$id = $_POST['idEmpresa'];
	$consulta = "SELECT idEmpresa, rut, nombre, correo, telefono FROM empresas WHERE idEmpresa = '$id'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		$row = mysqli_fetch_assoc($resultado);
		$arreglo['idEmpresa'] = $row['idEmpresa'];
		$arreglo['rut'] = $row['rut'];
		$arreglo['nombre'] = $row['nombre'];
		$arreglo['correo'] = $row['correo'];
		$arreglo['telefono'] = $row['telefono'];
	}
	echo json_encode($arreglo);
?>