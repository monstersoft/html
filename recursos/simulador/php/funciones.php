<?php
	include("php/conexion.php");
    function zonas() {
        $c = conectar();
        $a = array();
        $q = 'SELECT * FROM zonas';
        if($re = mysqli_query($c,$q)) {
            while($r = mysqli_fetch_assoc($re)) {
                array_push($a,array('idZona' => $r['idZona'],'idEmpresa' => $r['idEmpresa'], 'nombre' => utf8_encode($r['nombre'])));
            }
        }
        mysqli_close($c);
        return $a;
    }
    function supervisores($idZona) {
            $c = conectar();
            $a = array();
            $q = "SELECT supervisores.idSupervisor, supervisores.correoSupervisor
                    FROM supervisores
                    LEFT JOIN supervisoreszonas ON supervisoreszonas.idSupervisor = supervisores.idSupervisor
                    LEFT JOIN zonas ON supervisoreszonas.idZona = zonas.idZona
                    WHERE zonas.idZona = '$idZona'";
            if($re = mysqli_query($c,$q)) {
                while($r = mysqli_fetch_assoc($re)) {
                    array_push($a,array('idSupervisor' => $r['idSupervisor'],'correoSupervisor' => $r['correoSupervisor']));
                }
            }
            mysqli_close($c);
            return $a;
    }
    function maquinas($idZona) {
            $c = conectar();
            $a = array();
            $q = "SELECT * FROM maquinas WHERE maquinas.idZona = '$idZona'";
            if($re = mysqli_query($c,$q)) {
                while($r = mysqli_fetch_assoc($re)) {
                    array_push($a,array('idMaquina' => $r['idMaquina'],'identificador' => $r['identificador'], 'patente' => $r['patente']));
                }
            }
            mysqli_close($c);
            return $a;
    }
?>