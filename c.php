<?php 
$empresa = $_POST['empresa'];
$arreglo = array();
$arreglo['db'] = 'JCB';
$arreglo['input'] = $empresa;
echo json_encode($arreglo);
?>