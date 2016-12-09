<?php 
	include 'php/funciones.php';
	if(isset($_POST['empresa'])) {
		$nombre = $_POST['empresa'];
		$arreglo = verificaNombreDuplicado2($nombre);
	}
	else {
		$arreglo['mensaje'] = 'No existe valor';
	}
	echo json_encode($arreglo);
?>