$(document).ready(function(){
    var expresion = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
    var okCorreo = false;
    var okPassword = false;
    $("#txtCorreo").focusout(function(){
        var correo = $("#txtCorreo").val();
        if(correo == "")
            $("#msgCorreo").html("Campo obligatorio");
        else {
            if(expresion.test(correo)) {
                $("#msgCorreo").html("");
                okCorreo = true;
            }
            else {
                $("#msgCorreo").html("Formato erróneo");
            }
        }
    });
    $("#txtPassword").focusout(function(){
        var password = $("#txtPassword").val();
        if(password == "")
            $("#msgPassword").html("Campo obligatorio");
        else {
            if(password.length>5 && password.length<13) {
                $("#msgPassword").html("");
                okPassword = true;
            }
            else {
                $("#msgPassword").html("Mínimo 6, máximo 12 caracteres");
            }
        }
    });
    $("#btnEnviar").click(function(){
        if(okCorreo == true && okPassword == true) {
            $.ajax({//INICIO PETICIÓN                     
                url: 'php/compruebaLogin.php',
                data: {txtCorreo: $("#txtCorreo").val(),txtPassword: $("#txtPassword").val()},
                type: "POST",
                dataType: "json",
                success: function(arreglo) {
                    if(arreglo.codigo == 1 && arreglo.czonas == 1){
                        //Materialize.toast(arreglo.mensaje+"?z="+arreglo.zona, 4000);
                        window.location.replace(arreglo.mensaje+"?z="+arreglo.zona);
                    }
                    if(arreglo.codigo == 1 && arreglo.czonas > 1){
                        //Materialize.toast(arreglo.mensaje);
                        window.location.replace(arreglo.mensaje);
                    }
                    if(arreglo.codigo == 0) {
                        Materialize.toast(arreglo.mensaje, 4000);
                    }
            }
            }).fail(function( jqXHR, textStatus, errorThrown ){
                if (jqXHR.status === 0){
                    Materialize.toast('Not connect: Verify Network', 4000);
                } else if (jqXHR.status == 404) {
                    Materialize.toast('Requested page not found [404]', 4000);
                } else if (jqXHR.status == 500) {
                    Materialize.toast('Internal Server Error [500]', 4000);
                } else if (textStatus === 'parsererror') {
                    Materialize.toast('Requested JSON parse failed', 4000);
                } else if (textStatus === 'timeout') {
                    Materialize.toast('Time out error', 4000);
                } else if (textStatus === 'abort') {
                    Materialize.toast('Ajax request aborted', 4000);
                } else {
                    Materialize.toast('Uncaught Error: '+jqXHR.responseText, 4000);
                }
            });//FIN PETICIÓN AJAX
        }
        else {
            Materialize.toast("Debes revisar los campos para iniciar sesión", 4000);
        }
    });
});