<?php
	include '../../php/conexion.php';
    $datos = $_POST['datos'];
    $arreglo['edicion'] = array('nombre' => 0,'rut' => 0,'correo' => 0,'celular' => 0);
    $arreglo['msgNoEditados'] = array();
	$arreglo['msgEditados'] = array();
	$conexion = conectar();
    $id = $datos[0]['id'];
	if($datos[1]['nombre']['cambio'] == 1) {
		$nombre = mb_strtoupper($datos[1]['nombre']['modificado'],'utf-8');
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
        $rut = mb_strtoupper($datos[2]['rut']['modificado'],'utf-8');
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
		$correo = mb_strtoupper($datos[3]['correo']['modificado'],'utf-8');
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
?>
