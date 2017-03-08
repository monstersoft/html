<!DOCTYPE html>
<html>
    <head>
    	<?php require_once '../../php/head.php'; ?>	
    </head>
    <body>
        <?php require_once '../../php/barra.php'; ?>
        <?php require_once '../../php/lateral.php'; ?>
        <?php require_once '../../php/lateral.php'; ?>
        <div class="pusher">
        	<div class="ui container justified" style="margin-top: 50px;">
        		<h1>Supervisores</h1>
        	</div>
        </div>
        <script src="../../jquery/jquery-2.2.4.min.js"></script>
        <script src="../../semantic/semantic.min.js"></script>
        <script src="../../toast/toast.js"></script>
        <script src="../../hammer/hammer.min.js"></script>
        <script src="../../validaLogin.js"></script>
        <script>
            $(document).ready(function(){
                $('#menu').click(function(){
                    $('.ui.sidebar').sidebar('toggle');
                });
                $('.ui.sidebar').sidebar({
    				context: 'body'
				});
            });
        </script>
    </body>
</html>