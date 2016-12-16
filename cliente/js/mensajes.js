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
