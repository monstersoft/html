<?php
    sleep(1);
    $actual = $_POST['actual'];
    $nueva = $_POST['nueva'];
    $confirmada = $_POST['confirmada'];
    $arreglo['exito'] = true;
    echo json_encode($arreglo);
?>