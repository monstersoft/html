$(document).ready(function() {
    $('#btnConfirmar').click(function(){
        $('.message').html('');
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
                    $('#btnConfirmar').addClass('disabled');
                    $('#btnConfirmar').html('<i class="fa fa-cog fa-spin fa-2x fa-fw" style="color: white"></i>');
                },
                success: function(returnedData) {
                    console.log(JSON.stringify(returnedData));
                    if(returnedData.exito == 1) {
                        successMessage('Habilitación con éxito',returnedData.mensaje);
                    }
                    else {
                        oneWarningMessage(returnedData.mensaje);
                    }
                },
                error: function(xhr) {console.log(xhr.responseText);},
                complete: function() {
                    $('#btnConfirmar').removeClass('disabled');
                    $('#btnConfirmar').html('Confirmar');
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
            errorMessage(arreglo);
        }
    });
});
function redireccionar() {
    window.location="http://localhost/html/";
}