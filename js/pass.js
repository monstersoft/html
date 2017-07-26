$('body').on('click','.cerrar',function(){
    $(this).closest('.message').transition('fade');
});
$('#btnLogin').click(function(){
    $('.ui .message').remove();
    var arreglo = new Array();
    var nombre = $('#nombre').val();
    var email =  $('#email').val();
    var empresa = $('#empresa').val();
    var cargo = $('#cargo').val();
    var password = $('#password').val();
    var numberErrors = 0;
    if(isEmpty(nombre) || isEmpty(email) || isEmpty(empresa) || isEmpty(cargo) || isEmpty(password))
        arreglo.push('<li>Todos los campos son obligatorios</li>');
    if(maxLength(nombre, 45))
        arreglo.push('<li>Nombre no debe superar los 45 caracteres</li>');
    if(maxLength(email, 60))
        arreglo.push('<li>Correo no debe superar los 60 caracteres</li>');
    if(maxLength(empresa, 45))
        arreglo.push('<li>Empresa no debe superar los 45 caracteres</li>');
    if(maxLength(cargo, 45))
        arreglo.push('<li>Cargo no debe superar los 45 caracteres</li>');
    if(maxMinValue(password, 12, 6))
        arreglo.push('<div>Contraseña  debe tener mínimo 6 y máximo 12</div>');
    if(isMail(email))
        arreglo.push('<li>Correo no está en un  formado adecuado</li>');
    if(arreglo.length == 0) {
        var data = $('#formularioGenerarContraseña').serialize();
            $.ajax({                  
            url: devuelveUrl('ajax/generar.php'),
            data: $('#formularioGenerarContraseña').serialize(),
            type: "POST",
            dataType: "json",
            beforeSend: function() {
                $('#btnLogin').addClass('disabled');
                $('#btnLogin i').removeClass('fa-send').addClass('fa-cog fa-spin');
            },
            success: function(arreglo) {
                console.log(JSON.stringify(arreglo));
                if(arreglo.exito == 1)
                    successUi('Registro exitoso','Se ha enviado un correo al cliente');
                else
                    errorUi(arreglo.msg);
            },
            error: function(xhr) {console.log(xhr.responseText);},
        }).complete(function(){
                $('#btnLogin').removeClass('disabled');
                $('#btnLogin i').removeClass('fa-cog fa-spin').addClass('fa-send');
        }).fail(function( jqXHR, textStatus, errorThrown ){
        if (jqXHR.status === 0){
            alert('No hay coneccion con el servidor, debe comunicarte con el administrador');
        } else if (jqXHR.status == 404) {
            alert('La pagina solicitada no fue encontrada: error 404, debes comunicarte con el administrador');
        } else if (jqXHR.status == 500) {
            alert('Error interno del servidor, debes comunicarte con el administrador');
        } else if (textStatus === 'parsererror') {
            alert('Error en la respuesta JSON, debes comunicarte con el administrador');
        } else if (textStatus === 'timeout') {
            alert('Se ha excedido el tiempo de respuesta, debes comunicarte con el administrador');
        } else if (textStatus === 'abort') {
            alert('La peticion fue abortada, debes comunicarte con el administrador');
        } else {
            alert('Error desconocido, debes comunicarte con el administrador');
        }
        });
            }
    else
        errorUi(arreglo);
});

function devuelveUrl(pathSinCarpetaRaiz) {
    var url;
    var host = window.location.host;
    var protocolo = window.location.protocol;
    if(host != 'localhost')
            url = protocolo+'//'+host+'/'+pathSinCarpetaRaiz;
    else
        url = protocolo+'//'+host+'/html/'+pathSinCarpetaRaiz;
    return url;
}

