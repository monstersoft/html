$(document).ready(function(){
    var data = 
        [{
            idProyecto: 0
        },{
            idZona: 0
        },{
            nombre: {original: '',modificado: '',cambio: 0}
        },{ 
            latitud: {original: 0,modificado: 0,cambio: 0} 
        },{
            longitud: {original: 0,modificado: 0,cambio: 0}
        }]
    function resetData(data) {
            data[0].idProyecto = 0;
            data[1].idZona = 0;
            data[2].nombre.original = '';
            data[2].nombre.modificado = '';
            data[2].nombre.cambio = 0;
            data[3].latitud.original = 0;
            data[3].latitud.modificado = 0;
            data[3].latitud.cambio = 0;
            data[4].longitud.original = 0;
            data[4].longitud.modificado = 0;
            data[4].longitud.cambio = 0;
        return data;
    }
    function retornaDatos(id,url) {
        return $.ajax({
            url: url,
            type: 'POST',
            data: {idZona: id},
            dataType: 'json',
            success: function(arreglo){
                alert(arreglo.mensaje);                   
                /*$('#idProyecto').val(arreglo.idProyecto);
                $('#idZona').val(arreglo.idZona);
                $('#nombreEditarZona').val(arreglo.nombre);
                $('#latitudEditarZona').val(arreglo.latitud);
                $('#longitudEditarZona').val(arreglo.longitud);*/
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
        resetData(data);
        borrarMensajes();
        $('.modalEditarZona').modal('show');
        var url = devuelveUrl('html/cliente/datosZona.php');
        var id = $(this).attr('id');
        alert(id);
        var datos = retornaDatos(id,url);
        datos.success(function(respuesta){
            alert(respuesta.mensaje);
           /* data[0].idProyecto = respuesta.idProyecto;
            data[1].idZona = respuesta.idZona;
            data[2].nombre.original = respuesta.nombre;
            data[3].latitud.original = respuesta.latitud;
            data[4].longitud.original = respuesta.longitud;*/
        });
    });
    /*$('.modalEditarZona').on('click','#btnEditarZona',function(){
        borrarMensajes();
        var arreglo = new Array();
        data[2].nombre.modificado = $('#nombreEditarProyecto').val();
        data[3].latitud.modificado = $('#latitudEditarProyecto').val();
        data[4].longitud.modificado = $('#longitudEditarProyecto').val();
        var numberErrors = 0;
        if(isEmpty(data[2].nombre.modificado))
            arreglo.push('<li>El campo nombre es obigatorio</li>');
        if(isEmpty(data[3].latitud.modificado))
            arreglo.push('<li>El campo latitud es obigatorio</li>');
        if(isEmpty(data[4].longitud.modificado))
            arreglo.push('<li>El campo longitud es obigatorio</li>');
        if(arreglo.length == 0) {
            var flag = true;
            if(data[2].nombre.original != data[2].nombre.modificado){
                data[2].nombre.cambio = 1;
                flag = false;
            }
            if(data[3].latitud.original != data[3].latitud.modificado){
                data[3].latitud.cambio = 1;
                flag = false;
            }
            if(data[4].longitud.original != data[4].longitud.modificado){
                data[4].longitud.cambio = 1;
                flag = false;
            }
            if(flag != true){
                var url = devuelveUrl('html/cliente/editarZona.php');
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
                                $('.message').html('<div class="ui success message"><div class="content"><ul>'+lisp+'</ul></div>');
                            }
                            if(list.fracasos >=1){
                                list.msgFracaso.forEach(function(element){
                                    lispError += '<li>'+element+'</li>';
                                });
                                $('.messageError').html('<div class="ui error message"><div class="content"><ul>'+lispError+'</ul></div>');
                            }
                            if(list.exitoNombre == 1) {
                                data[2].nombre.original = data[2].nombre.modificado;
                                data[2].nombre.cambio = 0;
                            }
                            if(list.exitoNombre == 1) {
                                data[3].latitud.original = data[3].latitud.modificado;
                                data[3].latitud.cambio = 0;
                            }
                            if(list.exitoNombre == 1) {
                                data[4].longitud.original = data[4].longitud.modificado;
                                data[4].longitud.cambio = 0;
                            }
                    }
                });
            }
            else
                infoMessage('No hay cambios','Debes ingresar nuevos valores para editar');
            
        }
        else 
            errorMessage(arreglo);
    });*/
});