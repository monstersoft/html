/*$('input').click(function(){
    var url = devuelveUrl('a/cliente/ajax/fechasDisponibles.php');
    console.log('asdasdasd');
    $.ajax({
        url: url,
        type: 'POST',
        data: {idZona: 20, fechaDatos : '27-03-03'},
        dataType: 'json',
        cache: false,
        success: function(arreglo) {
            
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
                max: [2017,3,30],
                disable: arreglo.fechas,
                format: 'dddd dd , mmmm yyyy',
                formatSubmit: 'yyyy-mm-dd',
                hiddenName : true,
                firstDay: 'Monday'
            });
        },
        error: function(xhr) {console.log(xhr.responseText);}
    });
});

$('.datepicker').change(function(){
    console.log($(this).parent().parent().next().html('asdasdas'));
});*/

$('.datepicker').pickadate({
                onOpen: function(){
                    alert(this.get('id'));
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
                //min: new Date(2017,1,1),
                //max: new Date(2018,1,1),
                min: [2017,3,1],
                max: [2017,3,30],
                disable: [true,[2017,3,20]],
                format: 'dddd dd , mmmm yyyy',
                formatSubmit: 'yyyy-mm-dd',
                hiddenName : true,
                firstDay: 'Monday'
            });
/*$('.btnBuscar').click( function( e ) {
    var calendar = $('.datepicker48').pickadate({});
    var picker = calendar.data('pickadate');
    e.stopPropagation();
    e.preventDefault();
    picker.open();
});*/


