<?php
    include("funciones.php");
    $arreglo = array();
    if(!(isset($_POST['txtCorreo']) or isset($_POST['txtPassword']) or isset($_POST['txtSupervisor']))) {
        $arreglo['mensaje'] = 'No existen las variables';
        }
    else {
        if($_POST['txtSupervisor'] == 'false') {
            $arreglo = iniciaSesionCliente ($_POST['txtCorreo'],$_POST['txtPassword']);
        }
        if($_POST['txtSupervisor'] == 'true'){
            $arreglo = iniciaSesionSupervisor ($_POST['txtCorreo'],$_POST['txtPassword']);
        }
    }
        
    echo json_encode($arreglo); 
?>
