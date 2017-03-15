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
function errorMessage(arrayErrors) {
    var list = '';
    arrayErrors.forEach(function(element){
        list += element;
    });
    $('.message').html('<div class="alert alert-danger"><ul>'+list+'</ul></div>');
}
function warningMessage(arrayWarnings) {
    var list = '';
    $.each(arrayWarnings,function(key, value){
        list += '<li>'+value+'</li>';
    });
    $('.message').html('<div class="alert alert-warning"><ul>'+list+'</ul></div>');
}
function successMessage(titulo,parrafo) {
    $('.message').html('<div class="alert alert-success" style="padding: 10px;"><strong>'+titulo+'</strong>'+parrafo+'</div>');
}
function infoMessage(titulo,parrafo) {
    $('.message').html('<div class="alert alert-info"><strong>'+titulo+' </strong>'+parrafo+'</div>');
}
function errorMessage2(arrayErrors) {
    var list = '';
    arrayErrors.forEach(function(element){
        list += element;
    });
    $('.message').html('<div class="ui negative message"><ul>'+list+'</ul></div>');
}
