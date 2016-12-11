<!DOCTYPE html>
<html>
    <head>
       <link rel="stylesheet" href="semantic/semantic.css">
                       <script src="jquery/jquery2.js"></script>
        <script src="semantic/semantic.js"></script>
    </head>
    <body>
    <form class="ui form">
        <input type="text" name="name" id="empresa">
        <button class="ui submit button">Ingresar</button>
        <div class="ui error message"></div>
    </form>
    <button id="d" class="ui submit button">Valor devuelto</button>
<script>

    $(document).ready(function()
    {
            function fnCallbackAjax(callbackData) {
        $.ajax({
            url:"c.php",
            type: 'POST',
            data: {empresa : $('#empresa').val()},
            dataType: 'json',
            success:function(arreglo) 
            {
                callbackData(arreglo); 
            }
        });
    }
        
        /*$.fn.form.settings.rules.myRule = function(nombreEmpresa) {
            var exito;
        fnCallbackAjax(function(res2){
            if(nombreEmpresa == res2.db) {
                exito = 1;
                alert('IF -> nombreEmpresa: '+nombreEmpresa+' INPUT: '+res2.input+' DB: '+res2.db+' EXITO: '+exito);
            }
            else {
                exito = 0;
                alert('ELSE -> nombreEmpresa: '+nombreEmpresa+' INPUT: '+res2.input+' DB: '+res2.db+' EXITO: '+exito);
            }
        });
            alert('AFUERA -> nombreEmpresa: '+nombreEmpresa+' INPUT: '+res2.input+' DB: '+res2.db+' EXITO: '+exito);
            return exito;
    }*/
        
  $('.ui.form').form({ // VALIDACION FORMULARIO EMPRESA
        name: {
            identifier: 'name',
            rules: [{
                type: 'empty',
                prompt: 'Tienes que ingresar el nombre de la empresa'
            },{
                type: 'myRule[nombreEmpresa]',
                prompt: 'Ya existe esta empresa'
            }]
        },
        },{
    onSuccess: function() {
      if (window.lock != "locked") { 
        alert('Todo validado');
      } 
      window.lock = "locked";
    }
  }).submit(function(e){ 
    return false;
  });
        
        function saludo(valor) {
            if(valor == 'jcb')
                exito = 'true';
            else
                exito = 'false';
            return exito;
        }
        function dinero() {
            var exito;
            exito = saludo('jcb');
            alert(exito);
        }
        $('#d').click(function(){
            dinero();
            /*fnCallbackAjax(function(res2){
                alert(JSON.stringify(res2));
                alert(res2.db);
                alert(res2.input);
            });*/
        });
    });
    </script>
    </body>
</html>
