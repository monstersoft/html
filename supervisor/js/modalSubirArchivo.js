$(document).ready(function() {
    $('.subirArchivo').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('#formularioSubirArchivo').trigger("reset");
        $('#idZonaArchivo').val($(this).attr('id'));
        $('.modalSubirArchivo').modal({autofocus: false}).modal('show');
        fechaHoy();
    });
    $('#btnSubirArchivo').click(function(){
            var data = $('#formularioSubirArchivo').serialize();
            var archivo = new FormData();
            var url = devuelveUrl('html/supervisor/subirArchivo.php');
            alert(data);
            $.ajax({
                url: url,
                type: 'POST',
                data: {datos: data, file: archivo},
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: function() {
                  $('#cancelar').addClass('disabled');
                  $('#btnAñadir').addClass('disabled loading');
                  //$('#modalInsertar').modal({transition: 'fly up'}).modal('hide');
                },
                success: function(arreglo) {
                    alert(JSON.stringify(arreglo));
                    /*
                    if(arreglo.exito == 1) {
                        successMessage('Registro realizado con éxito','Serás redireccionado al panel de empresas');
                        location.reload();
                    }
                    else {
                        alert(JSON.stringify(arreglo));
                        $('.message').html('<div class="ui warning message">'+arreglo.msg+'</div>');
                    }
                    $('#cancelar').removeClass('disabled');
                    $('#btnAñadir').removeClass('disabled loading');
                    */
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