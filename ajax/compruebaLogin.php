<?php
    define("MAIL_MACHINEMONITORS","machinemonitors2017@gmail.com");
    include("../php/conexion.php");
    $datos = array();
    $correo = $_POST['txtCorreo'];
    $password = $_POST['txtPassword'];
    $arreglo = array();
    $respuesta = array();
    $arreglo = buscarCorreo($correo);
    if($arreglo['existeCorreo'] == true) {
        if($arreglo['esCliente'] == true) {
            $respuesta = iniciaSesionCliente($correo,$password);
            if($respuesta['error'] == false) {
                $respuesta['mailMachineMonitors'] = MAIL_MACHINEMONITORS;
                session_start();
                $_SESSION['datos'] = $respuesta;
            }
        }
        if($arreglo['esSupervisor'] == true) {
            $respuesta = iniciaSesionSupervisor($correo,$password);
            if($respuesta['error'] == false) {
                $respuesta['mailMachineMonitors'] = MAIL_MACHINEMONITORS;
                session_start();
                $_SESSION['datos'] = $respuesta;
            }
        }
    }
    else {
        $respuesta['titulo'] = 'Error de registro';
        $respuesta['mensaje'] = 'No estás registrado en el sistema';
        $respuesta['error'] = true;
    }
    echo json_encode($respuesta);
    function buscarCorreo($correo) {
        $conexion = conectar();
        $existeCorreo = false;
        $esCliente = false;
        $esSupervisor = false;
        $busqueda = array();
        $consulta = "SELECT COUNT(*) AS cantidad FROM clientes WHERE correo = '$correo'";
        if($resultado = mysqli_query($conexion,$consulta)) {
            $numero = mysqli_fetch_assoc($resultado);
            if($numero['cantidad'] == true) {
                $existeCorreo = true;
                $esCliente = true;
            }
            else {
                $consulta = "SELECT COUNT(*) AS cantidad FROM supervisores WHERE correoSupervisor = '$correo'";
                if($resultado = mysqli_query($conexion,$consulta)) {
                    $numero = mysqli_fetch_assoc($resultado);
                    if($numero['cantidad'] == true) {
                        $existeCorreo = true;
                        $esSupervisor = true;
                    }
                }
                
            }
        }
        $busqueda['existeCorreo'] = $existeCorreo;
        $busqueda['esCliente'] = $esCliente;
        $busqueda['esSupervisor'] = $esSupervisor;
        mysqli_close($conexion);
        return $busqueda;
    }
	function iniciaSesionCliente ($correo,$password) {
		$conexion = conectar();
		$arreglo = array();
		$arreglo['error'] = true;
        $consulta = "SELECT nombre, idCliente, password AS hash FROM clientes WHERE correo = '$correo'";
        if($resultado = mysqli_query($conexion,$consulta)) {
            $row = mysqli_fetch_assoc($resultado);
            if(password_verify($password,$row['hash'])) {
                $arreglo['nombre'] = $row['nombre'];
                $arreglo['correo'] = $correo;
                $arreglo['titulo'] = 'Inicio de sesión';
                $arreglo['mensaje'] = 'Bienvenidos '.$correo;
                $arreglo['error'] = false;
                $arreglo['url'] = 'public/cliente/zonas.php';
                $arreglo['tipoUsuario'] = 'Cliente';
                $arreglo['idUsuario'] = $row['idCliente'];
            }
            else {
                $arreglo['titulo'] = 'Error de sesión';
                $arreglo['mensaje'] = 'La contraseña no coincide con el correo';
            }
        }
		mysqli_close($conexion);
		return $arreglo;
	}
	function iniciaSesionSupervisor ($correo,$password) {
		$conexion = conectar();
		$arreglo = array();
		$arreglo['error'] = true;
        $consulta = "SELECT status FROM supervisores WHERE correoSupervisor = '$correo'";
        if($resultado = mysqli_query($conexion,$consulta)) {
            $row = mysqli_fetch_assoc($resultado);
            if($row['status'] == 'deshabilitado') {
                $arreglo['titulo'] = 'Error de registro';
                $arreglo['mensaje'] = 'Debes activar tu cuenta para inicar sesión';
            }
            else {
                $consulta = "SELECT nombreSupervisor, idSupervisor, password AS hash FROM supervisores WHERE correoSupervisor = '$correo'";
                if($resultado = mysqli_query($conexion,$consulta)) {
                    $row = mysqli_fetch_assoc($resultado);
                    if(password_verify($password, $row['hash'])) {
                        $arreglo['nombre'] = $row['nombreSupervisor'];
                        $arreglo['correo'] = $correo;
                        $arreglo['titulo'] = 'Inicio de sesión';
                        $arreglo['mensaje'] = 'Bienvenidos '.$correo;
                        $arreglo['error'] = false;
                        $arreglo['url'] = 'public/supervisor/panel.php';
                        $arreglo['idUsuario'] = $row['idSupervisor'];
                        $arreglo['tipoUsuario'] = 'Supervisor';

                    }
                    else {
                        $arreglo['titulo'] = 'Error de sesión';
                        $arreglo['mensaje'] = 'La contraseña no coincide con el correo';
                    }
                }
            }
        }
		mysqli_close($conexion);
		return $arreglo;
    }
?>
