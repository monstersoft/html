function fechaHoy() {
	var hoyE = moment().lang('es').format('dddd DD , MMMM YYYY');
    var hoyF = moment().format('YYYY/MM/DD');
    $('#fechaDatos').val(hoyE);
    $('input[name=fechaDatos]').val(hoyF);
}