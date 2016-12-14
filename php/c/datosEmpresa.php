<?php
	include '../funciones.php'; 
	$id = $_POST['idEmpresa'];
    $arreglo = utf8Converter(datosEmpresa($id));
	echo json_encode($arreglo);
?>