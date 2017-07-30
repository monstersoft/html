<?php
    include '../../php/conexion.php';
    $actual = $_POST['actual'];
    $nueva = $_POST['nueva'];
    $confirmada = $_POST['confirmada'];
    $arreglo['exito'] = false;
    session_start();
    $c = conectar();
    $idUsuario = $_SESSION['datos']['idUsuario'];
    if($resultado = mysqli_query($c,"SELECT password AS hash FROM clientes WHERE idCliente = '$idUsuario'")) {
        $row = mysqli_fetch_assoc($resultado);
        if(password_verify($actual, $row['hash'])) {
            $nueva = password_hash($nueva, PASSWORD_DEFAULT, array("cost" => 10));
            if($res = mysqli_query($c,"UPDATE clientes SET clientes.password = '$nueva' WHERE clientes.idCliente = '$idUsuario'"))
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