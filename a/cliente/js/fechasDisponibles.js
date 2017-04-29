function returnDays() {
    var url = devuelveUrl('a/cliente/ajax/fechasDisponibles.php');
    return $.ajax({
        url: url,
        type: 'POST',
        data: {idZona: 20, fechaDatos : '27-03-03'},
        dataType: 'json',
        cache: false,
        success: function(arreglo) {},
        error: function(xhr) {console.log(xhr.responseText);}
    });
}
//$('.datepicker').pickadate({});
/*var days;
$('.datepicker').pickadate({
                onRender: function(){

                    var promise = returnDays();
                    promise.success(function(response){
                        days = response.fechas;
                        console.log(days);
                        alert('asdasds');
                    });
                    /*var url = devuelveUrl('a/cliente/ajax/fechasDisponibles.php');
    $.ajax({
        url: url,
        type: 'POST',
        data: {idZona: 20, fechaDatos : '27-03-03'},
        dataType: 'json',
        cache: false,
        success: function(arreglo) {alert('sadasd')},
        error: function(xhr) {console.log(xhr.responseText);}
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
                //min: new Date(2017,1,1),
                //max: new Date(2018,1,1),
                min: [2017,3,1],
                max: [2017,3,30],
                disable: days,
                format: 'dddd dd , mmmm yyyy',
                formatSubmit: 'yyyy-mm-dd',
                hiddenName : true,
                firstDay: 'Monday'
            });*/
$( '.datepicker').pickadate();
$( '.datepicker').on( "click", function() {
    alert("hay");
    $(this).addClass("New1");
    datePick () ;
    jQuery('.New1').trigger('click');// using only trigger will work here
})
$( document).on( "click",'.New1', function() { // on for delegation
    datePick () ;
})
function datePick () {
    alert("yes");
    var $input =  $( '.New1' ).pickadate({
       weekdaysShort: [  'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa','Su' ],
       showMonthsShort: true,
       disable: [
           1, 2, 3,4
       ],
       min: [2014,3,20],
       max: [2014,7,14],
       today: false,
       clear:false
       });
     var picker = $input.pickadate('picker'); 
     picker.on('open', function() {
        console.log('Didn’t open.. yet here I am!')
     })
}

