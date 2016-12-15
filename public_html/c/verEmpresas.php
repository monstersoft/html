<!DOCTYPE html>
<html>
    <head>
        <?php require_once 'contenido/head.php'; ?>
    </head>
    <body>
        <?php require_once 'contenido/lateral.php'; ?>
        <div class="pusher">
        <?php require_once 'contenido/barra.php'; ?>
            <div class="ui grid">
                <!--CONTENIDO ..............................................................................-->
                                <div class="ui sixteen wide mobile sixteen wide tablet  eight wide computer column">
                    <div class="ui fluid card">
                        <div class="content">
                            <i class="industry icon right floated"></i>
                            <div class="header">Los Acacios</div>
                            <div class="ui divider"></div>
                            <div class="description">
                            <table class="ui very basic unstackable table">
                              <thead>
                                <tr>
                                  <th>Patente</th>
                                  <th>Fecha de registro</th>
                                  <th class="right aligned">Velocidad máxima</th>
                                  <th class="right aligned">Tara</th>
                                  <th class="right aligned">Carga máxima</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>A1B233</td>
                                  <td>10/11/12</td>
                                  <td class="right aligned">10 km/hr</td>
                                  <td class="right aligned">50 kg</td>
                                  <td class="right aligned">100 kg</td>
                                </tr>
                                <tr>
                                  <td>A1B233</td>
                                  <td>10/11/12</td>
                                  <td class="right aligned">10 km/hr</td>
                                  <td class="right aligned">50 kg</td>
                                  <td class="right aligned">100 kg</td>
                                </tr>
                                <tr>
                                  <td>A1B233</td>
                                  <td>10/11/12</td>
                                  <td class="right aligned">10 km/hr</td>
                                  <td class="right aligned">50 kg</td>
                                  <td class="right aligned">100 kg</td>
                                </tr>
                              </tbody>
                            </table>
                            <div class="ui divider"></div>
                            <div class="ui relaxed divided list">
                              <div class="item">
                                <i class="large user middle aligned icon"></i>
                                <div class="content">
                                  <a class="header">Juanito Pérez Pérez</a>
                                  <div class="description">jperez@serviciosbiobio.cl</div>
                                  <div class="description">Fono: 995007812</div>
                                </div>
                              </div>
                              <div class="item">
                                <i class="large user middle aligned icon"></i>
                                <div class="content">
                                  <a class="header">Juanito Pérez Pérez</a>
                                  <div class="description">jperez@serviciosbiobio.cl</div>
                                  <div class="description">Fono: 995007812</div>
                                </div>
                              </div>
                              <div class="item">
                                <i class="large user middle aligned icon"></i>
                                <div class="content">
                                  <a class="header">Juanito Pérez Pérez</a>
                                  <div class="description">jperez@serviciosbiobio.cl</div>
                                  <div class="description">Fono: 995007812</div>
                                </div>
                              </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                        </div>
                    </div>
                </div>
                <!--CONTENIDO ..............................................................................-->
                <?php require_once 'contenido/modalEmpresa.php' ?>
            </div>
        </div>
        <?php require_once 'contenido/script.php'; ?>
        <script src="../../js/modalEmpresa.js"></script>
        <script src="../../js/jquery.rut.chileno.js"></script>
        <script>
            $('.ui.accordion')
  .accordion()
;
$('.menu .item')
  .tab()
;

        </script>
    </body>
</html>