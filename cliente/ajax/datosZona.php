<?php
	include '../../php/conexion.php';
	$conexion = conectar();
	$id = $_POST['id'];
	$arreglo = array();
	$consulta = "SELECT * FROM zonas WHERE zonas.idZona = '$id'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		$row = mysqli_fetch_assoc($resultado);
		$arreglo['idZona'] = $row['idZona'];
		$arreglo['idEmpresa'] = $row['idEmpresa']; 
		$arreglo['nombre'] = $row['nombre'];
	}
	echo json_encode($arreglo);
?>