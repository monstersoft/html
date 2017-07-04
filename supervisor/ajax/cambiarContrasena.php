<?php
    include '../../php/conexion.php';
    sleep(1);
    $actual = $_POST['actual'];
    $nueva = $_POST['nueva'];
    $confirmada = $_POST['confirmada'];
    $arreglo['exito'] = false;
    session_start();
    $c = conectar();
    $idUsuario = $_SESSION['datos']['idUsuario'];
    if($resultado = mysqli_query($c,"SELECT password AS hash FROM supervisores WHERE idSupervisor = '$idUsuario'")) {
        $row = mysqli_fetch_assoc($resultado);
        if(password_verify($actual, $row['hash'])) {
            $nueva = password_hash($nueva, PASSWORD_DEFAULT, array("cost" => 10));
            if($res = mysqli_query($c,"UPDATE supervisores SET supervisores.password = '$nueva' WHERE supervisores.idSupervisor = '$idUsuario'"))
                $arreglo['exito'] = true;
            else
                $arreglo['exito'] = false;
        }
        else
            $arreglo['exito'] = false;
    }
    else
        $arreglo['exito'] = false;
    mysqli_close($c);
    echo json_encode($arreglo);
?>