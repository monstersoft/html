<?php
	include ('/../../php/conexion.php');
    //set_time_limit(1200);
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
        $arr['countInsertData'] = insertDataFile($idZone,$idManager,$arr['uploadDate'],$dateData,$arr['uploadTime'],$file,$con,$arr['msg']);
        $arr['success'] = true;
    }
    $endTime = microtime(true);
    $arr['timeScript']  = $endTime - $beginTime;
    mysqli_close($con);
    echo json_encode($arr);
    function insertDataFile($idZone,$idManager,$uploadDate,$dateData,$uploadTime,$file,$con, &$msg) {
        $qry = "INSERT INTO archivos (idZona,idSupervisor,fechaSubida,fechaDatos,horaSubida) VALUES ('$idZone','$idManager','$uploadDate','$dateData','$uploadTime')";
        if(mysqli_query($con,$qry)) $lastIdFile = mysqli_insert_id($con);
        $archivo = array();
        $primeraFila = false;
        $countInsertData = 0;
        $countResultData = 0;
        $file2 = fopen($file['tmp_name'],'r');
        while ($d = fgetcsv($file2,150,";")){
            if($d[0]) {
                if($primeraFila == false) {
                    $arr['idZonaArchivo'] = $d[0];
                    $primeraFila = true;
                }
                else {
                    $qry = "INSERT INTO datos (idArchivo,patente,hora,latitud,longitud,motorFuncionando,rpm,gradosPalaFrontal,gradosPalaTrasera,cambio,alturaPalaFrontal,alturaPalaTrasera) VALUES ('$lastIdFile','$d[0]','$d[1]','$d[2]','$d[3]','$d[4]','$d[5]','$d[6]','$d[7]','$d[8]','$d[9]','$d[10]')";
                    if(mysqli_query($con,$qry)) $countInsertData++;
                    if(array_key_exists($d[0],$archivo))
                       array_push($archivo[$d[0]], array('hora' => date('H:i:s',strtotime($d[1])), 'latitud' => floatval($d[2]), 'longitud' => floatval($d[3]), 'motor' => intval($d[4]), 'rpm' => floatval($d[5]), 'gpf' => floatval($d[6]), 'gpt' => floatval($d[7]), 'cambio' => intval($d[8]), 'apf' => floatval($d[9]), 'apt' => floatval($d[10])));
                    else {
                        $archivo[$d[0]] = array();
                        array_push($archivo[$d[0]],array('hora' => date('H:i:s',strtotime($d[1])), 'latitud' => floatval($d[2]), 'longitud' => floatval($d[3]), 'motor' => intval($d[4]), 'rpm' => floatval($d[5]), 'gpf' => floatval($d[6]), 'gpt' => floatval($d[7]), 'cambio' => intval($d[8]), 'apf' => floatval($d[9]), 'apt' => floatval($d[10])));
                    }

                }
            }
        }
        foreach($archivo as $key => $row) {
            foreach($archivo[$key] as $k => $r) {
                    $aux[$k] = $r['hora'];
            }
            if(!sizeof($archivo[$key]) == 1)
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
                if($k < (sizeof($archivo[$key])-1))
                    $resultados[sizeof($resultados)-1]['tRecorridos'] = $resultados[sizeof($resultados)-1]['tRecorridos'] + getDistanceFromLatLonInKm($archivo[$key][$k]['latitud'],$archivo[$key][$k]['longitud'],$archivo[$key][$k+1]['latitud'],$archivo[$key][$k+1]['longitud']);
                $resultados[sizeof($resultados)-1]['total']++;
            }
            $resultados[sizeof($resultados)-1]['pRpm'] = $resultados[sizeof($resultados)-1]['pRpm']/$resultados[sizeof($resultados)-1]['total'];
            $resultados[sizeof($resultados)-1]['pGpf'] = $resultados[sizeof($resultados)-1]['pGpf']/$resultados[sizeof($resultados)-1]['total'];
            $resultados[sizeof($resultados)-1]['pGpt'] = $resultados[sizeof($resultados)-1]['pGpt']/$resultados[sizeof($resultados)-1]['total'];
            $resultados[sizeof($resultados)-1]['pApf'] = $resultados[sizeof($resultados)-1]['pApf']/$resultados[sizeof($resultados)-1]['total'];
            $resultados[sizeof($resultados)-1]['pApt'] = $resultados[sizeof($resultados)-1]['pApt']/$resultados[sizeof($resultados)-1]['total'];
        } 
        $maquinas = array();
        $qry = "SELECT maquinas.idMaquina, maquinas.idZona, maquinas.patente FROM maquinas WHERE maquinas.idZona = '$idZone'";
        if($resultado = mysqli_query($con,$qry)) {
            while($row = mysqli_fetch_assoc($resultado)) {
                array_push($maquinas,array('patente' => utf8_encode($row['patente']),'idZona' => $row['idZona'], 'idMaquina' => $row['idMaquina'], 'fechaDatos' => $dateData));
            }
        }
        foreach($maquinas as $k => $v) {
            $index = searchValueInArray($resultados, 'patente', $v['patente']);
            if(!($index == -1)) {
                $resultados[$index]['idZona'] = $v['idZona'];
                $resultados[$index]['idMaquina'] = $v['idMaquina'];
                $resultados[$index]['fechaDatos'] = $v['fechaDatos'];
                $resultados[$index]['registrado'] = 1;
                $resultados[$index]['existeEnArchivo'] = 1;
            }
            else
                array_push($resultados,array('patente' => $v['patente'], 'pRpm' => 0, 'pGpf' => 0, 'pGpt' => 0, 'pApf' => 0, 'pApt' => 0, 'tRecorridos' => 0, 'total' => 0, 'idZona' => $v['idZona'], 'idMaquina' => $v['idMaquina'], 'fechaDatos' => $v['fechaDatos'], 'registrado' => 1, 'existeEnArchivo' => 0));
        }
        foreach($resultados as $k => $v) {
            $index = searchValueInArray($maquinas, 'patente', $v['patente']);
            if($index == -1) {
                $resultados[$k]['idZona'] = $idZone;
                $resultados[$k]['idMaquina'] = -1;
                $resultados[$k]['fechaDatos'] = $dateData;
                $resultados[$k]['registrado'] = 0;
                $resultados[$k]['existeEnArchivo'] = 1;    
            }
        }
        foreach($resultados as $k => $v) {
                //$qry = "INSERT INTO resultados (idArchivo, patente,idMaquina,idZona,registrado,existeEnArchivo,fechaDatos,pRpm,pGpf,pGpt,pApf,pApt,tRecorridos,mediciones) VALUES (".$lastIdFile.",'".$v['patente']."',".$v['idMaquina'].",".$v['idZona'].",".$v['registrado'].",".$v['existeEnArchivo'].",'".$v['fechaDatos']."',".$v['pRpm'].",".$v['pGpf'].",".$v['pGpt'].",".$v['pApf'].",".$v['pApt'].",".$v['tRecorridos'].",".$v['total'].")";
            $qry = "INSERT INTO resultados (idArchivo, patente,idMaquina,registrado,existeEnArchivo,fechaDatos,pRpm,pGpf,pGpt,pApf,pApt,tRecorridos,mediciones) VALUES (".$lastIdFile.",'".$v['patente']."',".$v['idMaquina'].",".$v['registrado'].",".$v['existeEnArchivo'].",'".$v['fechaDatos']."',".$v['pRpm'].",".$v['pGpf'].",".$v['pGpt'].",".$v['pApf'].",".$v['pApt'].",".$v['tRecorridos'].",".$v['total'].")";
            if(mysqli_query($con,$qry)) $countResultData++;
        }
        $arr = array('countInsertData' => $countInsertData, 'countResultData' => $countResultData);
        return $arr;
    }
    function getDistanceFromLatLonInKm($lat1,$lon1,$lat2,$lon2) {
          $R = 6371; // Radius of the earth in km
          $dLat = deg2rad($lat2-$lat1);  // deg2rad below
          $dLon = deg2rad($lon2-$lon1); 
          $a = sin($dLat/2)*sin($dLat/2)+cos(deg2rad($lat1))*cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2); 
          $c = 2*atan2(sqrt($a),sqrt(1-$a)); 
          $d = $R*$c; // Distance in km
          return $d;
    }
    function nameDateMatch($fileName,$dateData,&$msg) {
        list($year,$month,$day) = explode('-',$dateData);
        $aux = $day.$month.$year;
        list($name,$format) = explode('.',$fileName);
        if($name == $aux) return true;
        else {
            $msg[] = 'Nombre del archivo no coincide con fecha de datos';
            return false;
        }
    }
    function isCsv($fileType,&$msg) {
        if($fileType == 'application/vnd.ms-excel') return true;
        else {
            $msg[] = 'El archivo no está en formato CSV';
            return false;
        }
    }
    function itAlreadyExists($idZone,$dateData,&$msg,$con) {
        $qry = "SELECT COUNT(archivos.idArchivo) AS quantityFile FROM archivos LEFT JOIN zonas ON archivos.idZona = zonas.idZona WHERE archivos.fechaDatos = '$dateData' AND zonas.idZona = '$idZone'";
        if($res = mysqli_query($con,$qry)) {
            $quantityFile = mysqli_fetch_assoc($res);
            if($quantityFile['quantityFile'] == 0) return false;
            else {
                $msg[] = 'El archivo ya fué subido';
                return true;
            }
        }
    }
    function isZone($idZone, $file,&$msg) {
        $file2 = fopen($file['tmp_name'],'r');
        $data = fgetcsv($file2,150,";");
            if($data[0] == $idZone) return true;
            else {
                $msg[] = 'El archivo no corresponde a la zona';
                return false;
            }
        fclose($file2);
    }
    function searchValueInArray($array, $field, $value) {
        $index = -1;
        foreach($array as $k => $v) {
            if($v[$field] == $value)
                $index = $k;
        }
        return $index;
    }
?>