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
