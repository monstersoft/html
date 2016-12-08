$(document).ready(function() {
    $('div').on('click','.eliminar', function(){
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

    $('.editar').click(function(){ //CLASE EDITAR
        alert($(this).attr('id'));
    });// FIN CLASE EDITAR

    $('.eliminar').click(function(){ //CLASE ELIMINAR
        $('#idEmpresa').html('idEmpresa = '+$(this).attr('id'));
    });// FIN CLASE ELIMINAR
    
  $('.ui.form').form({ // VALIDACION FORMULARIO EMPRESA
        nombre: {
            identifier: 'nombre',
            rules: [{
                type: 'empty',
                prompt: 'Tienes que ingresar el nombre de la empresa'
            }]
        },
        rut: {
            identifier: 'rut',
            rules: [{
                type: 'empty',
                prompt: 'Tienes que ingresar el rut de la empresa'
            }]
        },
        correo: {
            identifier: 'correo',
            rules: [{
                type: 'regExp',
                value: '/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i',
                prompt: 'El correo no está en un formato adecuado'
            }]
        },
        telefono: {
            identifier: 'telefono',
            rules: [{
                type: 'empty',
                value: 'Tienes que ingresar el teléfono de la empresa'
                },{
                type: 'integer',
                prompt: 'El teléfono tiene que ser un número'
                },{
                type: 'exactLength[9]',
                prompt: 'El teléfono tiene que tener 9 dígitos'
            }]
        },
        },{
    onSuccess: function() {
      if (window.lock != "locked") { 
        var datos = $('.ui.form').serialize();
        var url = devuelveUrl('html/php/c/insertarEmpresa.php');
          $.ajax({
              type: 'POST',
              url: url,
              data: datos,
              dataType: 'json',
              beforeSend: function () {
                  $('.cancelar').addClass('disabled');
                  $('#btnAñadir').addClass('disabled loading');
                  $('#modalInsertar').modal({transition: 'fly up'}).modal('hide');
              },
              success: function (arreglo) {
                if(arreglo.exito == 1)
                  alert(arreglo.mensaje);
                if(arreglo.exito == 0)
                  alert(arreglo.mensaje);
                else
                  alert('No paso niuna wea');
                window.lock = "";
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
      window.lock = "locked";
    }
  }).submit(function(e){ 
    return false;
  });

    function devuelveUrl(path) {
      var url;
      var host = window.location.host;
      var protocolo = window.location.protocol;
      url = protocolo+'//'+host+'/'+path;
      return url;
    }
});
