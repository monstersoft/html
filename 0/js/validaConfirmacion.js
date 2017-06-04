$(document).ready(function() {
    $('#btnConfirmar').click(function(){
        $('.message').html('');
        $('.messageError').html('');
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
        if(maxLength(nueva)) {
            arreglo.push('<li>Contraseña nueva deber tener mínimo 12 caractéres</li>');
        }
        if(maxLength(confirmar)) {
            arreglo.push('<li>Contraseña confirmada debe tener mínimo 12 caractéres</li>');
        }
        if(minLength(nueva)) {
            arreglo.push('<li>Contraseña nueva deber tener mínimo 6 caracteres</li>');
        }
        if(minLength(confirmar)) {
            arreglo.push('<li>Contraseña confirmada deber tener mínimo 6 caracteres</li>');
        }
        console.log(arreglo.length);
        if(arreglo.length == 0) {
            var data = $('#formularioConfirmarSupervisor').serialize();
            var url = devuelveUrl('html/php/habilitarSupervisor.php');
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'json',
                beforeSend: function() {
                  $('#btnConfirmar').addClass('disabled loading');
                },
                success: function(returnedData) {
                    if(returnedData.exito == 1) {
                        $('.carga').html('<div style="background: #262626;border-right: 10px solid #F5A214;border-left: 10px solid #F5A214;" class="ui icon message"><i class="fa fa-cog fa-spin fa-2x fa-fw" style="color: white"></i><div style="color: white" class="content"><div class="header">Confirmación exitosa !</div><p>Serás redireccionado a inicio de sesión en 5 seg ...</p></div></div>');
                        setTimeout('redireccionar()', 5000);
                    }
                    else {
                        alert('fallo');
                    }
                    $('#btnConfirmar').removeClass('disabled loading');
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