<?php
    sleep(1);
    include ('../php/conexion.php');
    $nueva = $_POST['nuevaContrasena'];
    $confirmada = $_POST['contrasenaConfirmada'];
    $tipo = $_POST['tipoUsuario'];
    $id = $_POST['id'];
    $arreglo = array();
    $c = conectar();
    if(isset($_POST['celular']))
        $celular = $_POST['celular'];
    else
        $celular = 0;
    if($tipo == 'Cliente') {
        if(mysqli_query($c,"UPDATE clientes SET password = '$nueva', clientes.token = '' WHERE clientes.idCliente = '$id'"))
            $arreglo['exito'] = true;
        else
            $arreglo['exito'] = false;
    }
    if($tipo == 'Supervisor') {
        $nueva = password_hash($nueva, PASSWORD_DEFAULT, array("cost" => 10));
        if(mysqli_query($c,"UPDATE supervisores SET password = '$nueva', celular = '$celular', supervisores.status = 'habilitado', supervisores.token = '' WHERE supervisores.idSupervisor = '$id'"))
            $arreglo['exito'] = true;
        else
            $arreglo['exito'] = false;
    }
    echo json_encode($arreglo);
?>