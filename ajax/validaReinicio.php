<?php 
    $nueva = $_POST['nuevaContraseña'];
    $confirmada = $_POST['contraseñaConfirmada'];
    $tipo = $_POST['tipoUsuario'];
    $id = $_POST['id'];
    $celular = $_POST['celular'];
    echo json_encode($nueva.'-'.$confirmada.'-'.$tipo.'-'.$id.'-'.$celular);
?>