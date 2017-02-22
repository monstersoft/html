//$('.contenidoZonas').html('<div class="item"><div class="right floated content"><div class="ui button">Seguir<i class="arrow right icon"></i></div></div><i class="big marker middle aligned icon"></i><div class="content"><a class="header">Universidad Católica de la Santísima Concepción</a><div class="description">Proyecto X</div><div class="description">Empresa Y</div><div class="description">Id Zona Z</div></div></div>');
function infoZonas(arreglo){
    $.each( arreglo, function( key, value ) {
        $('.contenidoZoans').html(value);
    });
}
