<?php
    include '../../php/conexion.php';
    $idZona = $_POST['idZona'];
    $arreglo = array('exito' => 0, 'mensajes' => array());
    $conexion = conectar();
    mysqli_set_charset($conexion,'utf8');
    $consulta = "SELECT supervisores.idSupervisor AS id FROM supervisores LEFT JOIN supervisores_zonas ON supervisores.idSupervisor = supervisores_zonas.idSupervisor LEFT JOIN zonas ON supervisores_zonas.idZona = zonas.idZona WHERE zonas.idZona = '$idZona' GROUP BY supervisores.idSupervisor";
    if($resultado = mysqli_query($conexion,$consulta)) {
        while($row = mysqli_fetch_assoc($resultado)) {
            $id = $row['id'];
            $consulta = "SELECT supervisores.idSupervisor, supervisores.nombreSupervisor AS nombre, COUNT(zonas.idZona) AS zonas FROM supervisores LEFT JOIN supervisores_zonas ON supervisores.idSupervisor = supervisores_zonas.idSupervisor LEFT JOIN zonas ON supervisores_zonas.idZona = zonas.idZona WHERE supervisores.idSupervisor = '$id'";
            if($res = mysqli_query($conexion,$consulta)) {
                $r = mysqli_fetch_assoc($res);
                if($r['zonas'] == 1) {
                    mysqli_query($conexion,"DELETE FROM supervisores WHERE supervisores.idSupervisor = '$id'");
                    array_push($arreglo['mensajes'], $r['nombre'].' pertenecia a esta zona solamente, se ha borrado');
                }
                if($r['zonas'] > 1) {
                    mysqli_query($conexion,"DELETE FROM supervisores_zonas WHERE supervisores_zonas.idSupervisor='$id' AND supervisores.idZona = '$idZona'");
                    array_push($arreglo['mensajes'], $r['nombre'].' pertenecia a mas zonas, se ha borrado la relacion');
                }
            }
        }
    }
    if(mysqli_query($conexion,"DELETE FROM zonas WHERE zonas.idZona = '$idZona'"))
        $arreglo['exito'] = 1;
    echo json_encode($arreglo);
?>
