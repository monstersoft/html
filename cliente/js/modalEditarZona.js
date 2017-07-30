var exito = 0;
var data = 
    [{
        idEmpresa: 0
    },{
        idZona: 0
    },{
        nombre: {original: '',modificado: '',cambio: 0}
    }]
$('.modalEditarZona').on('click','#btnVolverEditar',function(){
    $('.alert').remove();
    $('#btnVolverEditar').removeClass('btn-success').addClass('btn-primary').attr('id','btnEditarZona').html('<i class="cargar fa fa-pencil"></i> Editar');
});
$('.editarZona').click(function(){
    $('.modalEditarZona').modal();
    var url = devuelveUrl('cliente/ajax/datosZona.php');
    var id = $(this).attr('id');
    var datos = retornaDatos(id,url);
    datos.success(function(respuesta){
        data[0].idEmpresa = respuesta.idEmpresa;
        data[1].idZona = respuesta.idZona;
        data[2].nombre.original = respuesta.nombre;
    });
});
$('.modalEditarZona').on('click','#btnEditarZona',function(){
    $('.alert').remove();
    var arreglo = new Array();
    data[2].nombre.modificado = $('#nombreEditarZona').val().toUpperCase();
    var numberErrors = 0;
    if(isEmpty(data[2].nombre.modificado))
        arreglo.push('<li>El campo nombre es obigatorio</li>');
    if(maxLength(data[2].nombre.modificado, 30))
        arreglo.push('<li>Nombre no debe superar los 30 caracteres</li>');
    if(arreglo.length == 0) {
        var flag = true;
        if(data[2].nombre.original != data[2].nombre.modificado){
            data[2].nombre.cambio = 1;
            flag = false;
        }
        if(flag != true){
            var url = devuelveUrl('cliente/ajax/editarZona.php');
            $.ajax({
                url : url,
                type: 'POST',
                data:{datos: data },
                beforeSend: function() {activarLoaderBotones('fa-pencil','fa-refresh');},
                success: function(arreglo) {
                    var array = JSON.parse(arreglo);
                    if(array.msgEditados.length > 0) {
                        successMessage('',array.msgEditados);
                        $('#btnEditarZona').removeClass('btn-primary').addClass('btn-success').attr('id','btnVolverEditar').html('<i class="fa fa-repeat"></i>Volver a editar');
                        exito = 1;
                    }
                    if(array.msgNoEditados.length > 0)
                        warningMessage(array.msgNoEditados);
                    if(array.edicion.nombre == 1) {
                        data[2].nombre.original = data[2].nombre.modificado;
                        data[2].nombre.cambio = 0;
                    } 
                },
                complete: function() {desactivarLoaderBotones('fa-pencil','fa-refresh');},
                error: function(xhr) {console.log(xhr.responseText);}
            });
        }
        else
            infoMessage('No hay cambios, ','debes ingresar nuevos valores para editar');

    }
    else 
        errorMessage(arreglo);
});
function resetData(data) {
        data[0].idEmpresa = 0;
        data[1].idZona = 0;
        data[2].nombre.original = '';
        data[2].nombre.modificado = '';
        data[2].nombre.cambio = 0;
    return data;
}
function retornaDatos(id,url) {
    return $.ajax({
        url: url,
        type: 'POST',
        data: {id: id},
        dataType: 'json',
        cache: false,
        success: function(arreglo) {
            $('#idZonaEditarZona').val(arreglo.idZona);                  
            $('#idEmpresaEditarZona').val(arreglo.idEmpresa);
            $('#nombreEditarZona').val(arreglo.nombre);
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
