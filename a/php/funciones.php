<?php
	include("conexion.php");
//FUNCIONES PARA CLIENTE
function debug( $var) 
{ 
  echo "<pre>";
  print_r($var); 
  echo "</pre>";
}

// ZONAS.PHP
function datosRecientes() {
    $conexion = conectar();
    $arreglo = array();
    $flag = 0;
    $consulta = 'SELECT empresas.idEmpresa, empresas.nombre AS nombreEmpresa, zonas.idZona, zonas.nombre AS nombreZona, supervisores.idSupervisor, supervisores.nombreSupervisor, archivos.idArchivo, archivos.fechaDatos, archivos.fechaSubida, archivos.horaSubida, MAX(fechaDatos) AS fechaRecienteDatos FROM zonas LEFT JOIN archivos ON zonas.idZona = archivos.idZona LEFT JOIN supervisores ON archivos.idSupervisor = supervisores.idSupervisor LEFT JOIN empresas ON zonas.idEmpresa = empresas.idEmpresa GROUP BY zonas.idZona ORDER BY empresas.nombre ASC';
    if($resultado = mysqli_query($conexion,$consulta)) {
        while($row = mysqli_fetch_array($resultado)) {
            if($flag == 0) {
               $zonas = [];
               array_push($zonas,array('idZona' => $row['idZona'],'nombreZona' => utf8_encode($row['nombreZona']),'idSupervisor' => $row['idSupervisor'],'nombreSupervisor' => utf8_encode($row['nombreSupervisor']),'idArchivo' => $row['idArchivo'],'fechaDatos' => $row['fechaDatos'],'fechaSubida' => utf8_encode($row['fechaSubida']),'horaSubida' => utf8_encode($row['horaSubida']),'fechaRecienteDatos' => utf8_encode($row['fechaRecienteDatos'])));
               array_push($arreglo,array('idEmpresa' => $row['idEmpresa'], 'nombreEmpresa' => utf8_encode($row['nombreEmpresa']), 'zonas' => $zonas));
               $flag = 1;
            }
            else {
                if($arreglo[sizeof($arreglo)-1]['idEmpresa'] == $row['idEmpresa'])
                    array_push($arreglo[sizeof($arreglo)-1]['zonas'],array('idZona' => $row['idZona'],'nombreZona' => utf8_encode($row['nombreZona']),'idSupervisor' => $row['idSupervisor'],'nombreSupervisor' => utf8_encode($row['nombreSupervisor']),'idArchivo' => $row['idArchivo'],'fechaDatos' => $row['fechaDatos'],'fechaSubida' => utf8_encode($row['fechaSubida']),'horaSubida' => utf8_encode($row['horaSubida']),'fechaRecienteDatos' => utf8_encode($row['fechaRecienteDatos'])));

                else {
                    $zonas = [];
                    array_push($zonas,array('idZona' => $row['idZona'],'nombreZona' => utf8_encode($row['nombreZona']),'idSupervisor' => $row['idSupervisor'],'nombreSupervisor' => utf8_encode($row['nombreSupervisor']),'idArchivo' => $row['idArchivo'],'fechaDatos' => $row['fechaDatos'],'fechaSubida' => utf8_encode($row['fechaSubida']),'horaSubida' => utf8_encode($row['horaSubida']),'fechaRecienteDatos' => utf8_encode($row['fechaRecienteDatos'])));
                    array_push($arreglo,array('idEmpresa' => $row['idEmpresa'], 'nombreEmpresa' => utf8_encode($row['nombreEmpresa']), 'zonas' => $zonas));
                }
            }
        }
    }
    mysqli_close($conexion);
    return $arreglo;
}
function empresas() {
        $conexion = conectar();
        $arreglo = array();
        $arreglo['empresas'] = array();
        $consulta = 'SELECT COUNT(empresas.idEmpresa) AS cantidadEmpresas FROM empresas';
        if($resultado = mysqli_query($conexion,$consulta)) {
            $r = mysqli_fetch_assoc($resultado);
            $arreglo['cantidadEmpresas'] = $r['cantidadEmpresas'];
            /*if($arreglo['cantidadEmpresas'] != 0) {
                $consulta = 'SELECT empresas.idEmpresa, empresas.nombre, COUNT(DISTINCT zonas.idZona) AS zonas, COUNT(DISTINCT maquinas.idMaquina) AS maquinas, COUNT(DISTINCT supervisores.idSupervisor) AS supervisores
                             FROM empresas
                             LEFT JOIN zonas ON zonas.idEmpresa = empresas.idEmpresa
                             LEFT JOIN maquinas ON maquinas.idZona = zonas.idZona
                             LEFT JOIN supervisoreszonas ON supervisoreszonas.idZona = zonas.idZona
                             LEFT JOIN supervisores ON supervisores.idSupervisor = supervisoreszonas.idSupervisor
                             GROUP BY empresas.idEmpresa';
                if($resultado = mysqli_query($conexion,$consulta)) {
                    while($r = mysqli_fetch_array($resultado)) {
                        array_push($arreglo['empresas'],array('idEmpresa' => $r['idEmpresa'],'nombre' => utf8_encode($r['nombre']), 'zonas' => $r['zonas'], 'maquinas' => $r['maquinas'], 'supervisores' => $r['supervisores']));
                    }
                
                }
            }*/
            if($arreglo['cantidadEmpresas'] != 0) {
                $consulta = 'SELECT * FROM empresas';
                if($resultado = mysqli_query($conexion,$consulta)) {
                    while($r = mysqli_fetch_array($resultado)) {
                        array_push($arreglo['empresas'],array('idEmpresa' => $r['idEmpresa'],'nombre' => utf8_encode($r['nombre']), 'rut' => $r['rut'], 'correo' => $r['correo'], 'telefono' => $r['telefono'], 'estado' => $r['estado']));
                    }
                
                }
            mysqli_close($conexion);
            return $arreglo;
        }
    }
}
// FUNCIONES PARA CLIENTES zonas.php 
    function zonas($idEmpresa) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT zonas.idZona AS idZona, zonas.nombre AS nombreZona
                     FROM zonas
                     WHERE zonas.idEmpresa = '$idEmpresa'";
        if($resultado = mysqli_query($conexion,$consulta)) {
            if($resultado = mysqli_query($conexion,$consulta)) {
                while($row = mysqli_fetch_array($resultado)) {
                    array_push($arreglo,array('idZona' => $row['idZona'], 'nombreZona' => utf8_encode($row['nombreZona'])));
                }
            }
        }
        mysqli_close($conexion);
        return $arreglo;
    }
	function cantidadZonas($idEmpresa) {
        $conexion = conectar();
        $cantidad;
        $consulta = "SELECT 
                     COUNT(zonas.idZona) 
                     AS cantidadZonas 
                     FROM zonas 
                     WHERE zonas.idEmpresa = '$idEmpresa'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
        	$row = mysqli_fetch_assoc($resultado);
            $cantidad = $row['cantidadZonas'];
        }
        mysqli_close($conexion);
        return $cantidad;
	}
    function cantidadMaquinas($idZona) {
        $conexion = conectar();
        $cantidad;
        $consulta = "SELECT 
                     COUNT(maquinas.idMaquina) 
                     AS cantidadMaquinas 
                     FROM maquinas 
                     WHERE maquinas.idZona = '$idZona'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
        	$row = mysqli_fetch_assoc($resultado);
            $cantidad = $row['cantidadMaquinas'];
        }
        mysqli_close($conexion);
        return $cantidad;
	}
	function maquinas($idZona) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT * FROM maquinas WHERE maquinas.idZona = '$idZona'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
            while($r = mysqli_fetch_array($resultado)) {
                array_push($arreglo,array('idMaquina' => $r['idMaquina'], 'idZona' => $r['idZona'], 'identificador' => $r['identificador'], 'patente' => $r['patente'], 'fechaRegistro' => $r['fechaRegistro'], 'tara' => $r['tara'], 'cargaMaxima' => $r['cargaMaxima']));
            }
        }
        mysqli_close($conexion);
        return $arreglo;
	}
	function cantidadSupervisores($idZona) {
        $conexion = conectar();
        $cantidad;
        $consulta = "SELECT 
                     COUNT(supervisoreszonas.idSupervisor) 
                     AS cantidadSupervisores 
                     FROM supervisoreszonas 
                     WHERE supervisoreszonas.idZona = '$idZona'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
        	$row = mysqli_fetch_assoc($resultado);
            $cantidad = $row['cantidadSupervisores'];
        }
        mysqli_close($conexion);
        return $cantidad;
	}
	function supervisores($idZona) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT zonas.idZona, supervisores.idSupervisor, supervisores.nombreSupervisor, supervisores.correoSupervisor, supervisores.celular, supervisores.status, supervisores.fechaMailEnviado 
        			 FROM zonas 
        			 LEFT JOIN supervisoreszonas ON zonas.idZona = supervisoreszonas.idZona 
        			 LEFT JOIN supervisores ON supervisoreszonas.idSupervisor = supervisores.idSupervisor 
        			 WHERE zonas.idZona = '$idZona'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
            while($r = mysqli_fetch_array($resultado)) {
                array_push($arreglo,array('idZona' => $r['idZona'], 'idSupervisor' => $r['idSupervisor'], 'nombreSupervisor' => utf8_encode($r['nombreSupervisor']), 'correoSupervisor' => $r['correoSupervisor'], 'celular' => $r['celular'], 'status' => $r['status'], 'fechaMailEnviado' => $r['fechaMailEnviado']));
            }
        }
        mysqli_close($conexion);
        return $arreglo;
	}

// FUNCIONES PARA OTRA COSA
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
?>
