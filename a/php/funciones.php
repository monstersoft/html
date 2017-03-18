<?php
	include("conexion.php");

	function empresas() {
        $conexion = conectar();
        $arreglo = array();
        $consulta = 'SELECT COUNT(empresas.idEmpresa) AS cantidadEmpresas FROM empresas';
        if($resultado = mysqli_query($conexion,$consulta)) {
            $r= mysqli_fetch_assoc($resultado);
            $arreglo['cantidadEmpresas'] = $r['cantidadEmpresas'];
            if($arreglo['cantidadEmpresas'] != 0) {
                $consulta = 'SELECT empresas.idEmpresa, empresas.nombre, COUNT(DISTINCT zonas.idZona) AS zonas, COUNT(DISTINCT maquinas.idMaquina) AS maquinas, COUNT(DISTINCT supervisores.idSupervisor) AS supervisores
                             FROM empresas
                             LEFT JOIN zonas ON zonas.idEmpresa = empresas.idEmpresa
                             LEFT JOIN maquinas ON maquinas.idZona = zonas.idZona
                             LEFT JOIN supervisoreszonas ON supervisoreszonas.idZona = zonas.idZona
                             LEFT JOIN supervisores ON supervisores.idSupervisor = supervisoreszonas.idSupervisor
                             GROUP BY empresas.idEmpresa';
                if($resultado = mysqli_query($conexion,$consulta)) {
                    $arreglo['empresas'] = array();
                    while($r = mysqli_fetch_array($resultado)) {
                        array_push($arreglo['empresas'],array('idEmpresa' => $r['idEmpresa'],'nombre' => $r['nombre'], 'zonas' => $r['zonas'], 'maquinas' => $r['maquinas'], 'supervisores' => $r['supervisores']));
                    }
                
                }
            }
            mysqli_close($conexion);
            return $arreglo;
        }
    }

    function cantidadMaquinas($idZona) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT 
                     COUNT(maquinas.idMaquina) 
                     AS cantidadMaquinas 
                     FROM maquinas 
                     WHERE maquinas.idZona = '$idZona'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
        	$arreglo = mysqli_fetch_assoc($resultado);
        }
        mysqli_close($conexion);
        return $arreglo;
	}

	function cantidadSupervisores($idZona) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT 
                     COUNT(supervisoreszonas.idSupervisor) 
                     AS cantidadSupervisores 
                     FROM supervisoreszonas 
                     WHERE supervisoreszonas.idZona = '$idZona'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
        	$arreglo = mysqli_fetch_assoc($resultado);
        }
        mysqli_close($conexion);
        return $arreglo;
	}

	function cantidadZonas($idProyecto) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT 
                     COUNT(zonas.idZona) 
                     AS cantidadZonas 
                     FROM zonas 
                     WHERE zonas.idProyecto = '$idProyecto'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
        	$arreglo = mysqli_fetch_assoc($resultado);
        }
        mysqli_close($conexion);
        return $arreglo;
	}

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
        $consulta = "SELECT zonas.idZona, supervisores.idSupervisor, supervisores.nombreSupervisor, supervisores.correoSupervisor, supervisores.celular, supervisores.status, supervisores.fechaRegistro 
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
                $arreglo[$i]['status']= $row['status'];
                $arreglo[$i]['fechaRegistro']= $row['fechaRegistro'];
                $i++;
            }
        }
        mysqli_close($conexion);
        return $arreglo;
	}

	function zonas($idProyecto) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT zonas.idZona AS idZona, zonas.nombre AS nombreZona
        			 FROM zonas
        			 WHERE zonas.idProyecto = '$idProyecto'";
        if($resultado = mysqli_query($conexion,$consulta)) {
            if($resultado = mysqli_query($conexion,$consulta)) {
                $i = 0;
                while($row = mysqli_fetch_array($resultado)) {
                    $arreglo[$i]['idZona']= $row['idZona'];
                    $arreglo[$i]['nombreZona']= $row['nombreZona'];
                    $i++;
                }
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
function utf8Converter($array) {
    array_walk_recursive($array, function($item, $key){
        if(!mb_detect_encoding($item, 'utf-8', true)){
                $item = utf8_encode($item);
        }
    });
return $array;
}
