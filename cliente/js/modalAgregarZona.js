$(document).ready(function() {
    $('.agregarZona').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('#idProyecto').val($(this).attr('id'));
        $('.modalAgregarZona').modal('show');
    });
    $('#btnAñadirZona').click(function(){
        var arreglo = new Array();
        var nombre = $('#nombreZona').val();
        var numberErrors = 0;
        if(isEmpty(nombre))
            arreglo.push('<li>El campo nombre es obigatorio</li>');
        if(maxLength(nombre))
            arreglo.push('<li>El campo nombre debe tener máximo 50 caracteres</li>');
        if(arreglo.length == 0) {
            var data = $('#formularioAgregarZona').serialize();
            var url = devuelveUrl('html/cliente/agregarZona.php');
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
                success: function(arreglo) {
                    if(arreglo.exito == 1) {
                        successMessage('Registro realizado con éxito','Serás redireccionado al panel de empresas');
                        location.reload();
                    }
                    else {
                        $('.message').html('<div class="ui warning message">'+arreglo.msg+'</div>');
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