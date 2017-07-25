<?php
    include 'php/funciones.php';
    $raiz = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'];
    header("Location: ".$raiz);
?>