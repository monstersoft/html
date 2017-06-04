$('body').on('click','.cerrar',function(){
    $(this).closest('.message').transition('fade');
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