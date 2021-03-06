<?php 
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#DADADA" />
        <title>Machine Monitors</title>
        <link rel="stylesheet" href="../../recursos/semantic/semantic.min.css">
        <link rel="stylesheet" href="../../recursos/toast/toast.css">
        <link rel="stylesheet" href="../../recursos/awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../css/index.css">
    </head>
    <body>
        <div class="ui aligned center aligned grid">
            <div class="margen column">
                <h2 class="ui icon header">
                    <i class="settings icon" style="color: #F5A214;"></i>
                    <div class="content montserrat" style="color: white;">
                    	Machine Monitors
                        <div class="sub header" style="color: white;">Plan de vigilancia de maquinaria pesada</div>
                    </div>
                </h2>
                <h2 class="titulo">Confirmación de Registro</h2>
                <form class="ui form" id="formularioConfirmarSupervisor">
                    <div class="ui segment" >
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="nuevoPassword" id="nuevoPassword" placeholder="Nueva Contraseña">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="repeat icon"></i>
                                <input type="password" name="confirmarPassword" id="confirmarPassword" placeholder="Confirmar Contraseña">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="phone icon"></i>
                                <input type="text" name="telefono" id="telefono" placeholder="Teléfono Móvil - 9 9 500 78 12">
                            </div>
                        </div>
                        <?php 
                        	echo'<input type="hidden" name="idSupervisor" id="idSupervisor" placeholder="ID Supervisor" value='.$id.'>';
                        ?>
                        <div id="btnReestablecer" style="background: #262626;" class="ui fluid large submit button montserrat"><i class="fa fa-address-book" style="margin-right: 10px;"></i>Confirmar</div>
                    </div>
                </form>
            </div>
        </div>  
        <script src="../../recursos/jquery/jquery.min.js"></script>
        <script src="../../recursos/semantic/semantic.min.js"></script>
        <script src="../../supervisor/js/validarRegistro.js"></script>
        <script src="../../js/raiz.js"></script>
        <script src="../../js/funciones.js"></script>
        <script src="../../js/compruebaInputs.js"></script>
        <script src="../../js/mensajes.js"></script>
    </body>
</html>