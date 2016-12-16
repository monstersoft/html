<div id="preloader"><div id="loader"></div></div>
<script src="../../jquery/jquery2.js"></script>
<script src="../../semantic/semantic.js"></script>
<script src="../../toast/toast.js"></script>
<script src="../../hammer/hammer.min.js"></script>
<script>
    $(document).ready(function(){
        $('#menu').click(function(){
            $('.ui.sidebar').sidebar('toggle');
        });
        $('.ui.sidebar').sidebar({
            context: 'body'
        });
        /*$(window).load(function(){
            $('#loader').html('<i class="fa fa-cog fa-spin fa-5x fa-fw" style="color: #F5A214"></i>');
            $('#preloader').delay(100).fadeOut(1000);
            $('body').delay(3500).css({'overflow':'visible'});
        });
        $('div').on('click','.insertar', function(){
            	/*$('#insertar').modal({
                closable  : false,
                onApprove : function() {
                  alert('Este es el valor de okMail: '+okMail);
              	}
                });
                //alert('asdasd');
               	$('#insertar').modal('show');
        });*/
    });
</script>

