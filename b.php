<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<a href="#" class="modalEditarEmpresa">Click!</a>
	<script src="js/jquery2.js"></script>
	<script>
$(document).ready(function(){
    $('.modalEditarEmpresa').click(function(){
    		var datos = {"userName":"654321@zzzz.com","password":"12345","emailProvider":"zzzz"}
            $.ajax({
                url: 'a.php',
                type: 'POST',
                data: datos,
                dataType: 'json',
                success: function(arreglo) {
                    console.log(JSON.stringify(arreglo.mensaje));
                }
            }).fail(function( jqXHR, textStatus, errorThrown ){
            if (jqXHR.status === 0){
                alert('No hay coneccion con el servidor');
            } else if (jqXHR.status == 404) {
                alert('La pagina solicitada no fue encontrada, error 404');
            } else if (jqXHR.status == 500) {
                alert('Error interno del servidor');
            } else if (textStatus === 'parsererror') {
                alert('Error en la respuesta, debes analizar la sintaxis JSOsssN');
            } else if (textStatus === 'timeout') {
                alert('Ya ha pasado mucho tiempo');
            } else if (textStatus === 'abort') {
                alert('La peticion fue abortada');
            } else {
                alert('Error desconocido');
            }
        });
    });
});

	</script>
</body>
</html>