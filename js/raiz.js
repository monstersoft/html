const CARPETA_XAMPP = 'html';
function raiz() {
    if(location.host == 'localhost')
        return location.origin+'/'+CARPETA_XAMPP;
    else
        return location.origin;
}