<?php
	include '../php/funciones.php';
	$identificador = $_POST['identificadorMaquina'];
	$patente = $_POST['patenteMaquina'];
	$velocidad = $_POST['velocidadMaquina'];
	$tara = $_POST['taraMaquina'];
	$year = $_POST['anhoMaquina'];
	$carga = $_POST['cargaMaquina'];
	$idZona = $_POST['idZonaMaquina'];
	$fechaRegistro = date("Y-m-d");
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
	if($patentes['patentes'] == "0") {
		$consulta = "INSERT INTO maquinas (idZona,identificador,patente,year,fechaRegistro,velocidadMaxima,tara,cargaMaxima) VALUES ('$idZona','$identificador','$patente','$year','$fechaRegistro','$velocidad','$tara','$carga')";
		if(mysqli_query($conexion,$consulta)) {
			$arreglo['exito'] = 1;
		}
		else {
			$arreglo['exito'] = 0;
		}		
	}
	echo json_encode($arreglo);
?>