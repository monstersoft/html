<?php
	include '../php/conexion.php'; 
	$name = $_POST['nombreProyecto'];
	$id = $_POST['idEmpresa'];
	$conexion = conectar();
	$arreglo = array();
	$consulta = "SELECT COUNT(*) AS nombres FROM proyectos WHERE proyectos.idEmpresa = '$id' AND proyectos.nombre = '$name'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		$nombres = mysqli_fetch_assoc($resultado);
		if($nombres['nombres'] >= 1) {
			$arreglo['msg'] = 'El nombre ingresado ya está en uso';
			$arreglo['exito'] = 0;
		}	
		if($nombres['nombres'] == 0) {
			$consulta = "INSERT INTO proyectos (idEmpresa,nombre) VALUES ('$id','$name')";
			if(mysqli_query($conexion,$consulta))
				$arreglo['exito'] = 1;
			else 
				$arreglo['exito'] = 0;
		}
	}
	mysqli_close($conexion);
	echo json_encode($arreglo);
?>