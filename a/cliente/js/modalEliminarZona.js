$(document).ready(function() {
    $('.eliminarZona').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('.modalEliminarZona').modal('show');
    });
});