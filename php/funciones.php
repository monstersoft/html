<?php
	include("conexion.php");

	function verificaFormularioEmpresa($nombre,$rut,$email) {
		$conexion = conectar();
		$arreglo = array();
		$consulta = "SELECT COUNT(*) AS nombres FROM empresas WHERE empresas.nombre = '$nombre'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$nombres = mysqli_fetch_assoc($resultado);
			if($nombres['nombres'] == 1) {
				$arreglo['msgName'] = 'La empresa ya existe';
				$arreglo['successName']  = 0;
				$arreglo['numberNames'] = $nombres['nombres'];
			}
			else {
				$arreglo['msgName'] = 'El nombre de la empresa está disponible';
				$arreglo['successName'] = 1;
				$arreglo['numberNames'] = $nombres['nombres'];
			}
		}
		$consulta = "SELECT COUNT(*) AS ruts FROM empresas WHERE empresas.rut = '$rut'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$ruts = mysqli_fetch_assoc($resultado);
			if($ruts['ruts'] == 1) {
				$arreglo['msgRut'] = 'El rut ya existe';
				$arreglo['successRut']  = 0;
				$arreglo['numberRuts'] = $ruts['ruts'];
			}
			else {
				$arreglo['msgRut'] = 'El rut ingresado está disponible';
				$arreglo['successRut'] = 1;
				$arreglo['numberRuts'] = $ruts['ruts'];
			}
		}
		$consulta = "SELECT COUNT(*) AS correos FROM empresas WHERE empresas.correo = '$email'";
		if($resultado = mysqli_query($conexion,$consulta)) {
			$correos = mysqli_fetch_assoc($resultado);
			if($correos['correos'] == 1) {
				$arreglo['msgEmail'] = 'Este correo ya existe';
				$arreglo['successEmail']  = 0;
				$arreglo['numberEmails'] = $correos['correos'];
			}
			else {
				$arreglo['msgEmail'] = 'El correo está disponible';
				$arreglo['successEmail'] = 1;
				$arreglo['numberEmails'] = $correos['correos'];
			}
		}
		mysqli_close($conexion);
		return $arreglo;
	}

	function insertarEmpresa($rut,$nombre,$correo,$direccion,$telefono) {
		$conexion = conectar();
		$arreglo = array();
		$consulta = "INSERT INTO empresas (rut,nombre,correo,direccion,telefono) VALUES ('$rut','$nombre','$correo','$direccion','$telefono')";
		if(mysqli_query($conexion,$consulta)) {
			$arreglo['mensaje'] = 'Ingreso correcto';
			$arreglo['exito'] = 1;
		}

		else {
			$arreglo['mensaje'] = 'Ingreso erroneo';
			$arreglo['exito'] = 0;
		}
		echo $arreglo;
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