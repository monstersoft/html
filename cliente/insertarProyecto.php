<?php
	include '../php/funciones.php'; 
	$name = $_POST['nombreProyecto'];
	$id = $_POST['idEmpresaProyecto'];
	$returnedData = verificaFormularioProyecto($name,$id);
	echo json_encode($returnedData);
?>