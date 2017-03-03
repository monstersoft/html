<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#262626">
    <title>Simulador de datos</title>
    <link rel="stylesheet" href="semantic.css">
    <link rel="stylesheet" href="../cliente/css/panel.css">
    <style>

    .ui.top.fixed.menu {
        background: #262626;
        box-shadow: none;
        border-bottom: 5px solid #F5A214;
    }
    #letra {
        margin: 5px auto;
        color: #fff;
        font-size: 22px;
        font-weight: 100;
    }
    .ui.menu {
        border: none;
    }
        /*.ui.grid {
            background: #fff !important;
            padding: 0px;
        }
        .ui.grid > .column:not(.row) {
            padding-top: 0px;
        }*/
        .bg {
            border: 1px solid #262626;
        }
        .ba {
            border: 1px solid yellow;
        }
        .br {
            border: 1px solid red;
        }
        .bv {
            border: 1px solid green;
        }
        .bb {
            border: 1px solid white;
        }
        .p0 {
            padding: 0px !important;
        }
        .ptop0 {
            padding-top: 0px !important;
        }
        .pbot0 {
            padding-bottom: 0px !important;
        }
        .plef0 {
            padding-left: 0px !important;
        }
        .prig0 {
            padding-right: 0px !important;
        }
        .mtop0 {
            margin-top: 0px !important;
        }
        .mbot0 {
            margin-bottom: 0px !important;
        }
        .mlef0 {
            margin-left: 0px !important;
        }
        .mrig0 {
            margin-right: 0px !important;
        }
        .amarillo {
            color: #F5A214 !important;
        }
        .grisClaro {
            color: #F5F4F3;
        }
        .grisOscuro {
            color: #262626;
        }
        .celeste {
            color: #4183C4 !important;
        }

    </style>
</head>
<body>
    <div class="ui top fixed menu">
        <p id="letra" class="ui center aligned header">
            Machine Monitors
        </p>
    </div>
    
    
    <div class="ui grid container">
        <div class="bg four wide column"><h2 class="ui icon header"><i class="rocket icon"></i><div class="content">80ZO05</div></h2></div>
        <div class="bg twelve wide column">
            <div class="ui grid">
                <div class="bg sixteen wide computer column"><h3 class="ui center aligned header celeste">80ZO05 - ID01 - IDMAQ03</h3></div>
                <div class="bg sixteen wide column">
                    <div class="ui grid">
                        <div class="bg four wide mobile column"><h6 class="ui icon header"><i class="map icon"></i><div class="content">ZONA<div class="sub header">LOS ALERCES</div></div></h6></div>
                        <div class="bg four wide mobile column"><h6 class="ui icon header"><i class="file icon"></i><div class="content">PROYECTO</div><div class="sub header">LOS ACACIOS</div></h6></div>
                        <div class="bg four wide mobile column"><h6 class="ui icon header"><i class="industry icon"></i><div class="content">EMPRESA<div class="sub header">SERVICIOS BÍO BÍO</div></div></h6></div>
                        <div class="bg four wide mobile column"><h6 class="ui icon header"><i class="users icon"></i><div class="content">SUPERVISORES<div class="sub header">JUAN ANDRÉS PÉREZ PÉREZ</div></div></h6></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui grid container">
        <div class="bg four wide column"><h2 class="ui icon header"><i class="rocket icon"></i><div class="content">80ZO05</div></h2></div>
        <div class="bg twelve wide column">
            <div class="ui grid">
                <div class="bg sixteen wide computer column"><h3 class="ui center aligned header celeste">80ZO05 - ID01 - IDMAQ03</h3></div>
                <div class="bg sixteen wide column">
                    <div class="ui grid">
                        <div class="bg four wide mobile column"><h5 class="ui icon header"><i class="map icon"></i><div class="content">LOS ALERCES<div class="sub header">ZONA</div></div></h5></div>
                        <div class="bg four wide mobile column"><h5 class="ui icon header"><i class="file icon"></i><div class="content">LOS ACACIOS</div><div class="sub header">PROYECTO</div></h5></div>
                        <div class="bg four wide mobile column"><h5 class="ui icon header"><i class="industry icon"></i><div class="content">SERVICIOS BÍO BÍO<div class="sub header">EMPRESA</div></div></h5></div>
                        <div class="bg four wide mobile column"><h5 class="ui icon header"><i class="users icon"></i><div class="content">JUAN ANDRÉS PÉREZ PÉREZ<div class="sub header">SUPERVISORES</div></div></h5></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="jquery2.js"></script>
    <script src="semantic.js"></script>
    <script src="chart.min.js"></script>
</body>
</html>