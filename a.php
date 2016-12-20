<?php
    //$datos = json_decode(file_get_contents('php://input'));
$datos = json_decode(file_get_contents('j.json'),true);
echo $datos['nombre']['original'];
?>
