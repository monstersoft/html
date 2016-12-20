$(document).ready(function(){
    var data = {
        id: 0,
        nombre: [{original: ''},{modificado: ''},{cambio: false}],
        rut: [{original: ''},{modificado: ''},{cambio: false}],
        correo: [{original: ''},{modificado: ''},{cambio: false}],
        telefono: [{original: 0},{modificado: 0},{cambio: false}]
    }
    function retornaDatos(id,url) {
        return $.ajax({
            url: url,
            type: 'POST',
            data: {idEmpresa: id},
            dataType: 'json',
            success: function(arreglo){
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
    }
    $('.editarEmpresa').click(function(){
        var url = devuelveUrl('html/cliente/datosEmpresa.php');
        var id = $(this).attr('id');
        var datos = retornaDatos(id,url);
        datos.success(function(respuesta){
            data.id = respuesta.idEmpresa;
            data.nombre.original = respuesta.nombre;
            data.rut.original = respuesta.rut;
            data.correo.original = respuesta.correo;
            data.telefono.original = respuesta.telefono;
        });
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.modalEditarEmpresa').modal('show');
    });
    $('.modalEditarEmpresa').on('click','#btnEditarEmpresa',function(){
        var arreglo = new Array();
        data.nombre.modificado = $('#nombreEditar').val();
        data.rut.modificado = $('#rutEditar').val();
        data.correo.modificado = $('#emailEditar').val();
        data.telefono.modificado =  $('#telefonoEditar').val();
        var numberErrors = 0;
        if(isEmpty(data.nombre.modificado))
            arreglo.push('<li>El campo nombre es obigatorio</li>');
        if(isEmpty(data.rut.modificado))
            arreglo.push('<li>El campo rut es obigatorio</li>');
        if(isEmpty(data.correo.modificado))
            arreglo.push('<li>El campo correo es obigatorio</li>');
        if(isEmpty(data.telefono.modificado))
            arreglo.push('<li>El campo teléfono es obigatorio</li>');
        if(isMail(data.correo.modificado))
            arreglo.push('<li>Formato erróneo de correo electrónico</li>');
        if(isExactly(data.telefono.modificado))
            arreglo.push('<li>El teléfono debe tener 9 dígitos</li>');
        if(isNumber(data.telefono.modificado))
            arreglo.push('<li>El teléfono no es un número o no está en un formato adecuado</li>');
        if(isRutEditar())
            arreglo.push('<li>Formato no adecuado de rut o no es válido</li>');
        if(arreglo.length == 0) {
            if(data.nombre.original != data.nombre.modificado)
                data.nombre.cambio = true;
            if(data.rut.original != data.rut.modificado)
                data.rut.cambio = true;
            if(data.correo.original != data.correo.modificado)
                data.correo.cambio = true;
            if(data.telefono.original != data.telefono.modificado)
                data.telefono.cambio = true;
            /*console.log(data.nombre.original);
            console.log(data.nombre.modificado);
            console.log(data.nombre.cambio);
            console.log(data.rut.original);
            console.log(data.rut.modificado);
            console.log(data.rut.cambio);
            console.log(data.correo.original);
            console.log(data.correo.modificado);
            console.log(data.correo.cambio);
            console.log(data.telefono.original);
            console.log(data.telefono.modificado);
            console.log(data.telefono.cambio);*/
            var url = devuelveUrl('html/cliente/editarEmpresa.php');
            var json = JSON.encode(data);
            $.ajax({
                url: url,
                type: 'POST',
                data: json,
                dataType: 'json',
                success: function(arreglo) {
                    console.log(arreglo.mensaje);
                }
            }).fail(function( jqXHR, textStatus, errorThrown ){
            if (jqXHR.status === 0){
                alert('No hay coneccion con el servidor');
            } else if (jqXHR.status == 404) {
                alert('La pagina solicitada no fue encontrada, error 404');
            } else if (jqXHR.status == 500) {
                alert('Error interno del servidor');
            } else if (textStatus === 'parsererror') {
                alert('Error en la respuesta, debes analizar la sintaxis JSOsssN');
            } else if (textStatus === 'timeout') {
                alert('Ya ha pasado mucho tiempo');
            } else if (textStatus === 'abort') {
                alert('La peticion fue abortada');
            } else {
                alert('Error desconocido');
            }
        });
        }
            else 
                errorMessage(arreglo);
    });
    /*$('.editarEmpresa').click(function(){
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
    });*/
    /*$('#btnEditarEmpresa').click(function(){
        var arreglo = new Array();
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
