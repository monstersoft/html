<?php 
  $fecha = $_POST['fechaDatos'];
  $arreglo = array();
  $arreglo['fetcha'] = $fecha;
  echo json_encode($arreglo);
?>