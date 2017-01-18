$(document).ready(function() {
    $('.agregarZona').click(function(){
        var id = $(this).attr('id');
        $('#idEmpresaZona').val(id);
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('.modalAgregarZona').modal('show');
    });
});