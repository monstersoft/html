$('.datepicker').pickadate({
    onOpen: function(){
        var currentCalendar = this;
        var url = devuelveUrl('a/cliente/ajax/fechasDisponibles.php');
        $.ajax({
            url: url,
            type: 'POST',
            data: {idZona: this.get('id')},
            dataType: 'json',
            cache: false,
            success: function(arr) {
                currentCalendar.set({
                    min: arr.firstDayAvailable,
                    max: arr.lastDayAvailable,
                    disable: arr.availableDays
                });
                console.log(JSON.stringify(arr));
            },
            error: function(xhr) {console.log(xhr.responseText);}
        });
    },
    onClose: function() {
        var currentCalendar = this;
        var sD = this.get('select');
        var url = devuelveUrl('a/cliente/ajax/datosArchivo.php');
        $.ajax({
            url: url,
            type: 'POST',
            data: {idZona: this.get('id'), fechaDatos: sD.year+'-'+sD.month+1+'-'+sD.date},
            dataType: 'json',
            cache: false,
            success: function(arr) {
                var currentInput = document.getElementById(currentCalendar.get('id')).parentNode.parentNode.parentNode;
                var supervisor = $(currentInput.childNodes[7]);
                var fechaSubida = $(currentInput.childNodes[9]);
                var horaSubida = $(currentInput.childNodes[11]);
                supervisor.html(arr.nombreSupervisor);
                fechaSubida.html(arr.fechaSubida);
                horaSubida.html(arr.horaSubida);
                console.log(JSON.stringify(arr));
            },
            error: function(xhr) {console.log(xhr.responseText);}
        });
        $(document.activeElement).blur();
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
    disable: [true],
    format: 'dddd dd , mmmm yyyy',
    formatSubmit: 'yyyy-mm-dd',
    hiddenName : true,
    firstDay: 'Monday'
});


