$(document).ready(function(){
    var data = 
        [{
            id: 1 
        },{
            nombre: {original: '',modificado: '',cambio: 0}
        },{
            rut: {original: '',modificado: '',cambio: 0}
        },{
            correo: {original: '',modificado: '',cambio: 0}
        },{
            telefono: {original: 0,modificado: 0,cambio: 0}
        }]
    function resetData(data) {
            data[0].id = 0;
            data[1].nombre.original = '';
            data[1].nombre.modificado = '';
            data[1].nombre.cambio = 0;
            data[2].rut.original = '';
            data[2].rut.modificado = '';
            data[2].rut.cambio = '';
            data[3].correo.original = '';
            data[3].correo.modificado = ''; 
            data[3].correo.cambio = 0;
            data[4].telefono.original = '';
            data[4].telefono.modificado = '';
            data[4].telefono.cambio = 0;
        return data;
    }
    function retornaDatos(id,url) {
        alert(url); ///////////////////////////////////////////////////////////////////////////////
        return $.ajax({
            url: url,
            type: 'POST',
            data: {idEmpresa: id},
            dataType: 'json',
            success: function(arreglo){
                $('#idEditar').val(arreglo.idEmpresa);
                $('#nombreEditar').val(arreglo.nombre);
                $('#rutEditar').val(arreglo.rut);
                $('#emailEditar').val(arreglo.correo);
                $('#telefonoEditar').val(arreglo.telefono);
                $('#direccionEditar').val(arreglo.direccion);         
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
    $('.editarEmpresa').click(function(){
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.icon.success.message').remove();
        $('.modalEditarEmpresa').modal('show');
        var url = devuelveUrl('html/cliente/datosEmpresa.php');
        alert(url); ///////////////////////////////////////////////////////////////////////////////
        var id = $(this).attr('id');
        var datos = retornaDatos(id,url);
        datos.success(function(respuesta){
            data[0].id = respuesta.idEmpresa;
            data[1].nombre.original = respuesta.nombre;
            data[2].rut.original = respuesta.rut;
            data[3].correo.original = respuesta.correo;
            data[4].telefono.original = respuesta.telefono;
        });
    });
    $('.modalEditarEmpresa').on('click','#btnEditarEmpresa',function(){
        var arreglo = new Array();
        data[1].nombre.modificado = $('#nombreEditar').val();
        data[2].rut.modificado = $('#rutEditar').val();
        data[3].correo.modificado = $('#emailEditar').val();
        data[4].telefono.modificado =  $('#telefonoEditar').val();
        var numberErrors = 0;
        if(isEmpty(data[1].nombre.modificado))
            arreglo.push('<li>El campo nombre es obigatorio</li>');
        if(isEmpty(data[2].rut.modificado))
            arreglo.push('<li>El campo rut es obigatorio</li>');
        if(isEmpty(data[3].correo.modificado))
            arreglo.push('<li>El campo correo es obigatorio</li>');
        if(isEmpty(data[4].telefono.modificado))
            arreglo.push('<li>El campo teléfono es obigatorio</li>');
        if(isMail(data[3].correo.modificado))
            arreglo.push('<li>Formato erróneo de correo electrónico</li>');
        if(isExactly(data[4].telefono.modificado))
            arreglo.push('<li>El teléfono debe tener 9 dígitos</li>');
        if(isNumber(data[4].telefono.modificado))
            arreglo.push('<li>El teléfono no es un número o no está en un formato adecuado</li>');
        if(isRutEditar())
            arreglo.push('<li>Formato no adecuado de rut o no es válido</li>');
        if(arreglo.length == 0) {
            var flag = true;
            if(data[1].nombre.original != data[1].nombre.modificado){
                data[1].nombre.cambio = 1;
                flag = false;
                alert('Cambiaste el nombre');
            }
            if(data[2].rut.original != data[2].rut.modificado){
                data[2].rut.cambio = 1;
                flag = false;
                alert('Cambiaste el rut');
            }
            if(data[3].correo.original != data[3].correo.modificado){
                data[3].correo.cambio = 1;
                flag = false;
                alert('Cambiaste el correo');
            }
            if(data[4].telefono.original != data[4].telefono.modificado){
                data[4].telefono.cambio = 1;
                flag = false;
                alert('Cambiaste el telefono');
            }
            if(flag != true){
                var url = devuelveUrl('html/cliente/editarEmpresa.php');
                alert(url); ///////////////////////////////////////////////////////////////////////////////
                $.ajax({
                    url : url,
                    type: 'POST',
                    data:{datos: data },
                    success: function(arreglo) {     
                        alert(arreglo);
                    }
                });
                successMessage('SI cambiaste','SI cambiaste');
            }
            else
                successMessage('NO cambiaste','NO cambiaste');
            
        }
        else 
            errorMessage(arreglo);
    });
});
