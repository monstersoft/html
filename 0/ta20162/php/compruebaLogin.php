<?php
    include("conexion.php");
    $conexion = conectar();
    $arreglo = array();
    if(!(isset($_POST['txtCorreo']) or isset($_POST['txtPassword']))){
        $array['mensaje'] = "No existen las variables";
        var_dump($arreglo);
    }
    else {
        $correo = $_POST['txtCorreo'];
        $password = $_POST['txtPassword'];
        $consulta = "SELECT COUNT(*) AS cantidad FROM supervisores WHERE correo_supervisor = '$correo' AND password = '$password'";
        if($resultado = mysqli_query($conexion,$consulta)) {
            $numero = mysqli_fetch_assoc($resultado);
                if($numero['cantidad'] == 1){ //EXISTE EL SUPERVISOR
                    session_start();
                    $_SESSION['correo'] = $correo;
                    $consulta2 = "SELECT ID_ZONA FROM supervisores_zonas WHERE CORREO_SUPERVISOR = '$correo'";
                    $resultado2 = mysqli_query($conexion,$consulta2);
                    $cantidadZonas = mysqli_num_rows($resultado2);
                    if($cantidadZonas == 1) {
                        $row = mysqli_fetch_row($resultado2);
                        $arreglo['zona'] = $row[0];
                        $arreglo['mensaje'] = "vistas/mapa.php";
                        }
                    else
                        $arreglo['mensaje'] = "vistas/cambiarZona.php";
                    $arreglo['czonas'] = $cantidadZonas;
                    $arreglo['codigo'] = 1;
                    }
                else {
                    $arreglo['codigo'] = 0;
                    $arreglo['mensaje'] = "No existen registros";
                }
            }
        else {
            $arreglo['codigo'] = 0;
            $arreglo['mensaje'] = "Error en la consulta para contar el correo y el password -> ".mysqli_error($conexion);
        }
        echo json_encode($arreglo);
    }
?>
