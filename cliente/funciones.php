<?php
	include("../../php/conexion.php");
    /*
        SE APLICA EN : TODAS LAS SECCIONES DEL MÓDULO CLIENTE (ZONAS.PHP, CRUDEMPRESAS.PHP, CRUDZONAS.PHP ETC..)
        OBJETIVO     : IMPRIMIR LA BARRA DE NAVEGACIÓN DEL CLIENTE
        ENTRADA      : ARREGLO LLAMADO PERFIL QUE CONTIENE EL CORREO Y LA EMPRESA A LA CUAL PERTENECE EL CLIENTE
        ENTRADA      : NOMBRE DE LA PÁGINA QUE ESTÁ ACTIVA, EN EL MENÚ DE NAVEGACIÓN SE LE AÑADE LA CLASE SELECTED SEGÚN LA PÁGINA
    */
    function barraMenu($perfil,$nombrePagina) {
        echo
            '<div id="bar"><a id="clickMenu"><i class="fa fa-bars"></i></a>
                <p class="editarZona">Machine Monitors</p>
            </div>
            <nav class="unDisplayNav">
                <ul>
                    <li id="profile"><i class="fa fa-cogs fa-4x" id="iconProfile"></i>
                        <br><span id="titleProfile">'.$perfil['correo'].'</span>
                        <br><span id="nameProfile">'.$perfil['empresa'].'</span></li>'; 
                    if($nombrePagina == 'zonas') { echo '
                        <li class="selected"><a href="zonas.php"><i class="fa fa-globe icons"></i>Zonas</a></li>
                        <li><a href="crudEmpresas"><i class="fa fa fa-cog icons"></i>Ajustes</a></li>
                        <li><a href="contacto"><i class="fa fa-send icons"></i>Contacto</a></li>
                        <li><a href="password"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
                        <li><a href="cerrar"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>';

                    }
                    if($nombrePagina == 'registro') { echo '
                        <li><a href="zonas"><i class="fa fa-globe icons"></i>Zonas</a></li>
                        <li class="selected"><a href="crudEmpresas.php"><i class="fa fa-cog icons"></i>Ajustes</a></li>
                        <li><a href="contacto"><i class="fa fa-send icons"></i>Contacto</a></li>
                        <li><a href="password"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
                        <li><a href="cerrar"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>';

                    }
                    if($nombrePagina == 'contacto') { echo '
                        <li><a href="zonas"><i class="fa fa-globe icons"></i>Zonas</a></li>
                        <li><a href="crudEmpresas"><i class="fa fa-cog icons"></i>Ajustes</a></li>
                        <li class="selected"><a href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
                        <li><a href="password"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
                        <li><a href="cerrar"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>';

                    }
                    if($nombrePagina == 'contraseña') { echo '
                        <li><a href="zonas"><i class="fa fa-globe icons"></i>Zonas</a></li>
                        <li><a href="crudEmpresas"><i class="fa fa-cog icons"></i>Ajustes</a></li>
                        <li><a href="contacto"><i class="fa fa-send icons"></i>Contacto</a></li>
                        <li class="selected"><a href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
                        <li><a href="cerrar"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>';

                    }
                    if($nombrePagina == 'cerrar') { echo '
                        <li><a href="zonas"><i class="fa fa-globe icons"></i>Zonas</a></li>
                        <li><a href="crudEmpresas"><i class="fa fa-cog icons"></i>Ajustes</a></li>
                        <li><a href="contacto"><i class="fa fa-send icons"></i>Contacto</a></li>
                        <li><a href="password"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
                        <li class="selected"><a href="cerrar"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>';

                    } echo '
                </ul>
               </nav>';
    }
    /*
        SE APLICA EN : ZONAS.PHP
        OBJETIVO     : RETORNAR TODAS LAS ZONAS QUE TIENEN AL MENOS UN ARCHIVO PARA REVISAR, LOS DATOS RELACIONADOS AL ARCHIVO SON LOS MÁS ACTUALES, ES DECIR EL ÚLTIMO ARCHIVO QUE SE SUBIÓ EN LA ZONA.
        RETORNA      : ARREGLO QUE CONTIENE LA EMPRESA CON LAS RESPECTIVAS ZONAS Y LOS DATOS DEL ARCHIVO POR CADA ZONA .
    */
    function datosRecientes() {
        $l = conectar();
        $c = "SELECT DISTINCT ta.idZona, te.idEmpresa, te.nombre AS nombreEmpresa, tz.nombre AS nombreZona, ts.nombreSupervisor, ta.idArchivo, ta.idSupervisor, ta.fechaSubida, ta.fechaDatos AS fechaRecienteDatos, ta.horaSubida FROM archivos ta LEFT JOIN zonas tz ON ta.idZona = tz.idZona LEFT JOIN supervisores ts ON ta.idSupervisor = ts.idSupervisor LEFT JOIN empresas te ON tz.idEmpresa = te.idEmpresa WHERE fechaDatos = (SELECT MAX(fechaDatos) FROM archivos ta2 WHERE ta.idZona = ta2.idZona) ORDER BY te.nombre, tz.nombre";
        $a = array();
        if($r = mysqli_query($l,$c)) {
            while($f = mysqli_fetch_assoc($r)) {
                if(sizeof($a) == 0)
                    array_push($a,array('idEmpresa'=>$f['idEmpresa'],'nombreEmpresa'=>$f['nombreEmpresa'], 'zonas'=>array(array('idZona'=>$f['idZona'],'nombreZona'=>$f['nombreZona'],'idSupervisor'=>$f['idSupervisor'],'nombreSupervisor'=>$f['nombreSupervisor'],'idArchivo'=>$f['idArchivo'],'fechaSubida'=>$f['fechaSubida'],'horaSubida'=>$f['horaSubida'],'fechaRecienteDatos'=>$f['fechaRecienteDatos']))));
                else
                    if($a[sizeof($a)-1]['idEmpresa'] == $f['idEmpresa'])
                        array_push($a[sizeof($a)-1]['zonas'], array('idZona'=>$f['idZona'],'nombreZona'=>$f['nombreZona'],'idSupervisor'=>$f['idSupervisor'],'nombreSupervisor'=>$f['nombreSupervisor'],'idArchivo'=>$f['idArchivo'],'fechaSubida'=>$f['fechaSubida'],'horaSubida'=>$f['horaSubida'],'fechaRecienteDatos'=>$f['fechaRecienteDatos']));
                    else
                        array_push($a,array('idEmpresa'=>$f['idEmpresa'],'nombreEmpresa'=>$f['nombreEmpresa'], 'zonas'=>array(array('idZona'=>$f['idZona'],'nombreZona'=>$f['nombreZona'],'idSupervisor'=>$f['idSupervisor'],'nombreSupervisor'=>$f['nombreSupervisor'],'idArchivo'=>$f['idArchivo'],'fechaSubida'=>$f['fechaSubida'],'horaSubida'=>$f['horaSubida'],'fechaRecienteDatos'=>$f['fechaRecienteDatos']))));
            }
        }
        return $a;
    }
    /*
        SE APLICA EN : CRUDEMPRESAS.PHP
        OBJETIVO     : RESCATAR TODAS LAS EMPRESAS DE LA BD.
        RETORNA      : RETORNA UN ARREGLO CON LOS DATOS DE LAS EMPRESAS.
    */
    function empresas() {
        $conexion = conectar();
        $arreglo = array();
        $arreglo['empresas'] = array();
        $consulta = 'SELECT COUNT(empresas.idEmpresa) AS cantidadEmpresas FROM empresas';
        if($resultado = mysqli_query($conexion,$consulta)) {
            $r = mysqli_fetch_assoc($resultado);
            $arreglo['cantidadEmpresas'] = $r['cantidadEmpresas'];
            if($arreglo['cantidadEmpresas'] != 0) {
                $consulta = 'SELECT * FROM empresas';
                if($resultado = mysqli_query($conexion,$consulta)) {
                    while($r = mysqli_fetch_array($resultado)) {
                        array_push($arreglo['empresas'],array('idEmpresa' => $r['idEmpresa'],'nombre' => $r['nombre'], 'rut' => $r['rut'], 'correo' => $r['correo'], 'telefono' => $r['telefono']));
                    }
                
                }
            }
        }
        mysqli_close($conexion);
        return $arreglo;
    }
    /*
        SE APLICA EN : CRUDZONAS.PHP
        OBJETIVO     : RESCATAR LA CANTIDAD DE ZONAS ASOCIADAS A UNA EMPRESA.
        RETORNA      : CANTIDAD DE ZONAS ASOCIADA A UNA EMPRESA.
    */
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
    /*
        SE APLICA EN : ZONAS.PHP
        OBJETIVO     : RESCATAR LAS ZONAS ASOCIADAS A UNA EMPRESA.
        RETORNA      : ARREGLO CON DATOS DE LAS ZONAS ASOCIADAS A UNA EMPRESA.
    */
    function zonas($idEmpresa) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT zonas.idZona AS idZona, zonas.nombre AS nombreZona
                     FROM zonas
                     WHERE zonas.idEmpresa = '$idEmpresa'";
        if($resultado = mysqli_query($conexion,$consulta)) {
            if($resultado = mysqli_query($conexion,$consulta)) {
                while($row = mysqli_fetch_array($resultado)) {
                    array_push($arreglo,array('idZona' => $row['idZona'], 'nombreZona' => $row['nombreZona']));
                }
            }
        }
        mysqli_close($conexion);
        return $arreglo;
    }
    /*
        SE APLICA EN : CRUDZONAS.PHP
        OBJETIVO     : RESCATAR CANTIDAD DE MÁQUINAS ASOCIADAS A UNA ZONA.
        RETORNA      : CANTIDAD DE MÁQUINAS ASOCIADAS A UNA ZONA.
    */
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
    /*
        SE APLICA EN : CRUDZONAS.PHP
        OBJETIVO     : RESCATAR MÁQUINAS ASOCIADAS A UNA ZONA.
        RETORNA      : ARREGLO CON DATOS DE LAS MÁQUINAS POR CADA ZONA.
    */
    function maquinas($idZona) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT * FROM maquinas WHERE maquinas.idZona = '$idZona'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
            while($r = mysqli_fetch_array($resultado)) {
                array_push($arreglo,array('idMaquina' => $r['idMaquina'], 'idZona' => $r['idZona'], 'patente' => $r['patente'], 'fechaRegistro' => $r['fechaRegistro'], 'tara' => $r['tara'], 'cargaMaxima' => $r['cargaMaxima']));
            }
        }
        mysqli_close($conexion);
        return $arreglo;
    }
    /*
        SE APLICA EN : CRUDZONAS.PHP
        OBJETIVO     : RESCATAR CANTIDAD DE SUPERVISORES ASOCIADOS A UNA ZONA.
        RETORNA      : CANTIDAD DE SUPERVISORES POR CADA ZONA.
    */
	function cantidadSupervisores($idZona) {
        $conexion = conectar();
        $cantidad;
        $consulta = "SELECT 
                     COUNT(supervisores_zonas.idSupervisor) 
                     AS cantidadSupervisores 
                     FROM supervisores_zonas 
                     WHERE supervisores_zonas.idZona = '$idZona'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
        	$row = mysqli_fetch_assoc($resultado);
            $cantidad = $row['cantidadSupervisores'];
        }
        mysqli_close($conexion);
        return $cantidad;
	}
    /*
        SE APLICA EN : CRUDZONAS.PHP
        OBJETIVO     : RESCATAR LOS SUPERVISORES ASOCIADOS A UNA ZONA.
        RETORNA      : ARREGLO CON SUPERVISORES ASOCIADOS A UNA ZONA.
    */
	function supervisores($idZona) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT zonas.idZona, supervisores.idSupervisor, supervisores.nombreSupervisor, supervisores.correoSupervisor, supervisores.celular, supervisores.status
        			 FROM zonas 
        			 LEFT JOIN supervisores_zonas ON zonas.idZona = supervisores_zonas.idZona 
        			 LEFT JOIN supervisores ON supervisores_zonas.idSupervisor = supervisores.idSupervisor 
        			 WHERE zonas.idZona = '$idZona'"; 
        if($resultado = mysqli_query($conexion,$consulta)) {
            while($r = mysqli_fetch_array($resultado)) {
                array_push($arreglo,array('idZona' => $r['idZona'], 'idSupervisor' => $r['idSupervisor'], 'nombreSupervisor' => $r['nombreSupervisor'], 'correoSupervisor' => $r['correoSupervisor'], 'celular' => $r['celular'], 'status' => $r['status']));
            }
        }
        mysqli_close($conexion);
        return $arreglo;
	}














    // maquinas.php
    function maquinasPorFecha($idArchivo, $fechaDatos) {
        $c = conectar();
        $a = array();
        $q = "SELECT * FROM resultados WHERE idArchivo = '$idArchivo' AND fechaDatos = '$fechaDatos'";
        if($res = mysqli_query($c, $q)){
            while($r = mysqli_fetch_assoc($res)) {
                array_push($a, array('idResultado' => $r['idResultado'], 'patente' => $r['patente'],'idMaquina' => $r['idMaquina'],'registrado' => $r['registrado'],'existeEnArchivo' => $r['existeEnArchivo'], 'tRecorridos' => intval($r['tRecorridos'])));
            }
        }
        return $a;
    }
    //dashboard.php
    function estadisticos($idResultado, $idArchivo, $patente) {
        $c = conectar();
        $a = array();
        $q = "SELECT * FROM resultados WHERE idResultado = '$idResultado'";
        if($res = mysqli_query($c,$q)) {
            $r = mysqli_fetch_assoc($res);
            $a = array('tRecorridos' => intval($r['tRecorridos']), 'mediciones' => $r['mediciones'], 'pRpm' => intval($r['pRpm']), 'pGpf' => intval($r['pGpf']), 'pGpt' => intval($r['pGpt']), 'pApf' => intval($r['pApf']), 'pApt' => intval($r['pApt']));
        }
        return $a;
    }
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
        echo '<head><style>* {background: black;}</style></head>';
        echo "<pre style='position: fixed; top: 0; z-index: 100; width: 100%; height: 100%; color: lime;'>"; print_r($var); echo "</pre>";
    }

    //supervisor.php
    function supervisor($idSupervisor) {
        $conexion = conectar();
        if($res = mysqli_query($conexion,"SELECT supervisores.nombreSupervisor, supervisores.correoSupervisor, supervisores.celular, supervisores.status FROM supervisores WHERE supervisores.idSupervisor = '$idSupervisor'")) {
            $row = mysqli_fetch_assoc($res);
            $arr['nombreSupervisor'] = $row['nombreSupervisor'];
            $arr['correoSupervisor'] = $row['correoSupervisor'];
            $arr['celular'] = $row['celular'];
            $arr['status'] = $row['status'];
        }
        mysqli_close($conexion);
        return $arr;
    }
    function zonasSinAsociar($idEmpresa,$idZona,$idSupervisor) {
        $conexion = conectar();
        $consulta = "SELECT COUNT(zonas.idZona) AS cantidad FROM zonas WHERE zonas.idZona NOT IN (SELECT supervisores_zonas.idZona FROM supervisores_zonas WHERE supervisores_zonas.idSupervisor = '$idSupervisor' AND supervisores_zonas.idZona != '$idZona' GROUP BY supervisores_zonas.idZona) AND zonas.idEmpresa = '$idEmpresa' AND zonas.idZona != '$idZona'";
        if($res = mysqli_query($conexion,$consulta)) {
            $row = mysqli_fetch_assoc($res);
            return $row['cantidad'];
        }
        else
            return $row['cantidad'] = -1;
        mysqli_close($conexion);
    }
?>