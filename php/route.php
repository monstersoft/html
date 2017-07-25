<?php
    define ("CARPETA","html");
    function raiz() {
        if($_SERVER['HTTP_HOST'] == 'localhost')
            return $_SERVER['REQUEST_SCHEME'].'://'.CARPETA;
        else
            return $_SERVER['REQUEST_SCHEME'].$_SERVER['SERVER_NAME'];
    }
?>