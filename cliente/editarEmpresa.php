<?php
	$datosJson = $_POST['datos'];
	if($datosJson[1]['nombre']['cambio'] == 1)
		$arreglo['mensaje'][] = 'Cambiaste el nombre';
	if($datosJson[2]['rut']['cambio'] == 1)
		$arreglo['mensaje'][] = 'Cambiaste el rut';
	if($datosJson[3]['correo']['cambio'] == 1)
		$arreglo['mensaje'][] = 'Cambiaste el correo';
	if($datosJson[4]['telefono']['cambio'] == 1)
		$arreglo['mensaje'][] = 'Cambiaste el telefono';
	$arreglo['id'] = 'El id es: '.$datosJson[0]['id'];
	echo json_encode($arreglo);
?>