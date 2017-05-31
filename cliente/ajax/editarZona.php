<?php
	include '../../php/conexion.php';
	$arreglo = $_POST['datos'];
	$arreglo['fracasos'] = 0;
	$arreglo['exitos'] = 0;
	$arreglo['errores'] = 0;
	$conexion = conectar();
    $idEmpresa= $arreglo[0]['idEmpresa'];
    $idZona= $arreglo[1]['idZona'];
	if($arreglo[2]['nombre']['cambio'] == 1) {
		$nombre = utf8_decode($arreglo[2]['nombre']['modificado']);
		$consulta = "SELECT COUNT(zonas.idZona) 
					 AS nombres 
					 FROM zonas 
					 WHERE zonas.nombre = '$nombre' 
					 AND zonas.idEmpresa = '$idEmpresa'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$nombres = mysqli_fetch_assoc($resultado);
			if($nombres['nombres'] >= 1) {
				$arreglo['msgFracaso'][] = 'El nombre ingresado ya está en uso';
				$arreglo['fracasos']++;
			}
			else {
                $consulta = "UPDATE zonas SET zonas.nombre = '$nombre' WHERE zonas.idZona = '$idZona'";
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
	mysqli_close($conexion);
	echo json_encode($arreglo);
?>