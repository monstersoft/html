<?php 
$paises = $_POST['country']; 
if(is_array($paises)) {
        $t = sizeof($paises);
        $arreglo['mensaje'] = 'Es un array de tamanho: '.$t;
    }
else 
    $arreglo['mensaje'] = 'No es un array';
echo json_encode($arreglo);
?>