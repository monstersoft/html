<?php
    include '../../php/conexion.php';
    $idEmpresa = $_POST['idEmpresa'];
    $arreglo = array('exito' => 0, 'exitoSupervisores' => array());
    $conexion = conectar();
    $consulta = "SELECT supervisores.idSupervisor AS id, supervisores.nombreSupervisor AS nombre FROM supervisores LEFT JOIN supervisores_zonas ON supervisores.idSupervisor = supervisores_zonas.idSupervisor LEFT JOIN zonas ON supervisores_zonas.idZona = zonas.idZona LEFT JOIN empresas ON zonas.idEmpresa = empresas.idEmpresa WHERE empresas.idEmpresa = '$idEmpresa' GROUP BY supervisores.idSupervisor";
    if($resultado = mysqli_query($conexion,$consulta)) {
        while($row = mysqli_fetch_assoc($resultado)) {
            $id = $row['id'];
            $qry = "DELETE FROM supervisores WHERE supervisores.idSupervisor = '$id'";
            if(mysqli_query($conexion,$qry))
                array_push($arreglo['exitoSupervisores'],1);
            else
                array_push($arreglo['exitoSupervisores'],0);
        }
    }
    if(mysqli_query($conexion,"DELETE FROM empresas WHERE empresas.idEmpresa = '$idEmpresa'"))
        $arreglo['exito'] = 1;
    echo json_encode($arreglo);
?>


