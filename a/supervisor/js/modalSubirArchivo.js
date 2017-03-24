$(document).ready(function() {
    /*$('.subirArchivo').click(function(){
        $('#idZonaSubirArchivo').val($(this).attr('id'));
        $('.modalSubirArchivo').modal();
        //fechaHoy();
    });*/
    $('#btnSubirArchivo').click(function(){
        var arreglo = new Array();
        var fecha = $('input[name=fechaDatos]').val();
        var archivo = $('#archivoSubirArchivo').val();
        var idZona = $('#idZonaSubirArchivo').val();
        var idSupervisor = $('#idSupervisorSubirArchivo').val();
        var numberErrors = 0;
        if(isEmpty(fecha))
            arreglo.push('<li>Fecha es obigatorio</li>');
        if(extensions(archivo))
            arreglo.push('<li>Formato incorrecto de archivo</li>');
        if(isEmpty(archivo))
            arreglo.push('<li>Archivo es obligatorio</li>');
        if(isEmpty(idZona))
            arreglo.push('<li>Id zona es obligatorio</li>');
        if(isEmpty(idSupervisor))
            arreglo.push('<li>Id supervisor es obligatorio</li>');
        if(nameMatchSplit(archivo,fecha).match == true)
           arreglo.push(nameMatchSplit(archivo,fecha).msg);
       console.log(nameMatchSplit(archivo,fecha).match);
        console.log(JSON.stringify(nameMatchSplit(archivo,fecha)));
        if(arreglo.length == 0) {
            console.log('asdasd');
            /*$.ajax({
                //url: devuelveUrl('a/supervisor/ajax/subirArchivo.php'),
                url: 'subirArchivo.php',
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
            });*/
        }
    else {
        errorMessage(arreglo);
    }
    });
    
});
