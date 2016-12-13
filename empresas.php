<?php
	include 'php/funciones.php'; 
	$id = $_POST['idEmpresa'];
	//$id = 91;
	$arreglo = datosEmpresa($id);
	echo json_encode($arreglo);
?>