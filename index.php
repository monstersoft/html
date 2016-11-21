<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#DADADA" />
        <title>Machine Monitors</title>
        <link rel="stylesheet" href="semantic/semantic.css">
        <link rel="stylesheet" href="toast/toast.css">
        <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
        <style type="text/css">
            body {
                background-color: #DADADA;
            }
            .column {
                max-width: 500px;
            }
            .margen {
                margin-top: 50px;
            }
        </style>
    </head>
    <body>
        <div class="ui aligned center aligned grid">
            <div class="margen column">
                <h2 class="ui icon header">
                    <i class="settings icon"></i>
                    <div class="content teal">
                    Machine Monitors
                    <div class="sub header">Plan de vigilancia de maquinaria pesada</div>
                    </div>
                </h2>-
                <form class="ui form">
                    <div class="ui segment">
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" id="email" placeholder="Correo electrónico">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" id="password" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="ui segment">
                            <div class="field">
                                <div class="ui slider checkbox">
                                    <input id="supervisor" type="checkbox">
                                    <label>¿ Quires ingresar como supervisor ?</label>
                                </div>
                            </div>
                          </div>
                        <div id="btnLogin" class="ui fluid large black submit button">Ingresar</div>
                    </div>
                </form>
                <div class="ui message">
                    <a href="index3.html">¿ Olvidaste tu contraseña ?</a>
                </div>
            </div>
        </div>  
        <script src="jquery/jquery-2.2.4.min.js"></script>
        <script src="semantic/semantic.js"></script>
        <script src="toast/toast.js"></script>
        <script src="hammer/hammer.min.js"></script>
        <script src="validaLogin.js"></script>
    </body>
</html>