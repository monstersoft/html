<?php
    include("funciones.php");
    $arreglo = array();
    if(!(isset($_POST['txtCorreo']) or isset($_POST['txtPassword']) or isset($_POST['txtSupervisor']))) {
        $arreglo['mensaje'] = 'No existen las variables';
        }
    else {
        if($_POST['txtSupervisor'] == 'false') {
            $arreglo = iniciaSesionCliente ($_POST['txtCorreo'],$_POST['txtPassword']);
        }
        if($_POST['txtSupervisor'] == 'true'){
            $arreglo = iniciaSesionSupervisor ($_POST['txtCorreo'],$_POST['txtPassword']);
        }
    }
        
    echo json_encode($arreglo);

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
						$arreglo['url'] = 'vistas/cliente/panel.php';
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
		$consulta = "SELECT COUNT(*) AS cantidad FROM supervisores WHERE correoSupervisor = '$correo'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$numero = mysqli_fetch_assoc($resultado);
			if($numero['cantidad'] == 1) {
				$consulta = "SELECT COUNT(*) AS cantidad FROM supervisores WHERE correoSupervisor = '$correo' AND password = '$password'";
				if($resultado = mysqli_query($conexion,$consulta)) {
					$numero = mysqli_fetch_assoc($resultado);
					if($numero['cantidad'] == 1) {
						session_start();
                    	$_SESSION['correo'] = $correo;
						$arreglo['error'] = false;
						$arreglo['titulo'] = 'Inicio de sesión';
						$arreglo['mensaje'] = 'Bienvenidos '.$correo;
						$arreglo['url'] = 'vistas/supervisor/panel.php';
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
				$arreglo['mensaje'] = 'No estas registrado en el sistema';
			}
		}
		else {
			$arreglo['errorMsg'] = mysqli_error($conexion);
		}
		mysqli_close($conexion);
		return $arreglo;
	}
?>
