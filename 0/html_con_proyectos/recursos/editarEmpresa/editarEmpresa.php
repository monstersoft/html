<?php
	include 'php/conexion.php';
	$arreglo = $_POST['datos'];
	$arreglo['fracasos'] = 0;
	$arreglo['exitos'] = 0;
	$arreglo['errores'] = 0;
	$conexion = conectar();
    $id = $arreglo[0]['id'];
	if($arreglo[1]['nombre']['cambio'] == 1){
		$nombre = $arreglo[1]['nombre']['modificado'];
		$consulta = "SELECT COUNT(*) AS nombres FROM empresas WHERE empresas.nombre = '$nombre'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$nombres = mysqli_fetch_assoc($resultado);
			if($nombres['nombres'] >= 1) {
				$arreglo['msgFracaso'][] = 'El nombre ingresado ya está en uso';
				$arreglo['fracasos']++;
			}
			else {
                $consulta = "UPDATE empresas SET empresas.nombre = '$nombre' WHERE empresas.idEmpresa = '$id'";
                if(mysqli_query($conexion,$consulta)) {
                    $arreglo['msgExito'][] = 'Nombre editado correctamente';
                    $arreglo['exitoNombre'] = 1;
                    $arreglo['exitos']++;
                    }
                else {
                    $arreglo['msgErrorCampo'][] = 'Error de consulta en el update nombre';
                    $arreglo['errores']++;
                }
			}
		}
		else {
			$arreglo['msgError'][] = 'Error de consulta en nombre';
			$arreglo['errores']++;
		}

	}
	if($arreglo[2]['rut']['cambio'] == 1){
		$rut = $arreglo[2]['rut']['modificado'];
		$consulta = "SELECT COUNT(*) AS ruts FROM empresas WHERE empresas.rut = '$rut'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$ruts = mysqli_fetch_assoc($resultado);
			if($ruts['ruts'] >= 1) {
				$arreglo['msgFracaso'][] = 'El rut ingresado ya está en uso';
				$arreglo['fracasos']++;
			}
			else {
                $consulta = "UPDATE empresas SET empresas.rut = '$rut' WHERE empresas.idEmpresa = '$id'";
                if(mysqli_query($conexion,$consulta)) {
				    $arreglo['msgExito'][] = 'Rut editado correctamente';
                    $arreglo['exitoRut'] = 1;
				    $arreglo['exitos']++;
                    }
                else {
                    $arreglo['msgErrorCampo'][] = 'Error de consulta en el update rut';
                    $arreglo['errores']++;
                }
			}
		}
		else {
			$arreglo['msgError'][] = 'Error de consulta en rut';
			$arreglo['errores']++;
		}

	}
	if($arreglo[3]['correo']['cambio'] == 1){
		$correo = $arreglo[3]['correo']['modificado'];
		$consulta = "SELECT COUNT(*) AS correos FROM empresas WHERE empresas.correo = '$correo'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$correos = mysqli_fetch_assoc($resultado);
			if($correos['correos'] >= 1) {
				$arreglo['msgFracaso'][] = 'El correo ingresado ya está en uso';
				$arreglo['fracasos']++;
			}
			else {
                $consulta = "UPDATE empresas SET empresas.correo = '$correo' WHERE empresas.idEmpresa = '$id'";
                if(mysqli_query($conexion,$consulta)) {
				    $arreglo['msgExito'][] = 'Correo editado correctamente';
                    $arreglo['exitoCorreo'] = 1;
				    $arreglo['exitos']++;
                    }
                else {
                    $arreglo['msgErrorCampo'][] = 'Error de consulta en el update correo';
                    $arreglo['errores']++;
                }
			}
		}
		else {
			$arreglo['msgError'][] = 'Error de consulta en correo';
			$arreglo['errores']++;
		}

	}
	if($arreglo[4]['telefono']['cambio'] == 1){
		$telefono = $arreglo[4]['telefono']['modificado'];
		$consulta = "SELECT COUNT(*) AS telefonos FROM empresas WHERE empresas.telefono = '$telefono'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$telefonos = mysqli_fetch_assoc($resultado);
			if($telefonos['telefonos'] >= 1) {
				$arreglo['msgFracaso'][] = 'El teléfono ingresado ya está en uso';
				$arreglo['fracasos']++;
			}
			else {
                $consulta = "UPDATE empresas SET empresas.telefono = '$telefono' WHERE empresas.idEmpresa = '$id'";
                if(mysqli_query($conexion,$consulta)) {
				    $arreglo['msgExito'][] = 'Teléfono editado correctamente';
                    $arreglo['exitoTelefono'] = 1;
				    $arreglo['exitos']++;
                    }
                else {
                    $arreglo['msgErrorCampo'][] = 'Error de consulta en el update telefono';
                    $arreglo['errores']++;
                }
			}
		}
		else {
			$arreglo['msgError'][] = 'Error de consulta en telefono';
			$arreglo['errores']++;
		}
	}
	mysqli_close($conexion);
	echo json_encode($arreglo);
?>