<?php
	$datosJson = $_POST['datos'];
	$arreglo['mensaje'] = $datosJson[1]['nombre']['original'];
	echo json_encode($arreglo);
?>