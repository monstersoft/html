$(document).ready(function() {
    $('.agregarSupervisor').click(function(){
        //$('#idEmpresaAgregarZona').val($(this).attr('id'));
        //$("#zonasAsociadas").dropdown('clear');
        //$("#zonasAsociadas").find("option[class='dinamico']").remove();
        var id = $('#hola').val();
        var url = devuelveUrl('a/cliente/ajax/datosZonas.php');
        $.ajax({
                url: url,
                type: 'POST',
                data: {id: id},
                dataType: 'json',
                success: function(arreglo) {
                    console.log(JSON.stringify(arreglo));
                    var opciones = '';
                    $.each(arreglo,function(index) {
                        opciones += '<option style=""class="dinamico" value='+arreglo[index].idZona+'>'+arreglo[index].nombre+'</option>';
                    });
                    $('#zonasAsociadas').append(opciones);
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
        $('.modalAgregarSupervisor').modal();
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