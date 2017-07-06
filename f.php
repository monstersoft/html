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
    <style>
        .montserrat {
            font-family: 'Montserrat';
        }
        /*.tableStyle {
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

        .nw {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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
}*/
.table {
    table-layout: fixed;
}
.table td {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.table th {
  text-align: center;
}
    </style>
</head>
<body>
    <div class="col-xs-12 montserrat" style="padding: 0;">
        <table class="table">
            <thead>
                <tr>
                    <th class="col-xs-8">Zona</th>
                    <th class="col-xs-4">Seleccionar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-xs-7"><button class="btn btn-xs" style="margin-right: 5px;"><i class="fa fa-chevron-right"></i></button>SAN PEDRO DE LA PAZ, HUMEDAL SAN PEDRO A</td>
                    <td class="col-xs-5"><form><div class="input-group"><input type="text" class="form-control datepicker text-center montserrat" placeholder="Search" style="height: 22px; padding: 0;"><div class="input-group-btn"><button class="btn btn-xs" type="submit"><i class="fa fa-search"></i></button></div></div></form></td>
                </tr>
                <tr>
                    <td class="col-xs-7"><button class="btn btn-xs" style="margin-right: 5px;"><i class="fa fa-chevron-right"></i></button>SAN PEDRO DE LA PAZ, HUMEDAL SAN PEDRO A</td>
                    <td class="col-xs-5"><form><div class="input-group"><input type="text" class="form-control datepicker text-center montserrat" placeholder="Search" style="height: 22px;"><div class="input-group-btn"><button class="btn btn-xs" type="submit"><i class="fa fa-search"></i></button></div></div></form></td>
                </tr>
                <tr>
                    <td class="col-xs-7"><button class="btn btn-xs" style="margin-right: 5px;"><i class="fa fa-chevron-right"></i></button>SAN PEDRO DE LA PAZ, HUMEDAL SAN PEDRO A</td>
                    <td class="col-xs-5"><form><div class="input-group"><input type="text" class="form-control datepicker text-center montserrat" placeholder="Search" style="height: 22px;"><div class="input-group-btn"><button class="btn btn-xs" type="submit"><i class="fa fa-search"></i></button></div></div></form></td>
                </tr>
            </tbody>
        </table>
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