<?php
	include '../php/conexion.php';
	$conexion = conectar();
	$idProyecto = $_POST['idProyecto'];
	$arreglo = array();
	$consulta = "SELECT idProyecto, idEmpresa, nombre FROM proyectos WHERE idProyecto = '$idProyecto'";
	if($resultado = mysqli_query($conexion,$consulta)) {
		while($row = mysqli_fetch_assoc($resultado)) {
            $arreglo['idProyecto'] = $row['idProyecto'];
	    	$arreglo['idEmpresa'] = $row['idEmpresa'];
			$arreglo['nombre'] = $row['nombre'];
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