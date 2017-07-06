<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="recursos/pickadate/default.css">
    <link rel="stylesheet" href="recursos/pickadate/default.date.css">
    <link rel="stylesheet" href="recursos/pickadate/default.time.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style>
        .montserrat {
            font-family: 'Montserrat';
        }
        .tableStyle {
    width: 100%;    
}
.tableStyle tr {
    font-family: 'Montserrat';
    font-size: 12px;
    font-weight: 100;
}
.tableStyle td {
    text-align: center;
    padding: 5px;
    white-space: nowrap;
    border-bottom: 1px solid rgba(0,0,0,0.1);   
    overflow: hidden;
    text-overflow: ellipsis;
}
.tableStyle td:first-child {
	width: 250px;
}
.tableStyle th {
    border-bottom: 3px solid #F5A214;
    text-align: center;
    color: #262626;
    font-size: 12px;
}

.accordion {
    background: rgba(0,0,0,0.1);
}
.activated {
    display: table-row;
}
.unActivated {
    display: none;
}
.unDisplayColumn {
    display: none;
}
.tdPosition {
    position: relative;
}

.btnPlus {
    float: left;
    margin-left: 5px;
    margin-right: 5px;
}
.btnPlus:hover {
    cursor: pointer;
}

ul {
    list-style: none;
    padding: 0;
}
ul li {
    text-align: center;
}



@media (min-width: 970px) {
    .unDisplayColumn {
        display: table-cell;
    }
     .btnPlus {
        display: none;
    }
}
@media (min-width: 1400px) {
    .flex-parent {
        margin: 2px 2px 2px 2px;
    }
    .links {
        position: static;
    }
}
    </style>
</head>
<body>
    <div class="col-xs-12 montserrat" style="border: 1px solid red; padding: 5px;; overflow: hidden;">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th nowrap class="text-center">Zona</th>
                    <th nowrap class="text-center">Seleccionar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td nowrap><div style="overflow: hidden; width:235px; text-overflow: ellipsis;"><button class="btn btn-xs" style="margin-right: 5px;"><i class="fa fa-chevron-right"></i></button>SAN PEDRO DE LA PAZ, HUMEDAL SAN PEDRO A</td></div>
                    <td nowrap><input style="width: 100%; text-align: center;" type="text" class="datepicker"></td>
                </tr>
                <tr>
                    <td nowrap><div style="overflow: hidden; width:235px; text-overflow: ellipsis;"><button class="btn btn-xs" style="margin-right: 5px;"><i class="fa fa-chevron-right"></i></button>CONCEPCION, LOS LIRIOS</td></div>
                    <td nowrap><input style="width: 100%; text-align: center;" type="text" class="datepicker"></td>
                </tr>
                <tr>
                    <td nowrap><div style="overflow: hidden; width:235px; text-overflow: ellipsis;"><button class="btn btn-xs" style="margin-right: 5px;"><i class="fa fa-chevron-right"></i></button>CHIGUAYENTE, LEONERA NORESTE</td></div>
                    <td nowrap><input style="width: 100%; text-align: center;" type="text" class="datepicker"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <table class="tableStyle">
        <thead>
            <tr>
                <th>Patente</th>
                <th class="unDisplayColumn">Fecha de registro</th>
                <th class="unDisplayColumn">Tara [kg]</th>
                <th class="unDisplayColumn">Carga máxima [kg]</th>
                <th class="unDisplayColumn">Registrado por</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td class="tdPosition"><div class="btnPlus"><i class="fa fa-plus"></i></div>'.$value['patente'].'</td>
                    <td class="unDisplayColumn">'.$value['fechaRegistro'].'</td>
                    <td class="unDisplayColumn">'.$value['tara'].'</td>
                    <td class="unDisplayColumn">'.$value['cargaMaxima'].'</td>
                    <td class="unDisplayColumn">JUAN PEREZ VILLANUEVA</td>
                </tr>
                <tr class="accordion unActivated">
                    <td colspan="2">
                        <ul>
                            <li>Última actualización : '.$value['fechaRegistro'].'</li>
                            <li>Subido por: '.$value['tara'].'</li>
                            <li>Fecha subida: '.$value['cargaMaxima'].'</li>
                        </ul>
                    </td>
                </tr>
        </tbody>
    </table>
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
    <script>
       $(document).ready(function(){
           $('.btnPlus').click(function(){
               var accordion = $(this).parent().parent().next();
               if(accordion.hasClass('unActivated')) {
                   $('.accordion').removeClass('activated');
                   $('.accordion').addClass('unActivated');
                   accordion.removeClass('unActivated');
                   accordion.addClass('activated');
               }
               else {
                   $('.accordion').removeClass('activated');
                   $('.accordion').addClass('unActivated');
                   accordion.removeClass('activated');
                   accordion.addClass('unActivated');
               }
           });
           $(window).resize(function(){
               if($(window).width() > 970)
                   if($('.accordion').hasClass('activated')) 
                        $($('.accordion').removeClass('activated').addClass('unActivated'));
           });
       });
   </script>
</body>
</html>