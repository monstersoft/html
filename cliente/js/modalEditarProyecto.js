$(document).ready(function() {
    $('.editarProyecto').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('.modalEditarProyecto').modal('show');
    });
});