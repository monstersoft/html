$(document).ready(function() {
    $('.subirArchivo').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('#idZonaArchivo').val($(this).attr('id'));
        $('.modalSubirArchivo').modal('show');
    });
    $('#btnSubirArchivo').click(function(){
        alert('Subir Archivo');
    });
});