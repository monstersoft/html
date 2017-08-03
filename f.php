<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form id="formularioSubirArchivo" enctype="multipart/form-data">
        <input type="file" name="archivo">
        <input type="button" value="aer" id="btnSubirArchivo">
    </form>
    <script src="recursos/jquery/jquery.min.js"></script>
    <script>
var data  = new FormData(document.getElementById('formularioSubirArchivo'));
$('#btnSubirArchivo').click(function(){
        var data  = new FormData(document.getElementById('formularioSubirArchivo'));
        $.ajax({
            url: 'a.php',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(arreglo) {
                $('body').append(JSON.stringify(arreglo));
            },
            error: function(xhr) {console.log(xhr.responseText)}
        }).fail(function( jqXHR, textStatus, errorThrown ){
            if (jqXHR.status === 0){
                alert('No hay coneccion con el servidor');
            } else if (jqXHR.status == 404) {
                alert('La pagina solicitada no fue encontrada, error 404');
            } else if (jqXHR.status == 500) {
                alert('Error interno del servidor');
            } else if (textStatus === 'parsererror') {
                alert('Error en la respuesta, debes analizar la sintaxis JSON');
            } else if (textStatus === 'timeout') {
                alert('Ya ha pasado mucho tiempo');
            } else if (textStatus === 'abort') {
                alert('La peticion fue abortada');
            } else {
                alert('Error desconocido');
            }
        });
});
    </script>
</body>
</html>