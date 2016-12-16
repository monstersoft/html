function devuelveUrl(path) {
    var url;
    var host = window.location.host;
    var protocolo = window.location.protocol;
    url = protocolo+'//'+host+'/'+path;
    return url;
}