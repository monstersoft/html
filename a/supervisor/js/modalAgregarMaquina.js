$(document).ready(function() {
    $('.agregarMaquina').click(function(){
        $('#idZonaAgregarMaquina').val($(this).attr('id'));
        $('.modalAgregarMaquina').modal();
    });
    $('#btnAñadirMaquina').click(function(){
        $('.alert').remove();
        var arreglo = new Array();
        var id = $('#identificadorAgregarMaquina').val();
        var patente = $('#patenteAgregarMaquina').val();
        var tara = $('#taraAgregarMaquina').val();
        var carga = $('#cargaAgregarMaquina').val();
        var numberErrors = 0;
        if(isEmpty(id))
            arreglo.push('<li>El campo id es obigatorio</li>');
        if(isEmpty(patente))
            arreglo.push('<li>Patente es obigatoria</li>');
        if(isEmpty(tara))
            arreglo.push('<li>Tara máxima es obigatorio</li>');
        if(isEmpty(carga))
            arreglo.push('<li>Carga máxima es obigatorio</li>');
        if(isNumber(tara))
            arreglo.push('<li>Tara máxima no es un número adecuado</li>');
        if(isNumber(carga))
            arreglo.push('<li>Carga máxima no es un número adecuado</li>');
        if(maxLength(patente, 6))
            arreglo.push('<li>Patente debe tener mínimo 6 caracteres</li>');
        if(maxMinValue(tara, 10000, 500))
            arreglo.push('<li>Tara mínima 500 kg y máxima 10000 kg</li>');
        if(maxMinValue(carga, 10000, 500))
            arreglo.push('<li>Carga mínima 500 kg y máxima 10000 kg</li>');
        if(arreglo.length == 0) {
            var data = $('#formularioAgregarMaquina').serialize();
            $.ajax({
                url: devuelveUrl('a/supervisor/ajax/agregarMaquina.php'),
                type: 'POST',
                data: data,
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                  activarLoaderBotones('fa-pencil','fa-refresh');
                },
                success: function(arreglo) {
                    if(arreglo.exito == 1) {
                        successMessage('Registro realizado con éxito','Serás redireccionado al panel de zonas');
                        $('.cancelar').remove();
                        $('#btnAñadirEmpresa').remove();
                        setTimeout(function(){location.reload()}, 3000);
                    }
                    else {
                        warningMessage(arreglo.msg);
                    }
                },
                complete: function() {
                    desactivarLoaderBotones('fa-pencil','fa-refresh');
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