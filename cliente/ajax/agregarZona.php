<?php
	include '../../php/conexion.php'; 
    $name = strtoupper($_POST['nombre']);
	$id = $_POST['id'];
	$conexion = conectar();
    mysqli_set_charset($conexion,'utf8');
	$arreglo = array();
	$consulta = "SELECT COUNT(zonas.idZona) AS nombres FROM zonas WHERE zonas.idEmpresa = '$id' AND zonas.nombre = '$name'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		$nombres = mysqli_fetch_assoc($resultado);
		if($nombres['nombres'] >= 1) {
			$arreglo['msg'] = 'El nombre ingresado ya está en uso';
			$arreglo['exito'] = 0;
		}	
		if($nombres['nombres'] == 0) {
			$consulta = "INSERT INTO zonas (idEmpresa,nombre) VALUES ('$id','$name')";
			if(mysqli_query($conexion,$consulta))
				$arreglo['exito'] = 1;
			else 
				$arreglo['exito'] = 0;
		}
	}
	mysqli_close($conexion);
	echo json_encode($arreglo);
?>