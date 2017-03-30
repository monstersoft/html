<?php
	include ('../../php/conexion.php');
	$con = conectar();
	/*$fechaDatos = $_POST['fechaDatos'];
	$idZona = $_POST['idZona'];
	$archivo = $_FILES['archivo'];
	$idSupervisor= $_POST['idSupervisor'];*/

	//$fechaDatos = '29-03-2017';
	$idZona = 50;
	//$archivo = fopen('29032017.csv','r');
	//$idSupervisor = 22;
		//$csv = $_FILES['csv']['tmp_name'];
		set_time_limit(600);
	/*$arreglo['nameDateMatch'] = nameDateMatch($archivo['name'],$fechaDatos);
	$arreglo['isCsv'] = isCsv($archivo['type']);
	$arreglo['itAlreadyExists'] = itAlreadyExists($idZona,$fechaDatos,$con);
	$arreglo['md5'] = calculateMD5(file_get_contents($archivo['name']));*/

	//$arreglo['infoFile'] = $archivo;machineZone($idZona,$con);
	echo json_encode(machineZone($idZona,$con));



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
	if($res = mysqli_query($con,$qry)){
		while($row = mysqli_fetch_assoc($res)){
			array_push($arr,array('idMaquina' => $row['idMaquina'], 'identificador' => $row['identificador'], 'patente' => $row['patente'], 'registrosEncontrados' => 0));
		}
		$file = fopen('30032017.csv','r');
		while ($data = fgetcsv($file,150,";")){
			if($data[0]){
				foreach ($arr as $key => $value) {
					if($value['identificador'] == $data[0]){
						$arr[$key]['registrosEncontrados']++;
					}
				}
			}
		}
	}
	return $arr;
}
?>