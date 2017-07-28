<?php
	include ('php/conexion.php');
    $beginTime = microtime(true);
    set_time_limit(1200);
    $con = conectar();
    $file2 = fopen('27072017.csv','r');
    $arr = array('str' => '','countRowCsv' => 0,'idZona' => null, 'insertOk' => false);
    while ($d = fgetcsv($file2,150,";")) {
        if(strlen($d[0]) == 2) generateQueryString(null,null,null,null,null,null,null,null,null,null,null,null,$arr,$d[0],true);
        else generateQueryString(70,$d[0],$d[1],$d[2],$d[3],$d[4],$d[5],$d[6],$d[7],$d[8],$d[9],$d[10],$arr,$d[0],false);
        $arr['sql'] = rtrim($arr['str'],",");
    }
    if(mysqli_query($con,$arr['sql']));
        $arr['insertOk'] = true;
    mysqli_close($con);
    $endTime = microtime(true);
    $arr['timeScript']  = $endTime - $beginTime;
    function generateQueryString($ia,$p,$h,$la,$lo,$mf,$r,$gpf,$gpt,$c,$apf,$apt,&$qry,$idZona,$isFirstRow) {
        if($isFirstRow == true) {
            $qry['str'] = "INSERT INTO datos (idArchivo,patente,hora,latitud,longitud,motorFuncionando,rpm,gradosPalaFrontal,gradosPalaTrasera,cambio,alturaPalaFrontal,alturaPalaTrasera) VALUES ";
            $qry['idZona'] = $idZona;    
        }
        else
            $qry['str'] .= '('.$ia.',"'.$p.'","'.$h.'",'.$la.','.$lo.','.$mf.','.$r.','.$gpf.','.$gpt.','.$c.','.$apf.','.$apt.'),';
            $qry['countRowCsv']++;
    }
    echo json_encode($arr);
?>