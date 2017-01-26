<?php
	include '../php/conexion.php'; 
	$nombre = $_POST['nombreSupervisor'];
	$email = $_POST['correoSupervisor'];
	$celular = $_POST['celularSupervisor'];
	$zonas = $_POST['zonasAsociadas'];
	$idProyecto = $_POST['idZonaSupervisor'];
	$conexion = conectar();
	$arreglo = array();
	$consulta = "SELECT COUNT(idSupervisor) AS correos FROM supervisores WHERE correoSupervisor = '$email'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		$correos = mysqli_fetch_assoc($resultado);
		if($correos['correos'] == 1) {
			$arreglo['msg'][] = 'El correo ingresado ya está en uso';
			$arreglo['exito'] = 0;
		}
	}
	$consulta = "SELECT COUNT(idSupervisor) AS telefonos FROM supervisores WHERE celular = '$celular'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		$telefonos = mysqli_fetch_assoc($resultado);
		if($telefonos['telefonos'] == 1) {
			$arreglo['msg'][] = 'El teléfono ingresado ya está en uso';
			$arreglo['exito'] = 0;
		}
	}
	if($correos['correos'] == "0" && $telefonos['telefonos'] == "0") {
		$arreglo['exito'] = 1;
		/*$consulta = "INSERT INTO empresas (rut,nombre,correo,telefono) VALUES ('$rut','$name','$email','$phone')";
		if(mysqli_query($conexion,$consulta)) {
			$arreglo['exito'] = 1;
		}
		else {
			$arreglo['exito'] = 0;
		}*/
		$arreglo['msg']= sizeof($zonas);
	}
	echo json_encode($arreglo);
?>