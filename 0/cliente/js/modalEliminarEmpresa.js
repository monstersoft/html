$(document).ready(function() {
    $('.eliminarEmpresa').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('.modalEliminarEmpresa').modal('show');
    });
});