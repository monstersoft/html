<?php
	include '../../php/funciones.php';
	$idZona = $_POST['id'];
	$identificador = $_POST['identificador'];
	$patente = $_POST['patente'];
	$fechaRegistro = date("Y-m-d");
	$tara = $_POST['tara'];
	$carga = $_POST['carga'];
	$conexion = conectar();
	$arreglo = array();
	$consulta = "SELECT COUNT(patente) AS patentes FROM maquinas WHERE  patente = '$patente'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		$patentes = mysqli_fetch_assoc($resultado);
		if($patentes['patentes'] == 1) {
			$arreglo['msg'][] = 'La patente ingresada ya está registrada';
			$arreglo['exito'] = 0;
		}
	}
	$consulta = "SELECT COUNT(identificador) AS identificadores FROM maquinas WHERE identificador = '$identificador' AND idZona = '$idZona'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		$identificadores = mysqli_fetch_assoc($resultado);
		if($identificadores['identificadores'] == 1) {
			$arreglo['msg'][] = 'El identificador ingresado ya está en uso';
			$arreglo['exito'] = 0;
		}
	}
	if($patentes['patentes'] == 0 && $identificadores['identificadores'] == 0) {
		$consulta = "INSERT INTO maquinas (idZona,identificador,patente,fechaRegistro,tara,cargaMaxima) VALUES ('$idZona','$identificador','$patente','$fechaRegistro','$tara','$carga')";
		if(mysqli_query($conexion,$consulta)) {
			$arreglo['exito'] = 1;
		}
		else {
			$arreglo['exito'] = 0;
		}		
	}
	echo json_encode($arreglo);
?>