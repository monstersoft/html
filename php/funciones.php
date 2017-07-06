<?php
	include("conexion.php");
    // barra y menu
    function barraMenu($perfil,$nombrePagina) {
        if(sizeof($perfil) == 0)
            echo '<div class="alert alert-danger"> <div class="row vertical-align"> <div class="col-xs-2"> <i class="fa fa-grav fa-4x"></i> </div><div class="col-xs-10"> <strong class="montserrat">No hay ususarios </strong>el arreglo <strong>Perfil</strong> está vacío</div></div></div>';
        else { echo
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
                        <li><a href="crudEmpresas.php"><i class="fa fa fa-cog icons"></i>Ajustes</a></li>
                        <li><a href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
                        <li><a href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
                        <li><a href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>';

                    }
                    if($nombrePagina == 'registro') { echo '
                        <li><a href="zonas.php"><i class="fa fa-globe icons"></i>Zonas</a></li>
                        <li class="selected"><a href="crudEmpresas.php"><i class="fa fa-cog icons"></i>Ajustes</a></li>
                        <li><a href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
                        <li><a href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
                        <li><a href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>';

                    }
                    if($nombrePagina == 'contacto') { echo '
                        <li><a href="zonas.php"><i class="fa fa-globe icons"></i>Zonas</a></li>
                        <li><a href="crudEmpresas.php"><i class="fa fa-cog icons"></i>Ajustes</a></li>
                        <li class="selected"><a href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
                        <li><a href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
                        <li><a href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>';

                    }
                    if($nombrePagina == 'contraseña') { echo '
                        <li><a href="zonas.php"><i class="fa fa-globe icons"></i>Zonas</a></li>
                        <li><a href="crudEmpresas.php"><i class="fa fa-cog icons"></i>Ajustes</a></li>
                        <li><a href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
                        <li class="selected"><a href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
                        <li><a href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>';

                    }
                    if($nombrePagina == 'cerrar') { echo '
                        <li><a href="zonas.php"><i class="fa fa-globe icons"></i>Zonas</a></li>
                        <li><a href="crudEmpresas.php"><i class="fa fa-cog icons"></i>Ajustes</a></li>
                        <li><a href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
                        <li><a href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
                        <li class="selected"><a href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>';

                    } echo '
                </ul>
               </nav>';
            }
    }
    // reestablecer contraseña
    function valida($token, $caracterUsuario) {
        echo '<h1>'.$caracterUsuario.'</h1></br>';
        $c = conectar();
        $arreglo = array('cantidadToken' => 0, 'tipoUsuario' => false, 'idUsuario' => -1);
        if($caracterUsuario == 'c' and $r = mysqli_query($c,"SELECT idCliente FROM clientes WHERE clientes.token = '$token'")) {
            if(mysqli_num_rows($r) == 1) {
                $row = mysqli_fetch_assoc($r);
                $id = $row['idCliente'];
                $arreglo['cantidadToken'] = mysqli_num_rows($r);
                $arreglo['tipoUsuario'] = 'Cliente';
                $arreglo['idUsuario'] = $row['idCliente'];
            }
        }
        if($caracterUsuario == 's') {
            $q = 'SELECT idSupervisor, status FROM supervisores WHERE supervisores.token = "'.$token.'"';
            $r = mysqli_query($c,$q);
            if(mysqli_num_rows($r) == 1) {
                $row = mysqli_fetch_assoc($r);
                $id = $row['idSupervisor'];
                $arreglo['cantidadToken'] = mysqli_num_rows($r);
                $arreglo['tipoUsuario'] = 'Supervisor';
                $arreglo['idUsuario'] = $row['idSupervisor'];
                $arreglo['status'] = $row['status'];
            }
        }
        return $arreglo;
    }
    // zonas.php
    function datosRecientes() {
        $l = conectar();
        mysqli_set_charset($l,'utf8');
        $c = "SELECT empresas.idEmpresa, empresas.nombre AS nombreEmpresa, zonas.idZona, zonas.nombre AS nombreZona, archivos.idSupervisor, supervisores.nombreSupervisor, archivos.idArchivo, archivos.fechaSubida, archivos.horaSubida, MAX(archivos.fechaDatos) AS fechaRecienteDatos FROM empresas LEFT JOIN zonas ON empresas.idEmpresa = zonas.idEmpresa LEFT JOIN archivos ON archivos.idZona = zonas.idZona LEFT JOIN supervisores ON supervisores.idSupervisor = archivos.idSupervisor GROUP BY zonas.idZona ORDER BY empresas.nombre ASC, zonas.nombre ASC";
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
    //crudZonas.php
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
            array_push($arreglo,array('idMaquina' => $r['idMaquina'], 'idZona' => $r['idZona'], 'patente' => $r['patente'], 'fechaRegistro' => $r['fechaRegistro'], 'tara' => $r['tara'], 'cargaMaxima' => $r['cargaMaxima']));
        }
    }
    mysqli_close($conexion);
    return $arreglo;
}
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
                array_push($arreglo,array('idZona' => $r['idZona'], 'idSupervisor' => $r['idSupervisor'], 'nombreSupervisor' => utf8_encode($r['nombreSupervisor']), 'correoSupervisor' => $r['correoSupervisor'], 'celular' => $r['celular'], 'status' => $r['status']));
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
        echo "<pre style='color: lime;'>"; print_r($var); echo "</pre>";
    }
    function empresas() {
        $conexion = conectar();
        mysqli_set_charset($conexion,'utf8');
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
            mysqli_close($conexion);
            return $arreglo;
        }
        }
    }
    //supervisor.php
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
