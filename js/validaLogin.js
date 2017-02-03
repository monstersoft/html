$(document).ready(function(){
	$('#btnLogin').click(function(){
        var expresion = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
        var correo = $('#email').val();
        var pass = $('#password').val();
        if(correo == '' || pass == '') {
            if(correo == '' && pass == '')
                msg({mensaje: 'Correo y contrasena son obligatorios para iniciar sesion',titulo: 'Campos Vacios',accion: 'warning'});
            else {
                if(correo == '')
                    msg({mensaje: 'El correo es obligatorio para iniciar sesion',titulo: 'Campo Vacio',accion: 'negative'});
                else {
                    if(!expresion.test(correo)) 
                        msg({mensaje: 'El correo no esta en un formato adecuado',titulo: 'Error de formato'});
                }
                if(pass == '')
                    msg({mensaje: 'La contrasena es obligatoria para iniciar sesion',titulo: 'Campo Vacio',accion: 'warning'});
                else {
                    if(pass.length < 6 || pass.length >12)
                    msg({mensaje: 'La contrasena debe tener entre 6 y 12 caracteres',titulo: 'Error de formato',accion: 'warning'});
                }
            }
        }
        else {
            if(!expresion.test(correo) || (pass.length < 6 || pass.length >12)) {
                if(!expresion.test(correo) && (pass.length < 6 || pass.length >12))
                    msg({mensaje: 'El correo no esta en un formato adecuado<br>La contrasena debe tener entre 6 y 12 caracteres',titulo: 'Errores de formato',accion: 'warning'});
                else {
                    if(!expresion.test(correo))  
                        msg({mensaje: 'El correo no esta en un formato adecuado',titulo: 'Error de formato',accion: 'warning'});
                    if(pass.length < 6 || pass.length >12)
                        msg({mensaje: 'La contrasena debe tener entre 6 y 12 caracteres',titulo: 'Error de formato',accion: 'warning'});
                }
                }
            else {
                var esSupervisor = $('#supervisor').prop('checked');
                $.ajax({                  
                url: 'php/compruebaLogin.php',
                data: {txtCorreo: correo, txtPassword: pass, txtSupervisor: esSupervisor},
                type: "POST",
                dataType: "json",
                beforeSend: function() {
                    $('#btnLogin').addClass('disabled');
                    $('#btnLogin').html('<i class="fa fa-cog fa-spin fa-2x fa-fw" style="color: white"></i>');
                },
                success: function(arreglo) {
                    if(arreglo.error == true){
                        msg({mensaje: arreglo.mensaje,titulo: arreglo.titulo,accion: 'errorAjax'});
                    }
                    else {
                        msg({mensaje: arreglo.mensaje,titulo: 'Inicio de sesión',accion: 'success'});
                    	$(window).attr('location', arreglo.url);
                    }

            }
            }).complete(function(){
                    $('#btnLogin').removeClass('disabled');
                    $('#btnLogin').html('Ingresar');
                }).fail(function( jqXHR, textStatus, errorThrown ){
                if (jqXHR.status === 0){
                    msg({mensaje: 'No hay coneccion con el servidor',titulo: 'jqXHR.status === 0',accion: 'errorAjax'});
                } else if (jqXHR.status == 404) {
                    msg({mensaje: 'La pagina solicitada no fue encontrada, error 404', titulo: 'jqXHR.status == 404',accion: 'errorAjax'})
                } else if (jqXHR.status == 500) {
                    msg({mensaje: 'Error interno del servidor',titulo: 'jqXHR.status == 500',accion: 'errorAjax'});
                } else if (textStatus === 'parsererror') {
                    msg({mensaje: 'Error en la respuesta, debes analizar la sintaxis JSON', titulo: 'textStatus === parsererror',accion: 'errorAjax'});
                } else if (textStatus === 'timeout') {
                    msg({mensaje: 'Ya ha pasado mucho tiempo', titulo: 'textStatus === timeout',accion: 'errorAjax'});
                } else if (textStatus === 'abort') {
                    msg({mensaje: 'La peticion fue abortada', titulo: 'textStatus === abort',accion: 'errorAjax'});
                } else {
                    msg({mensaje: jqXHR.responseText, titulo: 'Error desconocido',accion: 'errorAjax'});
                }
            });//FIN PETICION AJAX
                }
        }
	});
});