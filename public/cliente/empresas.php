<?php
    session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../../index.php");
    }
    else {
        include("../../php/funciones.php");
        $email = $_SESSION['correo'];
        $perfil = datosPerfil($email);
        $empresas = empresas();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#262626">
        <title>Empresas</title>
        <link rel="stylesheet" type="text/css" class="ui" href="../../semantic/semantic.css">
        <link rel="stylesheet" href="../../css/panel.css">
        <link rel="stylesheet" href="../../css/awesome/css/font-awesome.css">
    </head>
    <style>
    </style>
    <body>
        <div class="ui sticky fixed" style="bottom: 10px;right: 10px;"><button class="ui icon button agregarEmpresa"><i class="add icon"></i></div></button>
        <div class="ui sidebar inverted vertical menu">
            <div id="perfil" class="item" href="/introduction/getting-started.html">
                <h5 class="ui icon header">
                    <i class="settings icon"></i>
                    <div class="content">
                        <?php echo $perfil['empresa']; ?>
                        <div class="sub header"><?php echo $perfil['correo']; ?></div>
                    </div>
                </h5>
            </div>
            <a id="hola" class="item" href="dashboard.php">
                <div class="ce">
                    <i class="fa fa-tachometer iz"></i>
                    <div>Dashboard</div>
                </div>
            </a>
            <a id="hola" class="item active" href="empresas.php">
            <div class="ce">
                <i class="fa fa-industry iz"></i>
                <div>Empresas</div>
            </div>
            </a>
            <a id="hola" class="item" href="historicos.php">
                <div class="ce">
                    <i class="fa fa-bar-chart iz"></i>
                    <div>Históricos</div>
                </div>
            </a>
            <h6 class="ui horizontal divider header">
                <i class="user icon" style="color: #fff;"></i>
            </h6>
            <a id="hola" class="item" href="contactar.php">
                <div class="ce">
                    <i class="fa fa-send iz"></i>
                    <div>Contactar Administrador</div>
                </div>
            </a>
            <a id="hola" class="item" href="reset.php">
                <div class="ce">
                    <i class="fa fa-unlock iz"></i>
                    <div>Cambiar Contraseña</div>
                </div>
            </a>
            <a id="hola" class="item" href="cerrar.php">
                <div class="ce">
                    <i class="fa fa-sign-out iz"></i>
                    <div>Cerrar Sesión</div>
                </div>
            </a>
        </div>
        <div class="pusher">
            <div class="ui top fixed menu">
                <a id="menu" class="launch icon item"><i class="content icon"></i></a>
                <p id="letra" class="ui center aligned header">
                    Machine Monitors
                </p>
            </div>
            <div class="ui grid">
<!--CONTENIDO ..............................................................................-->
<div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column cantidad">
    <div class="ui fluid card">
        <div class="content">
            <div class="compact ui top right basic pointing dropdown button right floated" style="box-shadow: 0px 0px 0px 1px white inset;padding: 3px;margin-top: -3px;">
                <i class="ellipsis vertical icon"></i>
                <div class="menu">
                    <div class="editarEmpresa item" id="'.$value['idEmpresa'].'"><i class="edit icon"></i>editar empresa</div>
                    <div class="removerEmpresa item" id="'.$value['idEmpresa'].'"><i class="delete icon"></i>remover empresa</div>
                </div>
            </div>
            <h4 class="ui header left floated"><i class="industry icon a"></i><div class="content c" style="vertical-align: bottom;">Servicios Bío Bío</div></h4>
            <div class="ui divider" style="margin-bottom: 0px;margin-top: 25px;border-bottom: 3px solid #F5A214;border-top: none;"></div>
            <div class="description">
                <div class="ui equal width column grid" style="padding: 0px;margin: 0px;">
                    <div class="column">
                        <h6 class="ui icon header"><i class="map icon c"></i><div class="content">ZONAS<div class="sub header">5</div></div></h6>
                    </div>
                    <div class="column">
                        <h6 class="ui icon header"><i class="setting icon c"></i><div class="content">MÁQUNAS<div class="sub header">20</div></div></h6>
                    </div>
                    <div class="column">
                        <h6 class="ui icon header"><i class="users icon c"></i><div class="content">SUPERVISORES<div class="sub header">15</div></div></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui one bottom attached buttons">
            <a href="verEmpresas.php?id='.$value['idEmpresa'].'" class="ui button ver" id="'.$value['idEmpresa'].'">Ver</a> 
        </div>
    </div>
</div>

<div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column cantidad">
    <div class="ui fluid card">
        <div class="content">
            <div class="compact ui top right basic pointing dropdown button right floated" style="box-shadow: 0px 0px 0px 1px white inset;padding: 3px;margin-top: -3px;">
                <i class="ellipsis vertical icon"></i>
                <div class="menu">
                    <div class="editarEmpresa item" id="'.$value['idEmpresa'].'"><i class="edit icon"></i>editar empresa</div>
                    <div class="removerEmpresa item" id="'.$value['idEmpresa'].'"><i class="delete icon"></i>remover empresa</div>
                </div>
            </div>
            <h4 class="ui header left floated"><i class="industry icon a"></i><div class="content c" style="vertical-align: bottom;">Servicios Bío Bío</div></h4>
            <div class="ui divider" style="margin-bottom: 0px;margin-top: 25px;border-bottom: 3px solid #F5A214;border-top: none;"></div>
            <div class="description">
                <div class="ui equal width column grid" style="padding: 0px;margin: 0px;">
                    <div class="column">
                        <h6 class="ui icon header"><i class="map icon a"></i><div class="content">ZONAS<div class="sub header">5</div></div></h6>
                    </div>
                    <div class="column">
                        <h6 class="ui icon header"><i class="setting icon a"></i><div class="content">MÁQUNAS<div class="sub header">20</div></div></h6>
                    </div>
                    <div class="column">
                        <h6 class="ui icon header"><i class="users icon a"></i><div class="content">SUPERVISORES<div class="sub header">15</div></div></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui one bottom attached buttons">
            <a href="verEmpresas.php?id='.$value['idEmpresa'].'" class="ui button ver" id="'.$value['idEmpresa'].'">Ver</a> 
        </div>
    </div>
</div>
        
<div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column cantidad">
    <div class="ui fluid card">
        <div class="content">
            <div class="compact ui top right basic pointing dropdown button right floated" style="box-shadow: 0px 0px 0px 1px white inset;padding: 3px;margin-top: -3px;">
                <i class="ellipsis vertical icon"></i>
                <div class="menu">
                    <div class="editarEmpresa item" id="'.$value['idEmpresa'].'"><i class="edit icon"></i>editar empresa</div>
                    <div class="removerEmpresa item" id="'.$value['idEmpresa'].'"><i class="delete icon"></i>remover empresa</div>
                </div>
            </div>
            <h4 class="ui header left floated"><i class="industry icon a"></i><div class="content c" style="vertical-align: bottom;">Servicios Bío Bío</div></h4>
            <div class="ui divider" style="margin-bottom: 0px;margin-top: 25px;border-bottom: 3px solid #F5A214;border-top: none;"></div>
            <div class="description">
                <div class="ui equal width column grid" style="padding: 0px;margin: 0px;">
                    <div class="column">
                        <h6 class="ui icon header"><i class="map icon go"></i><div class="content">ZONAS<div class="sub header">5</div></div></h6>
                    </div>
                    <div class="column">
                        <h6 class="ui icon header"><i class="setting icon go"></i><div class="content">MÁQUNAS<div class="sub header">20</div></div></h6>
                    </div>
                    <div class="column">
                        <h6 class="ui icon header"><i class="users icon go"></i><div class="content">SUPERVISORES<div class="sub header">15</div></div></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui one bottom attached buttons">
            <a href="verEmpresas.php?id='.$value['idEmpresa'].'" class="ui button ver" id="'.$value['idEmpresa'].'">Ver</a> 
        </div>
    </div>
</div>
                <?php
                    if($empresas['cantidadEmpresas'] == 0)
                        echo '<div class="ui sixteen wide mobile column" style="padding-top: 25%"><h1 class="ui icon header aligned center"><i class="circular warning icon"></i><div class="content">No hay empresas registradas<div class="sub header">Debes presionar el botón más para agregar una empresa</div></div></h1></div';    
                    else {
                        foreach ($empresas['empresas'] as $key => $value) { echo ' 
                            <div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column cantidad">
                                <div class="ui fluid card">
                                    <div class="content">
                                        <i class="industry icon right floated"></i>
                                        <div class="header">'.$value['nombre'].'</div>
                                        <div class="ui divider"></div>
                                        <div class="description">
                                            <div class="ui three mini statistics">
                                                <div class="statistic">
                                                    <div class="value"><i class="map icon"></i><p class="cantidadZonas">'.$value['zonas'].'</p></div>
                                                    <div class="label">Zonas</div>
                                                </div>
                                                <div class="statistic">
                                                    <div class="value"><i class="setting icon"></i><p class="cantidadMaquinas">'.$value['maquinas'].'</p></div>
                                                    <div class="label">Máquinas</div>
                                                </div>
                                                <div class="statistic">
                                                    <div class="value"><i class="user icon"></i><p class="cantidadSupervisores">'.$value['supervisores'].'</p></div>
                                                    <div class="label">Supervisores</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui three bottom attached buttons">
                                        <a class="ui button eliminarEmpresa disabled" id="'.$value['idEmpresa'].'"><i class="trash icon"></i></a>
                                        <a class="ui button editarEmpresa" id="'.$value['idEmpresa'].'"><i class="write icon"></i></a>
                                        <a href="verEmpresas.php?id='.$value['idEmpresa'].'" class="ui button ver" id="'.$value['idEmpresa'].'"><i class="unhide icon"></i></a> 
                                    </div>
                                </div>
                            </div>';
                        }
                    }
                ?>
<!--CONTENIDO ..............................................................................-->    
            </div>
        </div>
<!--VENTANAS MODALES ..............................................................................-->
<!--INSERTAR EMPRESA.....................................................................................--> 
        <div class="ui modal modalAgregarEmpresa">
            <div class="header">
              <i class="industry icon" style="float: right;"></i>
              Agregar Empresa
            </div>
            <div class="content">
                <form class="ui form" id="formularioAgregarEmpresa">
                    <div class="field">
                        <label>Nombre</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder="Empresa" name="nombre" id="nombreAgregarEmpresa" value="a">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Rut</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder="17286211-K" name="rut" id="rutAgregarEmpresa" value="17286211-k">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Correo</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder=". . . . . @ . . . . . " name="email" id="emailAgregarEmpresa" value="a@s.cl">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Celular</label>
                        <div class="ui corner labeled input">
                            <input type="text" placeholder="995007812" name="celular" id="celularAgregarEmpresa" value="995007812">
                            <div class="ui corner label"><i class="asterisk icon"></i></div>
                        </div>
                    </div>
                </form>
                <div style="text-align: right;margin-top: 15px">
                    <a  class="ui button black cancelar"><i class="close icon"></i>Cerrar</a>
                    <a  class="ui button green" id="btnAñadirEmpresa"><i class="add icon"></i>Añadir</a>
                </div>
                <div class="message" style="margin: 15px 0px 0px 0px"></div>
            </div>
        </div>
<!--INSERTAR ZONA .....................................................................................--> 
                <div class="ui modal modalInsertarZona">
                    <div class="header">
                      <i class="map icon" style="float: right;"></i>
                      Agregar Zona
                    </div>
                    <div class="content">
                        <form class="ui form" id="formularioInsertarZona">
                            <div class="field">
                                <label>Nombre</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="Nueva Zona" name="nombreZona" id="nombreZona">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Proyecto Asociado</label>
                                <div class="ui fluid selection dropdown">
                                    <input value="asdasdasd" placeholder="asdasdasdasdasdasdasd">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Seleccionar proyecto</div>
                                    <div class="menu" id="listaProyectos">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Latitud</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="Nueva Latitud" name="latitudZona" id="latitudZona">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Longitud</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="Nueva Longitud" name="longitudZona" id="longitudZona">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <input type="text" name="idEmpresaZona" id="idEmpresaZona">
                        </form>
                        <div style="text-align: right;margin-top: 15px">
                            <a  class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                            <a  class="ui button green" id="btnAñadirZona"><i class="add icon"></i>Añadir</a>
                        </div>
                        <div class="message" style="margin: 15px 0px 0px 0px"></div>
                    </div>
                </div>
<!--INSERTAR SUPERVISOR .....................................................................................--> 
                <div class="ui modal modalInsertarSupervisor">
                    <div class="header">
                      <i class="user icon" style="float: right;"></i>
                      Agregar Supervisor
                    </div>
                    <div class="content">
                        <form class="ui form" id="formularioInsertarSupervisor">
                            <div class="field">
                                <label>Nombre</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder="Nuevo Supervisor" name="nombreSupervisor" id="nombreSupervisor">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Zonas Asociadas</label>
                                <select multiple="" class="ui fluid dropdown">
                                    <option value="">Seleccionar zonas</option>
                                    <option value="angular">Angular</option>
                                    <option value="css">CSS</option>
                                    <option value="design">Graphic Design</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Correo</label>
                                <div class="ui corner labeled input">
                                    <input type="text" placeholder=". . . . . @ . . . . . " name="email" id="email" value="contacto@servisiosbiobio.cl">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <input type="text" name="idEditar" id="idEditar">
                        </form>
                        <div style="text-align: right;margin-top: 15px">
                            <a  class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                            <a  class="ui button green" id="btnAñadirSupervisor"><i class="add icon"></i>Añadir</a>
                        </div>
                        <div class="message" style="margin: 15px 0px 0px 0px"></div>
                    </div>
                </div>
<!--EDITAR EMPRESA.....................................................................................--> 
                <div class="ui modal modalEditarEmpresa">
                    <div class="header">
                      <i class="industry icon" style="float: right;"></i>
                      Editar Empresa
                    </div>
                    <div class="content">
                        <form class="ui form" id="formularioEditarEmpresa">
                            <div class="field">
                                <label>Nombre</label>
                                <div class="ui corner labeled input">
                                    <input type="text" name="nombreEditar" id="nombreEditar">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Rut</label>
                                <div class="ui corner labeled input">
                                    <input type="text" name="rutEditar" id="rutEditar">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Correo</label>
                                <div class="ui corner labeled input">
                                    <input type="text" name="emailEditar" id="emailEditar">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Teléfono</label>
                                <div class="ui corner labeled input">
                                    <input type="text" name="telefonoEditar" id="telefonoEditar">
                                    <div class="ui corner label"><i class="asterisk icon"></i></div>
                                </div>
                            </div>
                            <input type="text" name="idEditar" id="idEditar">
                        </form>
                        <div style="text-align: right;margin-top: 15px">
                            <a  class="ui button black cancelar"><i class="close icon"></i>Cancelar</a>
                            <a  class="ui button green" id="btnEditarEmpresa"><i class="write icon"></i>Editar</a>
                        </div>
                        <div class="message" style="margin: 15px 0px 0px 0px"></div>
                        <div class="messageError" style="margin: 15px 0px 0px 0px"></div>
                    </div>
                </div>
<!--ELIMINAR .....................................................................................-->           
                <div class="ui basic test modal" id="modalEliminar">
                    <div class="ui icon header">
                        <i class="archive icon"></i>
                        <div class="ui center aligned content">
                            Eliminar Registro
                        </div>
                    </div>
                        <p style="text-align: center;">Estas seguro que quieres eliminar esta empresa de la base de datos ?</p>
                        <p id="idEmpresa" style="color: red"></p> 
                    <div class="actions">
                        <div class="ui red basic cancel inverted button">
                            <i class="remove icon"></i>
                            ¡ No !
                        </div>
                        <div class="ui green ok inverted button">
                            <i class="checkmark icon"></i>
                            Si , estoy seguro
                        </div>
                    </div>
                </div>
<!--SCRIPTS ......................................................................................-->
        <script src="../../js/jquery/jquery2.js"></script>
        <script src="../../semantic/semantic.js"></script>
        <script src="../../cliente/js/modalAgregarEmpresa.js"></script>
        <script src="../../cliente/js/modalEditarEmpresa.js"></script>
        <script src="../../js/rut/jquery.rut.chileno.js"></script>
        <script src="../../js/compruebaInputs.js"></script>
        <script src="../../js/mensajes.js"></script>
        <script src="../../js/funciones.js"></script>
        <script>
            $(document).ready(function(){
                $('#menu').click(function(){$('.ui.sidebar').sidebar('toggle');});
                $('.ui.sidebar').sidebar({context: 'body'});
                $('.ui.dropdown').click(function(){
                    $('.zona').removeClass('disabled');
                    $('.supervisor').removeClass('disabled');
                    var cantidadProyectos = $(this).parents('.content').find('.cantidadProyectos').text();
                    var cantidadZonas = $(this).parents('.content').find('.cantidadZonas').text();
                    if(cantidadProyectos == 0) {
                        $('.zona').addClass('disabled');
                        $('.supervisor').addClass('disabled');
                    }
                    if(cantidadZonas == 0) 
                        $('.supervisor').addClass('disabled');
                        
                }).dropdown();
                $('.cancelar').click(function(){
                    borraMensajes();
                    reseteaFormularios();
                    cierraModales();
                });
                configuracionModales();
            });
        </script>
    </body>
</html>