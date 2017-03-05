var idZona;
function generarObjetoResultados(){
    var comienzo = new Date();
    var inicio = comienzo.getMilliseconds();
    var fechaDatos = $('input[name=fechaDatos]').val();
    var fechaHoy = moment().format('YYYY-MM-DD');
    var objLimites = generarObjetoLimites();
    var objDatos = generarObjetoDatos(objLimites.objLDisponibles,fechaDatos);
    var resultados = {}
    var informacionNoDisponibles = []
    resultados.nombreZona = 'Los Acacios';
    resultados.nombreArchivo = 'Z05_S01S02S03_P03_E03-'+fechaDatos;
    resultados.informacionDisponibles = objDatos.objInfoDisponibles;
    resultados.informacionNoDisponibles = informacionNoDisponibles;
    if(objLimites.objLNoDisponibles.length == 0) {
        resultados.informacionNoDisponibles.push({existen : false});  
    }
    else {
        $.each(objLimites.objLNoDisponibles,function(index){
            resultados.informacionNoDisponibles.push({patente: objLimites.objLNoDisponibles[index].patente});
        });
    }
    resultados.totalGenerados = objDatos.objRegistros.length;
    var termino = new Date();
    var fin = comienzo.getMilliseconds();
    resultados.tiempoGeneracion = fin - inicio;
    var datosMaquinas = retornaDatos(idZona);
    datosMaquinas.success(function(respuesta){
        //console.log(JSON.stringify(respuesta));
    });
    downloadCsv(objDatos);
}
function retornaDatos(id) {
    return $.ajax({
        url: 'infoMaquinas.php',
        type: 'POST',
        //data: {idZona: id},
        data: {idZona: 9},
        dataType: 'json',
        success: function(arreglo){;
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
function generarObjetoDatos(objLDisponibles,fechaDatos){
    var objDatos = {}
    var objRegistros = []
    var objInfoDisponibles = [] 
    var hora = 8;
    var minuto = 0;
    var cantidadRegistros = 0;
    $.each(objLDisponibles,function(index) {
        var comienzo = new Date();
        var inicio = comienzo.getMilliseconds();
        var hora = 8;
        while(hora<19) { //HASTA LAS 18:59
            while(minuto<60){ //HASTA EL MINUTO 59
                objRegistros.push({
                    identificador:      0,
                    patente:            objLDisponibles[index].patente,
                    anguloPala:         r(objLDisponibles[index].apmin,objLDisponibles[index].apmax,2),
                    anguloInclinacion:  r(objLDisponibles[index].aimin,objLDisponibles[index].aimax,2),
                    alturaPala:         r(objLDisponibles[index].almin,objLDisponibles[index].almax,2),
                    velocidad:          r(objLDisponibles[index].vmin,objLDisponibles[index].vmax,2),
                    revoluciones:       r(objLDisponibles[index].rmin,objLDisponibles[index].rmax,2),
                    latitud:            r(objLDisponibles[index].lamin,objLDisponibles[index].lamax,6),
                    longitud:           r(objLDisponibles[index].lomin,objLDisponibles[index].lomax,6),
                    fechaDato:          fechaDatos,
                    horaDato:           hora+":"+minuto+":00"
                });
                minuto++;
                cantidadRegistros++;
            }
            minuto = 0;
            hora++;
        }
        var termino = new Date();
        var fin = termino.getMilliseconds();
        objInfoDisponibles.push({identificador: 0,patente: objLDisponibles[index].patente,cantidad: cantidadRegistros,seleccion: seleccion(objLDisponibles[index].ceros,objLDisponibles[index].noDisponible,objLDisponibles[index].defecto,objLDisponibles[index].vacios),tiempo: fin-inicio+' ms'});
        cantidadRegistros = 0;
        minuto = 0;
        hora = 8;
    });
    objDatos.objInfoDisponibles = objInfoDisponibles;
    objDatos.objRegistros = objRegistros;
    return objDatos;
}
function seleccion(c,no,d,v) {
    if(c == true)
        return 'Sólo ceros';
    if(no == true)
        return 'Máquina no disponible';
    if(d == true)
        return 'Valores por defecto';
    if(v == true)
        return 'Valores vacíos';
}
function generarObjetoLimites() {
    var formularios = document.forms;
    var objAux = generarObjetos(formularios.length);
    var objLDisponibles = []
    var objLNoDisponibles = []
    var objLimites = {}
    for(var i=0;i<formularios.length;i++){
        for(var j=0;j<formularios[i].elements.length;j++){
            if(formularios[i].elements[j].classList.contains('valor')) {
                if(j == 0)
                    objAux[i].patente = formularios[i].elements[j].value;
                if(j == 1)
                    objAux[i].apmin = formularios[i].elements[j].value;
                if(j == 2)
                    objAux[i].apmax = formularios[i].elements[j].value;
                if(j == 3)
                    objAux[i].aimin = formularios[i].elements[j].value;
                if(j == 4)
                    objAux[i].aimax = formularios[i].elements[j].value;
                if(j == 5)
                    objAux[i].almin = formularios[i].elements[j].value;
                if(j == 6)
                    objAux[i].almax = formularios[i].elements[j].value;
                if(j == 7)
                    objAux[i].vmin = formularios[i].elements[j].value;
                if(j == 8)
                    objAux[i].vmax = formularios[i].elements[j].value;
                if(j == 9)
                    objAux[i].rmin = formularios[i].elements[j].value;
                if(j == 10)
                    objAux[i].rmax = formularios[i].elements[j].value;
                if(j == 11)
                    objAux[i].lamin = formularios[i].elements[j].value;
                if(j == 12)
                    objAux[i].lamax = formularios[i].elements[j].value;
                if(j == 13)
                    objAux[i].lomin = formularios[i].elements[j].value;
                if(j == 14)
                    objAux[i].lomax = formularios[i].elements[j].value;
                if(j == 15)
                    objAux[i].ceros = formularios[i].elements[j].checked;
                if(j == 16)
                    objAux[i].noDisponible = formularios[i].elements[j].checked;
                if(j == 17)
                    objAux[i].defecto = formularios[i].elements[j].checked;
                if(j == 18)
                    objAux[i].vacios = formularios[i].elements[j].checked;
            }
        }
    }
    $.each(objAux,function(index){
        if(objAux[index].noDisponible == true)
            objLNoDisponibles.push(objAux[index]);
        else
            objLDisponibles.push(objAux[index]);
    });
    objLimites.objLNoDisponibles = objLNoDisponibles;
    objLimites.objLDisponibles = objLDisponibles;
    return objLimites;
}
function r(l,h,d) {
    if($.isNumeric(l) && $.isNumeric(h)){
        if(l == 0 && h == 0)
            return 0;
        else {  
                var min = parseFloat(l);
                var max = parseFloat(h);
                return (Math.random()*(max-min)+min).toFixed(2);
            }
    }
    else
        return '';
}
function generarObjetos(cantidadFormularios) {
    var aux = 0;
    var arreglo = []
    while(aux < cantidadFormularios) {
        arreglo.push({patente: '',apmin:0,apmax:0,aimin:0,aimax:0,almin:0,almax:0,vmin:0,vmax:0,rmin:0,rmax:0,lamin:0,lamax:0,lomin:0,lomax:0,ceros: false,noDisponible: false,defecto: false,vacios:false});
        aux++;
    }
    return arreglo;
    }
function datosNoDisponibles() {
    var numeroFormulario  = $(this).attr('id');
    var formularios = document.forms;
    for(var j=0;j<formularios[numeroFormulario].elements.length;j++){
        if(formularios[numeroFormulario].elements[j].classList.contains('valor')){
            if(j>=1 && j<15)
                formularios[numeroFormulario].elements[j].classList.add('disabled','field');
            if(j == 15)
                formularios[numeroFormulario].elements[j].checked = false; // CEROS
            if(j == 16)
                formularios[numeroFormulario].elements[j].checked = true // NO DISPONIBLE
            if(j == 17)
                formularios[numeroFormulario].elements[j].checked = false// DEFAULT
            if(j == 18)
                formularios[numeroFormulario].elements[j].checked = false// VACÍOS
        }
    }
}
function datosVacios() {
    var numeroFormulario  = $(this).attr('id');
    var formularios = document.forms;
    for(var j=0;j<formularios[numeroFormulario].elements.length;j++){
        if(formularios[numeroFormulario].elements[j].classList.contains('valor')) {
            if(j>=1 && j<15) {
                if(formularios[numeroFormulario].elements[j].classList.contains('disabled','field'))
                formularios[numeroFormulario].elements[j].classList.remove('disabled','field');
            formularios[numeroFormulario].elements[j].value = "";
            }
            if(j == 15)
                formularios[numeroFormulario].elements[j].checked = false; // CEROS
            if(j == 16)
                formularios[numeroFormulario].elements[j].checked = false // NO DISPONIBLE
            if(j == 17)
                formularios[numeroFormulario].elements[j].checked = false// DEFAULT
            if(j == 18)
                formularios[numeroFormulario].elements[j].checked = true// VACÍOS
        }
    }
}
function datosCeros() {
    var numeroFormulario  = $(this).attr('id');
    var formularios = document.forms;
    for(var j=0;j<formularios[numeroFormulario].elements.length;j++){
        if(formularios[numeroFormulario].elements[j].classList.contains('valor')){
            if(j>=1 && j<15) {
                if(formularios[numeroFormulario].elements[j].classList.contains('disabled','field'))
                    formularios[numeroFormulario].elements[j].classList.remove('disabled','field');
                formularios[numeroFormulario].elements[j].value = 0;
            }
            if(j == 15)
                formularios[numeroFormulario].elements[j].checked = true; // CEROS
            if(j == 16)
                formularios[numeroFormulario].elements[j].checked = false // NO DISPONIBLE
            if(j == 17)
                formularios[numeroFormulario].elements[j].checked = false// DEFAULT
            if(j == 18)
                formularios[numeroFormulario].elements[j].checked = false// VACÍOS
        }
    }
}
function datosDefectos() {
    var numeroFormulario  = $(this).attr('id');
    var formularios = document.forms;
    for(var j=0;j<formularios[numeroFormulario].elements.length;j++){
        if(formularios[numeroFormulario].elements[j].classList.contains('valor')){
            if(j>=1 && j<15) {
                if(formularios[numeroFormulario].elements[j].classList.contains('disabled','field'))
                    formularios[numeroFormulario].elements[j].classList.remove('disabled','field');
            }
            if(j == 1)
                formularios[numeroFormulario].elements[j].value = 0; //ANGULO DE PALA MINIMO
            if(j == 2)
                formularios[numeroFormulario].elements[j].value = 360 //ANGULO DE PALA MAXIMO
            if(j == 3)
                formularios[numeroFormulario].elements[j].value = 0 // ANGULO DE INCLINACION MINIMO
            if(j == 4)
                formularios[numeroFormulario].elements[j].value = 180// ANGULO DE INCLINACION MINIMO
            if(j == 5)
                formularios[numeroFormulario].elements[j].value = 1; // ALTURA MINIMA DE LA PALA
            if(j == 6)
                formularios[numeroFormulario].elements[j].value = 10; // ALTURA MAXIMA DE LA PALA
            if(j == 7)
                formularios[numeroFormulario].elements[j].value = 0 // VELOCIDAD MINIMA
            if(j == 8)
                formularios[numeroFormulario].elements[j].value = 80 // VELOCIDAD MAXIMA
            if(j == 9)
                formularios[numeroFormulario].elements[j].value = 100// REVOLUCION MINIMA
            if(j == 10)
                formularios[numeroFormulario].elements[j].value = 500// REVOLUCION MAXIMA
            if(j == 11)
                formularios[numeroFormulario].elements[j].value = -31 // LATITUD MINIMA 
            if(j == 12)
                formularios[numeroFormulario].elements[j].value = -30// LATITUD MAXIMA
            if(j == 13)
                formularios[numeroFormulario].elements[j].value  = -71 // LATITUD MINIMA  
            if(j == 14)
                formularios[numeroFormulario].elements[j].value = -70 // LATITUD MAXIMA
            if(j == 15)
                formularios[numeroFormulario].elements[j].checked = false; // CEROS
            if(j == 16)
                formularios[numeroFormulario].elements[j].checked = false // NO DISPONIBLE
            if(j == 17)
                formularios[numeroFormulario].elements[j].checked = true// DEFAULT
            if(j == 18)
                formularios[numeroFormulario].elements[j].checked = false// VACÍOS
        }
    }
}
function redireccionar() {
    window.location="http://localhost/html/";
}
//setTimeout('redireccionar()', 5000);
function ajaxLimiteDatos() {
    var id = $('#idZonaMaquina').val();
    $.ajax({
        url: 'maquinas.php',
        type: 'POST',
        //data: {idZona: id},
        data: {idZona: 1},
        dataType: 'json',
        success: function(arreglo) {
            if(arreglo.exito == 1) {
                $('.stepMaquinas').removeClass('active').addClass('completed');
                $('.stepDatos').addClass('active');
                var contenido = '';
                var grid = '';
                var iContenido = '<div class="ui grid container">';
                var fContenido = '</div>';
                var numeroFormulario = 0;
                $.each(arreglo.datos,function(index){
                    contenido+= ' <div class="sixteen wide mobile eight wide tablet eight wide computer column"> <form class="ui form"> <h2 class="ui header"> <i class="a rocket icon"></i> <div class="a content">ID'+arreglo.datos[index].identificador+' - MQ'+arreglo.datos[index].idMaquina+' - '+arreglo.datos[index].patente+'</div></h2> <div class="field"> <div class="sixteen wide field"> <label>Patente</label> <input type="text" placeholder="qwerty" class="valor ui disabled input" value="'+arreglo.datos[index].patente+'"> </div></div><div class="fields"> <div class="eight wide field"> <label class="b">Ángulo Pala</label> <div class="two fields"> <div class="field"> <input type="text" placeholder="Min" class="valor"> </div><div class="field"> <input type="text" placeholder="Max" class="valor"> </div></div></div><div class="eight wide field"> <label>Ángulo De Inclinación</label> <div class="two fields"> <div class="field"> <input type="text" placeholder="Min" class="valor"> </div><div class="field"> <input type="text" placeholder="Max" class="valor"> </div></div></div></div><div class="fields"> <div class="eight wide field"> <label>Altura De Pala</label> <div class="two fields"> <div class="field"> <input type="text" placeholder="Min" class="valor"> </div><div class="field"> <input type="text" placeholder="Max" class="valor"> </div></div></div><div class="eight wide field"> <label>Velocidad</label> <div class="two fields"> <div class="field"> <input type="text" placeholder="Min" class="valor"> </div><div class="field"> <input type="text" placeholder="Max" class="valor"> </div></div></div></div><div class="sixteen wide field"> <label>Revoluciones</label> <div class="two fields"> <div class="field"> <input type="text" placeholder="Valor mínimo" class="valor"> </div><div class="field"> <input type="text" placeholder="Valor máximo" class="valor"> </div></div></div><div class="sixteen wide field"> <label>Latitud</label> <div class="two fields"> <div class="field"> <input type="text" placeholder="Valor mínimo" class="valor"> </div><div class="field"> <input type="text" placeholder="Valor máximo" class="valor"> </div></div></div><div class="sixteen wide field"> <label>Longitud</label> <div class="two fields"> <div class="field"> <input type="text" placeholder="Valor mínimo" class="valor"> </div><div class="field"> <input type="text" placeholder="Valor máximo" class="valor"> </div></div></div><div class="four fields"> <div class="field"> <div class="ui radio checkbox"> <input type="radio" name="valores" class="valor btnCeros" id="'+numeroFormulario+'"> <label>Sólo ceros</label> </div></div><div class="field"> <div class="ui radio checkbox"> <input type="radio" name="valores" class="valor btnNoDisponibles" id="'+numeroFormulario+'"> <label>Máquina no disponible</label> </div></div><div class="field"> <div class="ui radio checkbox"> <input type="radio" name="valores" class="valor btnDefectos" id="'+numeroFormulario+'"> <label>Valores por defecto</label> </div></div><div class="ui radio checkbox"> <input type="radio" name="valores" checked="" class="valor btnVacios" id="'+numeroFormulario+'"> <label>Valores vacíos</label> </div></div></form> </div>';
                    numeroFormulario++;
                });
                grid = iContenido+calendario+contenido+fContenido;
                $('.formularioAgregarMaquina').remove();
                $('#contenido').html(grid);
            }
            else {
                alert('Error ajax: '+arreglo.exito);
            }
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
    idZona = id;
}
function agregarOtraMaquina(){
    $('.ui.button').remove();
    $('.botones').html('<a class="ui button black limpiar"><i class="close icon"></i>Limpiar</a><a class="ui button green" id="btnAñadirMaquina"><i class="add icon"></i>Añadir</a><a class="ui button olive btnSiguienteFormulario">Seguir<i class="arrow right icon"></i></a>');
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
                if(arreglo.exito == 1) {
	                $('#cancelar').removeClass('disabled');
	                $('#btnAñadirMaquina').removeClass('disabled loading');
	                $('.stepMaquinas').addClass('completed');
	                successMessage('Registro realizado con éxito','Presiona siguiente para continuar al otro paso');
	                $('.ui.button').remove();
	               	$('.botones').html('<a class="ui button black" id="btnAñadirOtraMaquina"><i class="close icon"></i>Añadir Otra Máquina</a><a class="ui button olive btnSiguienteFormulario">Seguir<i class="arrow right icon"></i></a>');
                }
                else {
                    $('.message').html('<div class="ui negative message">'+arreglo.msg+'</div>');
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
	    success: function(x) {
            var items = '';
            var grid = '';
            $.each(x,function(i){
                items = '';
                var iContenido =  '<div class="ui grid container infoZonas"> <div class="sixteen wide mobile eight wide computer column"> <h4 class="ui top attached header"> <i class="file text icon a"></i> <div class="content">'+x[i].empresa+'<div class="sub header">'+x[i].proyecto+'</div></div></h4> <div class="ui attached segment"> <div class="ui relaxed divided list">';
                var fContenido =  '</div></div></div></div>';
                var y = x[i].zonas;
                $.each(y,function(i){
                            items+=  '<div class="item"> <div class="right floated content btnSiguienteZonas" id="'+y[i].idZona+'"> <div class="ui button">Ver</div></div><i class="large world middle aligned icon"></i> <div class="content"> <a class="header">'+y[i].zona+'</a> <div class="description">ID: '+y[i].idZona+'</div></div></div>';
                });
                grid+= iContenido+items+fContenido;
            });
            $('#calendario').after(grid);
        },
	    complete: eliminarCargando
	});
}
function mostrarFormularioMaquina() {
	var id = $(this).attr('id');
    $('.infoZonas').remove();
    agregarMaquinas();
    $('#contenido').load('formularioAgregarMaquina.php',id,function(){$('#idZonaMaquina').val(id);});
}
function agregarMaquinas(arreglo) {
    $('.stepMaquinas').removeClass('active');
}
function limiteDatos(arreglo) {
    ingresarLimites();
    $('#formularioAgregarMaquina').remove();
}
function descargaArchivo(arreglo) {
	   $('.stepDatos').removeClass('active').addClass('completed');
       $('.contenidoZonas').html('Descargar CVS');
       $('.stepDatos').addClass('active');
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
function fechaHoy() {
    moment.locale('es');
    console.log(moment.locale('es'));
    var hoyE = moment().locale('es').format('dddd DD , MMMM YYYY');
    console.log(hoyE);
    var hoyF = moment().format('YYYY-MM-DD');
    console.log(hoyF);
    $('#fechaDatos').val(hoyE);
    $('input[name=fechaDatos]').val(hoyF);
    $('#diaActual').html(moment().format('LL')+'sadasdas');
}
function descargarCSV(data){
    var csvData = new Array();
    data.forEach(function(item, index, array) {
        csvData.push(item.title+';'+item.author);
    });
    var buffer = csvData.join("\r\n");
    var blob = new Blob([buffer], {"type": "text/csv;charset=utf8;"});
    document.getElementById('btnGenerar').setAttribute('href',window.URL.createObjectURL(blob));
    document.getElementById('btnGenerar').setAttribute('download','datos.csv');
}