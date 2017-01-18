<?php 
    if(isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $nombre = $files['name'];
        $tipo = $file["type"];
        $ruta_provisoria= $file['tmp_name'];
        $size = $file['size'];
        $ruta_destino = 'temporal/';
    }
    $src = $ruta_destino.$nombre;
    move_uploaded_file($ruta_provisoria, $ruta_destino);
    echo $ruta_provisoira."-".$ruta_destino;
?>