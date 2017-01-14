<<<<<<< HEAD
<html>  
<head>  
<title>Lista de clientes.</title>  
</head>  

<body>  
<!-- A través de la variable id enviamos el valor 324 --> 

Javier Rodriguez -- <a href="b.php?id=324">Ver ficha del cliente</a> 

</body> 
</html> 
=======
<?php 
$paises = $_POST['country']; 
if(is_array($paises)) {
        $t = sizeof($paises);
        $arreglo['mensaje'] = 'Es un array de tamanho: '.$t;
    }
else 
    $arreglo['mensaje'] = 'No es un array';
echo json_encode($arreglo);
?>
>>>>>>> origin/master
