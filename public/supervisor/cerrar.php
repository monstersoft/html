<?php
    session_start();
    if(isset($_SESSION['datos'])) {
        include("../../supervisor/funciones.php");
        unset($_SESSION['datos']);
        session_destroy();
        header("Location: ../../index.php");
    }
    else {
        header("Location: ../../index.php");
    }
?>
