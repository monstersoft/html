var exito = 0;
$('.modalAgregarZona').on('click','.volverAgregar',function(){
    $('#formularioAgregarZona')[0].reset();
    $('.alert').remove();
    $('.volverAgregar').remove();
    $('.cancelar').remove();
    $('.clearfix').append('<button type="submit" class="btn btn-primary pull-right" id="btnAñadirZona"><i class="cargar fa fa-plus"></i>Agregar</button>');
    $('.clearfix').append('<button type="button" class="btn btn-inverse pull-right cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>');
});
$('.agregarZona').click(function(){
    $('#idEmpresaAgregarZona').val($(this).attr('id'));
    $('.modalAgregarZona').modal();
});
$('.modalAgregarZona').on('click','#btnAñadirZona',function(){
    $('.alert').remove();
    var arreglo = new Array();
    var nombre = $('#nombreAgregarZona').val();
    var numberErrors = 0;
    if(isEmpty(nombre))
        arreglo.push('<li>El campo nombre es obigatorio</li>');
    if(maxLength(nombre,30))
        arreglo.push('<li>El campo nombre debe tener máximo 30 caracteres</li>');
    if(arreglo.length == 0) {
        var data = $('#formularioAgregarZona').serialize();
        var url = devuelveUrl('cliente/ajax/agregarZona.php');
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            cache: false,
            beforeSend: function() {
              activarLoaderBotones('fa-plus','fa-refresh');
            },
            success: function(arreglo) {
                if(arreglo.exito == 1) {
                    successMessage('Registro realizado con éxito ','se ha ingresado la zona a la base de datos');
                    $('.cancelar').remove();
                    $('#btnAñadirZona').remove();
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
            error: function(xhr) {console.log(xhr.responseText);},
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
