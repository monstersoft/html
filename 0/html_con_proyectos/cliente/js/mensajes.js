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
    $('.message').html('<div class="ui icon success message"><i class=" icon checkmark"></i><div class="content"><div class="header">'+titulo+'</div><p>'+parrafo+'</p></div></div>');
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