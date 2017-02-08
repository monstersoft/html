$(document).ready(function() {
    $('.agregarMaquina').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('#idZonaMaquina').val($(this).attr('id'));
        $('.modalAgregarMaquina').modal('show');
    });
    $('#btnAñadirMaquina').click(function(){
        alert('Agregar Máquina');
    });
});