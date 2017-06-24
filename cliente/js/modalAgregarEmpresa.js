var exito = 0;
$('.modalAgregarEmpresa').on('click','#btnVolverEmpresa',function(){
    $('#formularioAgregarEmpresa')[0].reset();
    $('.alert').remove();
    $('#btnVolverEmpresa').removeClass('btn-success').addClass('btn-primary').attr('id','btnAñadirEmpresa').html('<i class="cargar fa fa-repeat"></i>Agregar');
});
$('.agregarEmpresa').click(function(){
    $('.modalAgregarEmpresa').modal();
});
$('.modalAgregarEmpresa').on('click','#btnAñadirEmpresa',function(){
    $('.alert').remove();
    var arreglo = new Array();
    var nombre = $('#nombreAgregarEmpresa').val();
    var rut =  $('#rutAgregarEmpresa').val();
    var email = $('#emailAgregarEmpresa').val();
    var celular = $('#celularAgregarEmpresa').val();
    var numberErrors = 0;
    if(isEmpty(nombre))
        arreglo.push('<li>Nombre es requerido</li>');
    if(isEmpty(rut))
        arreglo.push('<li>Rut es requerido</li>');
    if(isEmpty(email))
        arreglo.push('<li>Correo es requerido</li>');
    if(isEmpty(celular))
        arreglo.push('<li>Celular es requerido</li>');
    if(isMail(email))
        arreglo.push('<li>Correo no está en un  formado adecuado</li>');
    if(isExactly(celular))
        arreglo.push('<li>Celular debe tener 9 dígitos</li>');
    if(isNumber(celular))
        arreglo.push('<li>Celular no es un número o no está en un formato adecuado</li>');
    if(isRut(rut))
        arreglo.push('<li>Formato no adecuado de rut o no es válido, debe ir con guíon y sin puntos</li>');
    if(maxLength(nombre, 30))
        arreglo.push('<li>Nombre no debe superar los 30 caracteres</li>');
    if(arreglo.length == 0) {
        var data = $('#formularioAgregarEmpresa').serialize();
        var url = devuelveUrl('cliente/ajax/agregarEmpresa.php');
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            cache: false,
            beforeSend: function() {
              activarLoaderBotones('fa-plus','fa-refresh');
            },
            success: function(returnedData) {
                if(returnedData.exito == 1) {
                    successMessage('Registro realizado con éxito ','se ha ingresado la empresa  a la base de datos');
                    $('#btnAñadirEmpresa').removeClass('btn-primary').addClass('btn-success').attr('id','btnVolverEmpresa').html('<i class="cargar fa fa-repeat"></i>Volver a agregar');
                    exito = 1;
                }
                else {
                    warningMessage(returnedData.msg);
                }
            },
            complete: function() {
                desactivarLoaderBotones('fa-plus','fa-refresh');
            }
        }).fail(function( jqXHR, textStatus, errorThrown ){
            if (jqXHR.status === 0){
                alert('No hay coneccion con el servidor');
            } else if (jqXHR.status == 404) {
                alert('La pagina solicitada no fue encontrada, error 404');
            } else if (jqXHR.status == 500) {
                alert('Error interno del servidor');
            } else if (textStatus === 'parsererror') {
                alert('Error en la respuesta, debes analizar la sintaxis JSON');
            } else if (textStatus === 'timeout') {
                alert('Ya ha pasado mucho tiempo');
            } else if (textStatus === 'abort') {
                alert('La peticion fue abortada');
            } else {
                alert('Error desconocido');
            }
        });
    }
    else {
        errorMessage(arreglo);
    }
});