var exito  = 0;
$('.modalAgregarMaquina').on('click','#btnVolverMaquina',function(){
    $('#formularioAgregarMaquina')[0].reset();
    $('.alert').remove();
    $('#btnVolverMaquina').removeClass('btn-success').addClass('btn-primary').attr('id','btnAñadirMaquina').html('<i class="cargar fa fa-plus"></i>Agregar');
});
$('.agregarMaquina').click(function(){
    $('#idZonaAgregarMaquina').val($(this).attr('id'));
    $('.modalAgregarMaquina').modal();
});
$('.modalAgregarMaquina').on('click','#btnAñadirMaquina',function(){
    $('.alert').remove();
    var arreglo = new Array();
    var patente = $('#patenteAgregarMaquina').val();
    var tara = $('#taraAgregarMaquina').val();
    var carga = $('#cargaAgregarMaquina').val();
    var numberErrors = 0;
    if(isEmpty(patente))
        arreglo.push('<li>Patente es obigatoria</li>');
    if(isEmpty(tara))
        arreglo.push('<li>Tara es obigatorio</li>');
    if(isEmpty(carga))
        arreglo.push('<li>Carga máxima es obigatorio</li>');
    if(isNumber(tara))
        arreglo.push('<li>Tara  no es un número adecuado</li>');
    if(isNumber(carga))
        arreglo.push('<li>Carga máxima no es un número adecuado</li>');
    if(maxLength(patente, 6))
        arreglo.push('<li>Patente debe tener mínimo 6 caracteres</li>');
    if(maxMinValue(tara, 6, 0))
        arreglo.push('<li>Tara acepta máximo 6 dígitos</li>');
    if(maxMinValue(carga, 6, 0))
        arreglo.push('<li>Carga acepta máximo 6 dígitos</li>');
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
                    successMessage('Registro realizado con éxito, ','se ha ingresado la máquina  a la base de datos');
                    $('#btnAñadirMaquina').removeClass('btn-primary').addClass('btn-success').attr('id','btnVolverMaquina').html('<i class="fa fa-repeat"></i>Agregar otra');
                    exito = 1;
                }
                else {
                    warningMessage(arreglo.msg);
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
