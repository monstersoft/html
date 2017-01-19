<?php
	include '../php/conexion.php';
	$conexion = conectar();
	$idZona = $_POST['idZona'];
	/*$arreglo = array();
	$consulta = "SELECT * FROM zonas WHERE idZona = '$idZona'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		while($row = mysqli_fetch_assoc($resultado)) {
            $arreglo['idZona'] = $row['idZona'];
	    	$arreglo['idProyecto'] = $row['idProyecto'];
			$arreglo['nombre'] = $row['nombre'];
            $arreglo['latitud'] = $row['latitud'];
            $arreglo['longitud'] = $row['longitud'];
        }
	}*/
    $arreglo['mensaje'] = 'esta es la id: '.$idZona;
    //$arreglo = utf8Converter($arreglo);
	echo json_encode($arreglo);

	function utf8Converter($array) {
	    array_walk_recursive($array, function($item, $key){
	        if(!mb_detect_encoding($item, 'utf-8', true)){
	                $item = utf8_encode($item);
	        }
	    });
    return $array;
	}
?>>