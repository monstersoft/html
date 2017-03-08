function devuelveUrl(path) {
    var url;
    var host = window.location.host;
    var protocolo = window.location.protocol;
    url = protocolo+'//'+host+'/'+path;
    $('body').after('<div class="ui sticky fixed" style="bottom: 0;left: 0;">'+url+'</div>');
    return url;
}