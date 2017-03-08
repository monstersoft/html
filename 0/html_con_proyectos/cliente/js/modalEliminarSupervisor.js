$(document).ready(function() {
    $('.eliminarSupervisor').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('.modalEliminarSupervisor').modal('show');
    });
});