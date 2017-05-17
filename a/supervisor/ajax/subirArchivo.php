<?php
	include ('/../../php/conexion.php');
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
            $lastIdFile = mysqli_insert_id($con);*/
            //$file2 = fopen($file['name'],'r');
            $firstRow = false;
            $machines = array();
            $machines['maq1']['pRevoluciones'] = 0;
            $machines['maq1']['pAnguloFrontal'] = 0;
            $machines['maq1']['pAnguloTrasera'] = 0;
            $machines['maq1']['pAlturaFrontal'] = 0;
            $machines['maq1']['pAlturaTrasera'] = 0;

            $machines['maq2']['pRevoluciones'] = 0;
            $machines['maq2']['pAnguloFrontal'] = 0;
            $machines['maq2']['pAnguloTrasera'] = 0;
            $machines['maq2']['pAlturaFrontal'] = 0;
            $machines['maq2']['pAlturaTrasera'] = 0;
            /*$file2 = fopen('16052017.csv','r');
            while ($data = fgetcsv($file2,150,";")){
                if($data[0]) {
                    if($firstRow == false) {
                        $arr['idZoneFile'] = $data[0];
                        $firstRow = true;
                    }
                    else {
                    $qry = "INSERT INTO datos (idArchivo,patente,hora,latitud,longitud,motorFuncionando,rpm,gradosPalaFrontal,gradosPalaTrasera,cambio,alturaPalaFrontal,alturaPalaTrasera)
                            VALUES ('$lastIdFile','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]')";
                        if(mysqli_query($con,$qry)) $countSuccess++;
                      if(sizeof($machines) == 0) {
                          array_push($machines, $data[0]);
                          array_push($machines)
                      }
                      else {
                          if(!($machines[sizeof($machines)-1] == $data[0]))
                              array_push($machines, $data[0]);
                      }
                    }
                }
                else {
                    echo 'Archivo vacío';
                }
            }*/
        echo json_encode($machines);
        /*}
        return $countSuccess;
    }*/
?>