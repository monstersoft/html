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
                            <div class="header">Nueva Empresa</div>
                            <div class="ui divider"></div>
                            <div class="description">
<table class="ui single line table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Registration Date</th>
      <th>E-mail address</th>
      <th>Premium Plan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>John Lilki</td>
      <td>September 14, 2013</td>
      <td>jhlilk22@yahoo.com</td>
      <td>No</td>
    </tr>
    <tr>
      <td>Jamie Harington</td>
      <td>January 11, 2014</td>
      <td>jamieharingonton@yahoo.com</td>
      <td>Yes</td>
    </tr>
    <tr>
      <td>Jill Lewis</td>
      <td>May 11, 2014</td>
      <td>jilsewris22@yahoo.com</td>
      <td>Yes</td>
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