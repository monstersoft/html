
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#262626">
        <link rel="stylesheet" type="text/css" class="ui" href="semantic/semantic.css">
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
        <style>
            * {
                box-sizing: border-box;
                padding: 0px;
                margin: 0px;
            }
            .cuadrado {
                border: 3px solid green;
                border-radius: 15px;
                width: 100%;
                position: absolute;
                margin-top: 30%;
                height: 200px;
            }
            .icono {
                color: green;
                float: right;
                /*border: 1px solid red;*/
                border-radius: 15px;
                margin-right: 20px;
                /*position: relative;*/
            }
            .cuadrado ul {
                /*border: 1px solid teal;*/
                display: inline-block;
                color: green;
                font-weight: bold;
                margin-left: 35px;
                padding: 10px;
                vertical-align: middle;
            }
        </style>
    </head>
    <body>
       <!--<div class="cuadrado">
           <ul>
               <li>El nombre ha sido editado correctamente</li>
               <li>El correo ha sido editado correctamente</li>
           </ul>
           <i class="fa fa-check fa-3x icono"></i>
       </div>-->
<div class="ui items mini success message">
  <div class="ui item">
    <div class="ui image">
        <ul>
            <li>El nombre ha sido editado correctamente</li>
        </ul>
    </div>
    <div class="middle aligned content">
        <i class='fa fa-check fa-2x'></i>
    </div>
  </div>
</div>
        <!--<div class="ui modal modalEditarEmpresa">
            <div class="header">
              <i class="industry icon" style="float: right;"></i>
              Editar Empresa
            </div>
            <div class="content">
                <form class="ui form" id="formularioEditarEmpresa">
                    <div class="field">
                        <label>Nombre</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder="Empresa" name="nombreEditar" id="nombreEditar">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Rut</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder="17286211-K" name="rutEditar" id="rutEditar">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Correo</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder=". . . . . @ . . . . . " name="emailEditar" id="emailEditar">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Teléfono</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder="995007812" name="telefonoEditar" id="telefonoEditar">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <input type="text" name="idEditar" id="idEditar">
                </form>
<div class="ui success mini message">
  <ul class="list">
    <li>El nombre fue editado correctamente</li>
    <li>El correo fue editado correctamente</li>
  </ul>
</div>
<div class="ui error mini message">
  <ul class="list">
    <li>El telefono ya esta en uso.</li>
    <li>El rut ya esta en uso.</li>
  </ul>
</div>
            </div>
        </div>
        <script src="js/jquery2.js"></script>
        <script src="js/semantic.js"></script> 
        <script>
            $('.modalEditarEmpresa').modal('show');
        </script>-->           
    </body>
</html>