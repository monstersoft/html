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
        list += '<li class="text-left">'+value+'</li>';
    });
    $('.message').html('<div class="alert alert-warning"><ul>'+list+'</ul></div>');
}
function oneWarningMessage(parrafo) {
    $('.message').html('<div class="alert alert-warning" style="padding: 10px;">'+parrafo+'</div>');
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
function successUi(array) {
    var list = '';
    if(Array.isArray(array))
        $.each(array,function(key, value){list += value;});
    else
        list = array;
    $('.form').html('<div class="ui icon positive message cent"><i class="check circle icon"></i><div class="ui list montserrat">'+list+'</div></div>');
}
function errorUi(array) {
    var list = '';
    if(Array.isArray(array))
        $.each(array,function(key, value){list += value;});
    else
        list = array;
    $('.ui .button').after('<div class="ui negative icon message cent"><div class="ui list montserrat center aligned">'+list+'</div></div>');
}
function infoUi(array) {
    var list = '';
    if(Array.isArray(array))
        $.each(array,function(key, value){list += value;});
    else
        list = array;
    $('.ui .button').after('<div class="ui info message cent"><div class="ui list montserrat">'+list+'</div></div>');
}