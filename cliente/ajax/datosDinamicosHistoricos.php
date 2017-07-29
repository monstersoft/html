<?php
	include '../funciones.php';
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
                if($r['pGpf'] == -1 or $r['pGpf'] == null) {
                    $lineaHistorico['pGpf'][]= null;
                    $lineaHistorico['pGpt'][] = null;
                    $lineaHistorico['pApf'][] = null;
                    $lineaHistorico['pApt'][] = null;
                    $lineaHistorico['pTre'][] = null;
                    $lineaHistorico['semanas'][] = $value['week'].' s/d';
                    $count++;
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
                    $count++;        
                }
            }
        }
    }  
    $a['lineaHistorico'] = $lineaHistorico;
    $a['semanas'] = $semanas;
    echo json_encode($a);