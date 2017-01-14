<?php
	include '../php/conexion.php';
	$conexion = conectar();
	$id = $_POST['idEmpresa'];
	$arreglo = array();
	$consulta = "SELECT idEmpresa, rut, nombre, correo, telefono FROM empresas WHERE idEmpresa = '$id'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		$i = 0;
		while($row = mysqli_fetch_assoc($resultado)) {
	    	$arreglo[$i]['idEmpresa'] = $row['idEmpresa'];
			$arreglo[$i]['rut'] = $row['rut'];
			$arreglo[$i]['nombre'] = $row['nombre'];
			$arreglo[$i]['correo'] = $row['correo'];
			$arreglo[$i]['telefono'] = $row['telefono'];
			$i++;
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