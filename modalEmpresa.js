$(document).ready(function() {
    $('#modal').click(function(){
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
        if(isRut()) {
            arreglo.push('<li>Formato no adecuado de rut o no es válido</li>');
        }
        //alert(arreglo.length);
        if(arreglo.length == 0) {
            var data = $('#businessForm').serialize();
            $.ajax({
                url: 'empresas.php',
                type: 'POST',
                data: data,
                dataType: 'json',
                beforeSend: function() {
                  $('#cancelar').addClass('disabled');
                  $('#btnAñadir').addClass('disabled loading');
                  //$('#modalInsertar').modal({transition: 'fly up'}).modal('hide');
                },
                success: function(returnedData) {
                    warningMessage(returnedData)
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
    function errorMessage(arrayErrors) {
        var list = '';
        arrayErrors.forEach(function(element){
            list += element;
        });
        $('.message').html('<div class="ui negative message"><ul>'+list+'</ul></div>');
    }
    function warningMessage(arrayWarnings) {
        var list = '';
        arrayWarnings.forEach(function(element){
            list += '<li>'+element+'</li>';
        });
        $('.message').html('<div class="ui warning message"><ul>'+list+'</ul></div>');
    }
    function successMessage(value) {
        $('.message').html('<div class="ui icon message"><i class="inbox icon"><div class="content"><div class="header">Registro realizado con éxito</div><p>Redireccionando al panel de empresas</p></div></i></div>');
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
});
