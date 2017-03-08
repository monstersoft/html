var carpetaRaiz = 'html';
function devuelveUrl(carpetaRaiz,path) {
    var url;
    var host = window.location.host;
    var protocolo = window.location.protocol;
    if(host == 'www.mmonitors.com')
            url = protocolo+'//'+host+'/'+path;
    else
        url = protocolo+'//'+host+'/'+carpetaRaiz+'/'+path;
    return url;
}