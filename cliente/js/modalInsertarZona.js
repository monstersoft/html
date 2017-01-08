$(document).ready(function() {
    $('.insertarZona').click(function(){
        var id = $(this).attr('id');
        $('#idEmpresaZona').val(id);
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('.modalInsertarZona').modal('show');
        var url = devuelveUrl('html/cliente/proyectos.php');
        $.ajax({
            url: url,
            type: 'POST',
            data: id,
            dataType: 'json',
            beforeSend: function() {
              $('#cancelar').addClass('disabled');
              $('#btnAñadir').addClass('disabled loading');
              //$('#modalInsertar').modal({transition: 'fly up'}).modal('hide');
            },
            success: function(returnedData) {
                alert(JSON.stringify(returnedData));
                /*if(returnedData.exito == 1) {
                    successMessage('Registro realizado con éxito','Serás redireccionado al panel de empresas');
                    location.reload();
                }
                else {
                    warningMessage(returnedData);
                }
                $('#cancelar').removeClass('disabled');
                $('#btnAñadir').removeClass('disabled loading');*/
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
    });
/*$('.menu').on('click','.insertarProyecto',function(){
    alert('j0lala');
});*/
    /*$('#btnAñadirProyecto').click(function(){
        var arreglo = new Array();
        var nombre = $('#nombreProyecto').val();
        var numberErrors = 0;
        if(isEmpty(nombre)) {
            arreglo.push('<li>El campo nombre es obigatorio</li>');
        }
        if(arreglo.length == 0) {
            var data = $('#formularioInsertarProyecto').serialize();
            var url = devuelveUrl('html/cliente/insertarEmpresa.php');
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
    });*/
});