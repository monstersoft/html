$(document).ready(function(){
    /*$.fn.form.settings.rules.miRegla = function(empresa) {
      var exito;
        if(empresa === devuelveEmpresa()) {
          exito = 0;
        }
        else {
          exito = 1;
        }
    return exito;
    }*/
    function devuelveEmpresa() {
      var nombre;
      $.ajax({
        type: 'POST',
        url: 'validaNombreEmpresa.php',
        data: {empresa: $('#name').val()},
        dataType: 'json',
        async: false,
        success: function(arreglo) {
            console.log('input: '+$('#name').val());
            console.log('base: '+arreglo[0].nombre);
            nombre = arreglo[0].nombre;
        }
      });
      return nombre;
    }

        $('#c').click(function(){
        var jola = devuelveEmpresa();
        alert(jola);
    });

/*
  $('.ui.form').form({ // VALIDACION FORMULARIO EMPRESA
        empresa: {
            identifier: 'empresa',
            rules: [{
                type: 'empty',
                prompt: 'Tienes que ingresar el nombre de la empresa'
            },{
              type: 'miRegla[empresa]',
              prompt: 'Ya existe esta empresa'
            }]
        },
        },{
    onSuccess: function() {
      if (window.lock != "locked") { 
        alert('Wena!');
        //window.location.replace('a.php');
      } 
      window.lock = "locked";
    }
  }).submit(function(e){ 
    return false;
  });*/
});
