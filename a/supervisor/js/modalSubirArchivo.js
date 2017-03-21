$(document).ready(function() {
    $('.subirArchivo').click(function(){
        $('#idZonaSubirArchivo').val($(this).attr('id'));
        $('.modalSubirArchivo').modal();
        //fechaHoy();
    });
    $('#btnSubirArchivo').click(function(){
        var arreglo = new Array();
        var fecha = $('#fechaDatosSubirArchivo').val();
        var archivo = $('#archivoSubirArchivo').val();
        var idZona = $('#idZonaSubirArchivo').val();
        var numberErrors = 0;
        if(isEmpty(fecha)) {
            arreglo.push('<li>Fecha es obigatorio</li>');
        }
        if(extensions(archivo)) {
            arreglo.push('<li>Formato incorrecto de archivo</li>');
        }
        if(isEmpty(archivo)) {
            arreglo.push('<li>Archivo es obligatorio</li>');
        }
        if(isEmpty(idZona)) {
            arreglo.push('<li>Id zona es obligatorio</li>');
        }
        if(arreglo.length == 0) {
            var data = new FormData(document.getElementById('formularioSubirArchivo'));
            $.ajax({
                url: devuelveUrl('a/supervisor/ajax/subirArchivo.php'),
                type: 'POST',
                dataType: 'json',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                  activarLoaderBotones('fa-pencil','fa-refresh');
                },
                success: function(arreglo) {
                    console.log(JSON.stringify(arreglo));
                    /*if(arreglo.exito == 1) {
                        successMessage('Registro realizado con éxito','Serás redireccionado al panel de zonas');
                        $('.cancelar').remove();
                        $('#btnAñadirEmpresa').remove();
                        setTimeout(function(){location.reload()}, 3000);
                    }
                    else {
                        warningMessage(arreglo.msg);
                    }*/
                },
                complete: function() {
                    desactivarLoaderBotones('fa-pencil','fa-refresh');
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
