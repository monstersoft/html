<?php
    require 'conexion.php';
    $conexion = conectar();
    $consulta = "SELECT empresas.nombre AS empresa, proyectos.nombre AS proyecto, zonas.idZona AS idZona, zonas.nombre AS zona FROM empresas LEFT JOIN proyectos ON empresas.idEmpresa = proyectos.idEmpresa LEFT JOIN zonas ON proyectos.idProyecto = zonas.idProyecto";
    $arreglo = array();
    $registros = array();
    if($resultado = mysqli_query($conexion,$consulta)){
        $i = 0;
        while($row = mysqli_fetch_assoc($resultado)) {
            $registros[$i]['empresa'] = $row['empresa'];
            $registros[$i]['proyecto'] = $row['proyecto'];
            $registros[$i]['zona'] = $row['zona']; 
            $registros[$i]['idZona'] = $row['idZona'];
            $i++;
        }
        $arreglo['exito'] = 1;
    }
    else 
        $arreglo['exito'] = 0;
    $arreglo['datos'] = $registros;
    echo json_encode($arreglo);
?>