<?php
	include '../../php/conexion.php'; 
	$idZone = $_POST['idZona'];
    $dataDate = $_POST['fechaDatos'];
    $arr = array();
    $con = conectar();
    $qry = "SELECT archivos.idArchivo, archivos.idSupervisor, supervisores.nombreSupervisor, archivos.fechaSubida, archivos.fechaDatos, archivos.horaSubida FROM archivos LEFT JOIN supervisores ON archivos.idSupervisor = supervisores.idSupervisor WHERE archivos.idZona = '$idZone' AND archivos.fechaDatos = '$dataDate'";
    if($res = mysqli_query($con, $qry)) {
        $row = mysqli_fetch_assoc($res);
        $arr['idArchivo'] = $row['idArchivo'];
        $arr['idSupervisor'] = $row['idSupervisor'];
        $arr['nombreSupervisor'] = $row['nombreSupervisor'];
        $arr['fechaSubida'] = $row['fechaSubida'];
        $arr['fechaDatos'] = $row['fechaDatos'];
        $arr['horaSubida'] = $row['horaSubida'];  
     }
    echo json_encode($arr);
?>
