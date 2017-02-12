$(document).ready(function() {
    var formData = new FormData(('#formulario')[0]);
    $('.subirArchivo').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('#formularioSubirArchivo').trigger("reset");
        $('#idZonaArchivo').val($(this).attr('id'));
        $('.modalSubirArchivo').modal({autofocus: false}).modal('show');
        fechaHoy();
    });
});
