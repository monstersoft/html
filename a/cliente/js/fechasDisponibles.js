function returnDays(callbackData) {
    var url = devuelveUrl('a/cliente/ajax/fechasDisponibles.php');
    return $.ajax({
        url: url,
        type: 'POST',
        data: {idZona: 20, fechaDatos : '27-03-03'},
        dataType: 'json',
        cache: false,
        success: function(arreglo) {callbackData(arreglo)},
        error: function(xhr) {console.log(xhr.responseText);}
    });
}
$('.datepicker').pickadate({
    onOpen: function(){
        var currentCalendar = this;
        returnDays(function(response){
            currentCalendar.set({
                min: [2017,03,01],
                max: [2017,03,29]
            });
         });
     },
    monthsFull: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    weekdaysFull: ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'],
    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
    showMonthsShort: undefined,
    showWeekdaysFull: undefined,
    today: 'Hoy',
    clear: '',
    close: 'Cerrar',
    //disable: [true],
    format: 'dddd dd , mmmm yyyy',
    formatSubmit: 'yyyy-mm-dd',
    hiddenName : true,
    firstDay: 'Monday'
});


