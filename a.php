<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    </head>
    <body>
        <form method="POST" id="formulario" enctype="multipart/form-data">
            <input type="file" name="archivo">
            <input type="submit" value="enviar" id="subir">
        </form>
        <script src="js/jquery2.js"></script>
        <script>
            $(document).on('ready', function(){
                var formData = new FormData(('#formulario')[0]);
                $('#subir').click(function(){
                    $.ajax({
                        url: 'b.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(arreglo) {
                            alert(arreglo);
                        }
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
            });
        </script>
    </body>
</html>