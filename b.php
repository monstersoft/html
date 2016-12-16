<?php
	$id = $_POST['id'];
	if($id == 1){
		$arreglo['numero'] = '100';
        $arreglo['letra'] = 'PATRICIO';
        }
	else  
		$arreglo['letra'] = 'No funciona';
	echo json_encode($arreglo);
?>