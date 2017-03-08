<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="css/login.css">
        <title>Machine Monitor</title>
    </head>
    <body>
        <div class="container">
            <div class="contenedor">
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card white">
                            <div class="card-content">
                                <div class="center">
                                    <span class="card-title teal-text" style="font-family: 'Montserrat'">machine<span class="blue-grey-text text-darken-4">Monitor</span></span>
                                </div>
                                <div style="padding: 0px 20px 0px 20px">
                                    <form id="formLogin">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="txtCorreo" type="text">
                                                <label for="txtCorreo">Correo</label>
                                                <div id="msgCorreo"></div>
                                            </div>
                                            <div class="input-field col s12">
                                                <input id="txtPassword" type="password">
                                                <label for="txtPassword">Password</label>
                                                <div id="msgPassword"></div>
                                            </div>
                                            <div class="center">
                                                <a id="btnEnviar" class="marca waves-effect waves-light btn">inciar sesión</a><br>
                                                <a href="#">Recuperar contraseña</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <script src="js/jquery-3.1.0.js"></script>
        <script src="js/materialize.min.js"></script>
        <script src="js/validaLogin.js"></script>
        <script src="js/compruebaLogin.js"></script>
    </body>
</html>
