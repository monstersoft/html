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
                if(arreglo.success == true) {
                    successMessage('Subida exitosa, ','se han subido los datos a la base de datos');
                    $('#btnSubirArchivo').removeClass('btn-primary').addClass('btn-success').attr('id','btnVolverSubir').html('<i class="fa fa-repeat"></i>Volver a subir');
                    $('#btnSubirArchivo').remove();
                }
                else
                    warningMessage(arreglo.msg);
            },
            complete: function() {desactivarLoaderBotones('fa-upload','fa-refresh');},
            error: function(xhr) {console.log(xhr.responseText)}
        });
    }
    else {
        errorMessage(arreglo);
    }
});  

