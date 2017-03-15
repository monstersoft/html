$(document).ready(function(){
    var data = 
        [{
            id: 0
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
        return $.ajax({
            url: url,
            type: 'POST',
            data: {idEmpresa: id},
            dataType: 'json',
            cache: false,
            success: function(arreglo){;
                $('#idEditarEmpresa').val(arreglo.idEmpresa);
                $('#nombreEditarEmpresa').val(arreglo.nombre);
                $('#rutEditarEmpresa').val(arreglo.rut);
                $('#emailEditarEmpresa').val(arreglo.correo);
                $('#celularEditarEmpresa').val(arreglo.telefono);
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
        $('.modalEditarEmpresa').modal();
        var url = devuelveUrl('a/cliente/ajax/datosEmpresa.php');
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
        $('.alert').remove();
        var arreglo = new Array();
        data[1].nombre.modificado = upperCase($('#nombreEditarEmpresa').val());
        data[2].rut.modificado = upperCase($('#rutEditarEmpresa').val());
        data[3].correo.modificado = lowerCase($('#emailEditarEmpresa').val());
        data[4].telefono.modificado =  $('#celularEditarEmpresa').val();
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
        if(maxLength(data[1].nombre.modificado, 30))
            arreglo.push('<li>Nombre no debe superar los 30 caracteres</li>');
        if(isRut(data[2].rut.modificado))
            arreglo.push('<li>Formato no adecuado de rut o no es válido, debe ir con guíon y sin puntos</li>')
        if(arreglo.length == 0) {
            var flag = true;
            if(data[1].nombre.original != data[1].nombre.modificado){
                data[1].nombre.cambio = 1;
                flag = false;
            }
            if(data[2].rut.original != data[2].rut.modificado){
                data[2].rut.cambio = 1;
                flag = false;
            }
            if(data[3].correo.original != data[3].correo.modificado){
                data[3].correo.cambio = 1;
                flag = false;
            }
            if(data[4].telefono.original != data[4].telefono.modificado){
                data[4].telefono.cambio = 1;
                flag = false;
            }
            if(flag != true){
                var url = devuelveUrl('a/cliente/ajax/editarEmpresa.php');
                $.ajax({
                    url : url,
                    type: 'POST',
                    data:{datos: data },
                    success: function(arreglo) {
                            var list = JSON.parse(arreglo);
                            var lisp = '';
                            var lispError = '';
                            if(list.exitos >=1){
                                list.msgExito.forEach(function(element){
                                    lisp += '<li>'+element+'</li>';
                                });
                                $('.message').html('<div class="alert alert-success"><div class="content"><ul>'+lisp+'</ul></div>');
                            }
                            if(list.fracasos >=1){
                                list.msgFracaso.forEach(function(element){
                                    lispError += '<li>'+element+'</li>';
                                });
                                $('.messageError').html('<div class="alert alert-warning"><div class="content"><ul>'+lispError+'</ul></div>');
                            }
                            if(list.exitoNombre == 1) {
                                data[1].nombre.original = data[1].nombre.modificado;
                                data[1].nombre.cambio = 0;
                            }
                            if(list.exitoRut == 1) {
                                data[2].rut.original = data[2].rut.modificado;
                                data[2].rut.cambio = 0;
                            }
                            if(list.exitoCorreo == 1) {
                                data[3].correo.original = data[3].correo.modificado;
                                data[3].correo.cambio = 0;
                            }
                            if(list.exitoTelefono == 1) {
                                data[4].telefono.original = data[4].telefono.modificado;
                                data[4].telefono.cambio = 0;
                            }           
                    }
                });
            }
            else
                infoMessage('No hay cambios','Debes ingresar nuevos valores para editar');
            
        }
        else 
            errorMessage(arreglo);
    });
});

