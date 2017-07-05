var exito = 0;
$('.asignarZonas').click(function(){
    $.ajax({
            url: devuelveUrl('cliente/ajax/asignarZonas.php'),
            type: 'POST',
            data: {idEmpresa: getQueryVariable('empresa'), idZona: getQueryVariable('zona'), idSupervisor: getQueryVariable('supervisor'), opcion: 'select'},
            dataType: 'json',
            success: function(arreglo) {
                if(arreglo.exito == 1) {
                    $('#zonasAsociadas').append(arreglo.zonas);
                    $('#idZona').val(getQueryVariable('zona'));
                    $('#idSupervisor').val(getQueryVariable('supervisor'));
                }
                else
                    alert('Error, debes comunicarte con el administrador dele sistema');
            },
            error: function(xhr) {console.log(xhr.responseText);}
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
    $('.modalAsignarZonas').modal();
});
$('.modalAsignarZonas').on('click','#btnAsignarZonas',function(){
    $('.alert').remove();
    var arreglo = new Array();
    if($('#zonasAsociadas').val() == null || $('#zonasAsociadas').val() == "")
        arreglo.push('<li>Tienes que seleccionar al menos una zona</li>');
    if(arreglo.length == 0) {
        $.ajax({
            url: devuelveUrl('cliente/ajax/asignarZonas.php'),
            type: 'POST',
            data: {idZona: $('#idZona').val(), idSupervisor: $('#idSupervisor').val(), zonas: $('#zonasAsociadas').val(), opcion: 'asignar'},
            dataType: 'json',
            cache: false,
            beforeSend: function() {
              activarLoaderBotones('fa-plus','fa-refresh');
            },
            success: function(arreglo) {
                console.log(JSON.stringify(arreglo));
                if(arreglo.exito == 1) {
                    successMessage('Asignación con éxito, ','se han asociado las zonas al supervisor');
                    $('#btnAsignarZonas').remove();
                    exito = 1;
                }
                else {
                    alert('Error, debes comunicarte con el administardor de sistema');
                }
            },
            complete: function() {
                desactivarLoaderBotones('fa-plus','fa-refresh');
            },
            error: function(xhr) {console.log(xhr.responseText);}
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
    }
    else {
        errorMessage(arreglo);
    }
});

function getQueryVariable(variable) {
   var query = window.location.search.substring(1);
   var vars = query.split("&");
   for (var i=0; i < vars.length; i++) {
       var pair = vars[i].split("=");
       if(pair[0] == variable) {
           return pair[1];
       }
   }
   return false;
}