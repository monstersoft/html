$('body').on('click','.cerrar',function(){
    $(this).closest('.message').transition('fade');
});
function msg(titulo,mensaje,icono,accion) {
    if(accion == 'warning')
        toast('<div class="ui mini warning icon message"><i class="'+icono+'"></i><i class="cerrar close icon"></i><div class="content"><div class="header">'+titulo+'</div>'+mensaje+'</div>');
    if(accion == 'info')
        toast('<div class="ui mini info icon message"><i class="'+icono+'"></i><i class="cerrar close icon"></i><div class="content"><div class="header">'+titulo+'</div>'+mensaje+'</div>');
    if(accion == 'success')
        toast('<div class="ui mini success icon message"><i class="'+icono+'"></i><i class="cerrar close icon"></i><div class="content"><div class="header">'+titulo+'</div>'+mensaje+'</div>');
    if(accion == 'negative')
        toast('<div class="ui mini negative icon message"><i class="'+icono+'"></i><i class="cerrar close icon"></i><div class="content"><div class="header">'+titulo+'</div>'+mensaje+'</div>');
    if(accion == 'error')
        toast('<div class="ui mini icon message"><i class="'+icono+'"></i><i class="cerrar close icon"></i><div class="content"><div class="header">'+titulo+'</div>'+mensaje+'</div>');
}
function borrarMensajes() {
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.error.message').remove();
        $('.ui.success.message').remove();
        $('.ui.icon.success.message').remove();
        $('.ui.icon.info.message').remove();
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
    $('.message').html('<div class="ui icon success message" style="padding: 10px;"><i class="refresh loading icon"></i><div class="content"><div class="header">'+titulo+'</div><p>'+parrafo+'</p></div></div>');
}
function infoMessage(titulo,parrafo) {
    $('.message').html('<div class="ui icon info message"><i class=" icon info"></i><div class="content"><div class="header">'+titulo+'</div><p>'+parrafo+'</p></div></div>');
}
function errorMessage2(arrayErrors) {
    var list = '';
    arrayErrors.forEach(function(element){
        list += element;
    });
    $('.message').html('<div class="ui negative message"><ul>'+list+'</ul></div>');
}
