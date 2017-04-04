<?php
	include '../../php/funciones.php';
	/*$idZona = $_POST['id'];
	$identificador = $_POST['identificador'];
	$patente = $_POST['patente'];*/
    $idZona = 50;
	$identificador = 1;
	$fechaDatos = '0000-00-00';
	$con = conectar();
    $arr = separaDatosPorHora($con,generaArray());
    foreach($arr as $i => $v) {
        foreach($arr[$i]['datos'] as $index => $value) {
            $arr[$i]['promedioLatPorHora'] = $arr[$i]['promedioLatPorHora'] + $value['lat'];
            $arr[$i]['promedioLonPorHora'] = $arr[$i]['promedioLonPorHora'] + $value['lon'];
            $arr[$i]['promedioRpmPorHora'] = $arr[$i]['promedioRpmPorHora'] + $value['rpm'];       
            $arr[$i]['promedioGFrontalPorHora'] = $arr[$i]['promedioGFrontalPorHora'] + $value['gpf'];
            $arr[$i]['promedioGTraseraPorHora'] = $arr[$i]['promedioGTraseraPorHora'] + $value['gpt'];
            $arr[$i]['promedioAFrontalPorHora'] = $arr[$i]['promedioAFrontalPorHora'] + $value['apf'];
            $arr[$i]['promedioATraseraPorHora'] = $arr[$i]['promedioATraseraPorHora'] + $value['apt'];
            if($value['mFun'] == true) $arr[$i]['frecuenciaMFuncionandoPorHora']++;
            if($value['cam'] == 1) $arr[$i]['frecuenciaCambio']['primera']++;
            if($value['cam'] == 2) $arr[$i]['frecuenciaCambio']['segunda']++;
            if($value['cam'] == 3) $arr[$i]['frecuenciaCambio']['tercera']++;
            if($value['cam'] == 4) $arr[$i]['frecuenciaCambio']['cuarta']++;
            if($value['cam'] == 5) $arr[$i]['frecuenciaCambio']['quinta']++;
            if($value['cam'] == 6) $arr[$i]['frecuenciaCambio']['sexta']++;
            if($value['cam'] == 7) $arr[$i]['frecuenciaCambio']['septima']++;
            if($value['cam'] == 8) $arr[$i]['frecuenciaCambio']['octava']++;
            if($value['cam'] == 9) $arr[$i]['frecuenciaCambio']['novena']++;
            if($value['cam'] == 10) $arr[$i]['frecuenciaCambio']['decima']++; 
            if($value['cam'] > 10) $arr[$i]['frecuenciaCambio']['otro']++;    
            $arr[$i]['registrosPorHora']++;
            if($arr[$i]['registrosPorHora'] < 60)
                $arr[$i]['recorridoPorHora'] = $arr[$i]['recorridoPorHora'] + getDistanceFromLatLonInKm($arr[$i]['datos'][$index]['lat'],$arr[$i]['datos'][$index]['lon'],$arr[$i]['datos'][$index+1]['lat'],$arr[$i]['datos'][$index+1]['lon']);
            
        }
        $arr[$i]['promedioLatPorHora'] = $arr[$i]['promedioLatPorHora']/$arr[$i]['registrosPorHora'];
        $arr[$i]['promedioLonPorHora'] = $arr[$i]['promedioLonPorHora']/$arr[$i]['registrosPorHora'];
        $arr[$i]['promedioRpmPorHora'] = $arr[$i]['promedioRpmPorHora']/$arr[$i]['registrosPorHora'];      
        $arr[$i]['promedioGFrontalPorHora'] = $arr[$i]['promedioGFrontalPorHora']/$arr[$i]['registrosPorHora'];
        $arr[$i]['promedioGTraseraPorHora'] = $arr[$i]['promedioGTraseraPorHora']/$arr[$i]['registrosPorHora'];
        $arr[$i]['promedioAFrontalPorHora'] = $arr[$i]['promedioAFrontalPorHora']/$arr[$i]['registrosPorHora'];
        $arr[$i]['promedioATraseraPorHora'] = $arr[$i]['promedioATraseraPorHora']/$arr[$i]['registrosPorHora'];
    }
    echo json_encode($arr);
    function generaArray() {
        $cam = array('primera' => 0,
                     'segunda' => 0,
                     'tercera' => 0,
                     'cuarta'  => 0,
                     'quinta'  => 0,
                     'sexta'   => 0,
                     'septima' => 0,
                     'octava'  => 0,
                     'novena'  => 0,
                     'decima'  => 0,
                     'otro'    => 0
                    );
        $est = array(
                        'promedioLatPorHora'                  => 0,
                        'promedioLonPorHora'                  => 0,
                        'promedioRpmPorHora'                  => 0,
                        'promedioGFrontalPorHora'             => 0,
                        'promedioGTraseraPorHora'             => 0,
                        'promedioAFrontalPorHora'             => 0,
                        'promedioATraseraPorHora'             => 0,
                        'frecuenciaMFuncionandoPorHora'       => 0,
                        'frecuenciaCambio'                    => $cam,
                        'recorridoPorHora'                    => 0,
                        'registrosPorHora'                    => 0,
                        'datos'                               => array()         
                    );
        $arr = array(0  => $est,
                     1  => $est,
                     2  => $est,
                     3  => $est,
                     4  => $est,
                     5  => $est,
                     6  => $est,
                     7  => $est,
                     8  => $est,
                     9  => $est);
        return $arr;
    }
    function separaDatosPorHora($con,$arr) {
        $qry = "SELECT datos.hora AS h, datos.latitud AS lat, datos.longitud AS lon, datos.motorFuncionando AS mFun, datos.rpm AS rpm,  datos.gradosPalaFrontal AS gpf, datos.gradosPalaTrasera AS gpt, datos.cambio AS cam, datos.alturaPalaFrontal AS apf, datos.alturaPalaTrasera AS apt
                FROM archivos
                LEFT JOIN datos ON archivos.idArchivo = datos.idArchivo
                WHERE archivos.idZona = 50
                AND archivos.fechaDatos = '0000-00-00'
                AND datos.identificador = 1
                ORDER BY datos.hora ASC";
        if($res = mysqli_query($con,$qry)) {
            while($row = mysqli_fetch_assoc($res)) {
                $hora = date_format(date_create($row['h']),'H:i:s');
                if(($hora >= date_format(date_create('08:00:00'),'H:i:s')) && ($hora <= date_format(date_create('08:59:00'),'H:i:s')))
                    array_push($arr[0]['datos'],array('h' => $hora, 'lat' => $row['lat'], 'lon' => $row['lon'], 'mFun' => $row['mFun'], 'rpm' => $row['rpm'] ,'gpf' => $row['gpf'], 'gpt' => $row['gpt'], 'cam' => $row['cam'] ,'apf' => $row['apf'], 'apt' => $row['apt']));
                if(($hora >= date_format(date_create('09:00:00'),'H:i:s')) && ($hora <= date_format(date_create('09:59:00'),'H:i:s')))
                    array_push($arr[1]['datos'],array('h' => $hora, 'lat' => $row['lat'], 'lon' => $row['lon'], 'mFun' => $row['mFun'], 'rpm' => $row['rpm'] ,'gpf' => $row['gpf'], 'gpt' => $row['gpt'], 'cam' => $row['cam'] ,'apf' => $row['apf'], 'apt' => $row['apt']));  
                if(($hora >= date_format(date_create('10:00:00'),'H:i:s')) && ($hora <= date_format(date_create('10:59:00'),'H:i:s')))
                    array_push($arr[2]['datos'],array('h' => $hora, 'lat' => $row['lat'], 'lon' => $row['lon'], 'mFun' => $row['mFun'], 'rpm' => $row['rpm'] ,'gpf' => $row['gpf'], 'gpt' => $row['gpt'], 'cam' => $row['cam'] ,'apf' => $row['apf'], 'apt' => $row['apt']));
                if(($hora >= date_format(date_create('11:00:00'),'H:i:s')) && ($hora <= date_format(date_create('11:59:00'),'H:i:s')))
                    array_push($arr[3]['datos'],array('h' => $hora, 'lat' => $row['lat'], 'lon' => $row['lon'], 'mFun' => $row['mFun'], 'rpm' => $row['rpm'] ,'gpf' => $row['gpf'], 'gpt' => $row['gpt'], 'cam' => $row['cam'] ,'apf' => $row['apf'], 'apt' => $row['apt']));
                if(($hora >= date_format(date_create('12:00:00'),'H:i:s')) && ($hora <= date_format(date_create('12:59:00'),'H:i:s')))
                    array_push($arr[4]['datos'],array('h' => $hora, 'lat' => $row['lat'], 'lon' => $row['lon'], 'mFun' => $row['mFun'], 'rpm' => $row['rpm'] ,'gpf' => $row['gpf'], 'gpt' => $row['gpt'], 'cam' => $row['cam'] ,'apf' => $row['apf'], 'apt' => $row['apt']));
                if(($hora >= date_format(date_create('13:00:00'),'H:i:s')) && ($hora <= date_format(date_create('13:59:00'),'H:i:s')))
                    array_push($arr[5]['datos'],array('h' => $hora, 'lat' => $row['lat'], 'lon' => $row['lon'], 'mFun' => $row['mFun'], 'rpm' => $row['rpm'] ,'gpf' => $row['gpf'], 'gpt' => $row['gpt'], 'cam' => $row['cam'] ,'apf' => $row['apf'], 'apt' => $row['apt']));
                if(($hora >= date_format(date_create('14:00:00'),'H:i:s')) && ($hora <= date_format(date_create('14:59:00'),'H:i:s')))
                    array_push($arr[6]['datos'],array('h' => $hora, 'lat' => $row['lat'], 'lon' => $row['lon'], 'mFun' => $row['mFun'], 'rpm' => $row['rpm'] ,'gpf' => $row['gpf'], 'gpt' => $row['gpt'], 'cam' => $row['cam'] ,'apf' => $row['apf'], 'apt' => $row['apt']));
                if(($hora >= date_format(date_create('15:00:00'),'H:i:s')) && ($hora <= date_format(date_create('15:59:00'),'H:i:s')))
                    array_push($arr[7]['datos'],array('h' => $hora, 'lat' => $row['lat'], 'lon' => $row['lon'], 'mFun' => $row['mFun'], 'rpm' => $row['rpm'] ,'gpf' => $row['gpf'], 'gpt' => $row['gpt'], 'cam' => $row['cam'] ,'apf' => $row['apf'], 'apt' => $row['apt']));
                if(($hora >= date_format(date_create('16:00:00'),'H:i:s')) && ($hora <= date_format(date_create('16:59:00'),'H:i:s')))
                    array_push($arr[8]['datos'],array('h' => $hora, 'lat' => $row['lat'], 'lon' => $row['lon'], 'mFun' => $row['mFun'], 'rpm' => $row['rpm'] ,'gpf' => $row['gpf'], 'gpt' => $row['gpt'], 'cam' => $row['cam'] ,'apf' => $row['apf'], 'apt' => $row['apt']));
                if(($hora >= date_format(date_create('17:00:00'),'H:i:s')) && ($hora <= date_format(date_create('17:59:00'),'H:i:s')))
                    array_push($arr[9]['datos'],array('h' => $hora, 'lat' => $row['lat'], 'lon' => $row['lon'], 'mFun' => $row['mFun'], 'rpm' => $row['rpm'] ,'gpf' => $row['gpf'], 'gpt' => $row['gpt'], 'cam' => $row['cam'] ,'apf' => $row['apf'], 'apt' => $row['apt']));
            }
        }
        return $arr;
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