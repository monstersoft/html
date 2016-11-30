$(document).ready(function(){
	       $(".ui.form").form({
         onSuccess: function(event, fields) {
           SubmitForm(fields);
           event.preventDefault();
         }
       });

       $('.ui.form').form({
         inline: true,
         on: blur,
         fields: {
           rut: {
             identifier: 'rut',
	             rules: [{
	             	type: 'empty',
	             	prompt: "El rut es obligatorio"
	             },{
	               type: "regExp",
	               value: /^([0-9])+\-([kK0-9])+$/,
	               prompt: "Formato erróneo"
	             }]
           },
           email: {
           	identifier: 'email',
           		rules: [{
           			type: 'empty',
           			prompt: 'El correo es obligatorio'
           		},
           		{
           			type: 'email',
           			prompt: 'Formato erróneo'
           		}]
           },
           nombre: {
           	identifier: 'nombre',
           		rules: [{
           			type: "empty",
           			prompt: "El nombre es obligatorio"
           		}]
           },
           telefono: {
           	identifier: 'telefono',
           		rules: [{
           			type: 'empty',
           			prompt: 'El teléfono es obligatorio'
           		},{
           			type: 'exactLength[9]',
           			prompt: 'El teléfono no tiene 9 dígitos'
           		},{
           			type: 'integer',
           			prompt: 'Acepta sólo números'
           		}]
           }
         }
       });
        $('.insertar').click(function(){
            $('#insertar').modal('show');
        });

});















      /*$(".ui.vertical.left.sidebar.menu").on("click", ".item", function(){
        $('.pusher').html('<i style="margin: 500px auto;" class="fa fa-cog fa-spin fa-5x fa-fw">').delay(5000).fadeOut(1000);
      });*/
        /*var okMail, okRut;
        $('#correo').change(function(){
            okMail = validaMail($('#correo').val(),'change');
        });
        $('#correo').keyup(function(){
            okMail = validaMail($('#correo').val(),'keyup');
        });
    	$('#rut').Rut({
			on_error: function(){
				if($('.rut').hasClass('red')) {
					$('.rut').removeClass('red').addClass('red');
				}
				if($('.rut').hasClass('green')) {
					$('.rut').removeClass('green').addClass('red');
				}
				if($('.rut').hasClass('olive')) {
					$('.rut').removeClass('olive').addClass('red');
				}
				else {
					$('.rut').addClass('red');
				}
			},
			on_success: function(){
				if($('.rut').hasClass('red')) {
					$('.rut').removeClass('red').addClass('green');
				}
				else {
					$('.rut').addClass('green');
					okRut = true;
				}
			},
			format_on: 'keyup'
		});
    	$('#rut').keyup(function() {
    		if($('#rut').val().length == 0) {
    			if($('rut').hasClass('green')) {
    				$('.rut').removeClass('green');
    			}
    		$('.rut').addClass('olive');
    		}

    	});
    	        function validaMail(correo,evento) {
            var mailOk = false;
            var expresion = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
            if (evento == 'change') {
                if(correo != '') {
                    if(!expresion.test(correo)) {
                        $('.correo').removeClass('green').removeClass('olive').addClass('red');
                    }
                    else {
                        $('.correo').removeClass('olive').addClass('green');
                        mailOk = true;
                    }
                }
            }
            if(evento == 'keyup') {
                if(correo.length == 0){
                    if($('.correo').hasClass('red') || $('.correo').hasClass('green')){
                        $('.correo').removeClass('red').removeClass('green').addClass('olive');
                    }
                }
            }
            return mailOk;
        }*/