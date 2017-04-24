<?php 
    //include('/../php/conexion.php');
        
        $conexion = mysqli_connect('127.0.0.1','root','Monsterinc2');
        $nombre = 'html';
        if(mysqli_connect_errno()) {
            echo "Error de conexión: ".mysqli_connect_error();
            exit();
        }
        
        mysqli_select_db($conexion,$nombre) or die ("No se encontró la base de datos");
        
        mysqli_set_charset($conexion,"utf-8");
        echo 'asdlkasjdlkajsd';
    function datosPerfil($correo) {
        $arreglo = array();
        $conexion = conectar();
        $consulta = "SELECT supervisores.idSupervisor AS id, supervisores.correoSupervisor AS correo, empresas.nombre AS empresa
                        FROM empresas
                        LEFT JOIN zonas ON empresas.idEmpresa = zonas.idEmpresa
                        LEFT JOIN supervisoreszonas ON zonas.idZona = supervisoreszonas.idZona
                        LEFT join supervisores ON supervisoreszonas.idSupervisor = supervisores.idSupervisor
                        WHERE supervisores.correoSupervisor = '$correo'
                        GROUP BY supervisores.idSupervisor";
        if($resultado = mysqli_query($conexion,$consulta)) {
            $row = mysqli_fetch_assoc($resultado);
            $arreglo = array('id' => $row['id'], 'correo' => $row['correo'], 'empresa' => utf8_encode($row['empresa']));
        }
        mysqli_close($conexion);
        return $arreglo;
    }
    function zonas($correo) {
        $conexion = conectar();
        $arreglo = array();
        $consulta = "SELECT zonas.idZona, zonas.nombre
                    FROM zonas
                    LEFT JOIN supervisoreszonas ON zonas.idZona = supervisoreszonas.idZona
                    LEFT JOIN supervisores ON supervisoreszonas.idSupervisor = supervisores.idSupervisor
                    WHERE supervisores.correoSupervisor = '$correo'";
        if($resultado = mysqli_query($conexion,$consulta)) {
            while($r = mysqli_fetch_array($resultado)) {
                array_push($arreglo,array('idZona' => $r['idZona'], 'nombre' => utf8_encode($r['nombre'])));
            }
        }
        mysqli_close($conexion);
        return $arreglo;
    }
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
    function maquinas($idZona) {
        $con = conectar();
        $arr = array();
        $qry = "SELECT * FROM maquinas WHERE maquinas.idZona = '$idZona'"; 
        if($res = mysqli_query($con,$qry)) {
            while($r = mysqli_fetch_array($res)) {
                array_push($arr,array('identificador' => $r['identificador'], 'patente' => $r['patente'], 'fechaRegistro' => $r['fechaRegistro'], 'tara' => $r['tara'], 'cargaMaxima' => $r['cargaMaxima']));
            }
        }
        mysqli_close($con);
        return $arr;
    }
    function supervisores($idZona) {
        $con = conectar();
        $arr = array();
        $qry = "SELECT zonas.idZona, supervisores.idSupervisor, supervisores.nombreSupervisor, supervisores.correoSupervisor, supervisores.celular, supervisores.status, supervisores.fechaMailEnviado 
                     FROM zonas 
                     LEFT JOIN supervisoreszonas ON zonas.idZona = supervisoreszonas.idZona 
                     LEFT JOIN supervisores ON supervisoreszonas.idSupervisor = supervisores.idSupervisor 
                     WHERE zonas.idZona = '$idZona'"; 
        if($res = mysqli_query($con,$qry)) {
            while($r = mysqli_fetch_array($res)) {
                array_push($arr,array('idZona' => $r['idZona'], 'idSupervisor' => $r['idSupervisor'], 'nombreSupervisor' => utf8_encode($r['nombreSupervisor']), 'correoSupervisor' => $r['correoSupervisor'], 'celular' => $r['celular'], 'status' => $r['status'], 'fechaMailEnviado' => $r['fechaMailEnviado']));
            }
        }
        mysqli_close($con);
        return $arr;
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
?>