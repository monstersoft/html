<?php 
	$fechaDatos = $_POST['fechaDatos'];
	$archivoZona = $_FILES['archivoZona'];
	/*$nombreArchivoZona = $_FILES['tmp_name'];
	$tipoArchivoZona = $_FILES['type'];
	$tamanhoArchivoZona = $_FILES['size'];*/
	$idZonaArchivo = $_POST['idZonaArchivo'];
	$arreglo['msg'] = 'Exito';
	echo json_encode($arreglo);

?>