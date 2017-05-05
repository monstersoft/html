<?php
	include("conexion.php"); 
    echo resultadosMaquinas(89,1);
    function resultadosMaquinas($idFile,$identifier) {
        $conexion = conectar();
        $arr = arrayResultados($conexion,$idFile,$identifier);
        $points = array();
        $consulta = "SELECT * FROM datos WHERE datos.idArchivo = '$idFile' AND datos.identificador = '$identifier' ORDER BY datos.identificador ASC, datos.hora ASC";
        if($resultado = mysqli_query($conexion,$consulta)) {
            while($row = mysqli_fetch_array($resultado)) {
                array_push($points,array('latitud' => floatval($row['latitud']), 'longitud' => floatval($row['longitud'])));
                $position = returnPositionInsert(date_create($row['hora']));
                $arr['hours'][$position]['labels'][] = returnLabelChart($row['hora']);
                $arr['hours'][$position]['degressFrontShovel']['values'][] = floatval($row['gradosPalaFrontal']);
                $arr['hours'][$position]['degressBackShovel']['values'][] = floatval($row['gradosPalaTrasera']);
                $arr['hours'][$position]['highFrontShovel']['values'][] = floatval($row['alturaPalaFrontal']);
                $arr['hours'][$position]['highBackShovel']['values'][] = floatval($row['alturaPalaTrasera']);
            }
        }
        mysqli_close($conexion);
        //echo json_encode($arr);
        //echo json_encode($points);
    }
    function getDistanceFromLatLonInKm($lat1,$lon1,$lat2,$lon2,$sum) {
          $R = 6371; // Radius of the earth in km
          $dLat = deg2rad($lat2-$lat1);  // deg2rad below
          $dLon = deg2rad($lon2-$lon1); 
          $a = sin($dLat/2)*sin($dLat/2)+cos(deg2rad($lat1))*cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2); 
          $c = 2*atan2(sqrt($a),sqrt(1-$a)); 
          $d = $R*$c; // Distance in km
          $sum = $sum +$d;
          return $sum;
    }
    function returnLabelChart($date) {
        list($hour,$minute,$second) = explode(':',$date);
        return intval($minute);
    }
    function returnPositionInsert($date) {
        if($date <= date_create('08:59:59'))
            return 0;
        if(($date >= date_create('09:00:00')) and ($date <= date_create('09:59:59')))
            return 1;
        if(($date >= date_create('10:00:00')) and ($date <= date_create('10:59:59')))
            return 2;
        if(($date >= date_create('11:00:00')) and ($date <= date_create('11:59:59')))
            return 3;
        if(($date >= date_create('12:00:00')) and ($date <= date_create('12:59:59')))
            return 4;
        if(($date >= date_create('13:00:00')) and ($date <= date_create('13:59:59')))
            return 5;
        if(($date >= date_create('14:00:00')) and ($date <= date_create('14:59:59')))
            return 6;
        if(($date >= date_create('15:00:00')) and ($date <= date_create('15:59:59')))
            return 7;
        if(($date >= date_create('16:00:00')) and ($date <= date_create('16:59:59')))
            return 8;
        if(($date >= date_create('17:00:00')) and ($date <= date_create('17:59:59')))
            return 9;
    }
    function returnPositionInsertCambios($date) {
        if($cambio == 1)
            return 0;
        if($cambio == 2)
            return 1;
        if($cambio == 3)
            return 2;
        if($cambio == 4)
            return 3;
        if($cambio == 5)
            return 4;
        if($cambio == 6)
            return 5;
        if(($date >= ('14:00:00')) and ($date <= date_create('14:59:59')))
            return 6;
        if(($date >= ('15:00:00')) and ($date <= date_create('15:59:59')))
            return 7;
        if(($date >= ('16:00:00')) and ($date <= date_create('16:59:59')))
            return 8;
        if(($date >= ('17:00:00')) and ($date <= date_create('17:59:59')))
            return 9;
    }
    function arrayResultados($con, $idFile,$identifier) {
        $arr = array('hours' => array());
        $qry = "SELECT MAX(datos.hora) FROM datos WHERE datos.idArchivo = '$idFile' AND datos.identificador = '$identifier'";
        if($res = mysqli_query($con,$qry)) {
            $row = mysqli_fetch_row($res);
            list($h,$m,$s) = explode(':',$row[0]);
            $maxHour = intval($h);
        }
        $arr['maxHour'] = $maxHour;
        $qry = "SELECT MIN(datos.hora) FROM datos WHERE datos.idArchivo = '$idFile' AND datos.identificador = '$identifier'";
        if($res = mysqli_query($con,$qry)) {
            $row = mysqli_fetch_row($res);
            list($h,$m,$s) = explode(':',$row[0]);
            $minHour = intval($h);
        }
        $arr['minHour'] = $minHour;
        while($minHour <= $maxHour) {
            $degressFrontShovel = array('values' => array());
            $degressBackShovel = array('values' => array());
            $highFrontShovel = array('values' => array());
            $highBackShovel = array('values' => array());
            array_push($arr['hours'],array('degressFrontShovel' => $degressFrontShovel, 'degressBackShovel' => $degressBackShovel,'highFrontShovel' => $highFrontShovel, 'highBackShovel' => $highBackShovel));
            $minHour++;
        }
        return $arr;
    }
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
    function debug($var) { 
  echo "<pre>";
  print_r($var); 
  echo "</pre>";
}
?>
