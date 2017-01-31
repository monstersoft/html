$(document).ready(function() {
    $('.agregarSupervisor').click(function(){
        var id = $(this).attr('id');
        var url = devuelveUrl('html/cliente/zonas.php');
        $("#zonasAsociadas").dropdown('clear');
        $("#zonasAsociadas").find("option[class='dinamico']").remove();
        $.ajax({
                url: url,
                type: 'POST',
                data: {idProyecto: id},
                dataType: 'json',
                success: function(returnedData) {
                    var option = '';
                    returnedData.forEach(function(element,index){
                            option += '<option class="dinamico" value='+returnedData[index].idZona+'>'+returnedData[index].nombre+'</option>';
                        });
                    $('#zonasAsociadas').append(option);
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
        $('.ui.icon.success.message').remove();
        $('#idZonaSupervisor').val(id);
        $('.modalAgregarSupervisor').modal('show');
    });
    $('#btnAñadirSupervisor').click(function(){
        var arreglo = new Array();
        var nombre = $('#nombreSupervisor').val();
        var email = $('#correoSupervisor').val();
        var numberErrors = 0;
        if(isEmpty(nombre)) {
            arreglo.push('<li>El campo nombre es obigatorio</li>');
        }
        if(isEmpty(email)) {
            arreglo.push('<li>El campo correo es obigatorio</li>');
        }
        if(isMail(email)) {
            arreglo.push('<li>Formato erróneo de correo electrónico</li>');
        }
        if($('#zonasAsociadas').val() == null || $('#zonasAsociadas').val() == "") {
            arreglo.push('<li>Tienes que seleccionar al menos una zona</li>');
        }
        if(arreglo.length == 0) {
            var data = $('#formularioAgregarSupervisor').serialize();
            var url = devuelveUrl('html/cliente/agregarSupervisor.php');
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'json',
                beforeSend: function() {
                  $('#cancelar').addClass('disabled');
                  $('#btnAñadirSupervisor').addClass('disabled loading');
                  //$('#modalInsertar').modal({transition: 'fly up'}).modal('hide');
                },
                success: function(returnedData) {
                    if(returnedData.exito == 1) {
                        successMessage('Registro realizado con éxito','Serás redireccionado al panel');
                        location.reload();
                    }
                    else {
                        warningMessage(returnedData);
                    }
                    $('#cancelar').removeClass('disabled');
                    $('#btnAñadirSupervisor').removeClass('disabled loading');
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