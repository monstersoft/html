$(document).ready(function() {
    $('#btnReestablecer').click(function(){
        $('.ui .message').remove();
        var arreglo = new Array();
        var nueva = $('#nuevoPassword').val();
        var confirmar = $('#confirmarPassword').val();
        var telefono = $('#telefono').val();
        var numberErrors = 0;
        if(isEmpty(nueva)) {
            arreglo.push('<li>La nueva constraseña es obigatoria</li>');
        }
        if(isEmpty(confirmar)) {
            arreglo.push('<li>Debes confirmar la contraseña</li>');
        }
        if(isEmpty(telefono)) {
            arreglo.push('<li>El teléfono es obligatorio</li>');
        }
        if(isExactly(telefono)) {
            arreglo.push('<li>El teléfono debe tener 9 números</li>');
        }
        if(isNumber(telefono)) {
            arreglo.push('<li>El teléfono no es correcto</li>');
        }
        if(areEqual(nueva,confirmar)) {
            arreglo.push('<li>Las contraseñas no coinciden</li>');
        }
        if(maxLength(nueva,12)) {
            arreglo.push('<li>Contraseña nueva deber tener máximo 12 caracteres</li>');
        }
        if(maxLength(confirmar,12)) {
            arreglo.push('<li>Contraseña confirmada debe tener máximo 12 caracteres</li>');
        }
        if(minLength(nueva)) {
            arreglo.push('<li>Contraseña nueva deber tener mínimo 6 caracteres</li>');
        }
        if(minLength(confirmar)) {
            arreglo.push('<li>Contraseña confirmada deber tener mínimo 6 caracteres</li>');
        }
        if(arreglo.length == 0) {
            var data = $('#formularioConfirmarSupervisor').serialize();
            var url = devuelveUrl('supervisor/ajax/habilitarRegistro.php');
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'json',
                beforeSend: function() {
                    $('#btnReestablecer').addClass('disabled');
                    $('#btnReestablecer i').removeClass('fa-address-book').addClass('fa-cog fa-spin');
                },
                success: function(returnedData) {
                    if(returnedData.exito == 1) {
                        successUi('Registro activado con éxito','haz click <strong><a href="'+raiz()+'">AQUÍ</a></strong> para ir a inicio de sesión.');
                    }
                    else {
                        errorUi('<div class="item">'+returnedData.mensaje+'</div>');
                    }
                },
                error: function(xhr) {console.log(xhr.responseText);},
                complete: function() {
                    $('#btnReestablecer').removeClass('disabled');
                    $('#btnReestablecer i').removeClass('fa-cog fa-spin').addClass('fa-address-book');
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
            });
        }
        else {
            errorUi(arreglo);
        }
    });
});
