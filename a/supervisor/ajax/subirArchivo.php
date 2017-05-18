<?php
	include ('/../../php/conexion.php');
    $arr = array();
    $arr['patente1'] = array(array('lat' => 50, 'lon' => 20), array('lat' => 1000, 'lon' => 20), array('lat' => 10, 'lon' => 20));
    $arr['patente2'] = array(array('lat' => 10, 'lon' => 20), array('lat' => 10, 'lon' => 20), array('lat' => 10, 'lon' => 20));
    //getDistanceFromLatLonInKm($lat1,$lon1,$lat2,$lon2);
    foreach($arr as $key => $value) {
        echo $key.'<br>';
        foreach($arr[$key] as $k => $v) {
           if($k < (sizeof($arr[$key])-1))
               echo 'LATITUD ACTUAL: '.$arr[$key][$k]['lat'].' LATITUD SIGUIENTE '.$arr[$key][$k+1]['lat'].'<br>';
        }
    }
//echo json_encode($arr);
    echo '<h1>'.$arr['patente1'][0]['lat'].'</h1><br>';
echo '<h1>'.$arr['patente1'][1]['lat'].'</h1><br>';
    /*set_time_limit(1200);
    $arr = array('msg' => array(), 'nameDateMatch' => false);
    $beginTime = microtime(true);
	$con = conectar();
	$dateData = $_POST['fechaDatos'];
	$idZone = $_POST['idZona'];
	$file = $_FILES['archivo'];
	$idManager = $_POST['idSupervisor'];
	$arr['uploadDate'] = date("Y-m-d");
	$arr['uploadTime'] = date("H:i:s");

    $arr['nameDateMatch'] = nameDateMatch($file['name'],$dateData,$arr['msg']);
    $arr['isCsv'] = isCsv($file['type'], $arr['msg']);
    $arr['itAlreadyExists'] = itAlreadyExists($idZone,$dateData,$arr['msg'], $con);
    $arr['isZone'] = isZone($idZone,$file,$arr['msg']);

    if(($arr['nameDateMatch'] == false) or ($arr['isCsv'] == false) or ($arr['itAlreadyExists'] == true) or ($arr['isZone'] == false)) {
        $arr['success'] = false;
    }
    else {
        $arr['insertDataFile'] = insertDataFile($idZone,$idManager,$arr['uploadDate'],$dateData,$arr['uploadTime'],$file,$con,$arr['msg']);
        $arr['success'] = true;
    }
    $endTime = microtime(true);
    $arr['timeScript']  = $endTime - $beginTime;
    mysqli_close($con);
    
    echo json_encode($arr);
    function nameDateMatch($fileName,$dateData,&$msg) {
        list($year,$month,$day) = explode('-',$dateData);
        $aux = $day.$month.$year;
        list($name,$format) = explode('.',$fileName);
        if($name == $aux) {
            $msg[] = 'Nombre del archivo coincide con fecha de datos';
            return true;
            }
        else {
            $msg[] = 'Nombre del archivo no coincide con fecha de datos';
            return false;
        }
    }
    function isCsv($fileType,&$msg) {
        if($fileType == 'application/vnd.ms-excel') {
            $msg[] = 'El archivo está en formato CSV';
            return true;
        }
        else {
            $msg[] = 'El archivo no está en formato CSV';
            return false;
        }
    }
    function itAlreadyExists($idZone,$dateData,&$msg,$con) {
        $qry = "SELECT COUNT(archivos.idArchivo) AS quantityFile
                FROM archivos
                WHERE archivos.idZona = '$idZone' AND archivos.fechaDatos = '$dateData'";
        if($res = mysqli_query($con,$qry)) {
            $quantityFile = mysqli_fetch_assoc($res);
            if($quantityFile['quantityFile'] == 0) {
                $msg[] = 'Fecha Disponible para subida';
                return false;
            }
            else {
                $msg[] = 'El archivo ya fué subido';
                return true;
            }
        }
    }
    function isZone($idZone, $file,&$msg) {
        $file2 = fopen($file['name'],'r');
        $data = fgetcsv($file2,150,";");
            if($data[0] == $idZone) {
                $msg[] = 'El archivo corresponde a la zona';
                return true;
            }
            else {
                $msg[] = 'El archivo no corresponde a la zona';
                return false;
            }
        fclose($file2);
    }
    function insertDataFile($idZone,$idManager,$uploadDate,$dateData,$uploadTime,$file,$con, &$msg) {
        $qry = "INSERT INTO archivos (idZona,idSupervisor,fechaSubida,fechaDatos,horaSubida)
                VALUES ('$idZone','$idManager','$uploadDate','$dateData','$uploadTime')";
        $flag = false;
        $countSuccess = 0;
        if(mysqli_query($con,$qry)) {
            $lastIdFile = mysqli_insert_id($con);

            $arr = array();
            $archivo = array();
            $primeraFila = false;
            $file2 = fopen('16052017.csv','r');
            while ($d = fgetcsv($file2,150,";")){
                if($d[0]) {
                    if($primeraFila == false) {
                        $arr['idZonaArchivo'] = $d[0];
                        $primeraFila = true;
                    }
                    else {
                        if(array_key_exists($d[0],$archivo))
                           array_push($archivo[$d[0]], array('hora' => date('H:i:s',strtotime($d[1])), 'latitud' => floatval($d[2]), 'longitud' => floatval($d[3]), 'motor' => intval($d[4]), 'rpm' => floatval($d[5]), 'gpf' => floatval($d[6]), 'gpt' => floatval($d[7]), 'cambio' => intval($d[8]), 'apf' => floatval($d[9]), 'apt' => floatval($d[10])));
                        else {
                            $archivo[$d[0]] = array();
                            array_push($archivo[$d[0]],array('hora' => date('H:i:s',strtotime($d[1])), 'latitud' => floatval($d[2]), 'longitud' => floatval($d[3]), 'motor' => intval($d[4]), 'rpm' => floatval($d[5]), 'gpf' => floatval($d[6]), 'gpt' => floatval($d[7]), 'cambio' => intval($d[8]), 'apf' => floatval($d[9]), 'apt' => floatval($d[10])));
                        }

                    }
                }
                else {
                    $archivo['msg'] = 'No hay datos';
                }
                    
            }
            foreach($archivo as $key => $row) {
                    foreach($archivo[$key] as $k => $r) {
                        $aux[$k] = $r['hora'];
                    }
                array_multisort($aux, SORT_ASC, $archivo[$key]);
            }
            foreach($archivo as $key => $value) {
                $resultados[] = array('patente' => $key, 'pRpm' => 0, 'pGpf' => 0, 'pGpt' => 0, 'pApf' => 0, 'pApt' => 0, 'tRecorridos' => 0, 'total' => 0);
                foreach($archivo[$key] as $k => $v) {
                    $resultados[sizeof($resultados)-1]['pRpm'] = $resultados[sizeof($resultados)-1]['pRpm'] + $v['rpm'];
                    $resultados[sizeof($resultados)-1]['pGpf'] = $resultados[sizeof($resultados)-1]['pGpf'] + $v['gpf'];
                    $resultados[sizeof($resultados)-1]['pGpt'] = $resultados[sizeof($resultados)-1]['pGpt'] + $v['gpt'];
                    $resultados[sizeof($resultados)-1]['pApf'] = $resultados[sizeof($resultados)-1]['pApf'] + $v['apf'];
                    $resultados[sizeof($resultados)-1]['pApt'] = $resultados[sizeof($resultados)-1]['pApt'] + $v['apt'];
                    //$resultados[sizeof($resultados)-1]['tRecorridos'] = get($v['latitud'],$v['longitud'],);
                    $resultados[sizeof($resultados)-1]['total']++;
                }
                $resultados[sizeof($resultados)-1]['pRpm'] = $resultados[sizeof($resultados)-1]['pRpm']/$resultados[sizeof($resultados)-1]['total'];
                $resultados[sizeof($resultados)-1]['pGpf'] = $resultados[sizeof($resultados)-1]['pGpf']/$resultados[sizeof($resultados)-1]['total'];
                $resultados[sizeof($resultados)-1]['pGpt'] = $resultados[sizeof($resultados)-1]['pGpt']/$resultados[sizeof($resultados)-1]['total'];
                $resultados[sizeof($resultados)-1]['pApf'] = $resultados[sizeof($resultados)-1]['pApf']/$resultados[sizeof($resultados)-1]['total'];
                $resultados[sizeof($resultados)-1]['pApt'] = $resultados[sizeof($resultados)-1]['pApt']/$resultados[sizeof($resultados)-1]['total'];
        }
echo json_encode($resultados);
        /*}
        return $countSuccess;
    }*/
    function getDistanceFromLatLonInKm($lat1,$lon1,$lat2,$lon2) {
          $R = 6371; // Radius of the earth in km
          $dLat = deg2rad($lat2-$lat1);  // deg2rad below
          $dLon = deg2rad($lon2-$lon1); 
          $a = sin($dLat/2)*sin($dLat/2)+cos(deg2rad($lat1))*cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2); 
          $c = 2*atan2(sqrt($a),sqrt(1-$a)); 
          $d = $R*$c; // Distance in km
          return $d;
    }
?>