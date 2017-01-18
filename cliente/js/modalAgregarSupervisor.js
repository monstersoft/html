$(document).ready(function() {
    $('.agregarSupervisor').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('.modalAgregarSupervisor').modal('show');
    });
});