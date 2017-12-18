<?php
    $arr['nameDateMatch'] = nameDateMatch($file['name'],$dateData,$arr['msg']);
    $arr['isCsv'] = isCsv($file['type'], $arr['msg']);
    while ($d = fgetcsv($file2,150,";")) {
        if($info['firstCsvRow'] == true)
            generateQueryStringAndFileContent($arr['idFileGenerate'],null,null,null,null,null,null,null,null,null,null,null,$info,$fileContent,$d[0]);
        else
            generateQueryStringAndFileContent($arr['idFileGenerate'],$d[0],$d[1],$d[2],$d[3],$d[4],$d[5],$d[6],$d[7],$d[8],$d[9],$d[10],$info,$fileContent,$d[0]);
    }
    function isCsv($fileType,&$msg) {
        if($fileType == 'application/vnd.ms-excel' or $fileType == 'text/comma-separated-values') return true;
        else {
            $msg[] = 'El archivo no está en formato CSV';
            return false;
        }
    }
?>