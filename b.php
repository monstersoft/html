<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
    <button id="container" value="Llamar ajax">Lllamar ajax</button>
    <div id="response-container">
        The returned data will appear here..
    </div>
	<script src="js/jquery2.js"></script>
	<script>
        $(document).ready(function(){
            $('#container').click(function(){ 
            var json = 
            [{
                id: 1 
            },{
                nombre: {original: '',modificado: '',cambio: false}
            },{
                rut: {original: '',modificado: '',cambio: false}
            },{
                correo: {original: '',modificado: '',cambio: false}
            },{
                telefono: {original: 0,modificado: 0,cambio: false}
            }]
            alert()
            $.ajax({
                    url : 'a.php',
                    type: 'POST',
                    data:{datos: json },
                    success: function(arreglo) {   
                        $('#response-container').html(arreglo);
                    }
            });
            });
        });
	</script>
</body>
</html>