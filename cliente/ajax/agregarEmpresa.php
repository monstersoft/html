<?php
    sleep(2);
	include '../../php/conexion.php'; 
    $name = strtoupper($_POST['nombre']);
	$rut = strtoupper($_POST['rut']);
	$email = strtolower($_POST['email']);
	$celular = $_POST['celular'];
	$returnedData = verificaFormularioEmpresa($name,$rut,$email,$celular);
	echo json_encode($returnedData);

	function verificaFormularioEmpresa($name,$rut,$email,$phone) {
		$conexion = conectar();
        mysqli_set_charset($conexion,"utf8");
		$arreglo = array();
		$consulta = "SELECT COUNT(*) AS nombres FROM empresas WHERE empresas.nombre = '$name'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$nombres = mysqli_fetch_assoc($resultado);
			if($nombres['nombres'] == 1) {
				$arreglo['msg'][]= 'El nombre ingresado ya está en uso';
				$arreglo['exito'] = 0;
			}
		}

		$consulta = "SELECT COUNT(*) AS ruts FROM empresas WHERE empresas.rut = '$rut'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$ruts = mysqli_fetch_assoc($resultado);
			if($ruts['ruts'] == 1) {
				$arreglo['msg'][] = 'El rut ingresado ya está en uso';
				$arreglo['exito'] = 0;
			}
		}
		$consulta = "SELECT COUNT(*) AS correos FROM empresas WHERE empresas.correo = '$email'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$correos = mysqli_fetch_assoc($resultado);
			if($correos['correos'] == 1) {
				$arreglo['msg'][] = 'El correo ingresado ya está en uso';
				$arreglo['exito'] = 0;
			}
		}
		$consulta = "SELECT COUNT(*) AS telefonos FROM empresas WHERE empresas.telefono = '$phone'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$telefonos = mysqli_fetch_assoc($resultado);
			if($telefonos['telefonos'] == 1) {
				$arreglo['msg'][] = 'El teléfono ingresado ya está en uso';
				$arreglo['exito'] = 0;
			}
		}
		if($nombres['nombres'] == "0" && $ruts['ruts'] == "0" && $correos['correos'] == "0" && $telefonos['telefonos'] == "0") {
			$consulta = "INSERT INTO empresas (rut,nombre,correo,telefono) VALUES ('$rut','$name','$email','$phone')";
			if(mysqli_query($conexion,$consulta)) {
				$arreglo['exito'] = 1;
			}
			else {
				$arreglo['exito'] = 0;
			}
		}
		mysqli_close($conexion);
		return $arreglo;
	}
?>