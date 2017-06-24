<?php
    session_start();
    if(isset($_SESSION['datos'])) {
        include("../../php/funcionesSupervisor.php");
        $_SESSION = [];
        session_destroy();
        header("Location: ../../index.php");
    }
    else {
        header("Location: ../../index.php");
    }
?>
