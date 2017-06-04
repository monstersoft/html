<?php
    include '../../php/conexion.php';
    //$idEmpresa = $_POST['idEmpresa'];
    $idEmpresa = 297;
    $conexion = conectar();
    $arreglo = array();
    $auxOk = array();
    $aux = array();
    $resultadoSupervisores = array();
    $consulta = "SELECT supervisores.idSupervisor FROM supervisores LEFT JOIN supervisoreszonas ON supervisores.idSupervisor = supervisoreszonas.idSupervisor LEFT JOIN zonas ON supervisoreszonas.idZona = zonas.idZona LEFT JOIN empresas ON zonas.idEmpresa = empresas.idEmpresa WHERE empresas.idEmpresa = '$idEmpresa' GROUP BY supervisores.idSupervisor";
    if($res = mysqli_query($conexion,$consulta)) {
        while($row = mysqli_fetch_assoc($res)) {
            $aux[] = $row['idSupervisor'];
        }
    }
    foreach($aux as $value) {
        if(mysqli_query($conexion,"DELETE FROM supervisores WHERE supervisores.idSupervisor = '$value'"));
            $auxOK[] = 'OK';
    }
    $arreglo['auxOK']= $auxOK;
    $arreglo['aux'] = $aux;
    echo json_encode($arreglo);
/*
TODOS LOS SUPERVISORES DE UNA ZONA X
SELECT zonas.nombre, supervisoreszonas.idZona, supervisoreszonas.idSupervisor, supervisores.nombreSupervisor
FROM supervisoreszonas
LEFT JOIN zonas ON supervisoreszonas.idZona = zonas.idZona
LEFT JOIN supervisores ON supervisoreszonas.idSupervisor = supervisores.idSupervisor WHERE supervisoreszonas.idZona = 192 

RECORRO TODOS LOS ID SUPERVISOR DE LA CONSULTA ANTERIOR Y PREGUNTO CUANTAS ZONAS TIENEN ASOCIADAS, SI TIENEN 1 BORRO EN LA TABLA SUPERVISORES Y EN SUPERVISORES ZONAS, SINO BORRO SOLAMENTE EN LA TABLA SUPERVISORES ZONAS
SELECT COUNT(supervisoreszonas.idZona) FROM supervisoreszonas WHERE supervisoreszonas.idSupervisor = 1265

SI TIENE UNO, TAMBIEN BORRO EN SUPERVISORES
SINO BORRO SOLO EN SUPERVISORES ZONAS
*/
?>


