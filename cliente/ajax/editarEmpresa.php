<?php
    sleep(1);
	include '../../php/conexion.php';
    $datos = $_POST['datos'];
    $arreglo['edicion'] = array('nombre' => 0,'rut' => 0,'correo' => 0,'celular' => 0);
    $arreglo['msgNoEditados'] = array();
	$arreglo['msgEditados'] = array();
	$conexion = conectar();
    mysqli_set_charset($conexion,'utf8');
    $id = $datos[0]['id'];
	if($datos[1]['nombre']['cambio'] == 1) {
		$nombre = $datos[1]['nombre']['modificado'];
		if($resultado = mysqli_query($conexion,"SELECT idEmpresa FROM empresas WHERE empresas.nombre = '$nombre'")) {
			if(mysqli_num_rows($resultado) >= 1)
				array_push($arreglo['msgNoEditados'],'El nombre ingresado ya está en uso');
			else
                if(mysqli_query($conexion,"UPDATE empresas SET empresas.nombre = '$nombre' WHERE empresas.idEmpresa = '$id'")) {
                    array_push($arreglo['msgEditados'],'Nombre editado correctamente');
                    $arreglo['edicion']['nombre'] = 1;
                }
		}
	}
    if($datos[2]['rut']['cambio'] == 1) {
        $rut = $datos[2]['rut']['modificado'];
        if($resultado = mysqli_query($conexion,"SELECT idEmpresa FROM empresas WHERE empresas.rut = '$rut'")) {
            if(mysqli_num_rows($resultado) >= 1)
                array_push($arreglo['msgNoEditados'],'El rut ingresado ya está en uso');
            else
                if(mysqli_query($conexion,"UPDATE empresas SET empresas.rut = '$rut' WHERE empresas.idEmpresa = '$id'")) {
                    array_push($arreglo['msgEditados'],'Rut editado correctamente');
                    $arreglo['edicion']['rut'] = 1;
                }
        }
    }
	if($datos[3]['correo']['cambio'] == 1) {
		$correo = $datos[3]['correo']['modificado'];
		if($resultado = mysqli_query($conexion,"SELECT idEmpresa AS correos FROM empresas WHERE empresas.correo = '$correo'")) {
			if(mysqli_num_rows($resultado) >= 1)
				array_push($arreglo['msgNoEditados'],'El correo ingresado ya está en uso');
			else
                if(mysqli_query($conexion,"UPDATE empresas SET empresas.correo = '$correo' WHERE empresas.idEmpresa = '$id'")) {
				    array_push($arreglo['msgEditados'],'Correo editado correctamente');
                    $arreglo['edicion']['correo'] = 1;
                }
		}
	}
	if($datos[4]['telefono']['cambio'] == 1) {
		$telefono = $datos[4]['telefono']['modificado'];
		if($resultado = mysqli_query($conexion,"SELECT idEmpresa AS telefonos FROM empresas WHERE empresas.telefono = '$telefono'")) {
			if(mysqli_num_rows($resultado) >= 1)
				array_push($arreglo['msgNoEditados'],'El teléfono ingresado ya está en uso');
			else
                if(mysqli_query($conexion,"UPDATE empresas SET empresas.telefono = '$telefono' WHERE empresas.idEmpresa = '$id'")) {
				    array_push($arreglo['msgEditados'],'Celular editado correctamente');
                    $arreglo['edicion']['celular'] = 1;
                }
		}
	}
	mysqli_close($conexion);
	echo json_encode($arreglo);
	/*$arreglo = $_POST['datos'];
	$arreglo['fracasos'] = 0;
	$arreglo['exitos'] = 0;
	$arreglo['errores'] = 0;
	$conexion = conectar();
    $id = $arreglo[0]['id'];
	if($arreglo[1]['nombre']['cambio'] == 1){
		$nombre = utf8_decode($arreglo[1]['nombre']['modificado']);
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
	echo json_encode($arreglo);*/
?>
