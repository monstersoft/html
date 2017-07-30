<?php
	include '../../php/conexion.php';
	$datos = $_POST['datos'];
	$arreglo['edicion'] = array('nombre' => 0);
    $arreglo['msgNoEditados'] = array();
	$arreglo['msgEditados'] = array();
	$conexion = conectar();
    $idEmpresa= $datos[0]['idEmpresa'];
    $idZona= $datos[1]['idZona'];
	if($datos[2]['nombre']['cambio'] == 1) {
		$nombre = $datos[2]['nombre']['modificado'];
		if($resultado = mysqli_query($conexion,"SELECT idZona FROM zonas WHERE zonas.nombre = '$nombre' AND zonas.idEmpresa = '$idEmpresa'"))
			if(mysqli_num_rows($resultado) >= 1)
				array_push($arreglo['msgNoEditados'],'El nombre ingresado ya está en uso');
			else
                if(mysqli_query($conexion,"UPDATE zonas SET zonas.nombre = '$nombre' WHERE zonas.idZona = '$idZona'")) {
                    array_push($arreglo['msgEditados'],'Nombre editado correctamente');
                    $arreglo['edicion']['nombre'] = 1;
                }
	}
	mysqli_close($conexion);
	echo json_encode($arreglo);
?>