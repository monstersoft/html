<?php
	include '../php/funciones.php';
	if(enviarMailRegistroSupervisor('Patricio Andrés Villanueva Fuentes','pavillanueva@ing.ucsc.cl','https://www.google.cl/search?q=mega&oq=mega&aqs=chrome..69i57j69i60l4.399j0j4&sourceid=chrome&ie=UTF-8#q=mega.co'))
		echo 'Bien';
	/*$nombre = $_POST['nombreSupervisor'];
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
			foreach ($zonas as $value) {
				$consulta = "INSERT INTO supervisoreszonas (idZona,idSupervisor) VALUES ('$value','$ultimoId')";
				if(mysqli_query($conexion,$consulta))
					$arreglo['exito'] = 1;
				else
					$arreglo['exito'] = 0;
			}
		}
		else {
			$arreglo['exito'] = 0;
		}
	}
	echo json_encode($arreglo);*/
?>