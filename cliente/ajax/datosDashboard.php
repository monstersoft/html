<?php
	include '../funciones.php';
    $c = conectar();
    $a = array();
    $idResultado = $_POST['idResultado'];
	$idArchivo = $_POST['idArchivo'];
	$patente = $_POST['patente'];
    $semanas = $_POST['semanas'];
    $barra = array('cambio' => array(),'frecuencia' => array());
    $torta = array();
    $cantidadTorta = 0;
    $cantidadBarra = 0;
    $cantidadLinea = 0;
    $c = conectar();
    $a = array();
    $q = "SELECT DATE_FORMAT(datos.hora, '%i') AS hora, datos.gradosPalaFrontal, datos.gradosPalaTrasera, datos.alturaPalaFrontal, datos.alturaPalaTrasera FROM datos WHERE datos.idArchivo = '$idArchivo' AND datos.patente = '$patente' AND datos.hora BETWEEN '08:00:00' AND '08:59:00'";
    if($res = mysqli_query($c,$q)) {
        $linea2 = array('hora' => array(), 'gradosPalaFrontal' => array(), 'gradosPalaTrasera' => array(), 'alturaPalaFrontal' => array(), 'alturaPalaTrasera' => array());
        $cantidadLinea = mysqli_num_rows($res);
        while($r = mysqli_fetch_assoc($res)) {
            $linea2 = completaConCeros(intval($r['hora']), intval($r['gradosPalaFrontal']), intval($r['gradosPalaTrasera']), intval($r['alturaPalaFrontal']), intval($r['alturaPalaTrasera']), $linea2);
        }
        $linea2 = completaConCerosDespues($linea2);
    }
    $q = "SELECT datos.motorFuncionando, COUNT(datos.motorFuncionando) AS frecuencia FROM datos WHERE datos.idArchivo = '$idArchivo' AND datos.patente = '$patente' GROUP BY datos.motorFuncionando";
    if($res = mysqli_query($c,$q)) {
        $cantidadTorta = mysqli_num_rows($res);
        while($r = mysqli_fetch_assoc($res)) {
            $torta['motorFuncionando'][] = $r['motorFuncionando'];
            $torta['frecuencia'][] = intval($r['frecuencia']);
        }
    }
    $q = "SELECT datos.cambio, COUNT(datos.cambio) AS frecuencia FROM datos WHERE datos.idArchivo = '$idArchivo' AND datos.patente = '$patente' GROUP BY datos.cambio";
    $sum = 0;
    if($res = mysqli_query($c,$q)) {
        $cantidadBarra = mysqli_num_rows($res);
        while($r = mysqli_fetch_assoc($res)) {
            $barra['cambio'][] = $r['cambio'];
            $barra['frecuencia'][] = intval($r['frecuencia']);
            $sum = intval($r['frecuencia']) + $sum;
        }
        $i = 0;
        while($i < sizeof($barra['frecuencia'])) {
            $barra['frecuencia'][$i] = ($barra['frecuencia'][$i]*100)/$sum;
            $i++;
        }
    }
    $cantidadSemanasConResultados = 0;
    $cantidadSemanasSinResultados = 0;
    foreach($semanas as $value) {
        if($value['available'] == 'true') {
            $q = "SELECT AVG(resultados.pGpf) AS pGpf, AVG(resultados.pGpt) AS pGpt, AVG(resultados.pApf) AS pApf, AVG(resultados.pApt)  AS pApt, AVG(resultados.tRecorridos) AS pTre FROM resultados WHERE resultados.patente = '".$patente."' AND resultados.fechaDatos BETWEEN '".$value['startWeek']."' AND '".$value['endWeek']."'";
            if($res = mysqli_query($c,$q)) {
                $r = mysqli_fetch_assoc($res);
                if($r['pGpf'] == -1 or $r['pGpf'] == null) {
                    $lineaHistorico['pGpf'][]= null;
                    $lineaHistorico['pGpt'][] = null;
                    $lineaHistorico['pApf'][] = null;
                    $lineaHistorico['pApt'][] = null;
                    $lineaHistorico['pTre'][] = null;
                    $lineaHistorico['semanas'][] = $value['week'].' s/d';
                    $cantidadSemanasSinResultados++;
                }
                else {
                    $q2 = "SELECT AVG(resultados.pGpf) AS pGpf, AVG(resultados.pGpt) AS pGpt, AVG(resultados.pApf) AS pApf, AVG(resultados.pApt)  AS pApt, AVG(resultados.tRecorridos) AS pTre FROM resultados WHERE resultados.patente = '".$patente."' AND resultados.fechaDatos BETWEEN '".$value['startWeek']."' AND '".$value['endWeek']."' AND resultados.existeEnArchivo = 1";
                    $res1 = mysqli_query($c,$q2);
                    $r1 = mysqli_fetch_assoc($res1);
                    $lineaHistorico['pGpf'][]= intval($r1['pGpf']);
                    $lineaHistorico['pGpt'][] = intval($r1['pGpt']);
                    $lineaHistorico['pApf'][] = intval($r1['pApf']);
                    $lineaHistorico['pApt'][] = intval($r1['pApt']);
                    $lineaHistorico['pTre'][] = intval($r1['pTre']);
                    $lineaHistorico['semanas'][] = $value['week'];
                    $cantidadSemanasConResultados++;       
                }
            }
        }
    } 
    $a['torta'] = $torta;
    $a['barra'] = $barra;
    $a['linea'] = $linea2;   
    $a['lineaHistorico'] = $lineaHistorico;
    $a['semanas'] = $semanas;
    $a['cantidadTorta'] = $cantidadTorta;
    $a['cantidadBarra'] = $cantidadBarra;
    $a['cantidadLinea'] = $cantidadLinea;
    $a['cantidadSemanasConResultados'] = $cantidadSemanasConResultados;
    $a['cantidadSemanasSinResultados'] = $cantidadSemanasSinResultados;
    echo json_encode($a);
    function completaConCeros($minuto, $gradosPalaFrontal, $gradosPalaTrasera, $alturaPalaFrontal, $alturaPalaTrasera, $arr) {
        for($i = sizeof($arr['hora']); $i < $minuto; $i++) {
            $arr['hora'][] = $i.".s/d";
            $arr['gradosPalaFrontal'][] = null;
            $arr['gradosPalaTrasera'][] = null;
            $arr['alturaPalaFrontal'][] = null;
            $arr['alturaPalaTrasera'][] = null;
        }
        $arr['hora'][] = $minuto;
        $arr['gradosPalaFrontal'][] = $gradosPalaFrontal;
        $arr['gradosPalaTrasera'][] = $gradosPalaTrasera;
        $arr['alturaPalaFrontal'][] = $alturaPalaFrontal;
        $arr['alturaPalaTrasera'][] = $alturaPalaTrasera;
        return $arr;
    }
    function completaConCerosDespues($arr) {
        for($i = sizeof($arr['hora']); $i <= 59; $i++) {
            $arr['hora'][] = $i.".s/d";
            $arr['gradosPalaFrontal'][] = null;
            $arr['gradosPalaTrasera'][] = null;
            $arr['alturaPalaFrontal'][] = null;
            $arr['alturaPalaTrasera'][] = null;
        }
        return $arr;
    }
?>