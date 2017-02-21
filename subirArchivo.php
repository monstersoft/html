<?php
include ('php/conexion.php');
$conexion = conectar();
$fechaDatos = $_POST['fechaDatos'];
$archivoZonaText = $_POST['archivoZonaText'];
$archivoZona = $_FILES['archivoZona'];
$idZonaArchivo = $_POST['idZonaArchivo'];
$arreglo = array();
$arreglo['numeroRegistros'] = 0;
$arreglo['numeroInserciones'] = 0;
$arreglo['numeroInsercionesErradas'] = 0;
$arreglo['tiempoValidacion'] = 0;
$arreglo['tiempoInsercion'] = 0;
$arreglo['peso'] = $_FILES['archivoZona']['size'];
$arreglo['peso'] = $_FILES['archivoZona']['type'];
$arreglo['fechaSubida'] = 0;
$arreglo['fechaDatos'] = 0;
$arreglo['horaSubida'] = 0;
$arreglo['candtidadRegistros'] = 0;
$arreglo['md5'] = 0;
/*if ($_FILES['csv']['size'] > 0) {

	//$csv = $_FILES['csv']['tmp_name'];
set_time_limit(600);
	$handle = fopen($csv,'r');

	while ($data = fgetcsv($handle,1000,";")){

		if ($data[0]) { 
			$consulta = "INSERT INTO datos (idArchivo, patente, anguloPala, anguloInclinacion, alturaPala, velocidad, revoluciones, latitud, longitud, fechaDato, horaDato) VALUES (0,'$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]')";
			if(mysqli_query($conexion,$consulta)){
				$inserciones++;
			}
			else {
				$errores
			}
		$registros++;
		}

	}*/
echo json_encode($arreglo);



function calcularMD5($archivo) {
	echo 'Retorna true o false si lo calculó o no';
}
function verificarMD5($md5Archivo){
	echo'Retorna si el md5 está o no en la base de datos, en el caso que ya se haya subido el archivo';
}
function verificarFechaDatos($fechaInput,$fechaDatos) {
	echo 'Retorna true o false si la fecha no corresponde a la ingresada desde input, comparada con la del archivo';
}
//Cantidad de registros leídos
//Cantidad de máquinas que están en el archivo VS máquinas que están registradas, mostrar cuáles no están registradas
//Calcular el md5 del archivo, con comas y todo

?>