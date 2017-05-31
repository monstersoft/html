<?php
    $a = array();
    $a['data']['labels'] = array('A','B','C','D','E','F','G','H','I','J');
    $a['data']['frontal'] = array(1,2,3,4,5,6,7,8,9,10);
    $a['data']['trasera'] = array(10,9,8,7,6,5,4,3,2,1);
    echo json_encode($a);
?>
