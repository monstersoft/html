$(document).ready(function(){
    $('.editarEmpresa').click(function(){
        var id =  $(this).attr('id');
        var url = devuelveUrl('html/cliente/datosEmpresa.php');
        $.ajax({
            url: url,
            type: 'POST',
            data: {idEmpresa: id},
            dataType: 'json',
            success: function(arreglo) {
                $('#idEditar').val(arreglo.idEmpresa);
                $('#nombreEditar').val(arreglo.nombre);
                $('#rutEditar').val(arreglo.rut);
                $('#emailEditar').val(arreglo.correo);
                $('#telefonoEditar').val(arreglo.telefono);
                $('#direccionEditar').val(arreglo.direccion);
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
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.modalEditarEmpresa').modal('show');
    });
    /*$('#btnEditarEmpresa').click(function(){
        var arreglo = new Array();
        $('#nombreEditar').on('change',function(){
            alert('Cambió el nombre');
        });*/
        /*var arreglo = new Array();
        var id = $('#idEditar').val();
        var nombre = $('#nombreEditar').val();
        var rut = $('#rutEditar').val();
        var email = $('#emailEditar').val();
        var telefono = $('#telefonoEditar').val();
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
        if(isRutEditar()) {
            arreglo.push('<li>Formato no adecuado de rut o no es válido</li>');
        }
        if(arreglo.length == 0) {
            var data = $('#formularioEditarEmpresa').serialize();
            var url = devuelveUrl('html/cliente/editarEmpresa.php');
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'json',
                beforeSend: function() {
                  $('#cancelar').addClass('disabled');
                  $('#btnEditarEmpresa').addClass('disabled loading');
                  //$('#modalInsertar').modal({transition: 'fly up'}).modal('hide');
                },
                success: function(returnedData) {
                    if(returnedData.exito == 1) {
                        successMessage('Edición realizada con éxito','Serás redireccionado al panel de empresas');
                        location.reload();
                    }
                    else {
                        warningMessage(returnedData);
                    }
                    $('#cancelar').removeClass('disabled');
                    $('#btnEditarEmpresa').removeClass('disabled loading');
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
        }*/
});