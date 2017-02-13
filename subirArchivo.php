<?php
include ('php/conexion.php');
$conexion = conectar();
$csv = 'Libro1.csv';
$registros = 0;
$inserciones = 0;
/*if ($_FILES['csv']['size'] > 0) {

	$csv = $_FILES['csv']['tmp_name'];*/
set_time_limit(600);
	$handle = fopen($csv,'r');

	while ($data = fgetcsv($handle,1000,";")){

		if ($data[0]) { 
			$q = "INSERT INTO datos (idArchivo, patente, anguloPala, anguloInclinacion, alturaPala, velocidad, revoluciones, latitud, longitud, fechaDato, horaDato) VALUES (0,'$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]')";
			if(mysqli_query($conexion,$q)){
				$inserciones++;
			}
			else{
				echo 'No insertó<br>';
			}
		$registros++;
		}

	}
echo 'Registros: '.$registros.'-'.'Inserciones: '.$inserciones;
	/*echo 'OK';

}*/

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