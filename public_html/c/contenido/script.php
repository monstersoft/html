<div id="preloader"><div id="loader"></div></div>
<script src="../../toast/toast.js"></script>
<script src="../../hammer/hammer.min.js"></script>
<script src="../../jquery/jquery2.js"></script>
<script src="../../semantic/semantic.js"></script>
<script src="../../jquery/jquery.rut.js"></script>
<script>
    $(document).ready(function(){
        $('#menu').click(function(){
            $('.ui.sidebar').sidebar('toggle');
        });
        $('.ui.sidebar').sidebar({
            context: 'body'
        });
      /*$(".ui.vertical.left.sidebar.menu").on("click", ".item", function(){
        $('.pusher').html('<i style="margin: 500px auto;" class="fa fa-cog fa-spin fa-5x fa-fw">').delay(5000).fadeOut(1000);
      });*/

            var okMail = false;
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
        $(window).load(function(){
            $('#loader').html('<i class="fa fa-cog fa-spin fa-5x fa-fw" style="color: #F5A214"></i>');
            $('#preloader').delay(100).fadeOut(1000);
            $('body').delay(3500).css({'overflow':'visible'});
        });
        $('div').on('click','.eliminar', function(){
            	$('#eliminar').modal({
                closable  : false,
                onApprove : function() {
                  alert('Approved!');
              	}
                });
                //alert('asdasd');
               	$('#eliminar').modal('show');
        });
        $('div').on('click','.insertar', function(){
            	$('#insertar').modal({
                closable  : false,
                onApprove : function() {
                  alert('Approved!');
              	}
                });
                //alert('asdasd');
               	$('#insertar').modal('show');
        });
        function validaMail(correo,evento) {
            var mailOk;
            var expresion = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
            
            if (evento == 'change') {
                if(correo != '') {
                    if(!expresion.test(correo)) {
                        $('.correo').removeClass('green').removeClass('olive').addClass('red');
                        mailOk = false;
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
                        mailOk = false;
                    }
                }
            }
            else {
                mailOk = false;
            }
            return mailOk;
            }
    });
</script>

