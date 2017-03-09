var carpetaRaiz = 'html';
function devuelveUrl(pathSinCarpetaRaiz) {
    var url;
    var host = window.location.host;
    var protocolo = window.location.protocol;
    if(host == 'www.mmonitors.com')
            url = protocolo+'//'+host+'/'+pathSinCarpetaRaiz;
    else
        url = protocolo+'//'+host+'/'+carpetaRaiz+'/'+pathSinCarpetaRaiz;
    return url;
}
function fechaHoy() {
	var hoyE = moment().locale('es').format('dddd DD , MMMM YYYY');
    var hoyF = moment().format('YYYY/MM/DD');
    $('#fechaDatos').val(hoyE);
    $('input[name=fechaDatos]').val(hoyF);
}
function borraMensajes() {
    $('.ui.negative.message').remove();
    $('.ui.warning.message').remove();
    $('.ui.icon.success.message').remove();
}
function reseteaFormularios() {
    $('#formularioEditarEmpresa').trigger("reset");
    $('#formularioAgregarEmpresa').trigger("reset");
    $('#formularioAgregarZona').trigger("reset");
    $('#formularioAgregarSupervisor').trigger("reset");
}
function cierraModales(){
    $('.modalAgregarEmpresa').modal('hide');
    $('.modalAgregarZona').modal('hide');
    $('.modalAgregarSupervisor').modal('hide');
    $('.modalEditarEmpresa').modal('hide');
}
function configuracionModales() {
	$('.ui.modal').modal({
		autofocus: false,
		closable: false
	});
}
