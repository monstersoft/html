<?php
    include("conexion.php");
    //$correo = $_POST['txtCorreo'];
    //$password = $_POST['txtPassword'];
    $correo = 'benjamin@septima.cl';
    $password = '123456';
    $arreglo = array();
    $arreglo = buscarCorreo($correo);
    if($arreglo['existeCorreo'] == true) {
        if($arreglo['supervisor'] == true) {
            $arreglo = iniciaSesionSupervisor($correo,$password);
            $arreglo['usuario'] = 'supervisor';
            echo json_encode($arreglo);
        }
        if($arreglo['cliente'] == true) {
             $arreglo = iniciaSesionCliente($correo,$password);
             $arreglo['usuario'] = 'cliente';
             echo json_encode($arreglo);   
        }
    }
    else {
        $arreglo['mensaje'] = 'No estás registrado en el sistema';
        $arreglo['error'] = true;
        echo json_encode($arreglo);
    }
    function buscarCorreo($correo) {
        $conexion = conectar();
        $existeCorreo = false;
        $cliente = false;
        $supervisor = false;
        $busqueda = array();
        $consulta = "SELECT COUNT(*) AS cantidad FROM clientes WHERE correo = '$correo'";
        if($resultado = mysqli_query($conexion,$consulta)) {
            $numero = mysqli_fetch_assoc($resultado);
            if($numero['cantidad'] == 1) {
                $existeCorreo = true;
                $cliente = true;
            }
            else {
                $consulta = "SELECT COUNT(*) AS cantidad FROM supervisores WHERE correo = '$correo'";
                $numero = mysqli_fetch_assoc($resultado);
                if($resultado = mysqli_query($conexion,$consulta)) {
                    if($numero['cantidad'] == 1) {
                        $existeCorreo = true;
                        $supervisor = true;
                    }
                }
                
            }
        }
        $busqueda['existeCorreo'] = $existeCorreo;
        $busqueda['cliente'] = $cliente;
        $busqueda['supervisor'] = $supervisor;
        mysqli_close($conexion);
        return $busqueda;
    }
	function iniciaSesionCliente ($correo,$password) {
		$conexion = conectar();
		$arreglo = array();
		$arreglo['error'] = true;
		$consulta = "SELECT COUNT(*) AS cantidad FROM clientes WHERE correo = '$correo'";

		if($resultado = mysqli_query($conexion,$consulta)) {
			$numero = mysqli_fetch_assoc($resultado);
			if($numero['cantidad'] == 1) {
				$consulta = "SELECT COUNT(*) AS cantidad FROM clientes WHERE correo = '$correo' AND password = '$password'";
				if($resultado = mysqli_query($conexion,$consulta)) {
					$numero = mysqli_fetch_assoc($resultado);
					if($numero['cantidad'] == 1) {
						session_start();
                    	$_SESSION['correo'] = $correo;
						$arreglo['error'] = false;
						$arreglo['titulo'] = 'Inicio de sesión';
						$arreglo['mensaje'] = 'Bienvenidos '.$correo;
						$arreglo['url'] = 'public/cliente/dashboard.php';
					}
					else {
						$arreglo['titulo'] = 'Error de sesión';
						$arreglo['mensaje'] = 'La contraseña no coincide con el correo';
					}
				}
				else {
					$arreglo['errorMsg'] = mysqli_error($conexion);
				}

			}
			else {
				$arreglo['titulo'] = 'Error de registro';
				$arreglo['mensaje'] = 'No estás registrado en el sistema';
			}
		}
		else {
			$arreglo['errorMsg'] = mysqli_error($conexion);
		}
		mysqli_close($conexion);
		return $arreglo;
	}
	function iniciaSesionSupervisor ($correo,$password) {
		$conexion = conectar();
		$arreglo = array();
		$arreglo['error'] = true;
		$consulta = "SELECT COUNT(*) AS cantidad FROM supervisores WHERE correo = '$correo'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$numero = mysqli_fetch_assoc($resultado);
			if($numero['cantidad'] == 1) {
                $arreglo['titulo'] = 'Encontrado tu mail';
				$arreglo['mensaje'] = 'Eres supervisor';
				/*$consulta = "SELECT COUNT(*) AS cantidad FROM clientes WHERE correo = '$correo' AND password = '$password'";
				if($resultado = mysqli_query($conexion,$consulta)) {
					$numero = mysqli_fetch_assoc($resultado);
					if($numero['cantidad'] == 1) {
						session_start();
                    	$_SESSION['correo'] = $correo;
						$arreglo['error'] = false;
						$arreglo['titulo'] = 'Inicio de sesión';
						$arreglo['mensaje'] = 'Bienvenidos '.$correo;
						$arreglo['url'] = 'public/cliente/dashboard.php';
					}
					else {
						$arreglo['titulo'] = 'Error de sesión';
						$arreglo['mensaje'] = 'La contraseña no coincide con el correo';
					}
				}
				else {
					$arreglo['errorMsg'] = mysqli_error($conexion);
				}*/

			}
			else {
				$arreglo['titulo'] = 'Error de registro';
				$arreglo['mensaje'] = 'No estás registrado en el sistema';
			}
		}
		else {
			$arreglo['errorMsg'] = mysqli_error($conexion);
		}
		mysqli_close($conexion);
		return $arreglo;
	}
?>
