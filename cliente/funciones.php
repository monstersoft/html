<?php
	include("../../php/conexion.php");
    /*
        SE APLICA EN : TODAS LAS PÁGINAS EN EL QUE SE NECESITE VALIDAR UN ID ENTERO
        OBJETIVO     : VALIDAR QUE EL ID ES UN ENTERO, ES MAYOR QUE CERO
        ENTRADA      : UN ID POR GET
        RETORNA      : TRUE SI ES ENTERO Y MAYOR QUE CERO Y FALSE SI NO LO ES.
    */
    function verifyIdIntPositive($id) {
        if(is_numeric($id) and $id >= 0 and ctype_digit(strval($id)))
            return true;
        else
            return false;
    }
    /*
        SE APLICA EN : TODAS LAS PÁGINAS EN EL QUE SE NECESITE VALIDAR UNA FECHA EN EL FORMATO YYYY-MM-DD
        OBJETIVO     : VALIDAR QUE LA FECHA ESTÉ EN EL FORMATO ADECUADO
        ENTRADA      : UNA FECHA POR GET
        RETORNA      : TRUE SI LA FECHA ES VÁLIDA.
    */
    function verifyDateFormat($date) {
        return preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $date);
    }
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
                        <br><span id="nameProfile" style="display:none;">'.$perfil['empresa'].'</span></li>'; 
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
    /*
        SE APLICA EN : MAQUINAS.PHP
        OBJETIVO     : RESCATAR LAS MÁQUINAS A PARTIR DE UN ID ARCHIVO
        ENTRADA      : ID DEL ARCHIVO
        RETORNA      : ARREGLO CON LOS DATOS DE LAS MAQUINAS, SI EL ID ARCHIVO NO ES UN ENTERO O NO HAY DATOS RESCATADOS RETORNARÁ UN ARRAY VACÍO.
    */
    function maquinasPorFecha($idArchivo) {
        $c = conectar();
        $a = array();
        $q = "SELECT * FROM resultados WHERE idArchivo = '$idArchivo'";
        if($res = mysqli_query($c, $q)){
            while($r = mysqli_fetch_assoc($res)) {
                array_push($a, array('idResultado' => $r['idResultado'], 'patente' => $r['patente'],'idMaquina' => $r['idMaquina'],'registrado' => $r['registrado'],'existeEnArchivo' => $r['existeEnArchivo'], 'tRecorridos' => intval($r['tRecorridos'])));
            }
        }
        return $a;
    }
    /*
        SE APLICA EN : MAQUINAS.PHP
        OBJETIVO     : RESCATAR LA ZONA Y LA FECHA DE DATOS ASOCIADOS A UN ID ARCHIVO
        ENTRADA      : ID DEL ARCHIVO
        RETONRA      : ARREGLO CON EL NOMBRE DE LA ZONA Y LA FECHA DE DATOS
    */
    function zonaFechaDatos($idArchivo) {
        $dias = ['LUNES','MARTES','MIÉRCOLES','JUEVES','VIERNES','SÁBADO','DOMINGO'];
        $meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
        $c = conectar();
        $a = array();
        $q = "SELECT zonas.nombre, archivos.fechaDatos FROM archivos LEFT JOIN zonas ON archivos.idZona = zonas.idZona WHERE archivos.idArchivo = '$idArchivo'";
        if($res = mysqli_query($c, $q)) {
            $r = mysqli_fetch_assoc($res);
            $a['nombreZona'] = $r['nombre'];
            $a['fechaDatos'] = $r['fechaDatos'];
            $exp = explode(".",date('Y.N.j.n', strtotime($a['fechaDatos'])));
            $a['fechaFull'] = $dias[$exp[1]-1].' '.$exp[2].' , '.$meses[$exp[3]-1].' '.$exp[0];
            //LUNES 20, NOVIEMBRE 2017
        }
        return $a;
    }
    /*
        SE APLICA EN : DASHBOARD.PHP
        OBJETIVO     : RESCATAR LA ZONA
        ENTRADA      : ID RESULTADO
        RETONRA      : ARREGLO CON EL NOMBRE DE LA ZONA
    */
    function nombreZona($idResultado) {
        $c = conectar();
        $a = array();
        $q = "SELECT zonas.nombre FROM resultados LEFT JOIN archivos ON resultados.idArchivo = archivos.idArchivo LEFT JOIN zonas ON archivos.idZona = zonas.idZona WHERE resultados.idResultado = '$idResultado'";
        if($res = mysqli_query($c, $q)) {
            $r = mysqli_fetch_assoc($res);
            $a['nombreZona'] = $r['nombre'];
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