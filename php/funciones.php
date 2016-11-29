<?php
	include("conexion.php");

	function empresas() {
        $conexion = conectar();
        $arreglo = array();
        $consulta = 'SELECT empresas.idEmpresa, empresas.nombre, COUNT(DISTINCT proyectos.idProyecto) AS proyectos, COUNT(DISTINCT zonas.idZona) AS zonas, COUNT(DISTINCT maquinas.idMaquina) AS maquinas, COUNT(DISTINCT supervisores.idSupervisor) AS supervisores
					 FROM empresas
					 LEFT JOIN proyectos ON empresas.idEmpresa = proyectos.idEmpresa
					 LEFT JOIN zonas ON zonas.idProyecto = proyectos.idProyecto
					 LEFT JOIN maquinas ON maquinas.idZona = zonas.idZona
					 LEFT JOIN supervisoreszonas ON supervisoreszonas.idZona = zonas.idZona
					 LEFT JOIN supervisores ON supervisores.idSupervisor = supervisoreszonas.idSupervisor
					 GROUP BY empresas.idEmpresa'; 
        if($resultado = mysqli_query($conexion,$consulta)) {
        	$i = 0;
            while($row = mysqli_fetch_array($resultado)) {
                $arreglo[$i]['idEmpresa']= $row['idEmpresa'];
                $arreglo[$i]['nombre']= $row['nombre'];
                $arreglo[$i]['proyectos']= $row['proyectos'];
                $arreglo[$i]['zonas']    = $row['zonas'];
                $arreglo[$i]['maquinas'] = $row['maquinas'];
                $arreglo[$i]['supervisores']= $row['supervisores'];
                $i++;
            }
        }
        mysqli_close($conexion);
        return $arreglo;
    }

	function datosPerfil($correo) {
        $conexion = conectar();
        $consulta = "SELECT correo,empresa FROM clientes WHERE correo = '$correo'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
        	$arreglo = array();
            while($row = mysqli_fetch_assoc($resultado)) {
            	$arreglo['correo'] = $row['correo'];
            	$arreglo['empresa'] = $row['empresa'];
            }
        }
        mysqli_close($conexion);
        return $arreglo;
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
						$arreglo['url'] = 'public_html/c/panel.php';
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


	function iniciaSesionSupervisor ($correo,$password) {
		$conexion = conectar();
		$arreglo = array();
		$arreglo['error'] = true;
		$consulta = "SELECT COUNT(*) AS cantidad FROM supervisores WHERE correo = '$correo'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$numero = mysqli_fetch_assoc($resultado);
			if($numero['cantidad'] == 1) {
				$consulta = "SELECT COUNT(*) AS cantidad FROM supervisores WHERE correo = '$correo' AND password = '$password'";
				if($resultado = mysqli_query($conexion,$consulta)) {
					$numero = mysqli_fetch_assoc($resultado);
					if($numero['cantidad'] == 1) {
						session_start();
                    	$_SESSION['correo'] = $correo;
						$arreglo['error'] = false;
						$arreglo['titulo'] = 'Inicio de sesión';
						$arreglo['mensaje'] = 'Bienvenidos '.$correo;
						$arreglo['url'] = 'public_html/s/panel.php';
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