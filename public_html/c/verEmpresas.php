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
<table class="ui unstackable table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Status</th>
      <th class="right aligned">Notes</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>John</td>
      <td>Approved</td>
      <td class="right aligned">None</td>
    </tr>
    <tr>
      <td>Jamie</td>
      <td>Approved</td>
      <td class="right aligned">Requires call</td>
    </tr>
    <tr>
      <td>Jill</td>
      <td>Denied</td>
      <td class="right aligned">None</td>
    </tr>
  </tbody>
</table>
<table class="ui tablet stackable table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Status</th>
      <th class="right aligned">Notes</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>John</td>
      <td>Approved</td>
      <td class="right aligned">None</td>
    </tr>
    <tr>
      <td>Jamie</td>
      <td>Approved</td>
      <td class="right aligned">Requires call</td>
    </tr>
    <tr>
      <td>Jill</td>
      <td>Denied</td>
      <td class="right aligned">None</td>
    </tr>
  </tbody>
</table>
                            </div>
                        </div>
                        <a class="ui bottom attached button insertar" href="#"><i class="plus icon"></i></a>
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