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
        if(arreglo.length == 0) {
            var data  = new FormData(document.getElementById('formularioSubirArchivo'));
            $.ajax({
                url: devuelveUrl('a/supervisor/ajax/subirArchivo.php'),
                type: 'POST',
                dataType: 'json',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {activarLoaderBotones('fa-upload','fa-refresh');},
                success: function(arreglo) {
                    $.each(arreglo,function(key,value){
                        var li = '';
                        li+= '<li>'+key+':'+value+'</li>';
                        $('.message').append(li);
                    });
                },
                complete: function() {desactivarLoaderBotones('fa-upload','fa-refresh');},
                error: function(xhr) {console.log(xhr.responseText)}
            });/*.fail(function( jqXHR, textStatus, errorThrown ){alert(textStatus);});*/
        }
        else {
            errorMessage(arreglo);
        }
    });  
});
