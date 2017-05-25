<?php
	include '../../php/funciones.php';
	$idResultado = $_POST['idResultado'];
	$idArchivo = $_POST['idArchivo'];
	$patente = $_POST['patente'];
    $semanas = $_POST['semanas'];
    $c = conectar();
    $a = array();
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
    $a['lineaHistorico'] = $lineaHistorico;
    $a['semanas'] = $semanas;
    echo json_encode($a);