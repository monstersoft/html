$('.modalSubirArchivo').on('click','#btnVolverSubir',function(){
    $('#formularioSubirArchivo')[0].reset();
    fechaHoy();
    $('.alert').remove();
    $('#btnVolverSubir').removeClass('btn-success').addClass('btn-primary').attr('id','btnSubirArchivo').html('<i class="cargar fa fa-upload"></i>Subir');
});
$('.subirArchivo').click(function(){
    $('#idZonaSubirArchivo').val($(this).attr('id'));
    $('#idSupervisorSubirArchivo').val($('#idSupervisor').val());
    $('.modalSubirArchivo').modal();
    fechaHoy();
});
$('.modalSubirArchivo').on('click','#btnSubirArchivo',function(){
    $('.alert').remove();
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
        console.log(devuelveUrl('supervisor/ajax/subirArchivo.php'));
        $.ajax({
            url: devuelveUrl('supervisor/ajax/subirArchivo.php'),
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {activarLoaderBotones('fa-upload','fa-refresh');},
            success: function(arreglo) {
                console.log(JSON.stringify(arreglo));
                alert(arreglo.fileInfo);
                if(arreglo.success == true) {
                    successMessage('Subida exitosa, ','se han subido los datos a la base de datos');
                    $('#btnSubirArchivo').removeClass('btn-primary').addClass('btn-success').attr('id','btnVolverSubir').html('<i class="fa fa-repeat"></i>Subir otro');
                    $('#btnSubirArchivo').remove();
                }
                else
                    warningMessage(arreglo.msg);
            },
            complete: function() {desactivarLoaderBotones('fa-upload','fa-refresh');},
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
    }
    else {
        errorMessage(arreglo);
    }
});  

