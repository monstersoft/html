<div id="preloader"><div id="loader"></div></div>
<script src="../../jquery/jquery-2.2.4.min.js"></script>
<script src="../../semantic/semantic.min.js"></script>
<script src="../../toast/toast.js"></script>
<script src="../../hammer/hammer.min.js"></script>
<script src="../../js/msg.js"></script>
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
	  	$(window).load(function(){
	  		$('#loader').html('<i class="fa fa-cog fa-spin fa-5x fa-fw" style="color: #F5A214"></i>');
	  		$('#preloader').delay(100).fadeOut(1000);
	  		$('body').delay(3500).css({'overflow':'visible'});
	  	});
	});
</script>