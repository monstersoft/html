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
    max: [2017,11,1],
    disable: [new Date(2017,2,20)],
    format: 'dddd dd , mmmm yyyy',
    formatSubmit: 'ddmmyyyy',
    hiddenName : true,
    firstDay: 'Monday'
})
function configSelect2(){
    $.fn.select2.defaults.set( "theme", "bootstrap" );
    $( ".select2-single" ).select2( {
        placeholder: "Seleccionar Zona",
        containerCssClass: ':all:',
    } );
    $( ".select2-single" ).on( "select2:open", function() {
        if ( $( this ).parents( "[class*='has-']" ).length ) {
            var classNames = $( this ).parents( "[class*='has-']" )[ 0 ].className.split( /\s+/ );
            for ( var i = 0; i < classNames.length; ++i ) {
                if ( classNames[ i ].match( "has-" ) ) {
                    $( "body > .select2-container" ).addClass( classNames[ i ] );
                }
            }
        }
    });
}
function fechaHoy() {
    moment.locale('es');
    var hoyE = moment().locale('es').format('dddd DD , MMMM YYYY');
    //var hoyF = moment().format('YYYY-MM-DD');
    var hoyF = moment().format('DDMMYYYY');
    $('#fechaDatos').val(hoyE);
    $('input[name=fechaDatos]').val(hoyF);
}