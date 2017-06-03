<?php
    //$idEmpresa = $_POST['idEmpresa'];
	include '../../php/conexion.php';
    echo json_encode(getSupervisors(''));
    function getCompanies($idCompanie) {
        $conexion = conectar();
        $array = array();
        if($idCompanie == '') $res = mysqli_query($conexion,"SELECT * FROM empresas");
        else $res = mysqli_query($conexion,"SELECT * FROM empresas WHERE idEmpresa = '$idCompanie'");
        while($row = mysqli_fetch_assoc($res)) {
            array_push($array,array('idEmpresa' => $row['idEmpresa'], 'rut' => $row['rut']));
        }
        return $array;
    }
    function getZones($idZone) {
        $conexion = conectar();
        $array = array();
        if($idZone == '') $res = mysqli_query($conexion,"SELECT * FROM zonas");
        else $res = mysqli_query($conexion,"SELECT * FROM zonas WHERE idZona = '$idZone'");
        while($row = mysqli_fetch_assoc($res)) {
            array_push($array,array('idZona' => $row['idZona'], 'idEmpresa' => $row['idEmpresa'], 'nombre' => $row['nombre']));
        }
        return $array;
    }
    function getSupervisors($idSupervisor) {
        $conexion = conectar();
        $array = array();
        if($idSupervisor == '') $res = mysqli_query($conexion,"SELECT * FROM supervisores");
        else $res = mysqli_query($conexion,"SELECT * FROM supervisores WHERE idSupervisor = '$idSupervisor'");
        while($row = mysqli_fetch_assoc($res)) {
            array_push($array,array('idSupervisor' => $row['idSupervisor'], 'nombreSupervisor' => $row['nombreSupervisor'], 'correoSupervisor' => $row['correoSupervisor'], 'password' => $row['password'], 'celular' => $row['celular'], 'status' => $row['status']));
        }
        return $array;
    }
    function getSupervisorsZones($idZone) {
        $conexion = conectar();
        $array = array();
        if($idZone == '') $res = mysqli_query($conexion,"SELECT * FROM supervisoreszonas");
        else $res = mysqli_query($conexion,"SELECT * FROM supervisoreszonas WHERE idZona = '$idZone'");
        while($row = mysqli_fetch_assoc($res)) {
            array_push($array,array('idZona' => $row['idZona'], 'idSupervisor' => $row['idSupervisor']));
        }
        return $array;
    }
    function insertCompanies($companiesNumber) {
        $conexion = conectar();
        $array = array();
        $row = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT AUTO_INCREMENT AS newID FROM information_schema.TABLES where TABLE_SCHEMA='".'html'."' and TABLE_NAME='".'empresas'."'"));
        $count = 0;
        while($count < $companiesNumber) {
            $row = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT AUTO_INCREMENT AS newID FROM information_schema.TABLES where TABLE_SCHEMA='".'html'."' and TABLE_NAME='".'empresas'."'"));
            mysqli_query($conexion,"INSERT INTO empresas (idEmpresa, rut, nombre, correo, telefono) VALUES (NULL, 'E".$row['newID']."', 'E".$row['newID']."', 'E".$row['newID']."', 'E".$row['newID']."')");
            $count++;
        }
    }
    function insertZones($companies,$zonesPerCompanies) {
        $conexion = conectar();
        $array = array();
        $count = 0;
        foreach($companies as $values) {
            while($count < $zonesPerCompanies) {
                $row = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT AUTO_INCREMENT AS newID FROM information_schema.TABLES where TABLE_SCHEMA='".'html'."' and TABLE_NAME='".'zonas'."'"));
                mysqli_query($conexion,"INSERT INTO zonas (idZona, idEmpresa, nombre) VALUES (NULL, ".$values['idEmpresa']." , 'E".$values['idEmpresa']."Z".$row['newID']."')");
                $count++;
            }
            $count = 0;
        }
    }
    function insertSupervisors($zones,$supervisorsPerZones) {
        $conexion = conectar();
        $array = array();
        $count = 0;
        foreach($zones as $values) {
            $zoneName = $values['nombre'];
            $idZone = $values['idZona'];
            while($count < $supervisorsPerZones) {
                $row = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT AUTO_INCREMENT AS newID FROM information_schema.TABLES where TABLE_SCHEMA='".'html'."' and TABLE_NAME='".'supervisores'."'"));
                $newID = $row['newID'];
                $nameSupervisor = $zoneName.'S'.$newID;
                mysqli_query($conexion,"INSERT INTO supervisores (idSupervisor, nombreSupervisor, correoSupervisor, password, celular, status) VALUES (NULL, '$nameSupervisor', '$nameSupervisor', '$nameSupervisor', 123456789, 'desabilitado')");
                mysqli_query($conexion,"INSERT INTO supervisoreszonas (idZona, idSupervisor) VALUES ('$idZone', '$newID')");
                $count++;
            }
            $count = 0;
        }
    }
/*
TODOS LOS SUPERVISORES DE UNA ZONA X
SELECT zonas.nombre, supervisoreszonas.idZona, supervisoreszonas.idSupervisor, supervisores.nombreSupervisor
FROM supervisoreszonas
LEFT JOIN zonas ON supervisoreszonas.idZona = zonas.idZona
LEFT JOIN supervisores ON supervisoreszonas.idSupervisor = supervisores.idSupervisor WHERE supervisoreszonas.idZona = 192 

RECORRO TODOS LOS ID SUPERVISOR DE LA CONSULTA ANTERIOR
SELECT COUNT(supervisoreszonas.idZona) FROM supervisoreszonas WHERE supervisoreszonas.idSupervisor = 1265


*/
?>
