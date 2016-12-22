<?php
	include '../php/funciones.php';
	$datosJson = $_POST['datos'];
	$id = $datosJson[0]['id'];
	if($datosJson[1]['nombre']['cambio'] == 1) {
		$arreglo['mensaje'][] = verificaCampoEmpresa($id,$datosJson[1]['nombre']['modificado'],'nombre');
	}
	if($datosJson[2]['rut']['cambio'] == 1) {
		$arreglo['mensaje'][] = verificaCampoEmpresa($id,$datosJson[2]['rut']['modificado'],'rut');
	}
	if($datosJson[3]['correo']['cambio'] == 1) {
		$arreglo['mensaje'][] = verificaCampoEmpresa($id,$datosJson[3]['correo']['modificado'],'correo');
	}
	if($datosJson[4]['telefono']['cambio'] == 1) {
		$arreglo['mensaje'][] = verificaCampoEmpresa($id,$datosJson[4]['telefono']['modificado'],'telefono');
	}
	//$arreglo['mensaje'] = verificaCampoEmpresa(1,'Servicios Bio Bio','nombre');
	echo json_encode($arreglo);
?>