<?php
    session_start();
    if(isset($_SESSION['datos'])){
        include("../../cliente/funciones.php");
        $perfil = datosPerfil($_SESSION['datos']['correo']);
        $_SESSION = [];
        session_destroy();
        header("Location: ../../index.php");
    }
    else {
        header("Location: ../../index.php");
    }
?>
