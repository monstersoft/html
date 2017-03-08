$(document).ready(function() {
    $('.insertarEmpresa').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('.modalInsertarEmpresa').modal('show');
    });
    $('#btnAñadirEmpresa').click(function(){
        var arreglo = new Array();
        var nombre = $('#nombre').val();
        var rut = $('#rut').val();
        var email = $('#email').val();
        var telefono = $('#telefono').val();
        var numberErrors = 0;
        if(isEmpty(nombre)) {
            arreglo.push('<li>El campo nombre es obigatorio</li>');
        }
        if(isEmpty(rut)) {
            arreglo.push('<li>El campo rut es obigatorio</li>');
        }
        if(isEmpty(email)) {
            arreglo.push('<li>El campo correo es obigatorio</li>');
        }
        if(isEmpty(telefono)) {
            arreglo.push('<li>El campo teléfono es obigatorio</li>');
        }
        if(isMail(email)) {
            arreglo.push('<li>Formato erróneo de correo electrónico</li>');
        }
        if(isExactly(telefono)) {
            arreglo.push('<li>El teléfono debe tener 9 dígitos</li>');
        }
        if(isNumber(telefono)) {
            arreglo.push('<li>El teléfono no es un número o no está en un formato adecuado</li>');
        }
        if(isRut(rut)) {
            arreglo.push('<li>Formato no adecuado de rut o no es válido</li>');
        }
        if(arreglo.length == 0) {
            var data = $('#formularioInsertarEmpresa').serialize();
            //devuelveUrl(pathSinCarpetaRaiz);
            var url = devuelveUrl('/cliente/insertarEmpresa.php');
            alert(url);
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'json',
                beforeSend: function() {
                  $('#cancelar').addClass('disabled');
                  $('#btnAñadir').addClass('disabled loading');
                  //$('#modalInsertar').modal({transition: 'fly up'}).modal('hide');
                },
                success: function(returnedData) {
                    if(returnedData.exito == 1) {
                        successMessage('Registro realizado con éxito','Serás redireccionado al panel de empresas');
                        location.reload();
                    }
                    else {
                        warningMessage(returnedData);
                    }
                    $('#cancelar').removeClass('disabled');
                    $('#btnAñadir').removeClass('disabled loading');
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
