var exito = 0;
$('.desvincularSupervisor').click(function(){
    var ides = $(this).attr('id').split('-');
    $('#idZonaDesvincularSupervisor').val(ides[0]);
    $('#idSupervisorDesvincularSupervisor').val(ides[1]);
    $('.modalDesvincularSupervisor').modal();
});
$('.modalDesvincularSupervisor').on('click','#btnDesvincularSupervisor',function(){
    $('.alert').remove();
    $.ajax({
        url: devuelveUrl('cliente/ajax/desvincularSupervisor.php'),
        type: 'POST',
        data: $('#formularioDesvincularSupervisor').serialize(),
        dataType: 'json',
        cache: false,
        beforeSend: function() {
            
            activarLoaderBotones('fa-remove','fa-refresh');
        },
        success: function(arreglo) {
            if(arreglo.exito == 1) {
                successMessage('Desvinculación con éxito,',' se ha desvinculado al supervisor de la zona');
                $('#btnDesvincularSupervisor').remove();
                exito = 1;
            }
            else {
                $('.message').html('<div class="alert alert-warning"><ul>Error, debes comunicarte con el administrador del sistema</ul></div>');
            }
        },
        complete: function() {
            desactivarLoaderBotones('fa-plus','fa-refresh');
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
