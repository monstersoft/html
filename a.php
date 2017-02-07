     if($cantidadZonas == 0)
         echo 'No hay zonas registradas para esta zona';
     else {
        if($cantidadMaquinas == 0)
            echo 'No hay máquinas registradas para esta zona';
        else {
            echo 'Patente X';
        }
         if($cantidadSupervisores >= 1) {
            if($supervisor['status'] == 'desabilitado' or $supervisor['status'] == null) {
                echo 'Juanito Pérez';
                echo 'Aún no confirma email';
            }
            else {
                echo 'Info del supervisor';
            }
         }
    }
