<?php
    sleep(1);
	include('../../php/conexion.php'); 
	$idSupervisor = $_POST['idSupervisor'];
	$nuevo = $_POST['nuevoPassword'];
	$confirmar = $_POST['confirmarPassword'];
	$telefono = $_POST['telefono'];
    $conexion = conectar();
    $consulta = "SELECT COUNT(idSupervisor) FROM supervisores WHERE idSupervisor = '$idSupervisor'";
    if($resultado = mysqli_query($conexion,$consulta)) {
        $row = mysqli_fetch_row($resultado);
        $arreglo['existeId'] = $row[0];
        if($arreglo['existeId'] == 0) {
            $arreglo['exito'] = 0;
            $arreglo['mensaje'] = 'El link no está disponible';
        }
        else {
            $consulta = "SELECT COUNT(idSupervisor) FROM supervisores WHERE idSupervisor = '$idSupervisor' AND status = 'habilitado'";
            if($resultado = mysqli_query($conexion,$consulta)) {
                $row = mysqli_fetch_row($resultado);
                $arreglo['habilitado'] = $row[0];
                if($arreglo['habilitado'] == 1) {
                    $arreglo['exito'] = 0;
                    $arreglo['mensaje'] = 'Ya estás habilitado en el sistema';
                }
                else {
                    $consulta = "SELECT COUNT(idSupervisor) FROM supervisores WHERE celular = '$telefono'";
                    if($resultado = mysqli_query($conexion,$consulta)) {
                        $row = mysqli_fetch_row($resultado);
                        $arreglo['existeCelular'] = $row[0];
                        if($arreglo['existeCelular'] == 1) {
                            $arreglo['exito'] = 0;
                            $arreglo['mensaje'] = 'El celular ya está en uso';
                        }
                        else {
                            $pass = password_hash($nuevo,PASSWORD_DEFAULT, array("cost"=>10));
                            $consulta = "UPDATE supervisores SET password = '$pass', celular = '$telefono', status = 1 WHERE idSupervisor = '$idSupervisor'";
                            if(mysqli_query($conexion,$consulta)) {
                                $arreglo['exito'] = 1;
                                $arreglo['mensaje'] = ' tu cuenta ha sido habilitada ahora podrás inicar sesión en el sistema';
                            }
                            else {
                                $arreglo['exito'] = 0;
                                $arreglo['mensaje'] = 'Error de consulta, debes comunicarte con el administrador del sistema';
                            }
                        }
                    }
                    else {
                        $arreglo['exito'] = 0;
                        $arreglo['mensaje'] = 'Error de consulta, debes comunicarte con el administrador dele sistema';
                    }
                }
            }
            else {
                $arreglo['exito'] = 0;
                $arreglo['mensaje'] = 'Error de consulta, debes comunicarte con el administrador dele sistema';
            }
        }
    }
    else {
        $arreglo['exito'] = 0;
        $arreglo['mensaje']  = 'Error en la consulta, debes comnunicarte con el administrador del sistema';
    }
	echo json_encode($arreglo);
?>