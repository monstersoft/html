var carpetaRaiz = 'html';
function devuelveUrl(pathSinCarpetaRaiz) {
    var url;
    var host = window.location.host;
    var protocolo = window.location.protocol;
    if(host == 'www.mmonitors.com')
            url = protocolo+'//'+host+'/'+pathSinCarpetaRaiz;
    else
        url = protocolo+'//'+host+'/'+carpetaRaiz+'/'+pathSinCarpetaRaiz;
    return url;
}