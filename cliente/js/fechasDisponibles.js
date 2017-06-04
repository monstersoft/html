$('.datepicker').pickadate({
    onOpen: function(){
        var currentCalendar = this;
        var url = devuelveUrl('cliente/ajax/fechasDisponibles.php');
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
            },
            error: function(xhr) {console.log(xhr.responseText);}
        });
        $(document.activeElement).blur();
    },
    onClose: function() {
        var currentCalendar = this;
        var url = devuelveUrl('cliente/ajax/datosArchivo.php');
        $.ajax({
            url: url,
            type: 'POST',
            data: {idZona: currentCalendar.get('id'), fechaDatos: currentCalendar.get('select','yyyy-mm-dd')},
            dataType: 'json',
            cache: false,
            success: function(arr) {
                var currentInput = document.getElementById(currentCalendar.get('id')).parentNode.parentNode.parentNode.parentNode;
                var currentForm = document.getElementById(currentCalendar.get('id')).parentNode.parentNode;
                var supervisor = $(currentInput.childNodes[7]);
                var fechaSubida = $(currentInput.childNodes[9]);
                var horaSubida = $(currentInput.childNodes[11]);
                console.log(currentInput);
                console.log(JSON.stringify(arr));
                currentForm.childNodes[0].value = arr.idArchivo;
                supervisor.html(arr.nombreSupervisor);
                fechaSubida.html(arr.fechaSubida);
                horaSubida.html(arr.horaSubida);
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
    today: '',
    clear: '',
    close: 'Cerrar',
    disable: [true],
    format: 'dddd dd , mmmm yyyy',
    formatSubmit: 'yyyy-mm-dd',
    hiddenName : true,
    firstDay: 'Monday'
});


