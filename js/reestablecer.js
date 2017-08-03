$('#btnReestablecer').click(function() {
    $('.ui .message').remove();
    var arreglo = new Array();
    var email = $('#txtCorreo').val();
    var numberErrors = 0;
    if(isEmpty(email))
        arreglo.push('<div class="item">Correo es requerido</div>');
    if(isMail(email))
        arreglo.push('<div class="item">Correo no está en un  formado adecuado</div>');
    if(maxLength(email, 60))
        arreglo.push('<div class="item">Correo no debe superar los 60 caracteres</div>');
    if(arreglo.length == 0) {
        $.ajax({                  
            url: devuelveUrl('ajax/generaLink.php'),
            data: {txtCorreo: $('#txtCorreo').val()},
            type: "POST",
            dataType: "json",
            cache: false,
            beforeSend: function() {
                $('#btnReestablecer').addClass('disabled');
                $('#btnReestablecer i').removeClass('fa-send').addClass('fa-cog fa-spin');
            },
            success: function(arreglo) {
                if(arreglo.exito == true) {
                    if(arreglo.mailEnviado == true)
                        successUi('Envío de mail con éxito','Debes revisar tu correo electrónico para reestablecer tu contraseña');
                    else
                        errorUi('<div class="item">El correo no pudo ser enviado, debes comunicarte con el administrador dele sistema o verificar tu conexión</div>');
                }
                else
                    errorUi('<div class="item">El correo no está registrado en el sistema</div>');
            },
            error: function(xhr) {console.log(xhr.responseText);}
        }).complete(function(){
            $('#btnReestablecer').removeClass('disabled');
            $('#btnReestablecer i').removeClass('fa-cog fa-spin').addClass('fa-send');
        }).fail(function( jqXHR, textStatus, errorThrown ){
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
            if (jqXHR.status === 0){
                alert('No hay conección con el servidor, debe comunicarte con el administrador');
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
        errorUi(arreglo);
});
