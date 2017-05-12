<?php
	include ('/../../php/conexion.php');
    $beginTime = microtime(true);
	$con = conectar();
    set_time_limit(1200);
	$dateData = $_POST['fechaDatos'];
	$idZone = $_POST['idZona'];
	$file = $_FILES['archivo'];
	$idManager= $_POST['idSupervisor'];
	$uploadDate = date("Y-m-d");
	$uploadTime = date("H-i-s");
    $arr['nameDateMatch'] = nameDateMatch($file['name'],$dateData);
    $arr['nameFile'] = $file['name'];
    $arr['isCsv'] = isCsv($file['type']);
    $arr['itAlreadyExists'] = itAlreadyExists($idZone, $dateData, $con);
	$arr['uploadDate'] = date("Y-m-d");
	$arr['uploadTime'] = date("H:i:s");
	$arr['fileSize'] = $file['size'];
    $arr['md5'] = md5_file($file['name']);
    $arr['countMD5'] = countMD5($arr['md5'],$con);
    if($arr['itAlreadyExists'] == true)
        $arr['success'] = false;
    else {
        $arr['countSuccess'] = insertDataFile($idZone,$idManager,$uploadDate,$dateData,$uploadTime,$arr['fileSize'],$file,$arr['md5'],$con);
        $arr['success'] = true;
    }
    $endTime = microtime(true);
    $arr['timeScript']  = $endTime - $beginTime;
    mysqli_close($con);
    echo json_encode($arr);

    function nameDateMatch($fileName,$dateData) {
        list($year,$month,$day) = explode('-',$dateData);
        $aux = $day.$month.$year;
        list($name,$format) = explode('.',$fileName);
        if($name == $aux)
            return true;
        else 
            return false;
    }
    function isCsv($fileType) {
        if($fileType == 'application/vnd.ms-excel')
            return true;
        else
            return false;
    }
    function itAlreadyExists($idZone,$dateData,$con) {
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
    function countMD5($md5,$con) {
        $qry = "SELECT COUNT(archivos.md5) AS quantityMD5 FROM archivos WHERE archivos.md5 = '$md5'";
        $arr = array();
        if($res = mysqli_query($con,$qry)) {
            $row = mysqli_fetch_assoc($res);
            return $row['quantityMD5'];
        }
    }
    function insertDataFile($idZone,$idManager,$uploadDate,$dateData,$uploadTime,$fileSize,$file,$md5,$con) {
        $qry = "INSERT INTO archivos (idZona,idSupervisor,fechaSubida,fechaDatos,horaSubida,peso,cantidadRegistros,md5)
                VALUES ('$idZone','$idManager','$uploadDate','$dateData','$uploadTime','$fileSize',100,'$md5')";
        $countSuccess = 0;
        if(mysqli_query($con,$qry)) {
            $lastIdFile = mysqli_insert_id($con);
            $file2 = fopen($file['name'],'r');
            while ($data = fgetcsv($file2,150,";")){
                if($data[0]){
                    $qry = "INSERT INTO datos (idArchivo,identificador,hora,latitud,longitud,motorFuncionando,rpm,gradosPalaFrontal,gradosPalaTrasera,cambio,alturaPalaFrontal,alturaPalaTrasera)
                            VALUES ('$lastIdFile','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]')";
                        if(mysqli_query($con,$qry)) $countSuccess++;
                }
            }
        }
        return $countSuccess;
    } // RETORNAR SI NO ES EL ID ZONA O NO
?>