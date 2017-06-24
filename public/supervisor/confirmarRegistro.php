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
        <style type="text/css">
            body {
                background-color: #262626;
            }
            .column {
                max-width: 500px;
            }
            .margen {
                margin-top: 50px;
            }
            #btnLogin {
                background: #F5A214;
                color: white;
            }
            .titulo {
            	color: white;
            	border-right: 3px solid #F5A214;
            	border-left: 3px solid #F5A214;
            }
        </style>
    </head>
    <body>
        <div class="ui aligned center aligned grid">
            <div class="margen column">
                <h2 class="ui icon header">
                    <i class="settings icon" style="color: #F5A214;"></i>
                    <div class="content" style="color: white;">
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
                                <input type="password" name="nuevoPassword" id="nuevoPassword" placeholder="Nueva Contraseña" value="123456">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="repeat icon"></i>
                                <input type="password" name="confirmarPassword" id="confirmarPassword" placeholder="Confirmar Contraseña" value=123456>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="phone icon"></i>
                                <input type="text" name="telefono" id="telefono" placeholder="Teléfono Móvil - 9 9 500 78 12" value="995007812">
                            </div>
                        </div>
                        <?php 
                        	echo'<input type="hidden" name="idSupervisor" id="idSupervisor" placeholder="ID Supervisor" value='.$id.'>';
                        ?>
                        <div class="carga">
                            <div id="btnConfirmar" style="color: white;background: #262626;" class="ui fluid large submit button">Confirmar</div>
                        </div>
                        <div class="message" style="margin: 5px 0px 0px 0px"></div>
                    </div>
                </form>
            </div>
        </div>  
        <script src="../../recursos/jquery/jquery.min.js"></script>
        <script src="../../recursos/semantic/semantic.min.js"></script>
        <script src="../../supervisor/js/validarRegistro.js"></script>	
        <script src="../../js/funciones.js"></script>
        <script src="../../js/compruebaInputs.js"></script>
        <script src="../../js/mensajes.js"></script>
    </body>
</html>