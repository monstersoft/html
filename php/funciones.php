<?php
	include("conexion.php");

	function maquinas($idZona) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT * FROM maquinas WHERE maquinas.idZona = '$idZona'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
        	$i = 0;
            while($row = mysqli_fetch_array($resultado)) {
                $arreglo[$i]['idMaquina'] = $row['idMaquina'];
                $arreglo[$i]['idZona'] = $row['idZona'];
                $arreglo[$i]['patente'] = $row['patente'];
                $arreglo[$i]['fechaRegistro'] = $row['fechaRegistro'];
                $arreglo[$i]['velocidadMaxima'] = $row['velocidadMaxima'];
                $arreglo[$i]['tara'] = $row['tara'];
                $arreglo[$i]['cargaMaxima'] = $row['cargaMaxima'];
                $i++;
            }
        }
        mysqli_close($conexion);
        return $arreglo;
	}

	function supervisores($idZona) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT zonas.idZona, supervisores.idSupervisor, supervisores.nombreSupervisor, supervisores.correoSupervisor, supervisores.celular 
        			 FROM zonas 
        			 LEFT JOIN supervisoreszonas ON zonas.idZona = supervisoreszonas.idZona 
        			 LEFT JOIN supervisores ON supervisoreszonas.idSupervisor = supervisores.idSupervisor 
        			 WHERE zonas.idZona = '$idZona'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
        	$i = 0;
            while($row = mysqli_fetch_array($resultado)) {
                $arreglo[$i]['idZona']= $row['idZona'];
                $arreglo[$i]['idSupervisor']= $row['idSupervisor'];
                $arreglo[$i]['nombreSupervisor']= $row['nombreSupervisor'];
                $arreglo[$i]['correoSupervisor']= $row['correoSupervisor'];
                $arreglo[$i]['celular']= $row['celular'];
                $i++;
            }
        }
        mysqli_close($conexion);
        return $arreglo;
	}

	function zonas($idProyecto) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT zonas.idZona, zonas.nombre AS nombreZona
        			 FROM zonas
        			 WHERE zonas.idProyecto = '$idProyecto'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
        	$i = 0;
            while($row = mysqli_fetch_array($resultado)) {
                $arreglo[$i]['idZona']= $row['idZona'];
                $arreglo[$i]['nombreZona']= $row['nombreZona'];
                $i++;
            }
        }
        mysqli_close($conexion);
        return $arreglo;
    }

	function proyectos($idEmpresa) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT proyectos.idProyecto, proyectos.nombre AS nombreProyecto
        			 FROM proyectos
        			 WHERE proyectos.idEmpresa = '$idEmpresa'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
        	$i = 0;
            while($row = mysqli_fetch_array($resultado)) {
                $arreglo[$i]['idProyecto']= $row['idProyecto'];
                $arreglo[$i]['nombreProyecto']= $row['nombreProyecto'];
                $i++;
            }
        }
        mysqli_close($conexion);
        return $arreglo;
    }
	function verifica($arreglo) {
		$conexion = conectar();
		$arreglo = array();
		$arreglo['fracaso'] = 0;
		$arreglo['exito'] = 0;
		$arreglo['error'] = 0;
		if($arreglo[0]['nombre']['cambio'] == 1){
			$nombre = $arreglo[0]['nombre']['modificado'];
			$consulta = "SELECT COUNT(*) AS nombres FROM empresas WHERE empresas.nombre = '$nombre'";
			if($resultado = mysqli_query($conexion,$consulta)) {
				$nombres = mysqli_fetch_assoc($resultado);
				if($nombres['nombres'] >= 1) {
					$arreglo['msgFracaso'][] = 'El nombre ingresado ya está en uso';
					$arreglo['fracaso']++;
				}
				else {
					$arreglo['msgExito'][] = 'Nombre editado correctamente';
					$arreglo['exito']++;
				}
			}
			else
				$arreglo['msgError'] = 'Error de consulta en nombre';
				$arreglo['error']++;

		}
		mysqli_close($conexion);
		return $arreglo;
	}

	function datosEmpresa($id) {
        $conexion = conectar();
        $consulta = "SELECT * FROM empresas WHERE empresas.idEmpresa = '$id'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
        	$arreglo = array();
            while($row = mysqli_fetch_assoc($resultado)) {
            	$arreglo['idEmpresa'] = $row['idEmpresa'];
            	$arreglo['rut'] = $row['rut'];
            	$arreglo['nombre'] = $row['nombre'];
            	$arreglo['correo'] = $row['correo'];
            	$arreglo['telefono'] = $row['telefono'];
            }
        }
        mysqli_close($conexion);
        return $arreglo;
    }

	function verificaFormularioEmpresa($name,$rut,$email,$phone) {
		$conexion = conectar();
		$arreglo = array();
		//SI EL NOMBRE FUE CAMBIADO HAGO LA CONSULTA
			//SI HAY REGISTROS IGUALES DEVUELVO MENSAJE Y EXITO 0
			//SI NO 
		$consulta = "SELECT COUNT(*) AS nombres FROM empresas WHERE empresas.nombre = '$name'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$nombres = mysqli_fetch_assoc($resultado);
			if($nombres['nombres'] == 1) {
				$arreglo['msg'][]= 'El nombre ingresado ya está en uso';
				$arreglo['exito'] = 0;
			}
		}

		$consulta = "SELECT COUNT(*) AS ruts FROM empresas WHERE empresas.rut = '$rut'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$ruts = mysqli_fetch_assoc($resultado);
			if($ruts['ruts'] == 1) {
				$arreglo['msg'][] = 'El rut ingresado ya está en uso';
				$arreglo['exito'] = 0;
			}
		}
		$consulta = "SELECT COUNT(*) AS correos FROM empresas WHERE empresas.correo = '$email'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$correos = mysqli_fetch_assoc($resultado);
			if($correos['correos'] == 1) {
				$arreglo['msg'][] = 'El correo ingresado ya está en uso';
				$arreglo['exito'] = 0;
			}
		}
		$consulta = "SELECT COUNT(*) AS telefonos FROM empresas WHERE empresas.telefono = '$phone'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$telefonos = mysqli_fetch_assoc($resultado);
			if($telefonos['telefonos'] == 1) {
				$arreglo['msg'][] = 'El teléfono ingresado ya está en uso';
				$arreglo['exito'] = 0;
			}
		}
		if($nombres['nombres'] == "0" && $ruts['ruts'] == "0" && $correos['correos'] == "0" && $telefonos['telefonos'] == "0") {
			$consulta = "INSERT INTO empresas (rut,nombre,correo,telefono) VALUES ('$rut','$name','$email','$phone')";
			if(mysqli_query($conexion,$consulta)) {
				$arreglo['exito'] = 1;
			}
			else {
				$arreglo['exito'] = 0;
			}
		}
		mysqli_close($conexion);
		return $arreglo;
	}
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