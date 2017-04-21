<?php 
    include 'php/funciones.php';

        $conexion = conectar();
        $flag = 0;
        $arreglo = array();
        $consulta = 'SELECT empresas.idEmpresa, empresas.nombre AS nombreEmpresa, zonas.idZona, zonas.nombre AS nombreZona FROM empresas LEFT JOIN zonas ON empresas.idEmpresa = zonas.idEmpresa ORDER BY empresas.nombre ASC';
        if($resultado = mysqli_query($conexion,$consulta)) {
            while($row = mysqli_fetch_array($resultado)) {
                if($flag == 0) {
                    $zonas = [];
                    array_push($zonas,array('idZona' => $row['idZona'], 'nombreZona' => utf8_encode($row['nombreZona'])));
                    array_push($arreglo,array('idEmpresa' => $row['idEmpresa'], 'nombreEmpresa' => utf8_encode($row['nombreEmpresa'].''), 'zonas' => $zonas));
                    $flag = 1;
                } 
                else {
                    if($arreglo[sizeof($arreglo)-1]['idEmpresa'] == $row['idEmpresa']) {
                        array_push($arreglo[sizeof($arreglo)-1]['zonas'],array('idZona' => $row['idZona'], 'nombreZona' => utf8_encode($row['nombreZona'])));
                    }
                    else {
                        $zonas = [];
                        array_push($zonas,array('idZona' => $row['idZona'], 'nombreZona' => utf8_encode($row['nombreZona'])));
                        array_push($arreglo,array('idEmpresa' => $row['idEmpresa'], 'nombreEmpresa' => utf8_encode($row['nombreEmpresa']), 'zonas' => $zonas));
                    }
                }
            }
        }
        /*$consulta = 'SELECT archivos.idZona, archivos.idArchivo, archivos.fechaSubida, archivos.fechaDatos, archivos.horaSubida, supervisores.nombreSupervisor FROM archivos
                    LEFT JOIN supervisores ON archivos.idSupervisor = supervisores.idSupervisor
                    WHERE archivos.idZona = 46';*/
        mysqli_close($conexion);
        echo json_encode($arreglo);

?>