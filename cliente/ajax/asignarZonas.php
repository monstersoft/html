<?php
    include ('../../php/conexion.php');
    $conexion = conectar();
    mysqli_set_charset($conexion,'utf8');
    $idZona = $_POST['idZona'];
    $idSupervisor = $_POST['idSupervisor'];
    $opcion = $_POST['opcion'];
    if(isset($_POST['idEmpresa'])) $idEmpresa = $_POST['idEmpresa']; else $idEmpresa = '';
    if(isset($_POST['zonas'])) $zonas = $_POST['zonas']; else $zonas = '';

    if($opcion == 'select') {
        $consulta = "SELECT zonas.idZona, zonas.nombre FROM zonas WHERE zonas.idZona NOT IN (SELECT supervisores_zonas.idZona FROM supervisores_zonas WHERE supervisores_zonas.idSupervisor = '$idSupervisor' AND supervisores_zonas.idZona != '$idZona' GROUP BY supervisores_zonas.idZona) AND zonas.idEmpresa = '$idEmpresa' AND zonas.idZona != '$idZona'";
        $arreglo = array('exito' => 0, 'zonas' => '');
        if($res = mysqli_query($conexion,$consulta)) {
            while($row = mysqli_fetch_assoc($res)) {
                $arreglo['zonas'] .= "<option class='dinamico' value='".$row['idZona']."'>".$row['nombre']."</option>";
            }
            $arreglo['exito'] = 1;
        }
        echo json_encode($arreglo);
    }
    if($opcion == 'asignar') {
        sleep(1);
        $arreglo = array('exito' => 0, 'exitos' => array());
        foreach($zonas as $value) {
            if(mysqli_query($conexion,"INSERT INTO supervisores_zonas (idZona,idSupervisor) VALUES ('$value','$idSupervisor')")) {
                array_push($arreglo['exitos'],1);
                $arreglo['exito'] = 1;
            }
            else {
                array_push($arreglo['exitos'],0);
                $arreglo['exito'] = 0;
            }
        }
        $arreglo['zonas'] = $zonas;
        echo json_encode($arreglo);
    }
?>