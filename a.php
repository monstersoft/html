<?php 
  $fecha = $_POST['fecha'];
  $arreglo = array();
  $arreglo['fetcha'] = $fecha;
  echo json_encode($arreglo);
?>