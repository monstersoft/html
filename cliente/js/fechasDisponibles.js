$('.datepicker').pickadate({
    onStart: function() {
        $('.picker').appendTo('body').css('font-family','"Montserrat"');
    },
    onOpen: function(){
        var currentCalendar = this;
        var url = devuelveUrl('cliente/ajax/fechasDisponibles.php');
        $.ajax({
            url: url,
            type: 'POST',
            data: {idZona: this.get('id')},
            dataType: 'json',
            cache: false,
            beforeSend: function(){
                $('.picker__wrap').append('<div class="capa"><div style=" height: 100%; display: flex; align-items: center; justify-content: center;"><i style="color: #F5A214;" class="loader fa-2x fa fa-refresh fa-spin"></i></div></div>');
            },
            success: function(arr) {
                currentCalendar.set({
                    min: arr.firstDayAvailable,
                    max: arr.lastDayAvailable,
                    disable: arr.availableDays
                });
                console.log(devuelveUrl('cliente/ajax/fechasDisponibles.php'));
            },
            complete: function() {
                $('.picker__wrap .capa').remove();
            },
            error: function(xhr) {console.log(xhr.responseText);}
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
                var currentBodyTable = document.getElementById(currentCalendar.get('id')).parentNode.parentNode.parentNode.parentNode;
                var currentListTable = currentBodyTable.nextSibling.nextSibling;
                var currentForm = document.getElementById(currentCalendar.get('id')).parentNode.parentNode;
                var supervisor = $(currentBodyTable.childNodes[7]);
                var fechaSubida = $(currentBodyTable.childNodes[9]);
                var horaSubida = $(currentBodyTable.childNodes[11]);
                var supervisorList = $(currentListTable.childNodes[3].childNodes[1]);
                var fechaSubidaList = $(currentListTable.childNodes[5].childNodes[1]);
                var horaSubidaList = $(currentListTable.childNodes[7].childNodes[1]);
                currentForm.childNodes[1].value = arr.idArchivo;
                supervisor.html(arr.nombreSupervisor);
                fechaSubida.html(arr.fechaSubida);
                horaSubida.html(arr.horaSubida);
                supervisorList.html(arr.nombreSupervisor);
                fechaSubidaList.html(arr.fechaSubida);
                horaSubidaList.html(arr.horaSubida);
            },
            error: function(xhr) {console.log(xhr.responseText);}
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
    //formatSubmit: 'yyyy-mm-dd',
    //formatSubmit: undefined,
    //hiddenName : undefined,
    firstDay: 'Monday'
});


