<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#262626">
        <link rel="stylesheet" type="text/css" class="ui" href="semantic/semantic.min.css">
        <link rel="stylesheet" href="toast/toast.css">
    </head>
    <body>
    <a href="#" class="ui green button " id="modal">Modal</a>
        <div class="ui modal" id="modalInsertar">
            <div class="header">
              <i class="industry icon" style="float: right;"></i>
              Agregar Empresa
            </div>
            <div class="content">
                <form class="ui form" id="businessForm">
                    <div class="field">
                        <label>Nombre</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder="Empresa" name="nombre" id="nombre" value="Servicios bio bio">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Rut</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder="17286211-K" name="rut" id="rut" value="76245418-1">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Correo</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder=". . . . . @ . . . . . " name="email" id="email" value="contacto@serviciosbiobio.cl">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Teléfono</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder="995007812" name="telefono" id="telefono" value="412424026">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Dirección</label>
                        <input type="text" placeholder="Calle 1359, Santiago" name="direccion" id="direccion">
                    </div>
                </form>
                <div style="text-align: right;margin-top: 15px">
                    <a href="#" class="ui button black" id="cancelar"><i class="close icon"></i>Cancelar</a>
                    <a href="#" class="ui button green" id="btnAñadir"><i class="add icon"></i>Añadir</a>
                </div>
                <div class="message" style="margin: 15px 0px 0px 0px"></div>
            </div>
        </div>
        <script src="jquery/jquery2.js"></script>
        <script src="semantic/semantic.js"></script>
        <script src="js/jquery.rut.chileno.js"></script>
        <script src="modalEmpresa.js"></script>
    </body>
</html>