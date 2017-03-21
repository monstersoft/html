$('.datepicker').pickadate({
    monthsFull: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    weekdaysFull: ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'],
    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
    showMonthsShort: undefined,
    showWeekdaysFull: undefined,
    today: 'Hoy',
    clear: '',
    close: 'Cerrar',
    //min: new Date(2017,1,1),
    //max: new Date(2018,1,1),
    min: [2017,0,1],
    max: [2017,2,21],
    disable: [new Date(2017,2,20)],
    format: 'dddd dd , mmmm yyyy',
    formatSubmit: 'yyyy/mm/dd',
    hiddenName : true,
    firstDay: 'Monday'
})

/*function generarObjetoResultados(){
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
        $('#limiteDatos').remove();
        $('#contenido').html('<a class="ui button" id="descargar">Descargar</a>');
    });
    data = objDatos;
}

*/
