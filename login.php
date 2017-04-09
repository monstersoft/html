<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#DADADA" />
        <title>Machine Monitors</title>
        <link rel="stylesheet" href="semantic/semantic.css">
        <link rel="stylesheet" href="css/toast.css">
        <link rel="stylesheet" href="css/awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/index.css">
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
                <h2 class="titulo">Iniciar Sesión</h2>
                <form class="ui form">
                    <div class="ui segment" >
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" id="email" placeholder="Correo electrónico" value="pavillanueva@ing.ucsc.cl">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" id="password" placeholder="Contraseña" value="123456">
                            </div>
                        </div>
                        <div class="ui segment">
                            <div class="field">
                                <div class="ui slider checkbox">
                                    <input id="supervisor" type="checkbox">
                                    <label>¿ Quieres ingresar como supervisor ?</label>
                                </div>
                            </div>
                          </div>
                        <div id="btnLogin" style="background: #262626;" class="ui fluid large submit button">Ingresar</div>
                    </div>
                </form>
                <div class="ui message">
                    <a href="index3.html">¿ Olvidaste tu contraseña ?</a>
                </div>
            </div>
        </div>  
        <script src="js/jquery/jquery2.js"></script>
        <script src="semantic/semantic.js"></script>
        <script src="js/toast/toast.js"></script>
        <script src="js/hammer/hammer.min.js"></script>
        <script src="js/validaLogin.js"></script>
        <script src="js/mensajes.js"></script>
        <script src="js/devuelveUrl.js"></script>
    </body>
</html>