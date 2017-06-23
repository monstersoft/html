<?php
    sleep(1);
    include("conexion.php");
    $datos = array();
    $correo = $_POST['txtCorreo'];
    $password = $_POST['txtPassword'];
    $arreglo = array();
    $respuesta = array();
    $arreglo = buscarCorreo($correo);
    if($arreglo['existeCorreo'] == true) {
        if($arreglo['esCliente'] == true) {
            $respuesta = iniciaSesionCliente($correo,$password);
            $respuesta['tipoUsuario'] = 'Cliente';
            session_start();
            $_SESSION['datos'] = $respuesta;
        }
        if($arreglo['esSupervisor'] == true) {
            $respuesta = iniciaSesionSupervisor($correo,$password);
            $respuesta['tipoUsuario'] = 'Supervisor';
            session_start();
            $_SESSION['datos'] = $respuesta;
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
		$arreglo['error'] = false;
        $consulta = "SELECT COUNT(*) AS cantidad FROM clientes WHERE correo = '$correo' AND password = '$password'";
        if($resultado = mysqli_query($conexion,$consulta)) {
            $numero = mysqli_fetch_assoc($resultado);
            if($numero['cantidad'] == true) {
                $arreglo['correo'] = $correo;
                $arreglo['titulo'] = 'Inicio de sesión';
                $arreglo['mensaje'] = 'Bienvenidos '.$correo;
                $arreglo['url'] = 'public/cliente/zonas.php';
            }
            else {
                $arreglo['titulo'] = 'Error de sesión';
                $arreglo['mensaje'] = 'La contraseña no coincide con el correo';
                $arreglo['error'] = true;
            }
        }
		mysqli_close($conexion);
		return $arreglo;
	}
	function iniciaSesionSupervisor ($correo,$password) {
		$conexion = conectar();
		$arreglo = array();
		$arreglo['error'] = false;
        $consulta = "SELECT status FROM supervisores WHERE correoSupervisor = '$correo'";
        if($resultado = mysqli_query($conexion,$consulta)) {
            $row = mysqli_fetch_assoc($resultado);
            if($row['status'] == 'desabilitado') {
                $arreglo['titulo'] = 'Error de registro';
                $arreglo['mensaje'] = 'Debes activar tu cuenta para inicar sesión';
                $arreglo['error'] = true;
            }
            else {
                $consulta = "SELECT COUNT(*) AS cantidad FROM supervisores WHERE correoSupervisor = '$correo' AND password = '$password'";
                if($resultado = mysqli_query($conexion,$consulta)) {
                    $numero = mysqli_fetch_assoc($resultado);
                    if($numero['cantidad'] == true) {
                        $arreglo['correo'] = $correo;
                        $arreglo['titulo'] = 'Inicio de sesión';
                        $arreglo['mensaje'] = 'Bienvenidos '.$correo;
                        $arreglo['url'] = 'public/supervisor/panel.php';
                        
                    }
                    else {
                        $arreglo['titulo'] = 'Error de sesión';
                        $arreglo['mensaje'] = 'La contraseña no coincide con el correo';
                        $arreglo['error'] = true;
                    }
                }
            }
        }
		mysqli_close($conexion);
		return $arreglo;
    }
?>
