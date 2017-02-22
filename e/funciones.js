function infoZonas(arreglo) {
    $.each(arreglo, function(index) {
       $('.contenidoZonas').append('<div class="item"><div class="right floated content"><div class="ui button siguiente">Seguir<i class="arrow right icon"></i></div></div><i class="big marker middle aligned icon"></i><div class="content"><a class="header">'+arreglo[index].zona+'</a><div class="description">'+arreglo[index].empresa+'</div><div class="description">'+arreglo[index].proyecto+'</div><div class="description">'+arreglo[index].idZona+'</div></div></div>');
    }
);
}
function iconoCargando(){
    $('.cargando').html('<i class="refresh huge loading icon"></i>');
}
function eliminarCargando(){
    $('.refresh').remove();
}
