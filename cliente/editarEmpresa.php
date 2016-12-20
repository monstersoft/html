<?php
	include '../php/funciones.php'; 
	$id = $_POST['json'];
    //$arreglo = utf8Converter(datosEmpresa($id));
    if($id == true)
    	$arreglo['mensaje'] = 'Bien';
    else
    	$arreglo['mensaje'] = 'Mal';
	echo json_encode($arreglo);
?>