$(document).ready(function() {
    $('.subirArchivo').click(function(){
        //$('#idZonaArchivo').val($(this).attr('id'));
        $('.modalSubirArchivo').modal({autofocus: false}).modal('show');
        fechaHoy();
    });
    $('#btnSubirArchivo').click(function(){
        var arreglo = new Array();
        var fecha = $('#fechaDatos').val();
        var archivo = $('#archivoZonaText').val();
        var idZona = $('#idZonaArchivo').val();
        var numberErrors = 0;
        if(isEmpty(fecha)) {
            arreglo.push('<li>Fecha es obigatorio</li>');
        }
        if(isEmpty(archivo)) {
            arreglo.push('<li>Archivo es obligatorio</li>');
        }
        if(isEmpty(idZona)) {
            arreglo.push('<li>Id zona es obligatorio</li>');
        }
        if(arreglo.length == 0) {
            var data = new FormData(document.getElementById('formularioSubirArchivo'));
            var url = devuelveUrl('html/supervisor/subirArchivo.php');
            $.ajax({
                url: 'subirArchivo.php',
                type: 'POST',
                dataType: 'json',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                  $('#cancelar').addClass('disabled');
                  $('#btnSubirArchivo').addClass('disabled loading');
                  //$('#modalInsertar').modal({transition: 'fly up'}).modal('hide');
                },
                success: function(arreglo) {
                    alert(JSON.stringify(arreglo));
                    $('#cancelar').removeClass('disabled');
                    $('#btnSubirArchivo').removeClass('disabled loading');
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
        }
        else {
            errorMessage(arreglo);
        }
    });
    
});
