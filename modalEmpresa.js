$(document).ready(function() {
    $('.editar').click(function(){
        var id =  $(this).attr('id');
        var url = devuelveUrl('html/php/c/editarEmpresa.php');
        alert(url);
        $.ajax({
            url: url,
            type: 'POST',
            data: {idEmpresa: id},
            dataType: 'json',
            success: function(arreglo) {
                alert(JSON.stringify(arreglo));
            }
        }).fail(function( jqXHR, textStatus, errorThrown ){
            if (jqXHR.status === 0){
                alert('No hay coneccion con el servidor');
            } else if (jqXHR.status == 404) {
                alert('La pagina solicitada no fue encontrada, error 404');
            } else if (jqXHR.status == 500) {
                alert('Error interno del servidor');
            } else if (textStatus === 'parsererror') {
                alert('Error en la respuesta, debes analizar la sintaxis JSON');
            } else if (textStatus === 'timeout') {
                alert('Ya ha pasado mucho tiempo');
            } else if (textStatus === 'abort') {
                alert('La peticion fue abortada');
            } else {
                alert('Error desconocido');
            }
        });
    });
    function devuelveUrl(path) {
        var url;
        var host = window.location.host;
        var protocolo = window.location.protocol;
        url = protocolo+'//'+host+'/'+path;
        return url;
    }
});
