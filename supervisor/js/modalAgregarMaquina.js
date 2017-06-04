$(document).ready(function() {
    $('.agregarMaquina').click(function(){
        $('#idZonaAgregarMaquina').val($(this).attr('id'));
        $('.modalAgregarMaquina').modal();
    });
    $('#btnAñadirMaquina').click(function(){
        $('.alert').remove();
        var arreglo = new Array();
        var patente = $('#patenteAgregarMaquina').val();
        var tara = $('#taraAgregarMaquina').val();
        var carga = $('#cargaAgregarMaquina').val();
        var numberErrors = 0;
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
                url: devuelveUrl('supervisor/ajax/agregarMaquina.php'),
                type: 'POST',
                data: data,
                dataType: 'json',
                cache: false,
                beforeSend: function() {activarLoaderBotones('fa-plus','fa-refresh');},
                success: function(arreglo) {
                    console.log(JSON.stringify(arreglo));
                    if(arreglo.exito == 1) {
                        successMessage('Registro realizado con éxito','Serás redireccionado al panel de zonas');
                        $('.cancelar').remove();
                        $('#btnAñadirEmpresa').remove();
                        setTimeout(function(){location.reload()}, 3000);
                    }
                    else {
                        oneWarningMessage(arreglo.msg);
                    }
                },
                complete: function() {desactivarLoaderBotones('fa-plus','fa-refresh');},
                error: function(xhr) {console.log(xhr.responseText);}
            });
        }
        else {
            errorMessage(arreglo);
        }
    });
});