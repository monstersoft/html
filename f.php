            <?php
            foreach(zonas($email) as $value) {
                $idZona = $value['idZona'];
                echo '<div class="col-xs-12 col-sm-12 card"> <div class="col-xs-12 shadow cardContent"> <div class="col-xs-12 titleCard"> <i class="fa fa-globe pull-left"></i> <div class="dropdown pull-right"> <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div><ul class="dropdown-menu dropdown-menu-right"> <li><a id="'.$value['idZona'].'" class="subirArchivo"><i class="fa fa-upload"></i>subir archivo</a></li><li><a id="'.$value['idZona'].'" class="agregarMaquina"><i class="fa fa-cog"></i>agregar máquina</a></li><li><a id="'.$value['idZona'].'" class="descargarId"><i class="fa fa-download"></i>descargar id</a></li></ul> </div><p>'.$value['nombre'].'</p></div>';
                    if(cantidadMaquinas($idZona) == 0)
                        echo '<div class="col-xs-12 emptyMessage"><i class="fa fa-exclamation-circle fa-2x pull-left"></i>No hay máquinas asociadas a esta zona</div>';
                    else {
                        echo '<div class="col-xs-12 cardContent"> <div class="table-responsive"> <table class="responsive" style="width: 100%;"> <thead> <tr><th>Patente</th> <th>Fecha de Registro</th> <th>Tara [kg]</th> <th>Carga Máxima [kg]</th> </tr></thead> <tbody>';
                        foreach(maquinas($idZona) as $value) {
                            echo '<tr> <td class="firstColumn">'.$value['patente'].'</td><td>'.$value['fechaRegistro'].'</td><td>'.$value['tara'].'</td><td>'.$value['cargaMaxima'].'</td></tr>';
                        }
                        echo '</tbody> </table> </div></div>';
                    }
                    foreach(supervisores($idZona) as $value) {
                       echo '<div class="col-xs-12 col-sm-6 cardContent a"> <div class="col-xs-12"><i class="fa fa-user-circle fa-2x pull-left"></i><p class="text-center montserrat">'.$value['nombreSupervisor'].'</p></div><div class="col-xs-12"><a href="#">Asignar nueva zona</a><a href="#">Eliminar</a> </div></div>';
                    }
                echo '</div></div>';
            }
        ?>