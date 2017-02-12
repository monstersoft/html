<?php
    $response = array();
    $response['fechaDatos'] = $_POST['fechaDatos'];
    $response['archivoZona'] = $_FILES['archivoZona']['tmp_name'];
    $response['archivoZonaText'] = $_POST['archivoZonaText'];
    $response['idZonaArchivo'] = $_POST['idZonaArchivo'];
    echo json_encode($response);
?>