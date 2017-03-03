<?php
    require 'conexion.php';
    $conexion = conectar();
    $consulta = "SELECT empresas.nombre AS empresa, proyectos.idProyecto, proyectos.nombre AS proyecto, zonas.idZona, zonas.nombre AS zona FROM empresas INNER JOIN proyectos ON empresas.idEmpresa = proyectos.idEmpresa INNER JOIN zonas ON proyectos.idProyecto = zonas.idProyecto ORDER BY proyectos.idProyecto ASC";
    $datos = array();
    $contador = 0;
    if($resultado = mysqli_query($conexion,$consulta)){
        while($row = mysqli_fetch_assoc($resultado)) {
            if($contador == 0) {
                array_push($datos,array('empresa' => $row['empresa'], 'proyecto' => $row['proyecto'], 'idProyecto' => $row['idProyecto'], 'zonas' => array('idZona' => $row['idZona'], 'zona' => $row['zona'] )));
            }
            else {
                if($datos[sizeof($datos)-1]['idProyecto'] == $row['idProyecto']) {
                    array_push($datos[$contador-1]['zonas'],array('idZona' => $row['idZona'], 'zona' => $row['zona']));
                }
                else {
                    array_push($datos,array('empresa' => $row['empresa'], 'proyecto' => $row['proyecto'], 'idProyecto' => $row['idProyecto'], 'zonas' => array('idZona' => $row['idZona'], 'zona' => $row['zona'] )));
                }
            }
            $contador++;
        }
    }
    /*$hola = 'asdasd';
    $datos = array();
    $contador = 1;
    array_push($datos,array('empresa' => 'a', 'proyecto' => 'a', 'idProyecto' => 'jajajja', 'zonas' => array('idZona' => $hola, 'zona' => 'a' )));
    array_push($datos,array('empresa' => 'a', 'proyecto' => 'a', 'idProyecto' => 'a', 'zonas' => array('idZona' => $hola, 'zona' => 'a' )));
    array_push($datos[$contador-1]['zonas'],array('idZona' => 'asdasd', 'zona' => 'asdasdsa'));*/
    echo json_encode($datos);
?>