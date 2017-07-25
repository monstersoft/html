<?php
    function raiz() {
        define('CARPETA_XAMPP','html');
        if($_SERVER['HTTP_HOST'] == 'localhost')
            return $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.CARPETA_XAMPP;
        else
            return $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'];
    }
?>