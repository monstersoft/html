<?php
    require 'conexion.php';
    $conexion = conectar();
    $consulta = "SELECT empresas.nombre AS empresa, proyectos.idProyecto, proyectos.nombre AS proyecto, zonas.idZona, zonas.nombre AS zona FROM empresas LEFT JOIN proyectos ON empresas.idEmpresa = proyectos.idEmpresa LEFT JOIN zonas ON proyectos.idProyecto = zonas.idProyecto WHERE proyectos.idProyecto IS NOT NULL ORDER BY proyectos.idProyecto ASC";
    $datos = array();
    $contador = 0;
    if($resultado = mysqli_query($conexion,$consulta)){
        while($row = mysqli_fetch_assoc($resultado)) {
            if($contador == 0) {
                $zonas = [];
                array_push($zonas,array('idZona' => $row['idZona'], 'zona' => $row['zona']));
                array_push($datos,array('empresa' => $row['empresa'], 'proyecto' => $row['proyecto'], 'idProyecto' => $row['idProyecto'], 'zonas' => $zonas));
                $contador = 1;
            }
            else {
                if($datos[sizeof($datos)-1]['idProyecto'] == $row['idProyecto']) {
                    array_push($datos[sizeof($datos)-1]['zonas'],array('idZona' => $row['idZona'], 'zona' => $row['zona']));
                }
                else {
                    $zonas = [];
                    array_push($zonas,array('idZona' => $row['idZona'], 'zona' => $row['zona']));
                    array_push($datos,array('empresa' => $row['empresa'], 'proyecto' => $row['proyecto'], 'idProyecto' => $row['idProyecto'], 'zonas' => $zonas));
                }
            }
        }
    }
    echo json_encode($datos);
?>