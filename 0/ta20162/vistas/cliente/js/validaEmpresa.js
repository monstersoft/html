$(document).ready(function(){
    $('#nombreEmpresa').keyup(function(e){
        if($('#nombreEmpresa').val() == "") {
            $('#valida').removeClass("check remove").addClass("asterisk");
            $('#mensaje').html('');
        } else {
            var nombreEmpresa = $('#nombreEmpresa').val().toUpperCase();
            $.ajax({//INICIO PETICIÓN                     
                    url: 'php/buscaEmpresa.php',
                    data: {txtNombreEmpresa: nombreEmpresa},
                    type: "POST",
                    dataType: "json",
                    success: function(arreglo) {
                        if(arreglo.existe == true){
                            $('#valida').removeClass("check asterisk").addClass("remove");
                            warning('Esta empresa ya está registrada');
                        }
                        if(arreglo.existe == false){
                            $('#valida').addClass("check");
                            $('#mensaje').html('');
                        }
                }
                }).fail(function( jqXHR, textStatus, errorThrown ){
                    if (jqXHR.status === 0){
                        warning('Not connect: Verify Network');
                    } else if (jqXHR.status == 404) {
                        warning('Requested page not found [404]');
                    } else if (jqXHR.status == 500) {
                        warning('Internal Server Error [500]');
                    } else if (textStatus === 'parsererror') {
                        warning('Requested JSON parse failed');
                    } else if (textStatus === 'timeout') {
                        warning('Time out error');
                    } else if (textStatus === 'abort') {
                        warning('Ajax request aborted');
                    } else {
                        warning('Uncaught Error: '+jqXHR.responseText);
                    }
                });
            }
    });
});

function warning(advertencia) {
    $('#mensaje').addClass("field");
    $('#mensaje').html('<div class="ui yellow message"><div class="header">Error de registro</div>'+advertencia+'</div>');
}

                /*type: 'regExp[/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/]'*/
