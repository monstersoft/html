<?php
	include ('../../php/conexion.php');
	$con = conectar();
set_time_limit(600);
	/*$fechaDatos = $_POST['fechaDatos'];
	$idZona = $_POST['idZona'];
	$archivo = $_FILES['archivo'];
	$idSupervisor= $_POST['idSupervisor'];*/

	//$fechaDatos = '29-03-2017';
	$idZona = 50;
	$idSupervisor = 22;
	$uploadDate = date("Y-m-d");
	$dataDate = '29-03-2017';
	$uploadTime = date("H-i-s");
	$fileSize = 100;
	echo insertDataFile($idZona,$idSupervisor,$uploadDate,$dataDate,$uploadTime,$fileSize,$con);
		//$csv = $_FILES['csv']['tmp_name'];
	/*$arreglo['nameDateMatch'] = nameDateMatch($archivo['name'],$fechaDatos);
	$arreglo['isCsv'] = isCsv($archivo['type']);
	$arreglo['itAlreadyExists'] = itAlreadyExists($idZona,$fechaDatos,$con);
	$arreglo['md5'] = calculateMD5(file_get_contents($archivo['name']));*/
	//$arreglo['infoFile'] = $archivo;machineZone($idZona,$con);
	//echo json_encode($arr);



function nameDateMatch($fileName,$dateData) {
	list($day,$month,$year) = explode('-',$dateData);
	$aux = $year.$month.$day;
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
function calculateMD5($contentFile) {
	$md5 = md5($contentFile);
	return $md5;
}
function machineZone($idZone,$con) {
	$qry = "SELECT idMaquina,identificador, patente
			FROM maquinas
			WHERE maquinas.idZona = '$idZone'";
	$arr = array();
	$count = 0;
	if($res = mysqli_query($con,$qry)){
		while($row = mysqli_fetch_assoc($res)){
			array_push($arr,array('idMaquina' => $row['idMaquina'], 'identificador' => $row['identificador'], 'patente' => $row['patente'], 'registrosEncontrados' => 0));
		}
		$file = fopen('30032017.csv','r');
		while ($data = fgetcsv($file,150,";")){
			if($data[0]){
				foreach ($arr as $key => $value) {
					if($value['identificador'] == $data[0])
						$arr[$key]['registrosEncontrados']++;
					$count++;
				}
			}
		}
	}
	$data['infoMaquinas'] = $arr;
	$data['cantidadRegistros'] = $count;
	return $data;
}

function insertDataFile($idZone,$idManager,$uploadDate,$dataDate,$uploadTime,$fileSize,$con) {
	$qry = "INSERT INTO archivos (idZona,idSupervisor,fechaSubida,fechaDatos,horaSubida,peso,cantidadRegistros,md5)
			VALUES ('$idZone','$idManager','$uploadDate','$dataDate','$uploadTime','$fileSize',100,'asd')";
	$countSuccess = 0;
	if(mysqli_query($con,$qry)) {
		$lastIdFile = mysqli_insert_id($con);
		$file = fopen('30032017.csv','r');
		while ($data = fgetcsv($file,150,";")){
			if($data[0]){
				$qry = "INSERT INTO datos (idArchivo,identificador,hora,latitud,longitud,motorFuncionando,rpm,gradosPalaFrontal,gradosPalaTrasera,cambio,alturaPalaFrontal,alturaPalaTrasera)
						VALUES ('$lastIdFile','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]')";
					if(mysqli_query($con,$qry)) $countSuccess++;
			}
		}
	}
	return $countSuccess;
}
?>