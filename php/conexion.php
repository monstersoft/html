<?php 
    function conectar(){
        include("config.php");
        
        $conexion = mysqli_connect($host,$usuario,$password);
        if(mysqli_connect_errno()) {
            echo "Error de conexión: ".mysqli_connect_error();
            exit();
        }
        
        mysqli_select_db($conexion,$nombre) or die ("No se encontró la base de datos");
        return $conexion;
    }
?>