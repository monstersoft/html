<?php
    sleep(1);
	include '../../php/conexion.php'; 
    $idZona = $_POST['idZona'];
    $idSupervisor = $_POST['idSupervisor'];
    $arreglo = array();
    $consulta = "DELETE FROM supervisores_zonas WHERE supervisores_zonas.idZona = '$idZona' AND supervisores_zonas.idSupervisor = '$idSupervisor'";
    $conexion = conectar();
    if(mysqli_query($conexion,$consulta))
        $arreglo['exito'] = 1;
    else
        $arreglo['exito'] = 0;
    echo json_encode($arreglo);
?>