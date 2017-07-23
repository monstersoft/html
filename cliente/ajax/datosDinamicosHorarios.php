<?php 
    include '../../php/funciones.php';
	$idArchivo = $_POST['idArchivo'];
	$patente = $_POST['patente'];
    $hora = $_POST['hora'];
    $opcion = $_POST['opcion'];
    $primerMinuto = ':00:00';
    $ultimoMinuto = ':59:00';
    $c = conectar();
    if($hora == 0) {
        $primerMinuto = '08'.$primerMinuto;
        $ultimoMinuto = '08'.$ultimoMinuto;
    }
    if($hora == 1) {
        $primerMinuto = '09'.$primerMinuto;
        $ultimoMinuto = '09'.$ultimoMinuto;
    }
    if($hora == 2) {
        $primerMinuto = '10'.$primerMinuto;
        $ultimoMinuto = '10'.$ultimoMinuto;
    }
    if($hora == 3) {
        $primerMinuto = '11'.$primerMinuto;
        $ultimoMinuto = '11'.$ultimoMinuto;
    }
    if($hora == 4) {
        $primerMinuto = '12'.$primerMinuto;
        $ultimoMinuto = '12'.$ultimoMinuto;
    }
    if($hora == 5) {
        $primerMinuto = '13'.$primerMinuto;
        $ultimoMinuto = '13'.$ultimoMinuto;
    }
    if($hora == 6) {
        $primerMinuto = '14'.$primerMinuto;
        $ultimoMinuto = '14'.$ultimoMinuto;
    }
    if($hora == 7) {
        $primerMinuto = '15'.$primerMinuto;
        $ultimoMinuto = '15'.$ultimoMinuto;
    }
    if($hora == 8) {
        $primerMinuto = '16'.$primerMinuto;
        $ultimoMinuto = '16'.$ultimoMinuto;
    }
    if($hora == 9) {
        $primerMinuto = '17'.$primerMinuto;
        $ultimoMinuto = '17'.$ultimoMinuto;
    }
    if($opcion == 0) {
        $q = "SELECT DATE_FORMAT(datos.hora, '%i') AS hora, datos.gradosPalaFrontal, datos.gradosPalaTrasera FROM datos WHERE datos.idArchivo = '$idArchivo' AND datos.patente = '$patente' AND datos.hora BETWEEN '$primerMinuto' AND '$ultimoMinuto'";
        if($res = mysqli_query($c,$q)) {
            $linea = array('hora' => array(), 'gradosPalaFrontal' => array(), 'gradosPalaTrasera' => array());
            while($r = mysqli_fetch_assoc($res)) {
                $linea = completaConCeros(intval($r['hora']), intval($r['gradosPalaFrontal']), intval($r['gradosPalaTrasera']), $linea);
            }
        }
        $linea = completaConCerosDespues($linea);
        $linea['limites'] = $primerMinuto.'-'.$ultimoMinuto;
        $linea['opcion'] = $opcion;
        echo json_encode($linea);
    }
    if($opcion == 1) {
        $q = "SELECT DATE_FORMAT(datos.hora, '%i') AS hora, datos.alturaPalaFrontal, datos.alturaPalaTrasera FROM datos WHERE datos.idArchivo = '$idArchivo' AND datos.patente = '$patente' AND datos.hora BETWEEN '$primerMinuto' AND '$ultimoMinuto'";
        if($res = mysqli_query($c,$q)) {
            $linea = array('hora' => array(), 'alturaPalaFrontal' => array(), 'alturaPalaTrasera' => array());
            while($r = mysqli_fetch_assoc($res)) {
                $linea = completaConCeros2(intval($r['hora']), intval($r['alturaPalaFrontal']), intval($r['alturaPalaTrasera']), $linea);
            }
        }
        $linea = completaConCerosDespues2($linea);
        $linea['limites'] = $primerMinuto.'-'.$ultimoMinuto;
        $linea['opcion'] = $opcion;
        echo json_encode($linea);
    }
    function completaConCeros($minuto, $gradosPalaFrontal, $gradosPalaTrasera, $arr) {
        for($i = sizeof($arr['hora']); $i < $minuto; $i++) {
            $arr['hora'][] = $i."' s/d";
            $arr['gradosPalaFrontal'][] = null;
            $arr['gradosPalaTrasera'][] = null;
        }
        $arr['hora'][] = $minuto;
        $arr['gradosPalaFrontal'][] = $gradosPalaFrontal;
        $arr['gradosPalaTrasera'][] = $gradosPalaTrasera;
        return $arr;
    }
    function completaConCerosDespues($arr) {
        for($i = sizeof($arr['hora']); $i <= 59; $i++) {
            $arr['hora'][] = $i."' s/d";
            $arr['gradosPalaFrontal'][] = null;
            $arr['gradosPalaTrasera'][] = null;
        }
        return $arr;
    }
    function completaConCeros2($minuto, $alturaPalaFrontal, $alturaPalaTrasera, $arr) {
        for($i = sizeof($arr['hora']); $i < $minuto; $i++) {
            $arr['hora'][] = $i."' s/d";
            $arr['alturaPalaFrontal'][] = null;
            $arr['alturaPalaTrasera'][] = null;
        }
        $arr['hora'][] = $minuto;
        $arr['alturaPalaFrontal'][] = $alturaPalaFrontal;
        $arr['alturaPalaTrasera'][] = $alturaPalaTrasera;
        return $arr;
    }
    function completaConCerosDespues2($arr) {
        for($i = sizeof($arr['hora']); $i <= 59; $i++) {
            $arr['hora'][] = $i."' s/d";
            $arr['alturaPalaFrontal'][] = null;
            $arr['alturaPalaTrasera'][] = null;
        }
        return $arr;
    }
    
?>