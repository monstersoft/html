$('body').on('click','#btnVolverCambiarContraseña',function() {
    $('#formularioCambiarPassword')[0].reset();
    $('.alert').remove();
    $(this).removeClass('btn-success').html('<i class="cargar fa fa-refresh"></i> Cambiar').attr('id','btnCambiarContraseña');
});
$('body').on('click','#btnCambiarContraseña',function() {
    $('.alert').remove();
    var arreglo = new Array();
    var actual = $('#actualPass').val();
    var nueva = $('#nuevaPass').val();
    var confirmada = $('#confirmadaPass').val();
    var numberErrors = 0;
    if(isEmpty(actual))
        arreglo.push('<li>Contreseña actual es requerida</li>');
    if(isEmpty(nueva))
        arreglo.push('<li>Contreseña nueva es requerida</li>');
    if(isEmpty(confirmada))
        arreglo.push('<li>Tienes que confirmar la contraseña nueva</li>');
    if(maxMinValue(actual, 12, 6))
        arreglo.push('<li>Contraseña actual debe tener mínimo 6 y máximo 12</li>');
    if(maxMinValue(nueva, 12, 6))
        arreglo.push('<li>Contraseña nueva debe tener mínimo 6 y máximo 12</li>');
    if(maxMinValue(confirmada, 12, 6))
        arreglo.push('<li>Contraseña confirmada debe tener mínimo 6 y máximo 12</li>');
    if(areEqual(nueva,confirmada))
        arreglo.push('<li>Contraseña nueva y confirmada no son iguales</li>');
    if(arreglo.length == 0) {
        $.ajax({                  
            url: devuelveUrl('supervisor/ajax/cambiarContrasena.php'),
            data: $('#formularioCambiarPassword').serialize(),
            type: "POST",
            dataType: "json",
            beforeSend: function() {
                activarLoaderBotones('fa-refresh','fa-refresh');
            },
            cache: false,
            success: function(arreglo) {
                if(arreglo.exito == true) {
                    successMessage('Actualización con éxito, ','se ha cambiado tu contraseña en el sistema');
                    $('#btnCambiarContraseña').addClass('btn-success').html('<i class="cargar fa fa-repeat"></i>  Volver a cambiar').attr('id','btnVolverCambiarContraseña');
                }
                else
                    warningMessage('La contraseña actual no coincide con tu correo');
            },
            error: function(xhr) {console.log(xhr.responseText);}
        }).complete(function(){
            desactivarLoaderBotones('fa-refresh','fa-refresh');
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