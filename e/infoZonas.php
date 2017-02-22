<?php
    require 'conexion.php';
    $conexion = conectar();
    $consulta = "SELECT empresas.nombre AS empresa, proyectos.nombre AS proyecto, zonas.idZona AS idZona, zonas.nombre AS zona FROM empresas LEFT JOIN proyectos ON empresas.idEmpresa = proyectos.idEmpresa LEFT JOIN zonas ON proyectos.idProyecto = zonas.idProyecto";
    $arreglo = array();
    if($resultado = mysqli_query($conexion,$consulta)){
        $i = 0;
        while($row = mysqli_fetch_assoc($resultado)) {
            $arreglo[$i]['empresa'] = $row['empresa'];
            $arreglo[$i]['zona'] = $row['zona']; 
            $arreglo[$i]['idZona'] = $row['idZona'];
            $arreglo[$i]['zona'] = $row['zona'];
            $i++;
        }
        $arreglo['exito'] = 1;
    }
    else 
        $arreglo['exito'] = 0;
    echo json_encode($arreglo);
?>