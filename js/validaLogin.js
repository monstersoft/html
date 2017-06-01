$('body').on('click','.cerrar',function(){
    $(this).closest('.message').transition('fade');
});
$('#btnLogin').click(function(){
    var expresion = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
    var correo = $('#email').val();
    var pass = $('#password').val();
    if(correo == '' || pass == '') {
        if(correo == '' && pass == '')
            msg({mensaje: 'Correo y contraseña son obligatorios para iniciar sesión',titulo: 'Campos Vacíos',accion: 'warning'});
        else {
            if(correo == '')
                msg({mensaje: 'El correo es obligatorio para iniciar sesión',titulo: 'Campo Vacío',accion: 'negative'});
            else {
                if(!expresion.test(correo)) 
                    msg({mensaje: 'El correo no está en un formato adecuado',titulo: 'Error de formato'});
            }
            if(pass == '')
                msg({mensaje: 'La contraseña es obligatoria para iniciar sesión',titulo: 'Campo Vacío',accion: 'warning'});
            else {
                if(pass.length < 6 || pass.length >12)
                msg({mensaje: 'La contraseña debe tener entre 6 y 12 caracteres',titulo: 'Error de formato',accion: 'warning'});
            }
        }
    }
    else {
        if(!expresion.test(correo) || (pass.length < 6 || pass.length >12)) {
            if(!expresion.test(correo) && (pass.length < 6 || pass.length >12))
                msg({mensaje: 'El correo no está en un formato adecuado<br>La contraseña debe tener entre 6 y 12 caracteres',titulo: 'Errores de formato',accion: 'warning'});
            else {
                if(!expresion.test(correo))  
                    msg({mensaje: 'El correo no está en un formato adecuado',titulo: 'Error de formato',accion: 'warning'});
                if(pass.length < 6 || pass.length >12)
                    msg({mensaje: 'La contraseña debe tener entre 6 y 12 caracteres',titulo: 'Error de formato',accion: 'warning'});
            }
            }
        else {
            $.ajax({                  
            url: 'php/compruebaLogin.php',
            data: {txtCorreo: correo, txtPassword: pass},
            type: "POST",
            dataType: "json",
            beforeSend: function() {
                $('#btnLogin').addClass('disabled');
                $('#btnLogin').html('<i class="fa fa-cog fa-spin fa-2x fa-fw" style="color: white"></i>');
            },
            success: function(arreglo) {
                console.log(JSON.stringify(arreglo));
                if(arreglo.error == true){
                    msg({mensaje: arreglo.mensaje,titulo: arreglo.titulo,accion: 'warning'});
                }
                else {
                    msg({mensaje: arreglo.mensaje,titulo: 'Inicio de sesión',accion: 'success'});
                    $(window).attr('location', arreglo.url);
                }

            },
            error: function(xhr) {console.log(xhr.responseText);},
        }).complete(function(){
                $('#btnLogin').removeClass('disabled');
                $('#btnLogin').html('Ingresar');
            }).fail(function( jqXHR, textStatus, errorThrown ){
            if (jqXHR.status === 0){
                alert('No hay coneccion con el servidor, debe comunicarte con el administrador');
            } else if (jqXHR.status == 404) {
                alert('La pagina solicitada no fue encontrada: error 404, debes comunicarte con el administrador');
            } else if (jqXHR.status == 500) {
                alert('Error interno del servidor, debes comunicarte con el administrador');
            } else if (textStatus === 'parsererror') {
                alert('Error en la respuesta JSON, debes comunicarte con el administrador');
            } else if (textStatus === 'timeout') {
                alert('Se ha excedido el tiempo de respuesta, debes comunicarte con el administrador');
            } else if (textStatus === 'abort') {
                alert('La peticion fue abortada, debes comunicarte con el administrador');
            } else {
                alert('Error desconocido, debes comunicarte con el administrador');
            }
        });
            }
    }
});
function msg(mensaje) {
	if(mensaje.accion == 'warning')
		toast('<div class="ui mini warning icon message"><i class="fa fa-exclamation-circle fa-3x"></i><i class="cerrar close icon"></i><div class="content"><div class="header">'+mensaje.titulo+'</div>'+mensaje.mensaje+'</div>',mensaje.duracion);
	if(mensaje.accion == 'info')
		toast('<div class="ui mini info icon message"><i class="fa fa-info-circle fa-3x"></i><i class="cerrar close icon"></i><div class="content"><div class="header">'+mensaje.titulo+'</div>'+mensaje.mensaje+'</div>',mensaje.duracion);
	if(mensaje.accion == 'success')
		toast('<div class="ui mini success icon message"><i class="fa fa-check-circle fa-3x"></i><i class="cerrar close icon"></i><div class="content"><div class="header">'+mensaje.titulo+'</div>'+mensaje.mensaje+'</div>',mensaje.duracion);
	if(mensaje.accion == 'negative')
		toast('<div class="ui mini negative icon message"><i class="fa fa-times-circle fa-3x"></i><i class="cerrar close icon"></i><div class="content"><div class="header">'+mensaje.titulo+'</div>'+mensaje.mensaje+'</div>',mensaje.duracion);
	if(mensaje.accion == 'errorAjax')
		toast('<div class="ui mini icon message"><i class="fa fa-bomb fa-3x"></i><i class="cerrar close icon"></i><div class="content"><div class="header">'+mensaje.titulo+'</div>'+mensaje.mensaje+'</div>',mensaje.duracion);
}

