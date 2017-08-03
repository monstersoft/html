<?php 
    include('../../php/conexion.php');
    /*
        SE APLICA EN : TODAS LAS SECCIONES DEL MÓDULO SUPERVISOR (PANEL.PHP, CONTACTO.PHP, CONTRASEÑA.PHP ETC..)
        OBJETIVO     : IMPRIMIR LA BARRA DE NAVEGACIÓN DEL SUPERVISOR
        ENTRADA      : ARREGLO LLAMADO PERFIL QUE CONTIENE EL CORREO Y LA EMPRESA A LA CUAL PERTENECE EL CLIENTE
        ENTRADA      : NOMBRE DE LA PÁGINA QUE ESTÁ ACTIVA, EN EL MENÚ DE NAVEGACIÓN SE LE AÑADE LA CLASE SELECTED SEGÚN LA PÁGINA
    */
    function barraMenu($perfil,$nombrePagina) {
            echo
            '<div id="bar"><a id="clickMenu"><i class="fa fa-bars"></i></a>
                <p>Machine Monitors</p>
            </div>
            <nav class="unDisplayNav">
                <ul>
                    <li id="profile"><i class="fa fa-user fa-4x" id="iconProfile"></i>
                        <br><span id="titleProfile">'.$perfil['correo'].'</span>
                        <br><span id="nameProfile">'.$perfil['empresa'].'</span></li>'; 
                if($nombrePagina == 'zonas') { echo '
                    <li class="selected"><a href="panel.php"><i class="fa fa-globe icons"></i>Zonas</a></li>
                    <li><a style="color: white;" href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
                    <li><a style="color: white;" href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
                    <li><a style="color: white;" href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>';
                    
                }
                if($nombrePagina == 'contacto') { echo '
                    <li><a style="color: white;" href="panel.php"><i class="fa fa-globe icons"></i>Zonas</a></li>
                    <li class="selected"><a style="color: white;" href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
                    <li><a style="color: white;" href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
                    <li><a style="color: white;" href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>';
                    
                }
                if($nombrePagina == 'contraseña') { echo '
                    <li><a style="color: white;" href="panel.php"><i class="fa fa-globe icons"></i>Zonas</a></li>
                    <li><a style="color: white;" href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
                    <li class="selected"><a style="color: white;" href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
                    <li><a style="color: white;" href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>';
                    
                }
                if($nombrePagina == 'cerrar') { echo '
                    <li><a style="color: white;" href="panel.php"><i class="fa fa-globe icons"></i>Zonas</a></li>
                    <li><a style="color: white;" href="contacto.php"><i class="fa fa-send icons"></i>Contacto</a></li>
                    <li><a style="color: white;" href="password.php"><i class="fa fa-unlock icons"></i>Contraseña</a></li>
                    <li class="selected"><a style="color: white;" href="cerrar.php"><i class="fa fa-sign-out icons"></i>Cerrar</a></li>';
                    
                } echo '
                </ul>
               </nav>';
    }
    /*
        SE APLICA EN : TODAS LAS SECCIONES DEL MÓDULO SUPERVISOR (PANEL.PHP, CONTACTO.PHP, CONTRASEÑA.PHP ETC..)
        OBJETIVO     : RESCATAR LOS DATOS DEL PERFIL DEL SUPERVISOR
        ENTRADA      : CORREO DEL SUPERVISOR
        RETORNA      : ARREGLO CON LOS DATOS DEL SUPERVISOR
    */
    function datosPerfil($correo) {
        $arreglo = array();
        $conexion = conectar();
        $consulta = "SELECT supervisores.idSupervisor AS id, supervisores.correoSupervisor AS correo, empresas.nombre AS empresa
                        FROM empresas
                        LEFT JOIN zonas ON empresas.idEmpresa = zonas.idEmpresa
                        LEFT JOIN supervisores_zonas ON zonas.idZona = supervisores_zonas.idZona
                        LEFT JOIN supervisores ON supervisores_zonas.idSupervisor = supervisores.idSupervisor
                        WHERE supervisores.correoSupervisor = '$correo'
                        GROUP BY supervisores.idSupervisor";
        if($resultado = mysqli_query($conexion,$consulta)) {
            $row = mysqli_fetch_assoc($resultado);
            $arreglo = array('id' => $row['id'], 'correo' => $row['correo'], 'empresa' => $row['empresa']);
        }
        mysqli_close($conexion);
        return $arreglo;
    }
    /*
        SE APLICA EN : PANEL.PHP
        OBJETIVO     : RESCATAR LAS ZONAS QUE TIENE ASIGNADAS EL SUPERVISOR
        ENTRADA      : CORREO DEL SUPERVISOR
        RETORNA      : ARREGLO CON LOS DATOS DE LAS ZONAS
    */
    function zonas($correo) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT zonas.idZona, zonas.nombre
                    FROM zonas
                    LEFT JOIN supervisores_zonas ON zonas.idZona = supervisores_zonas.idZona
                    LEFT JOIN supervisores ON supervisores_zonas.idSupervisor = supervisores.idSupervisor
                    WHERE supervisores.correoSupervisor = '$correo'";
        if($resultado = mysqli_query($conexion,$consulta)) {
            while($r = mysqli_fetch_array($resultado)) {
                array_push($arreglo,array('idZona' => $r['idZona'], 'nombre' => $r['nombre']));
            }
        }
        mysqli_close($conexion);
        return $arreglo;
    }
    /*
        SE APLICA EN : PANEL.PHP
        OBJETIVO     : RESCATAR LA CANTIDAD DE MÁQUINAS ASOCIADAS A UNA ZONA
        ENTRADA      : ID DE LA ZONA
        RETORNA      : CANTIDAD DE MÁQUINAS ASOCIADAS A UNA ZONA
    */
    function cantidadMaquinas($idZona) {
        $con = conectar();
        $qua;
        $qry = "SELECT 
                     COUNT(maquinas.idMaquina) 
                     AS cantidadMaquinas 
                     FROM maquinas 
                     WHERE maquinas.idZona = '$idZona'"; 
        if($res = mysqli_query($con,$qry)) {
            $r = mysqli_fetch_assoc($res);
            $qua = $r['cantidadMaquinas'];
        }
        mysqli_close($con);
        return $qua;
    }
    /*
        SE APLICA EN : PANEL.PHP
        OBJETIVO     : RESCATAR LAS MÁQUINAS ASOCIADAS A LAS ZONAS
        ENTRADA      : ID DE LA ZONA
        RETORNA      : ARREGLO CON LOS DATOS DE LA MÁQUINAS
    */
    function maquinas($idZona) {
        $con = conectar();
        $arr = array();
        $qry = "SELECT * FROM maquinas WHERE maquinas.idZona = '$idZona'"; 
        if($res = mysqli_query($con,$qry)) {
            while($r = mysqli_fetch_array($res)) {
                array_push($arr,array('patente' => $r['patente'], 'fechaRegistro' => $r['fechaRegistro'], 'tara' => $r['tara'], 'cargaMaxima' => $r['cargaMaxima']));
            }
        }
        mysqli_close($con);
        return $arr;
    }
    /*
        SE APLICA EN : PANEL.PHP
        OBJETIVO     : RESCATAR LOS SUPERVISORES ASOCIADOS A UNA ZONA, SE EXCLUYE AL SUPERVISOR DE LA SESIÓN ACTUAL
        ENTRADA      : ID DE LA ZONA
        RETORNA      : ARREGLO CON LOS DATOS DE LOS SUPERVISORES ASOCIADOS A UNA ZONA
    */
    function supervisores($idZona,$correoSupervisor) {
        $con = conectar();
        $arr = array();
        $qry = "SELECT zonas.idZona, supervisores.idSupervisor, supervisores.nombreSupervisor, supervisores.correoSupervisor, supervisores.celular, supervisores.status 
                     FROM zonas 
                     LEFT JOIN supervisores_zonas ON zonas.idZona = supervisores_zonas.idZona 
                     LEFT JOIN supervisores ON supervisores_zonas.idSupervisor = supervisores.idSupervisor 
                     WHERE zonas.idZona = '$idZona' AND supervisores.correoSupervisor != '$correoSupervisor'"; 
        if($res = mysqli_query($con,$qry)) {
            while($r = mysqli_fetch_array($res)) {
                array_push($arr,array('idZona' => $r['idZona'], 'idSupervisor' => $r['idSupervisor'], 'nombreSupervisor' => $r['nombreSupervisor'], 'correoSupervisor' => $r['correoSupervisor'], 'celular' => $r['celular'], 'status' => $r['status']));
            }
        }
        mysqli_close($con);
        return $arr;
    }
?>