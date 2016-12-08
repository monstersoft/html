$(document).ready(function(){
    $('.mas').click(function(){
      $('.ui.form').trigger("reset");
      $('.ui.form .field.error').removeClass( "error" );
      $('.ui.form.error').removeClass( "error" );
      $('.modal').modal('show');
    });
    $('.editar').click(function(){
      alert($(this).attr('id'));
    });
    $('.eliminar').click(function(){
      alert($(this).attr('id'));
    });
  $('.ui.form').form({
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
      onSuccess: function(){
        var datos = $('#formulario').serialize();
            if(window.lock != 'locked') {
                $.ajax({//INICIO PETICIÓN                     
                    url: 'prueba.php',
                    data: datos,
                    type: "POST",
                    dataType: "json",
                    beforeSend: function() {
                        $('#añadir').addClass('disabled');
                        $('#añadir').addClass('ui loading button');
                    },
                    success: function(arreglo) {
                      $('.modal').modal('toogle');
                      msg({mensaje: 'La contrasena debe tener entre 6 y 12 caracteres',titulo: 'Error de formato',accion: 'warning'});
                        $(window).attr('location', 'a.php');
                }
                }).fail(function( jqXHR, textStatus, errorThrown ){
                    if (jqXHR.status === 0){
                        alert('No hay coneccion con el servidor');
                    } else if (jqXHR.status == 404) {
                        alert('La pagina solicitada no fue encontrada, error 404');
                    } else if (jqXHR.status == 500) {
                        alert('jqXHR.status == 500');
                    } else if (textStatus === 'parsererror') {
                        alert('textStatus === parsererror');
                    } else if (textStatus === 'timeout') {
                        alert('textStatus timeout');
                    } else if (textStatus === 'abort') {
                        alert('La peticion fue abortada');
                    } else {
                        alert('Error desconocido');
                    }
                });//FIN PETICION AJAX
            }
      } // FIN ONSUCCESS
    } // FIN ARREGLO FORM
  }).submit(function(event){
      return false;
  }); // FIN FORM

});
