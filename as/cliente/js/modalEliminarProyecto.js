$(document).ready(function() {
    $('.eliminarProyecto').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('.modalEliminarProyecto').modal('show');
    });
});