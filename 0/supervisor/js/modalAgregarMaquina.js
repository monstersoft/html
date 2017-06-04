$(document).ready(function() {
    $('.agregarMaquina').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('#idZonaMaquina').val($(this).attr('id'));
        $('.modalAgregarMaquina').modal('show');
    });
    $('#btnAñadirMaquina').click(function(){
        var arreglo = new Array();
        var id = $('#identificadorMaquina').val();
        var patente = $('#patenteMaquina').val();
        var velocidad = $('#velocidadMaquina').val();
        var tara = $('#taraMaquina').val();
        var year = $('#anhoMaquina').val();
        var carga = $('#cargaMaquina').val();
        var numberErrors = 0;
        //if(isEmpty(id))
            //arreglo.push('<li>El campo id es obigatorio</li>');
        if(isEmpty(patente))
            arreglo.push('<li>Patente es obigatoria</li>');
        if(isEmpty(velocidad))
            arreglo.push('<li>Velocidad máxima es obigatorio</li>');
        if(isEmpty(tara))
            arreglo.push('<li>Tara máxima es obigatorio</li>');
        if(isEmpty(year))
            arreglo.push('<li>Año es obigatorio</li>');
        if(isEmpty(carga))
            arreglo.push('<li>Carga máxima es obigatorio</li>');
        //if(isNumber(id))
            //arreglo.push('<li>El campo id es obigatorio</li>');
        if(isNumber(velocidad))
            arreglo.push('<li>Velocidad máxima no es un número adecuado</li>');
        if(isNumber(tara))
            arreglo.push('<li>Tara máxima no es un número adecuado</li>');
        if(isNumber(year))
            arreglo.push('<li>Año no es un número adecuado</li>');
        if(isNumber(carga))
            arreglo.push('<li>Carga máxima no es un número adecuado</li>');
        if(maxLength(patente, 6))
            arreglo.push('<li>Patente debe tener mínimo 6 caracteres</li>');
        if(maxMinValue(velocidad, 100 ,50))
            arreglo.push('<li>Velocidad mínima 50 km/hr y máxima 100 km/hr</li>');
        if(maxMinValue(tara, 10000, 500))
            arreglo.push('<li>Tara mínima 500 kg y máxima 10000 kg</li>');
        if(maxMinValue(year, 2017, 1900))
            arreglo.push('<li>Año mínimo 1900 y máximo 2017</li>');
        if(maxMinValue(carga, 10000, 500))
            arreglo.push('<li>Carga mínima 500 kg y máxima 10000 kg</li>');
        if(arreglo.length == 0) {
            var data = $('#formularioAgregarMaquina').serialize();
            var url = devuelveUrl('html/supervisor/agregarMaquina.php');
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType: 'json',
                beforeSend: function() {
                  $('#cancelar').addClass('disabled');
                  $('#btnAñadirMaquina').addClass('disabled loading');
                  //$('#modalInsertar').modal({transition: 'fly up'}).modal('hide');
                },
                success: function(arreglo) {
                    alert(JSON.stringify(arreglo));
                    if(arreglo.exito == 1) {
                        successMessage('Registro realizado con éxito','Serás redireccionado al panel de zonas');
                        location.reload();
                    }
                    else {
                        $('.message').html('<div class="ui warning message">'+arreglo.msg+'</div>');
                    }
                    $('#cancelar').removeClass('disabled');
                    $('#btnAñadirMaquina').removeClass('disabled loading');
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
        }
        else {
            errorMessage(arreglo);
        }
    });
});