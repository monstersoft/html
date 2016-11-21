<?php
    include("funcionesCliente.php");
    $nombreEmpresa = $_POST['txtNombreEmpresa'];
    $arreglo = array();
    $arreglo = existe_empresa($nombreEmpresa);
    echo json_encode($arreglo); 
?>