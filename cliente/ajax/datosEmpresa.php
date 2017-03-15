<?php
	include '../../php/conexion.php';
	$conexion = conectar();
	//$id = $_POST['idEmpresa'];
	$id = 30;
	$arreglo = array();
	$consulta = "SELECT idEmpresa, rut, nombre, correo, telefono FROM empresas WHERE idEmpresa = '$id'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		while($row = mysqli_fetch_assoc($resultado)) {
	    	$arreglo['idEmpresa'] = $row['idEmpresa'];
			$arreglo['rut'] = $row['rut'];
			$arreglo['nombre'] = $row['nombre'];
			$arreglo['correo'] = $row['correo'];
			$arreglo['telefono'] = $row['telefono'];
        }
	}
    $arreglo = utf8Converter($arreglo);
	echo json_encode($arreglo);


	function utf8Converter($array) {
	    array_walk_recursive($array, function($item, $key){
	        if(!mb_detect_encoding($item, 'utf-8', true)){
	                $item = utf8_encode($item);
	        }
	    });
    return $array;
	}
?>