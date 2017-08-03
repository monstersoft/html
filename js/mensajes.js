function errorMessage(array) {
    var list = '';
    $.each(array,function(key, value){
        list += value;
    });
    $('.message').html('<div class="alert alert-danger" style="padding: 10px;">'+list+'</div>');
}
function warningMessage(array) {
    var list = '';
    if(Array.isArray(array)) {
        $.each(array,function(key, value){
            list += '<li class="text-left">'+value+'</li>';
        });
    }
    else
        list = '<li class="text-left">'+array+'</li>';
    $('.message').append('<div class="alert alert-warning" style="padding: 10px;">'+list+'</div>');
}
function oneWarningMessage(parrafo) {
    $('.message').html('<div class="alert alert-warning" style="padding: 10px;">'+parrafo+'</div>');
}
function successMessage(titulo,parrafo) {
    list = '';
    if(Array.isArray(parrafo)) {
        $.each(parrafo,function(key, value){
            list += '<li class="text-left">'+value+'</li>';
        });  
    }
    else
        list = parrafo;
    $('.message').html('<div class="alert alert-success" style="padding: 10px;"><strong>'+titulo+'</strong>'+list+'</div>');
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
function successUi(header,array) {
    var list = '';
    if(Array.isArray(array))
        $.each(array,function(key, value){list += value;});
    else
        list = array;
    $('.form').html('<div class="ui positive message"><div class="content montserrat"><div class="header">'+header+'</div><p>'+list+'</p></div></div>');
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
