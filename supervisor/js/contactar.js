$('.message').html(devuelveUrl('supervisor/ajax/cambiarContrasena.php'));
$('body').on('click','#btnVolverEnviar',function() {
    $('#formularioEnviar')[0].reset();
    $('.alert').remove();
    $(this).removeClass('btn-success').html('<i class="cargar fa fa-send"></i> Enviar').attr('id','btnEnviar');
});
$('body').on('click','#btnEnviar',function() {
    $('.alert').remove();
    var arreglo = new Array();
    var mensaje = $('#mensaje').val();
    var numberErrors = 0;
    if(isEmpty(mensaje))
        arreglo.push('<li>Mensaje es requerido</li>');
    if(maxLength(mensaje, 1000))
        arreglo.push('<li>Mensaje debe tener máximo 1000 caracteres</li>');
    if(arreglo.length == 0) {
        console.log(mensaje.length);
        $.ajax({                  
            url: devuelveUrl('supervisor/ajax/contactar.php'),
            data: $('#formularioEnviar').serialize(),
            type: "POST",
            dataType: "json",
            beforeSend: function() {
                activarLoaderBotones('fa-send','fa-refresh');
            },
            cache: false,
            success: function(arreglo) {
                console.log(JSON.stringify(arreglo));
                if(arreglo.exito == true) {
                    successMessage('Mensaje enviado, ','el administrador se contactará a la brevedad');
                    $('#btnEnviar').addClass('btn-success').html('<i class="cargar fa fa-repeat"></i>  Volver a enviar').attr('id','btnVolverEnviar');
                }
                else
                    warningMessage('Error al enviar el mensaje');
            },
            error: function(xhr) {console.log(xhr.responseText);}
        }).complete(function(){
            desactivarLoaderBotones('fa-send','fa-refresh');
        }).fail(function( jqXHR, textStatus, errorThrown ){
            if (jqXHR.status === 0){
                alert('No hay coneccion con el servidor, debe comunicarte con el administrador');
            } else if (jqXHR.status == 404) {
                alert('La pagina solicitada no fue encontrada: error 404, debes comunicarte con el administrador');
            } else if (jqXHR.status == 500) {
                alert('Error interno del servidor, debes comunicarte con el administrador');
            } else if (textStatus === 'parsererror') {
                alert('Error en la respuesta JSON, debes comunicarte con el administrador');
            } else if (textStatus === 'timeout') {
                alert('Se ha excedido el tiempo de respuesta, debes comunicarte con el administrador');
            } else if (textStatus === 'abort') {
                alert('La peticion fue abortada, debes comunicarte con el administrador');
            } else {
                alert('Error desconocido, debes comunicarte con el administrador');
            }
        });
    }
    else
        errorMessage(arreglo);
});