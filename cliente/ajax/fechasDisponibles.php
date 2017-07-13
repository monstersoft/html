<?php
    sleep(2);
	include '../../php/conexion.php'; 
	$idZone = $_POST['idZona'];
    $arr = array('firstDayAvailable' => array(), 'lastDayAvailable' => array(), 'availableDays' => array());
    $con = conectar();
    $qry = "SELECT archivos.idArchivo, archivos.fechaDatos , archivos.idZona FROM archivos WHERE archivos.idZona = '$idZone' ORDER BY archivos.fechaDatos ASC";
    if($res = mysqli_query($con, $qry)) {
        while($row = mysqli_fetch_assoc($res)) {
            array_push($arr['availableDays'],dateArray($row['fechaDatos']));
        }
        $arr['firstDayAvailable'] = reset($arr['availableDays']);
        $arr['lastDayAvailable'] = end($arr['availableDays']);
    }
    echo json_encode($arr);
    function dateArray($date) {
        $arrayDay = array();
        list($year,$month,$day) = explode('-',$date);
        $arrayDay = [$year,$month-1,$day];
        return  $arrayDay;
    }
?>
