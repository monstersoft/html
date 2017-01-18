$(document).ready(function() {
    $('.editarZona').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('.modalEditarZona').modal('show');
    });
});