<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="recursos/pickadate/default.css">
    <link rel="stylesheet" href="recursos/pickadate/default.date.css">
    <link rel="stylesheet" href="recursos/pickadate/default.time.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/base.css">
    <style>
        .montserrat {
            font-family: 'Montserrat';
        }
        .nw {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 5px;
        }
        .bor {
            border-left: 1px solid grey;
            border-right: 1px solid grey;
            border-bottom: 1px solid grey;
        }
        .dn {
            display: none;
        }
        .headTable {
            border-left: 1px solid grey;
            border-right: 1px solid grey;
            font-size: 12px;
            font-weight: 600;
        }
        .iXs {
            height: 22px;
        }
        @media (min-width: 992px) {
            .dn {
                display: inline;
                color: red;
            }
             .btnPlus {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="col-xs-12 card montserrat">
        <div class="col-xs-12 shadowButtonDown cardContent">
            <div class="col-xs-12 titleCard"><i class="fa fa-industry pull-left"></i><p>Empresa</p></div>
        </div>
        <div class="headTable col-xs-12 text-center" style="border-bottom: 3px solid #F5A214;">
            <div class="col-xs-8 col-md-3 nw">Zona</div>
            <div class="col-xs-4 col-md-2 nw">Seleccionar</div>
            <div class="col-md-1 dn nw">Última actualización</div>
            <div class="col-md-4 dn nw">Subido por</div>
            <div class="col-md-1 dn nw">Fecha subida</div>
            <div class="col-md-1 dn nw">Hora subida</div>
        </div>
        <div class="bodyTable col-xs-12 bor">
            <div class="col-xs-8 col-md-3 nw"><button class="btn btn-xs btnPlus"><i class="fa fa-chevron-right"></i></button> SERVICIOS BIO BIO, SECTOR AVENIDA PEDRO MONTT</div>
            <div class="col-xs-4 col-md-2 nw"><form> <div class="input-group"><input type="text" class="form-control iXs" placeholder="Search"><div class="input-group-btn"> <button class="btn btn-xs" type="submit"><i class="fa fa-search"></i></button></div></div></form></div>
            <div class="col-md-1 dn nw text-center">2017-05-07</div>
            <div class="col-md-4 dn nw text-center">JUAN PEREZ AVILES DEL MONTE ROSARIO</div>
            <div class="col-md-1 dn nw text-center">2017-05-03</div>
            <div class="col-md-1 dn nw text-center">16:09:00</div>
        </div>
        <div class="listTable col-xs-12">
            <div class="row"><div class="col-xs-6 text-right">Última actualización :</div><div class="col-xs-6">2017-05-07</div></div>
            <div class="row"><div class="col-xs-6 text-right">Subido por:</div><div class="col-xs-6">JUAN PEREZ AVILES DEL MONTE ROSARIO</div></div>
            <div class="row"><div class="col-xs-6 text-right">Fecha subida:</div><div class="col-xs-6">2017-05-03</div></div>
            <div class="row"><div class="col-xs-6 text-right">Hora subida:</div><div class="col-xs-6">16:09:00</div></div>
        </div>
    </div>
    <script src="recursos/jquery/jquery.min.js"></script>
    <script src="recursos/bootstrap/js/bootstrap.min.js"></script>
    <script src="recursos/pickadate/picker.js"></script>
    <script src="recursos/pickadate/picker.date.js"></script>
    <script src="recursos/pickadate/picker.time.js"></script>
    <script>
        $('.datepicker').pickadate({
            format: 'yyyy-mm-dd'
        })
    </script>
</body>
</html>