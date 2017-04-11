<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="a/recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="a/recursos/chartist/chartist.min.css" />
    <link rel="stylesheet" href="a/recursos/chartist/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="a/recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="a/css/base.css">
    <link rel="stylesheet" href="a/css/dashboard.css">
</head>
    <body>

        
        <div class="col-xs-12 col-sm-6 shadow cardContent">
            <div class="col-xs-12 titleCard"> <i class="fa fa-bar-chart pull-left"></i>
                <div class="dropdown pull-right">
                    <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a id="'.$value['idEmpresa'].'" class="editarEmpresa"><i class="fa fa-pencil"></i>editar</a></li>
                        <li><a id="'.$value['idEmpresa'].'" class="eliminarEmpresa"><i class="fa fa-remove"></i>remover</a></li>
                    </ul>
                </div>
                <p>Frecuencia de Cambios</p>
            </div>
            <div class="col-xs-12 cardContent" style="padding: 10px;">
                <div id="example"></div>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-6 shadow cardContent">
            <div class="col-xs-12 titleCard"> <i class="fa fa-pie-chart pull-left"></i>
                <div class="dropdown pull-right">
                    <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a id="'.$value['idEmpresa'].'" class="editarEmpresa"><i class="fa fa-pencil"></i>editar</a></li>
                        <li><a id="'.$value['idEmpresa'].'" class="eliminarEmpresa"><i class="fa fa-remove"></i>remover</a></li>
                    </ul>
                </div>
                <p>Frecuencia de Cambios</p>
            </div>
            <div class="col-xs-12 cardContent" style="padding: 10px;">
                <div id="example2"></div>
            </div>
        </div>
        
        
        
        <div class="col-xs-12 shadow cardContent">
            <div class="col-xs-12 titleCard"> <i class="fa fa-line-chart pull-left"></i>
                <div class="dropdown pull-right">
                    <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a id="'.$value['idEmpresa'].'" class="editarEmpresa"><i class="fa fa-pencil"></i>editar</a></li>
                        <li><a id="'.$value['idEmpresa'].'" class="eliminarEmpresa"><i class="fa fa-remove"></i>remover</a></li>
                    </ul>
                </div>
                <p>Grados Pala</p>
            </div>
            <div class="col-xs-12 cardContent" style="padding: 10px;">
                <div class="chartLineContainer">
                    <div class="chartLineSticky"><div id="chartLineSticky"></div><div class="chartLineBackground"></div></div>
                    <div class="chartLine"><div id="chartLine"></div></div>
                </div>
            </div>
         </div>
        <script src="a/recursos/jquery/jquery.min.js"></script>
        <script src="a/recursos/bootstrap/js/bootstrap.min.js"></script>
        <script src="a/recursos/chartist/chartist.min.js"></script>
        <script src="a/recursos/chartist/chartist-plugin-tooltip.js"></script>
        <script src="a/cliente/js/graficos.js"></script>
    </body>
</html>