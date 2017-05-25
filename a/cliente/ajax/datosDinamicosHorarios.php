<?php 
    include '../../php/funciones.php';
	$idArchivo = $_POST['idArchivo'];
	$patente = $_POST['patente'];
    $hora = $_POST['hora'];
    $opcion = $_POST['opcion'];
    $primerMinuto = ':00:00';
    $ultimoMinuto = ':59:00';
    $c = conectar();
    $linea = array();
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
            while($r = mysqli_fetch_assoc($res)) {
                $linea['hora'][] = $r['hora'];
                $linea['gradosPalaFrontal'][] = intval($r['gradosPalaFrontal']);
                $linea['gradosPalaTrasera'][] = intval($r['gradosPalaTrasera']);
            }
        }
        $linea['limites'] = $primerMinuto.'-'.$ultimoMinuto;
        echo json_encode($linea);
    }
    if($opcion == 1) {
        $q = "SELECT DATE_FORMAT(datos.hora, '%i') AS hora, datos.alturaPalaFrontal, datos.alturaPalaTrasera FROM datos WHERE datos.idArchivo = '$idArchivo' AND datos.patente = '$patente' AND datos.hora BETWEEN '$primerMinuto' AND '$ultimoMinuto'";
        if($res = mysqli_query($c,$q)) {
            while($r = mysqli_fetch_assoc($res)) {
                $linea['hora'][] = $r['hora'];
                $linea['alturaPalaFrontal'][] = intval($r['alturaPalaFrontal']);
                $linea['alturaPalaTrasera'][] = intval($r['alturaPalaTrasera']);
            }
        }
        $linea['limites'] = $primerMinuto.'-'.$ultimoMinuto;
        echo json_encode($linea);
    }
    
?>