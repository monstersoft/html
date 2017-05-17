<?php
	include ('/../../php/conexion.php');
    set_time_limit(1200);
    $arr = array();
    $msg = [];
    $beginTime = microtime(true);
	$con = conectar();
	$dateData = $_POST['fechaDatos'];
	$idZone = $_POST['idZona'];
	$file = $_FILES['archivo'];
	$idManager = $_POST['idSupervisor'];
	$arr['uploadDate'] = date("Y-m-d");
	$arr['uploadTime'] = date("H:i:s");
    $arr['nameDateMatch'] = nameDateMatch($file['name'],$dateData, $msg);
    $arr['isCsv'] = isCsv($file['type'], $msg);
    $arr['itAlreadyExists'] = itAlreadyExists($idZone, $dateData,$msg, $con);
    $arr['isZone'] = isZone($idZone, $file, $msg);
    //$arr['insertDataFile'] = insertDataFile($idZone,$idManager,$arr['uploadDate'],$dateData,$arr['uploadTime'],$file,$con);
    
    $endTime = microtime(true);
    $arr['timeScript']  = $endTime - $beginTime;
    mysqli_close($con);
    
    echo json_encode($arr);
    function nameDateMatch($fileName,$dateData,$arr) {
        list($year,$month,$day) = explode('-',$dateData);
        $aux = $day.$month.$year;
        list($name,$format) = explode('.',$fileName);
        if($name == $aux) {
            $arr[] = 'Nombre del archivo coincide con fecha de datos';
            return true;
            }
        else {
            $arr[] ='Nombre del archivo no coincide con fecha de datos';
            return false;
        }
    }
    function isCsv($fileType, $msg) {
        if($fileType == 'application/vnd.ms-excel')
            return true;
        else
            return false;
    }
    function itAlreadyExists($idZone,$dateData,$msg,$con) {
        $qry = "SELECT COUNT(archivos.idArchivo) AS quantityFile
                FROM archivos
                WHERE archivos.idZona = '$idZone' AND archivos.fechaDatos = '$dateData'";
        if($res = mysqli_query($con,$qry)) {
            $quantityFile = mysqli_fetch_assoc($res);
            if($quantityFile['quantityFile'] == 0)
                return false;
            else
                return true;	
        }
    }
    function isZone($idZone, $file, $msg) {
        $file2 = fopen($file['name'],'r');
        $data = fgetcsv($file2,150,";");
            /*if($data[0] == $idZone)
                return true;
            else 
                return false;*/
        return $data[0];
        fclose($file2);
    }
    /*function insertDataFile($idZone,$idManager,$uploadDate,$dateData,$uploadTime,$file,$con) {
        $qry = "INSERT INTO archivos (idZona,idSupervisor,fechaSubida,fechaDatos,horaSubida)
                VALUES ('$idZone','$idManager','$uploadDate','$dateData','$uploadTime')";
        $countSuccess = 0;
        if(mysqli_query($con,$qry)) {
            $lastIdFile = mysqli_insert_id($con);
            /*$file2 = fopen($file['name'],'r');
            while ($data = fgetcsv($file2,150,";")){
                if($data[0]){
                    $qry = "INSERT INTO datos (idArchivo,patente,hora,latitud,longitud,motorFuncionando,rpm,gradosPalaFrontal,gradosPalaTrasera,cambio,alturaPalaFrontal,alturaPalaTrasera)
                            VALUES ('$lastIdFile','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]')";
                        if(mysqli_query($con,$qry)) $countSuccess++;
                }
            }
        }
        return $countSuccess;
    }*/
?>