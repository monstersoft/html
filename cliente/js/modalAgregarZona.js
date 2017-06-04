$(document).ready(function() {
    $('.agregarZona').click(function(){
        $('#idEmpresaAgregarZona').val($(this).attr('id'));
        $('.modalAgregarZona').modal();
    });
    $('#btnAñadirZona').click(function(){
        $('.alert').remove();
        var arreglo = new Array();
        var nombre = $('#nombreAgregarZona').val();
        var numberErrors = 0;
        if(isEmpty(nombre))
            arreglo.push('<li>El campo nombre es obigatorio</li>');
        if(maxLength(nombre,30))
            arreglo.push('<li>El campo nombre debe tener máximo 30 caracteres</li>');
        if(arreglo.length == 0) {
            var data = $('#formularioAgregarZona').serialize();
            var url = devuelveUrl('cliente/ajax/agregarZona.php');
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                  activarLoaderBotones('fa-plus','fa-refresh');
                },
                success: function(arreglo) {
                    console.log(JSON.stringify(arreglo));
                    if(arreglo.exito == 1) {
                        successMessage('Registro realizado con éxito','Serás redireccionado al panel de zonas');
                        $('.cancelar').remove();
                        $('#btnAñadirZona').remove();
                        setTimeout(function(){location.reload()}, 3000);
                    }
                    else {
                        $('.message').html('<div class="alert alert-warning"><ul>'+arreglo.msg+'</ul></div>');
                    }
                    $('#cancelar').removeClass('disabled');
                    $('#btnAñadirZona').removeClass('disabled loading');
                },
                complete: function() {
                    desactivarLoaderBotones('fa-pencil','fa-refresh');
                },
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