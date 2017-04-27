var d = [
    true,
    [2017,3,19],
    [2017,3,20],
    [2017,3,21],
]
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
    min: [2017,3,1],
    max: [2017,3,21],
    disable: d,
    format: 'dddd dd , mmmm yyyy',
    formatSubmit: 'yyyy-mm-dd',
    hiddenName : true,
    firstDay: 'Monday'
});

$(document).on('click','.datepicker',function(){
    alert('sadasdsd');
});



