<?php
	include ('../../php/conexion.php');
    //set_time_limit(1200);
    $arr = array('msg' => array(), 'nameDateMatch' => false, 'insertData' => false);
	$con = conectar();
	$dateData = $_POST['fechaDatos'];
	$idZone = $_POST['idZona'];
	$file = $_FILES['archivo'];
	$idManager = $_POST['idSupervisor'];
	$arr['uploadDate'] = date("Y-m-d");
	$arr['uploadTime'] = date("H:i:s");
    $arr['dateData'] = $dateData;
    $arr['nameDateMatch'] = nameDateMatch($file['name'],$dateData,$arr['msg']);
    $arr['isCsv'] = isCsv($file['type'], $arr['msg']);
    $arr['itAlreadyExists'] = itAlreadyExists($idZone,$dateData,$arr['msg'], $con);
    $arr['infoZoneFile'] = isZone($idZone,$file,$arr['msg']);
    $arr['fileInfo'] = $file;
    if(($arr['nameDateMatch'] == false) or ($arr['isCsv'] == false) or ($arr['itAlreadyExists'] == true) or ($arr['infoZoneFile']['isZone'] == false) or ($arr['infoZoneFile']['secondRowCsvEmpty'] == true) or ($arr['infoZoneFile']['secondRowCsvEmpty'] == true))
        $arr['success'] = false;
    else {
        //GUARDAMOS EL ÚLTIMO ID GENERADO DE LA TABLA ARCHIVOS, RETORNADO POR LA FUNCIÓN insertIdFileGenerate
        $arr['idFileGenerate'] = insertIdFileGenerate($idZone,$idManager,$arr['uploadDate'],$arr['dateData'],$arr['uploadTime'],$con,$arr['msg']);
        $info = array('firstCsvRow' => true, 'countRowCsv' => 0);
        $fileContent = array();
        //ABRIMOS EL ARCHIVO PARA LEERLO Y GENERAMOS LA CONSULTA PARA HACER LA INSRECIÓN Y TAMBIÉN GUARDAMOS LOS DATOS EN EL ARREGLO $fileContent
        $file2 = fopen($file['tmp_name'],'r');
        while ($d = fgetcsv($file2,150,";")) {
            if($info['firstCsvRow'] == true)
                generateQueryStringAndFileContent($arr['idFileGenerate'],null,null,null,null,null,null,null,null,null,null,null,$info,$fileContent,$d[0]);
            else
                generateQueryStringAndFileContent($arr['idFileGenerate'],$d[0],$d[1],$d[2],$d[3],$d[4],$d[5],$d[6],$d[7],$d[8],$d[9],$d[10],$info,$fileContent,$d[0]);
        }
        //QUITAMOS LA ÚLTIMA COMA DE LA CONSULTA GENERADA
        $qry = rtrim($info['str'],",");
        //HACEMOS LA INSERCIÓN
        if(mysqli_query($con,$qry)) $arr['insertData'] = true;
        //ORDENAMOS POR HORA Y PATENTE LOS DATOS DEL ARREGLO $fileContent
        foreach($fileContent as $key => $row) {
            foreach($fileContent[$key] as $k => $r) {
                    $aux[$k] = $r['hora'];
            }
            $tam = sizeof($fileContent[$key]); 
            if($tam > 2) {
                array_multisort($aux, SORT_ASC, $fileContent[$key]);
                array_push($arr,array('patente' => $key, 'tam' => sizeof($fileContent[$key]), 'ordeno' => 'si'));
            }
        }
        //CALCULAMOS LOS PROMEDIOS Y LA DISTANCIA RECORRIDA ENTRE LA HORA ANTERIOR Y POSTERIOR, SE ALMACENA EN EL ARREGLO RESULTADOS
        foreach($fileContent as $key => $value) {
            $resultados[] = array('patente' => $key, 'pRpm' => 0, 'pGpf' => 0, 'pGpt' => 0, 'pApf' => 0, 'pApt' => 0, 'tRecorridos' => 0, 'total' => 0);
            foreach($fileContent[$key] as $k => $v) {
                $resultados[sizeof($resultados)-1]['pRpm'] = $resultados[sizeof($resultados)-1]['pRpm'] + $v['rpm'];
                $resultados[sizeof($resultados)-1]['pGpf'] = $resultados[sizeof($resultados)-1]['pGpf'] + $v['gpf'];
                $resultados[sizeof($resultados)-1]['pGpt'] = $resultados[sizeof($resultados)-1]['pGpt'] + $v['gpt'];
                $resultados[sizeof($resultados)-1]['pApf'] = $resultados[sizeof($resultados)-1]['pApf'] + $v['apf'];
                $resultados[sizeof($resultados)-1]['pApt'] = $resultados[sizeof($resultados)-1]['pApt'] + $v['apt'];
                if($k < (sizeof($fileContent[$key])-1))
                    $resultados[sizeof($resultados)-1]['tRecorridos'] = $resultados[sizeof($resultados)-1]['tRecorridos'] + getDistanceFromLatLonInKm($fileContent[$key][$k]['latitud'],$fileContent[$key][$k]['longitud'],$fileContent[$key][$k+1]['latitud'],$fileContent[$key][$k+1]['longitud']);
                $resultados[sizeof($resultados)-1]['total']++;
            }
            $resultados[sizeof($resultados)-1]['pRpm'] = $resultados[sizeof($resultados)-1]['pRpm']/$resultados[sizeof($resultados)-1]['total'];
            $resultados[sizeof($resultados)-1]['pGpf'] = $resultados[sizeof($resultados)-1]['pGpf']/$resultados[sizeof($resultados)-1]['total'];
            $resultados[sizeof($resultados)-1]['pGpt'] = $resultados[sizeof($resultados)-1]['pGpt']/$resultados[sizeof($resultados)-1]['total'];
            $resultados[sizeof($resultados)-1]['pApf'] = $resultados[sizeof($resultados)-1]['pApf']/$resultados[sizeof($resultados)-1]['total'];
            $resultados[sizeof($resultados)-1]['pApt'] = $resultados[sizeof($resultados)-1]['pApt']/$resultados[sizeof($resultados)-1]['total'];
        }
        //RESCATAMOS TODAS LAS MÁQUINAS DE LA ZONA
        $maquinas = array();
        $qry = "SELECT maquinas.idMaquina, maquinas.idZona, maquinas.patente FROM maquinas WHERE maquinas.idZona = '$idZone'";
        if($resultado = mysqli_query($con,$qry)) {
            while($row = mysqli_fetch_assoc($resultado)) {
                array_push($maquinas,array('patente' => $row['patente'],'idZona' => $row['idZona'], 'idMaquina' => $row['idMaquina'], 'fechaDatos' => $dateData));
            }
        }
        /*COMPARAMOS LAS MÁQUINAS RESCATADAS CON EL ARREGLO RESULTADOS PARA VERIFICAR QUE MÁQUINA ESTUVO EN EL ARCHIVO
            - SI LA MÁQUINA ESTABA REGISTRADA Y EXISTIÓ EN EL ARCHIVO SE ESTABLECEN LOS CAMPOS: registrado en 1 y existeEnArchivo en 1
            - SI LA MÁQUINA ESTABA REGISTRADA Y NO EXISTIÓ EN EL ARCHIVO SE ESTABLECEN LOS CAMPOS: registrado en 1 y existeEnArchivo en 0, los valores de las variables serán -1
            - SI LA MÁQUINA NO ESTABA REGISTRADA Y EXISTIÓ EN EL ARCHIVO SE ESTABLECEN LOS CAMPOS: registrado en 0, existeEnArchivo en 1 y el idMaquina en -1
        */
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
                array_push($resultados,array('patente' => $v['patente'], 'pRpm' => -1, 'pGpf' => -1, 'pGpt' => -1, 'pApf' => -1, 'pApt' => -1, 'tRecorridos' => -1, 'total' => -1, 'idZona' => $v['idZona'], 'idMaquina' => $v['idMaquina'], 'fechaDatos' => $v['fechaDatos'], 'registrado' => 1, 'existeEnArchivo' => 0));
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
        $countResultData = 0;
        //INSERTAMOS EL ARREGLO RESULTADOS
        foreach($resultados as $k => $v) {
            $qry = "INSERT INTO resultados (idArchivo, patente,idMaquina,registrado,existeEnArchivo,fechaDatos,pRpm,pGpf,pGpt,pApf,pApt,tRecorridos,mediciones) VALUES (".$arr['idFileGenerate'].",'".$v['patente']."',".$v['idMaquina'].",".$v['registrado'].",".$v['existeEnArchivo'].",'".$v['fechaDatos']."',".$v['pRpm'].",".$v['pGpf'].",".$v['pGpt'].",".$v['pApf'].",".$v['pApt'].",".$v['tRecorridos'].",".$v['total'].")";
            if(mysqli_query($con,$qry)) $countResultData++;
        }
        $arr['countResultData'] = $countResultData;
        $arr['countRowCsv'] = $info['countRowCsv'];
        $arr['success'] = true;
    }
    mysqli_close($con);
    echo json_encode($arr);
    function insertIdFileGenerate($idZone,$idManager,$uploadDate,$dateData,$uploadTime,$con, &$msg) {
        $qry = "INSERT INTO archivos (idZona,idSupervisor,fechaSubida,fechaDatos,horaSubida) VALUES ('$idZone','$idManager','$uploadDate','$dateData','$uploadTime')";
        if(mysqli_query($con,$qry)) $lastIdFile = mysqli_insert_id($con);
        return $lastIdFile;
    }
    function generateQueryStringAndFileContent($ia,$p,$h,$la,$lo,$mf,$r,$gpf,$gpt,$c,$apf,$apt,&$info,&$fileContent,$idZona) {
        if($info['firstCsvRow'] == true) {
            $info['str'] = "INSERT INTO datos (idArchivo,patente,hora,latitud,longitud,motorFuncionando,rpm,gradosPalaFrontal,gradosPalaTrasera,cambio,alturaPalaFrontal,alturaPalaTrasera) VALUES ";
            $info['idZona'] = $idZona;
            $info['firstCsvRow'] = false;
        }
        else {
            $info['str'] .= '('.$ia.',"'.$p.'","'.$h.'",'.$la.','.$lo.','.$mf.','.$r.','.$gpf.','.$gpt.','.$c.','.$apf.','.$apt.'),';
            if(array_key_exists($p,$fileContent))
               array_push($fileContent[$p], array('hora' => date('H:i:s',strtotime($h)), 'latitud' => floatval($la), 'longitud' => floatval($lo), 'motor' => intval($mf), 'rpm' => floatval($r), 'gpf' => floatval($gpf), 'gpt' => floatval($gpt), 'cambio' => intval($c), 'apf' => floatval($apf), 'apt' => floatval($apt)));
            else {
                $fileContent[$p] = array();
                array_push($fileContent[$p],array('hora' => date('H:i:s',strtotime($h)), 'latitud' => floatval($la), 'longitud' => floatval($lo), 'motor' => intval($mf), 'rpm' => floatval($r), 'gpf' => floatval($gpf), 'gpt' => floatval($gpt), 'cambio' => intval($c), 'apf' => floatval($apf), 'apt' => floatval($apt)));
            }
            $info['countRowCsv']++;
        }
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
        if($fileType == 'application/vnd.ms-excel' or $fileType == 'text/comma-separated-values' or $fileType == 'text/csv') return true;
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
        $aux = array('isZone' => false, 'secondRowCsvEmpty' => false);
        $firstRowCsv = true;
        $secondRowCsv = false;
        $row = 0;
        $file2 = fopen($file['tmp_name'],'r');
        while ($d = fgetcsv($file2,150,";") and $row <= 1) {
            if($secondRowCsv == true) {
                if($d[0] == '') { 
                    $aux['secondRowCsvEmpty'] = true;
                    $msg[] = 'El archivo no contiene datos';
                    $secondRowCsv = false;
                }
            }
            if($firstRowCsv == true) {
                if($d[0] == $idZone) $aux['isZone'] = true;
                else $msg[] = 'El archivo no corresponde a la zona';
                $firstRowCsv = false;
                $secondRowCsv = true;
            }
            $row++;
        }
        if($row == 1) {
            $aux['secondRowCsvEmpty'] = true;
            $msg[] = 'El archivo no contiene datos';
        }
        fclose($file2);
        return $aux;
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