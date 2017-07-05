var exito = 0;
$('.eliminarEmpresa').click(function(){
    $('#idEliminarEmpresa').val($(this).attr('id'));
    $('.modalEliminarEmpresa').modal();
});
$('#btnEliminarEmpresa').click(function(){
    $('.alert').remove();
    var data = $('#formularioEliminarEmpresa').serialize();
    var url = devuelveUrl('cliente/ajax/eliminarEmpresa.php');
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        dataType: 'json',
        cache: false,
        beforeSend: function() {activarLoaderBotones('fa-trash','fa-refresh');},
        success: function(arreglo) {
            console.log(JSON.stringify(arreglo));
            if(arreglo.exito == 1) {
                successMessage('Eliminación con éxito, ','se ha eliminado la empresa y todos los datos asociados a ella');
                $('#btnEliminarZona').remove();
                exito = 1;
            }
            else
                warningMessage('Error, debes comunicarte con el administrador del sistema');
        },
        complete: function() {
            desactivarLoaderBotones('fa-trash','fa-refresh');
        },
        error: function(xhr) {console.log(xhr.responseText);}
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