$('#btnReestablecer').click(function() {
    $('.ui .message').remove();
    var arreglo = new Array();
    var nueva = $('#nuevaContraseña').val();
    var confirmada = $('#contraseñaConfirmada').val();
    var celular = $('#telefono').val();
    var numberErrors = 0;
    if(isEmpty(nueva))
        arreglo.push('<div>Contreseña nueva es requerida</div>');
    if(maxMinValue(nueva, 12, 6))
        arreglo.push('<div>Contraseña nueva debe tener mínimo 6 y máximo 12</div>');
    if(isEmpty(confirmada))
        arreglo.push('<div>Confirmar contraseña es requerido</div>');
    if(maxMinValue(confirmada, 12, 6))
        arreglo.push('<div>Contraseña confirmada debe tener mínimo 6 y máximo 12</div>');
    if(celular) {
        if(isEmpty(celular))
            arreglo.push('<div>Celular es requerido</div>');
        if(isExactly(celular))
            arreglo.push('<div>Celular debe tener 9 dígitos</div>');
        if(isNumber(celular))
            arreglo.push('<div>Celular no es un número o no está en un formato adecuado</div>');
    }
    if(areEqual(nueva,confirmada))
        arreglo.push('<div>Las contraseña no son iguales</div>');
    if(arreglo.length == 0) {
        $.ajax({                  
            url: devuelveUrl('ajax/validaReinicio.php'),
            data: $('#formularioReinicio').serialize(),
            type: "POST",
            dataType: "json",
            beforeSend: function() {
                $('#btnReestablecer').addClass('disabled');
                $('#btnReestablecer').html('<i class="fa fa-cog fa-spin fa-2x fa-fw" style="color: white"></i>');
            },
            cache: false,
            success: function(arreglo) {
                if(arreglo.exito == true)  
                    successUi('<div class="item text-center">Se ha reestablecido tu contraseña correctamente, <a href="http://localhost/html">haz click aquí para ir a inicio de sesión</a></div>');
                else
                    errorUi('<div class="item">Error, debes comunicarte con el administrador del sistema</div>');
            },
            error: function(xhr) {console.log(xhr.responseText);}
        }).complete(function(){
            $('#btnReestablecer').removeClass('disabled');
            $('#btnReestablecer').html('Enviar correo');
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
        errorUi(arreglo);
});