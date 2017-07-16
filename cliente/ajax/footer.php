<?php
    include "../../php/conexion.php";
    $arreglo = array();
    $idArchivo = $_POST['idArchivo'];
    $fecha = $_POST['fecha'];
    $opcion = $_POST['opcion'];
    $c = conectar();
    if($opcion == 'dashboard') {
        $patente = $_POST['patente'];
        if($res = mysqli_query($c,"SELECT zonas.nombre FROM archivos LEFT JOIN zonas ON archivos.idZona = zonas.idZona WHERE archivos.idArchivo = '$idArchivo'")) {
            $row = mysqli_fetch_assoc($res);
            $arreglo['nombreZona'] = $row['nombre'];
            $arreglo['fechaDatos'] = $fecha;
            $arreglo['patente'] = $patente;
            $arreglo['exito'] = true;
        }
        else
            $arreglo['exito'] = false;
        
    }
    if($opcion =='maquinas') {
        if($res = mysqli_query($c,"SELECT zonas.nombre FROM archivos LEFT JOIN zonas ON archivos.idZona = zonas.idZona WHERE archivos.idArchivo = '$idArchivo'")) {
            $row = mysqli_fetch_assoc($res);
            $arreglo['nombreZona'] = $row['nombre'];
            $arreglo['fechaDatos'] = $fecha;
            $arreglo['exito'] = true;
        }
        else
            $arreglo['exito'] = false;
    }
    echo json_encode($arreglo);
?>