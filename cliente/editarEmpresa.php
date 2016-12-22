<?php
	include '../php/conexion.php';
	/*$arreglo = array();
	$arreglo[0]['id'] = 1;
	$arreglo[1]['nombre']['cambio'] = 0;
	$arreglo[1]['nombre']['modificado'] = '45646';
	$arreglo[2]['rut']['cambio'] = 1;
	$arreglo[2]['rut']['modificado'] = '17286211-k';
	$arreglo[3]['correo']['cambio'] = 1;
	$arreglo[3]['correo']['modificado'] = 'contacto@jcb.cl';
	$arreglo[4]['telefono']['cambio'] = 1;
	$arreglo[4]['telefono']['modificado'] = 123456709;*/
	$arreglo = $_POST['datos'];
	$arreglo['fracasos'] = 0;
	$arreglo['exitos'] = 0;
	$arreglo['errores'] = 0;
	$conexion = conectar();
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
				$arreglo['msgExito'][] = 'Nombre editado correctamente';
				$arreglo['exitos']++;
			}
		}
		else {
			$arreglo['msgError'] = 'Error de consulta en nombre';
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
				$arreglo['msgExito'][] = 'Rut editado correctamente';
				$arreglo['exitos']++;
			}
		}
		else {
			$arreglo['msgError'] = 'Error de consulta en rut';
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
				$arreglo['msgExito'][] = 'Correo editado correctamente';
				$arreglo['exitos']++;
			}
		}
		else {
			$arreglo['msgError'] = 'Error de consulta en correo';
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
				$arreglo['msgExito'][] = 'Teléfono editado correctamente';
				$arreglo['exitos']++;
			}
		}
		else {
			$arreglo['msgError'] = 'Error de consulta en telefono';
			$arreglo['errores']++;
		}
	}
	mysqli_close($conexion);
	echo json_encode($arreglo);
?>
