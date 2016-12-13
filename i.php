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
              <i class="industry icon"></i>
              Agregar Empresa
            </div>
            <div class="content">
                <form class="ui form" id="businessForm">
                    <div class="field">
                        <label>Nombre</label>
                        <input type="text" placeholder="Empresa" name="nombre" id="nombre">
                    </div>
                    <div class="field">
                        <label>Rut</label>
                        <input type="text" placeholder="17286211-K" name="rut" id="rut">
                    </div>
                    <div class="field">
                        <label>Correo</label>
                        <input type="text" placeholder=". . . . . @ . . . . . " name="email" id="email">
                    </div>
                    <div class="field">
                        <label>Teléfono</label>
                        <input type="text" placeholder="995007812" name="telefono" id="telefono">
                    </div>
                    <div class="field">
                        <label>Dirección</label>
                        <input type="text" placeholder="Calle 1359, Santiago" name="direccion" id="direccion">
                    </div>
                    <!--<div style="text-align: right;">
                        <button class="ui black button ancelar"><i class="remove icon"></i>Cancelar</button>
                        <button class="ui green button" id="btnAñadir"><i class="checkmark icon" id='iconoAñadir'></i>Añadir</button>
                    </div>-->
                </form>
                <a href="#" id="btnAñadir">add</a>
                <a href="#" id="cancelar">cancel</a>
                <div class="errorMessage" style="margin: 15px 0px 0px 0px"></div>
            </div>
        </div>
        <script src="jquery/jquery2.js"></script>
        <script src="semantic/semantic.js"></script>
        <script src="js/jquery.rut.chileno.js"></script>
        <script src="modalEmpresa.js"></script>
    </body>
</html>