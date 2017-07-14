<?php
	include '../../php/funciones.php';
    $c = conectar();
    $a = array();
	$idResultado = 188;
	$idArchivo = 69;
	$patente = 'KOM010';
    $idResultado = $_POST['idResultado'];
	$idArchivo = $_POST['idArchivo'];
	$patente = $_POST['patente'];
    $semanas = $_POST['semanas'];
    $c = conectar();
    $a = array();
    $q = "SELECT DATE_FORMAT(datos.hora, '%i') AS hora, datos.gradosPalaFrontal, datos.gradosPalaTrasera, datos.alturaPalaFrontal, datos.alturaPalaTrasera FROM datos WHERE datos.idArchivo = '$idArchivo' AND datos.patente = '$patente' AND datos.hora BETWEEN '08:00:00' AND '08:59:00'";
    if($res = mysqli_query($c,$q)) {
        $linea2 = array('hora' => array(), 'gradosPalaFrontal' => array(), 'gradosPalaTrasera' => array(), 'alturaPalaFrontal' => array(), 'alturaPalaTrasera' => array());
        while($r = mysqli_fetch_assoc($res)) {
            $linea2 = completaConCeros(intval($r['hora']), intval($r['gradosPalaFrontal']), intval($r['gradosPalaTrasera']), intval($r['alturaPalaFrontal']), intval($r['alturaPalaTrasera']), $linea2);
        }
        $linea2 = completaConCerosDespues($linea2);
    }
    $q = "SELECT datos.motorFuncionando, COUNT(datos.motorFuncionando) AS frecuencia FROM datos WHERE datos.idArchivo = '$idArchivo' AND datos.patente = '$patente' GROUP BY datos.motorFuncionando";
    if($res = mysqli_query($c,$q)) {
        while($r = mysqli_fetch_assoc($res)) {
            $torta['motorFuncionando'][] = $r['motorFuncionando'];
            $torta['frecuencia'][] = intval($r['frecuencia']);
        }
    }
    $q = "SELECT datos.cambio, COUNT(datos.cambio) AS frecuencia FROM datos WHERE datos.idArchivo = '$idArchivo' AND datos.patente = '$patente' GROUP BY datos.cambio";
    $sum = 0;
    if($res = mysqli_query($c,$q)) {
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
    $count = 0;
    foreach($semanas as $value) {
        if($value['available'] == 'true') {
            $q = "SELECT AVG(resultados.pGpf) AS pGpf, AVG(resultados.pGpt) AS pGpt, AVG(resultados.pApf) AS pApf, AVG(resultados.pApt)  AS pApt, AVG(resultados.tRecorridos) AS pTre FROM resultados WHERE resultados.patente = '".$patente."' AND resultados.fechaDatos BETWEEN '".$value['startWeek']."' AND '".$value['endWeek']."'";
            if($res = mysqli_query($c,$q)) {
                $r = mysqli_fetch_assoc($res);
                    $lineaHistorico['pGpf'][]= intval($r['pGpf']);
                    $lineaHistorico['pGpt'][] = intval($r['pGpt']);
                    $lineaHistorico['pApf'][] = intval($r['pApf']);
                    $lineaHistorico['pApt'][] = intval($r['pApt']);
                    $lineaHistorico['pTre'][] = intval($r['pTre']);
                    $lineaHistorico['semanas'][] = $value['week'];
                    $count++;
            }
        }
    }

    $a['torta'] = $torta;
    $a['barra'] = $barra;
    $a['linea'] = $linea2;   
    $a['lineaHistorico'] = $lineaHistorico;
    $a['semanas'] = $semanas;
    echo json_encode($a);
    function completaConCeros($minuto, $gradosPalaFrontal, $gradosPalaTrasera, $alturaPalaFrontal, $alturaPalaTrasera, $arr) {
        for($i = sizeof($arr['hora']); $i < $minuto; $i++) {
            $arr['hora'][] = $i;
            $arr['gradosPalaFrontal'][] = 0;
            $arr['gradosPalaTrasera'][] = 0;
            $arr['alturaPalaFrontal'][] = 0;
            $arr['alturaPalaTrasera'][] = 0;
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
            $arr['hora'][] = $i;
            $arr['gradosPalaFrontal'][] = 0;
            $arr['gradosPalaTrasera'][] = 0;
            $arr['alturaPalaFrontal'][] = 0;
            $arr['alturaPalaTrasera'][] = 0;
        }
        return $arr;
    }
?>