<?php
    require 'conexion.php';
    $idZona = $_POST['idZona'];
    $conexion = conectar();
    $consulta = "SELECT zonas.idZona, zonas.nombre AS zona, proyectos.idProyecto, proyectos.nombre AS proyecto, empresas.idEmpresa, empresas.nombre AS empresa, supervisores.idSupervisor, supervisores.status, supervisores.nombreSupervisor FROM empresas LEFT JOIN proyectos ON empresas.idEmpresa = proyectos.idEmpresa LEFT JOIN zonas ON proyectos.idProyecto = zonas.idProyecto LEFT JOIN supervisoreszonas ON zonas.idZona = supervisoreszonas.idZona LEFT JOIN supervisores ON supervisoreszonas.idSupervisor = supervisores.idSupervisor WHERE zonas.idZona = '$idZona'";
    $arreglo = array();
    $supervisores = array();
    $numeroSupervisores = 0;
    $existenSupervisores = true;
    $flag = true;
    if($resultado = mysqli_query($conexion,$consulta)){
        while($r = mysqli_fetch_assoc($resultado)) {
            if($flag) {
                $arreglo['idZona'] = $r['idZona'];
                $arreglo['zona'] = $r['zona'];
                $arreglo['idProyecto'] = $r['idProyecto'];
                $arreglo['proyecto'] = $r['proyecto'];
                $arreglo['idEmpresa'] = $r['idEmpresa'];
                $arreglo['empresa'] = $r['empresa'];
            }
            if($r['idSupervisor'] == null) {
                $existenSupervisores = false;
                $arreglo['supervisores'] = 'No existen supervisores';
            }
            else
                array_push($supervisores,array('id' => $r['idSupervisor'],'nombre' => $r['nombreSupervisor'],'status' => $r['status']));
        }
        $arreglo['exito'] = 1;
    }
    else 
        $arreglo['exito'] = 0;
    $arreglo['existenSupervisores'] = $existenSupervisores;
    $arreglo['supervisores'] = $supervisores;
    echo json_encode($arreglo);
?>