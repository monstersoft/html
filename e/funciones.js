function ingresarLimites(){
	//$('.contenido').html('<h1>'+$('#idZonaMaquina').val()+'</h1>');
}
function agregarOtraMaquina(){
    $('.ui.button').remove();
    $('.botones').html('<a class="ui button black limpiar"><i class="close icon"></i>Limpiar</a><a class="ui button green" id="btnAñadirMaquina"><i class="add icon"></i>Añadir</a>');
    limpiarFormularioAgregarMaquina();
    $('.ui.negative.message').remove();
    $('.ui.warning.message').remove();
    $('.ui.success.message').remove();
    $('.stepMaquinas').removeClass('completed').addClass('active');
}
function limpiarFormularioAgregarMaquina(){
    $('#identificadorMaquina').val('');
    $('#patenteMaquina').val('');
    $('#velocidadMaquina').val('');
    $('#taraMaquina').val('');
    $('#anhoMaquina').val('');
    $('#cargaMaquina').val('');
    $('.ui.negative.message').remove();
    $('.ui.warning.message').remove();
    $('.ui.success.message').remove();
}
function ajaxAgregarMaquina(){
    var arreglo = new Array();
    var id = $('#identificadorMaquina').val();
    var patente = $('#patenteMaquina').val();
    var velocidad = $('#velocidadMaquina').val();
    var tara = $('#taraMaquina').val();
    var year = $('#anhoMaquina').val();
    var carga = $('#cargaMaquina').val();
    var numberErrors = 0;
    //if(isEmpty(id))
        //arreglo.push('<li>El campo id es obigatorio</li>');
    if(isEmpty(patente))
        arreglo.push('<li>Patente es obigatoria</li>');
    if(isEmpty(velocidad))
        arreglo.push('<li>Velocidad máxima es obigatorio</li>');
    if(isEmpty(tara))
        arreglo.push('<li>Tara máxima es obigatorio</li>');
    if(isEmpty(year))
        arreglo.push('<li>Año es obigatorio</li>');
    if(isEmpty(carga))
        arreglo.push('<li>Carga máxima es obigatorio</li>');
    //if(isNumber(id))
        //arreglo.push('<li>El campo id es obigatorio</li>');
    if(isNumber(velocidad))
        arreglo.push('<li>Velocidad máxima no es un número adecuado</li>');
    if(isNumber(tara))
        arreglo.push('<li>Tara máxima no es un número adecuado</li>');
    if(isNumber(year))
        arreglo.push('<li>Año no es un número adecuado</li>');
    if(isNumber(carga))
        arreglo.push('<li>Carga máxima no es un número adecuado</li>');
    if(maxLength(patente, 6))
        arreglo.push('<li>Patente debe tener mínimo 6 caracteres</li>');
    if(maxMinValue(velocidad, 100 ,50))
        arreglo.push('<li>Velocidad mínima 50 km/hr y máxima 100 km/hr</li>');
    if(maxMinValue(tara, 10000, 500))
        arreglo.push('<li>Tara mínima 500 kg y máxima 10000 kg</li>');
    if(maxMinValue(year, 2017, 1900))
        arreglo.push('<li>Año mínimo 1900 y máximo 2017</li>');
    if(maxMinValue(carga, 10000, 500))
        arreglo.push('<li>Carga mínima 500 kg y máxima 10000 kg</li>');
    if(arreglo.length == 0) {
        var data = $('#formularioAgregarMaquina').serialize();
        $.ajax({
            url: 'agregarMaquina.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            beforeSend: function() {
              $('.limpiar').addClass('disabled');
              $('#btnAñadirMaquina').addClass('disabled loading');
            },
            success: function(arreglo) {
                alert(JSON.stringify(arreglo));
                if(arreglo.exito == 1) {
	                $('#cancelar').removeClass('disabled');
	                $('#btnAñadirMaquina').removeClass('disabled loading');
	                $('.stepMaquinas').removeClass('active').addClass('completed');
	                successMessage('Registro realizado con éxito','Presiona siguiente para continuar al otro paso');
	                $('.ui.button').remove();
	               	$('.botones').html('<a class="ui button black" id="btnAñadirOtraMaquina"><i class="close icon"></i>Añadir Otra Máquina</a><a class="ui button green" id="siguiente">Seguir<i class="arrow right icon"></i></a>');
                }
                else {
                    $('.message').html('<div class="ui warning message">'+arreglo.msg+'</div>');
                }
            },
            complete: function(){
           		$('.limpiar').removeClass('disabled');
              	$('#btnAñadirMaquina').removeClass('disabled loading');
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
}
function ajaxInfoZonas(){
    $.ajax({
	    url: 'infoZonas.php',
	    type: 'POST',
	    dataType: 'json',
	    beforeSend: iconoCargando,
	    success: function(arreglo) {infoZonas(arreglo);},
	    complete: eliminarCargando
	});
}
function siguiente() {
	var id = $(this).attr('id');
	//<i class="map icon"></i><div class="content">Identificador Zona<div class="sub header">5</div></div>
    $('.stepZonas').removeClass('active').addClass('completed');
    agregarMaquinas();
    $('.stepMaquinas').addClass('active');
    $('.contenido').load('formularioAgregarMaquina.php',id,function(){$('#idZonaMaquina').val(id);});
}
function agregarMaquinas(arreglo) {
    $('.stepMaquinas').removeClass('active');
}
function configurarDatos(arreglo) {
	$('.stepMaquinas').removeClass('active').addClass('completed');
    $('.stepDatos').addClass('active');
}
function descargaArchivo(arreglo) {
	   $('.stepDatos').removeClass('active').addClass('completed');
       $('.contenidoZonas').html('Descargar CVS');
       $('.stepDatos').addClass('active');
}
function infoZonas(arreglo) {
    $.each(arreglo, function(index) {
       $('.contenidoZonas').append('<div class="item"><div class="right floated content"><div class="ui button siguiente" id="'+arreglo[index].idZona+'">Seguir<i class="arrow right icon"></i></div></div><i class="big marker middle aligned icon"></i><div class="content"><a class="header">'+arreglo[index].zona+'</a><div class="description">'+arreglo[index].empresa+'</div><div class="description">'+arreglo[index].proyecto+'</div><div class="description">'+arreglo[index].idZona+'</div></div></div>');
    }
);
}
function iconoCargando(){
    $('.cargando').html('<i class="refresh huge loading icon"></i>');
}
function eliminarCargando(){
    $('.refresh').remove();
}
function isEmpty(value) {
    if (value == ''){
      return true;
    }
    else {
      return false;
    }
}
function isMail(value) {
    var expresion = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
    if(value == '') 
        return false;
    else {
      if(!expresion.test(value)) 
        return true;
      else
        return false;
    }
}
function areEqual(value1,value2) {
    if(value1 == '' || value2 == '') 
        return false;
    else {
      if(value1 != value2) 
        return true;
      else
        return false;
    }
}
function isExactly(value) {
    if(value == '') 
        return false;
    else {
      if(value.length != 9) 
        return true;
      else
        return false;
    }
}
function isNumber(value) {
    var expresion = /^([0-9])*$/;
    if(value == '')
        return false;
    else {
      if(!expresion.test(value)) 
        return true;
      else
        return false;
    }
}
function isRut() {
    var rut = $('#rut').val();
    var error = $.rut.validar(rut);
    if(rut == '')
        return false;
    else {
      if(error == false) {
        return true;
      }
      else {
        return false;
      }
    }
}
function isRutEditar() {
    var rut = $('#rutEditar').val();
    var error = $.rut.validar(rut);
    if(rut == '')
        return false;
    else {
      if(error == false) {
        return true;
      }
      else {
        return false;
      }
    }
}

function maxLength(value, max) {
    if(value == '') 
        return false;
    else {
      if(value.length > max) 
        return true;
      else
        return false;
    }
}
function minLength(value) {
    if(value == '') 
        return false;
    else {
      if(value.length < 6) 
        return true;
      else
        return false;
    }
}

function maxMinValue(value, max, min) {
    if(value == '') 
        return false;
    else {
      if(value < min || value > max) 
        return true;
      else
        return false;
    }
}
function devuelveUrl(path) {
    var url;
    var host = window.location.host;
    var protocolo = window.location.protocol;
    url = protocolo+'//'+host+'/'+path;
    return url;
}
function borrarMensajes() {
        $('.ui.negative.message').remove();
        $('.ui.warning.message').remove();
        $('.ui.error.message').remove();
        $('.ui.success.message').remove();
        $('.ui.icon.success.message').remove();
        $('.ui.icon.info.message').remove();
}
function errorMessage(arrayErrors) {
    var list = '';
    arrayErrors.forEach(function(element){
        list += element;
    });
    $('.message').html('<div class="ui negative message"><ul>'+list+'</ul></div>');
}
function warningMessage(arrayWarnings) {
    var list = '';
    arrayWarnings.msg.forEach(function(element){
        list += '<li>'+element+'</li>';
    });
    $('.message').html('<div class="ui warning message"><ul>'+list+'</ul></div>');
}
function successMessage(titulo,parrafo) {
    $('.message').html('<div class="ui icon success message"><div class="content"><div class="header">'+titulo+'</div><p>'+parrafo+'</p></div></div>');
}
function infoMessage(titulo,parrafo) {
    $('.message').html('<div class="ui info message"><i class=" icon info"></i><div class="content"><div class="header">'+titulo+'</div><p>'+parrafo+'</p></div></div>');
}
function errorMessage2(arrayErrors) {
    var list = '';
    arrayErrors.forEach(function(element){
        list += element;
    });
    $('.message').html('<div class="ui negative message"><ul>'+list+'</ul></div>');
}
