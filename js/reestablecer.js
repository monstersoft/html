$('#btnReestablecer').click(function(){
            msg({mensaje: 'Se ha enviado un e-mail al correo ingresado',titulo: 'Correo enviado',accion: 'success'});
            console.log(devuelveUrl('ajax/generaLink.php'));
            $.ajax({                  
            url: 'ajax/generaLink.php',
            data: {txtCorreo: $('#txtCorreo').val()},
            type: "POST",
            dataType: "json",
            success: function(arreglo) {
                console.log(JSON.stringify(arreglo));
                msg({mensaje: 'Se ha enviado un e-mail al correo ingresado',titulo: 'Correo enviado',accion: 'success'});

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
});
function msg(mensaje) {
	if(mensaje.accion == 'warning')
		toast('<div class="ui mini warning icon message"><i class="fa fa-exclamation-circle fa-3x"></i><i class="cerrar close icon"></i><div class="content"><div class="header">'+mensaje.titulo+'</div>'+mensaje.mensaje+'</div>',10000);
	if(mensaje.accion == 'info')
		toast('<div class="ui mini info icon message"><i class="fa fa-info-circle fa-3x"></i><i class="cerrar close icon"></i><div class="content"><div class="header">'+mensaje.titulo+'</div>'+mensaje.mensaje+'</div>',10000);
	if(mensaje.accion == 'success')
		toast('<div class="ui mini success icon message"><i class="fa fa-check-circle fa-3x"></i><i class="cerrar close icon"></i><div class="content"><div class="header">'+mensaje.titulo+'</div>'+mensaje.mensaje+'</div>',10000);
	if(mensaje.accion == 'negative')
		toast('<div class="ui mini negative icon message"><i class="fa fa-times-circle fa-3x"></i><i class="cerrar close icon"></i><div class="content"><div class="header">'+mensaje.titulo+'</div>'+mensaje.mensaje+'</div>',10000);
	if(mensaje.accion == 'errorAjax')
		toast('<div class="ui mini icon message"><i class="fa fa-bomb fa-3x"></i><i class="cerrar close icon"></i><div class="content"><div class="header">'+mensaje.titulo+'</div>'+mensaje.mensaje+'</div>',10000);
}
