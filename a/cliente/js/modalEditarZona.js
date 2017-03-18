$(document).ready(function(){
    var data = 
        [{
            idEmpresa: 0
        },{
            idZona: 0
        },{
            nombre: {original: '',modificado: '',cambio: 0}
        }]
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
    $('.editarZona').click(function(){
        $('.modalEditarZona').modal();
        var url = devuelveUrl('a/cliente/ajax/datosZona.php');
        //var id = $(this).attr('id');
        //var id = $('#hola').val();
        var datos = retornaDatos(19,url);
        datos.success(function(respuesta){
            data[0].idEmpresa = respuesta.idEmpresa;
            data[1].idZona = respuesta.idZona;
            data[2].nombre.original = respuesta.nombre;
        });
    });
    $('.modalEditarZona').on('click','#btnEditarZona',function(){
        $('.alert').remove();
        var arreglo = new Array();
        data[2].nombre.modificado = upperCase($('#nombreEditarZona').val());
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
                var url = devuelveUrl('a/cliente/ajax/editarZona.php');
                $.ajax({
                    url : url,
                    type: 'POST',
                    data:{datos: data },
                    success: function(arreglo) {
                            console.log(JSON.stringify(arreglo));
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
                                $('.messageError').html('<div class="alert alert-error"><div class="content"><ul>'+lispError+'</ul></div>');
                            }
                            if(list.exitoNombre == 1) {
                                data[2].nombre.original = data[2].nombre.modificado;
                                data[2].nombre.cambio = 0;
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