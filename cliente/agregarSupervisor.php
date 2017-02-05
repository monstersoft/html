<?php
	include '../php/funciones.php';
	$nombre = $_POST['nombreSupervisor'];
	$email = $_POST['correoSupervisor'];
	$zonas = $_POST['zonasAsociadas'];
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
	if($correos['correos'] == "0") {
		$consulta = "INSERT INTO supervisores (nombreSupervisor,correoSupervisor,password,celular,status) VALUES ('$nombre','$email',null,null,2)";
		if(mysqli_query($conexion,$consulta)) {
			$ultimoId = mysqli_insert_id($conexion);
			$link = 'http://localhost/html/php/confirmarRegistro.php?id='.$ultimoId;
			foreach ($zonas as $value) {
				$consulta = "INSERT INTO supervisoreszonas (idZona,idSupervisor) VALUES ('$value','$ultimoId')";
				if(mysqli_query($conexion,$consulta)) {
					$arreglo['exito'] = 1;
					$arreglo['insercionesCorrectas'][] = 1;
				}
				else {
					$arreglo['insercionesCorrectas'][] = 0;
                }
			}
			$bandera = 0;
			foreach ($arreglo['insercionesCorrectas'] as $value) {
				if($value == 1)
					$bandera = 1;
				else
					$bandera = 0;
			}
			if($bandera == 1) {
				if(enviarMailRegistroSupervisor($nombre,$email,$link)){
					$arreglo['mailEnviado'] = 'Si';
					$arreglo['exito'] = 1;
				}
				else {
					$arreglo['mailEnviado'] = 'No';
					$arreglo['exito'] = 0;
				}
			}
		}
		else {
			$arreglo['exito'] = 0;
		}
			
	}
	echo json_encode($arreglo);
?>