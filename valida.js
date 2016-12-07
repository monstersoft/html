$(document).ready(function(){
	$('.ui.form').form({
		nombre: {
			identifier: 'nombre',
			rules: [{
			  type: 'empty',
			  prompt: 'Tienes que ingresar el nombre de la empresa'
			}]
		},
		rut: {
			identifier: 'rut',
			rules: [{
			  type: 'empty',
			  prompt: 'Tienes que ingresar el rut de la empresa'
			}]
		},
		correo: {
			identifier: 'correo',
			rules: [{
			  type: 'regExp',
			  value: '/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i',
			  prompt: 'El correo no está en un formato adecuado'
			}]
		},
		telefono: {
			identifier: 'telefono',
			rules: [{
			  type: 'empty',
			  value: 'Tienes que ingresar el teléfono de la empresa'
			},{
			  type: 'integer',
			  prompt: 'El teléfono tiene que ser un número'
			},{
			  type: 'exactLength[9]',
			  prompt: 'El teléfono tiene que tener 9 dígitos'
			}]
		},
		},{
			onSuccess: function(e){
				var datos = $('#formulario').serialize();
                $.ajax({//INICIO PETICIÓN                     
                url: 'hola.php',
                data: datos,
                type: "POST",
                data: datos,
                dataType: "json",
                beforeSend: function() {
                    $('#añadir').addClass('disabled');
                    $('#añadir').addClass('ui loading button');
                },
                success: function(arreglo) {
                    $(window).attr('location', arreglo.url);
            }
            }).fail(function( jqXHR, textStatus, errorThrown ){
                if (jqXHR.status === 0){
                    alert('No hay coneccion con el servidor');
                } else if (jqXHR.status == 404) {
                    alert('La pagina solicitada no fue encontrada, error 404');
                } else if (jqXHR.status == 500) {
                    alert('jqXHR.status == 500');
                } else if (textStatus === 'parsererror') {
                    alert('textStatus === parsererror');
                } else if (textStatus === 'timeout') {
                    alert('textStatus timeout');
                } else if (textStatus === 'abort') {
                    alert('La peticion fue abortada');
                } else {
                    alert('Error desconocido');
                }
            });//FIN PETICION AJAX
		}
	});
});