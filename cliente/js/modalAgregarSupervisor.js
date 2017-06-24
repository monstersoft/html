var exito = 0;
$('.modalAgregarSupervisor').on('click','.volverAgregar',function(){
    $('#formularioAgregarSupervisor')[0].reset();
    $('.alert').remove();
    $('.volverAgregar').remove();
    $('.cancelar').remove();
    $('.clearfix').append('<button type="submit" class="btn btn-primary pull-right" id="btnAñadirSupervisor"><i class="cargar fa fa-plus"></i>Agregar</button>');
    $('.clearfix').append('<button type="button" class="btn btn-inverse pull-right cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>');
});
$('.agregarSupervisor').click(function(){
    $.ajax({
            url: devuelveUrl('cliente/ajax/datosZonas.php'),
            type: 'POST',
            data: {id: $(this).attr('id')},
            dataType: 'json',
            success: function(arreglo) {
                var opciones = '';
                $.each(arreglo,function(index) {
                    opciones += '<option class="dinamico" value='+arreglo[index].idZona+'>'+arreglo[index].nombre+'</option>';
                });
                $('#zonasAsociadas').append(opciones);
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
    $('.modalAgregarSupervisor').modal();
});
$('.modalAgregarSupervisor').on('click','#btnAñadirSupervisor',function(){
    $('.alert').remove();
    var arreglo = new Array();
    var nombre = $('#nombreAgregarSupervisor').val();
    var email = $('#correoAgregarSupervisor').val();
    var numberErrors = 0;
    if(isEmpty(nombre))
        arreglo.push('<li>El campo nombre es obigatorio</li>');
    if(maxLength(nombre,45))
        arreglo.push('<li>El campo nombre debe tener máximo 45 caracteres</li>');
    if(isEmpty(email))
        arreglo.push('<li>El campo correo es obigatorio</li>');
    if(isMail(email))
        arreglo.push('<li>Formato erróneo de correo electrónico</li>');
    if($('#zonasAsociadas').val() == null || $('#zonasAsociadas').val() == "")
        arreglo.push('<li>Tienes que seleccionar al menos una zona</li>');
    if(arreglo.length == 0) {
        $.ajax({
            url: devuelveUrl('cliente/ajax/agregarSupervisor.php'),
            type: 'POST',
            data: $('#formularioAgregarSupervisor').serialize(),
            dataType: 'json',
            cache: false,
            beforeSend: function() {
              activarLoaderBotones('fa-plus','fa-refresh');
            },
            success: function(arreglo) {
                console.log(JSON.stringify(arreglo));
                if(arreglo.exito == 1) {
                    successMessage('Registro realizado con éxito ','se ha enviado un e-mail al supervisor para que habilite su cuenta');
                    $('.cancelar').remove();
                    $('#btnAñadirSupervisor').remove();
                    $('.clearfix').append('<button type="button" class="btn btn-success pull-right volverAgregar"><i class="fa fa-repeat"></i>Volver a Agregar</button>');
                    $('.clearfix').append('<button type="button" class="btn btn-inverse pull-right cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>');
                    exito = 1;
                }
                else {
                    $('.message').html('<div class="alert alert-warning"><ul>'+arreglo.msg+'</ul></div>');
                }
            },
            complete: function() {
                desactivarLoaderBotones('fa-plus','fa-refresh');
            },
            error: function(xhr) {console.log(xhr.responseText);}
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