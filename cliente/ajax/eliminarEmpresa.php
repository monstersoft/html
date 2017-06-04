<?php
    include '../../php/conexion.php';
    $idEmpresa = $_POST['idEmpresa'];
    $conexion = conectar();
    $arreglo = array();
    $consulta = 
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
