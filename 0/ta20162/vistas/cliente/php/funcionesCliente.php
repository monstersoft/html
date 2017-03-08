<?php
    include("conexion.php");

    function existe_empresa($nombreEmpresa) {
        $conexion = conectar();
        $consulta = "SELECT COUNT(NOMBRE) AS cantidad FROM empresas WHERE NOMBRE LIKE '$nombreEmpresa'";
        if($resultado = mysqli_query($conexion,$consulta)){
            $numero = mysqli_fetch_assoc($resultado);
            if($numero['cantidad'] == 1) { //EXISTE LA EMPRESA
                $arreglo['existe'] = true;
                $arreglo['valorConsulta'] = $numero['cantidad'];
            }
            else { // NO EXISTE LA EMPRESA
                $arreglo['existe'] = false;
                $arreglo['valorConsulta'] = $numero['cantidad'];
            }
            $arreglo['estadoConsulta'] = utf8_encode('Consulta Ok');
        }
        else {
            $arreglo['estadoConsulta'] = utf8_encode('Error de consulta: '.mysqli_error($conexion));
            
        }
        
        return $arreglo;
    }
?>
