<?php
	include '../../php/conexion.php';
	$idZona = $_POST['id'];
	$patente = $_POST['patente'];
	$fechaRegistro = date("Y-m-d");
	$tara = $_POST['tara'];
	$carga = $_POST['carga'];
	$conexion = conectar();
	$arreglo = array();
	$consulta = "SELECT COUNT(patente) AS patentes FROM maquinas WHERE  patente = '$patente' AND idZona = '$idZona'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		$patentes = mysqli_fetch_assoc($resultado);
		if($patentes['patentes'] == 1) {
			$arreglo['msg'] = 'La patente ya está en uso para esta zona';
			$arreglo['exito'] = 0;
		}
	}
	if($patentes['patentes'] == 0) {
		$consulta = "INSERT INTO maquinas (idZona,patente,fechaRegistro,tara,cargaMaxima) VALUES ('$idZona','$patente','$fechaRegistro','$tara','$carga')";
		if(mysqli_query($conexion,$consulta)) {
			$arreglo['exito'] = 1;
		}
		else {
			$arreglo['exito'] = 0;
		}		
	}
	echo json_encode($arreglo);
?>