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
$arr = array();
$arr['js'] = getDistanceFromLatLonInKm(48.8666667,2.3333333,19.4341667,-99.1386111);
	echo json_encode($arr);



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
function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2) {
	// Cálculo de la distancia en grados
	$degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
 
	// Conversión de la distancia en grados a la unidad escogida (kilómetros, millas o millas naúticas)
	switch($unit) {
		case 'km':
			$distance = $degrees * 111.13384; // 1 grado = 111.13384 km, basándose en el diametro promedio de la Tierra (12.735 km)
			break;
		case 'mi':
			$distance = $degrees * 69.05482; // 1 grado = 69.05482 millas, basándose en el diametro promedio de la Tierra (7.913,1 millas)
			break;
		case 'nmi':
			$distance =  $degrees * 59.97662; // 1 grado = 59.97662 millas naúticas, basándose en el diametro promedio de la Tierra (6,876.3 millas naúticas)
	}
	return round($distance, $decimals);
}
function getDistanceFromLatLonInKm($lat1,$lon1,$lat2,$lon2) {
    $R = 6371;
    $dLat = deg2rad($lat2-$lat1);
    $dLon = deg2rad($lon2-$lon1); 
    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2); 
    $c = 2 * atan2(sqrt($a), sqrt(1-$a)); 
    $d = $R * $c;
    return $d;
}

?>