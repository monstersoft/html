$(document).ready(function() {
    /*$('div').on('click','.eliminar', function(){
          $('#modalEliminar').modal({
            closable  : false,
            onApprove : function() {
              alert('Approved!');
            }
            });
            $('#modalEliminar').modal('show');
    });

    $('.mas').click(function(){ //CLASE MAS
        $('.cancelar').removeClass('disabled');
        $('#btnAñadir').removeClass('disabled loading');
        $('.ui.form').trigger("reset");
        $('.ui.form .field.error').removeClass( "error" );
        $('.ui.form.error').removeClass( "error" );
        $('#modalInsertar').modal({transition: 'fade up'}).modal('show');
    }); // FIN CLASE MAS
    $('.eliminar').click(function(){ //CLASE ELIMINAR
        $('#idEmpresa').html('idEmpresa = '+$(this).attr('id'));
    });// FIN CLASE ELIMINAR*/
    $('.editar').click(function(){
        var id =  $(this).attr('id');
        var url = devuelveUrl('html/php/c/datosEmpresa.php');
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
        $('#modalEditar').modal('show');
    });
    $('.insertar').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('#modalInsertar').modal('show');
    });
    $('#cancelar').click(function(){
        $('#businessForm').trigger("reset");
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('#modalInsertar').modal('hide');
    });
    $('#btnAñadir').click(function(){
        var arreglo = new Array();
        var nombre = $('#nombre').val();
        var rut = $('#rut').val();
        var email = $('#email').val();
        var telefono = $('#telefono').val();
        var direccion = $('#direccion').val();
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
        //alert(arreglo.length);
        if(arreglo.length == 0) {
            var data = $('#businessForm').serialize();
            var url = devuelveUrl('html/php/c/insertarEmpresa.php');
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
    $('#btnEditar').click(function(){
        var arreglo = new Array();
        var id = $('#idEditar').val();
        var nombre = $('#nombreEditar').val();
        var rut = $('#rutEditar').val();
        var email = $('#emailEditar').val();
        var telefono = $('#telefonoEditar').val();
        var direccion = $('#direccionEditar').val();
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
        //alert(arreglo.length);
        if(arreglo.length == 0) {
            var data = $('#formularioEditar').serialize();
            var url = devuelveUrl('html/php/c/editarEmpresa.php');
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'json',
                beforeSend: function() {
                  $('#cancelar').addClass('disabled');
                  $('#btnEditar').addClass('disabled loading');
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
                    $('#btnEditar').removeClass('disabled loading');
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
    function devuelveUrl(path) {
        var url;
        var host = window.location.host;
        var protocolo = window.location.protocol;
        url = protocolo+'//'+host+'/'+path;
        return url;
    }
    function errorMessage(arrayErrors) {
        var list = '';
        arrayErrors.forEach(function(element){
            list += element;
        });
        $('.message').html('<div class="ui negative message"><ul>'+list+'</ul></div>');
    }
    function warningMessage(arrayWarnings) {
        var list = '';
        arrayWarnings.msg.forEach(function(element){
            list += '<li>'+element+'</li>';
        });
        $('.message').html('<div class="ui warning message"><ul>'+list+'</ul></div>');
    }
    function successMessage(titulo,parrafo) {
        $('.message').html('<div class="ui icon success message"><i class=" icon checkmark"></i><div class="content"><div class="header">'+titulo+'</div><p>'+parrafo+'</p></div></div>');
    }
    function isEmpty(value) {
        if (value == ''){
          return true;
        }
        else {
          return false;
        }
    }
    function isMail(value) {
        var expresion = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
        if(value == '') 
            return false;
        else {
          if(!expresion.test(value)) 
            return true;
          else
            return false;
        }
    }
    function isExactly(value) {
        if(value == '') 
            return false;
        else {
          if(value.length != 9) 
            return true;
          else
            return false;
        }
    }
    function isNumber(value) {
        var expresion = /^([0-9])*$/;
        if(value == '')
            return false;
        else {
          if(!expresion.test(value)) 
            return true;
          else
            return false;
        }
    }
    function isRut() {
        var rut = $('#rut').val();
        var error = $.rut.validar(rut);
        if(rut == '')
            return false;
        else {
          if(error == false) {
            return true;
          }
          else {
            return false;
          }
        }
    }
    function isRutEditar() {
        var rut = $('#rutEditar').val();
        var error = $.rut.validar(rut);
        if(rut == '')
            return false;
        else {
          if(error == false) {
            return true;
          }
          else {
            return false;
          }
        }
    }
});
