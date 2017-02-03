<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="theme-color" content="#262626">
        <link rel="stylesheet" type="text/css" class="ui" href="semantic/semantic.css">
        <link rel="stylesheet" href="cliente/css/panel.css">
    </head>
    <body>
    	<div class="ui top fixed menu">
                <a id="menu" class="launch icon item"><i class="content icon"></i></a>
                <p id="letra" class="ui center aligned header">
                    Machine Monitors
                </p>
        </div>
        <div class="ui grid container">
<!--CONTENIDO ..............................................................................-->
			<div class="sixteen wide column">
				<h2 class="ui header">
			  		<i class="icons">
  						<i class="setting icon"></i>
  						<i class="large corner add icon"></i>
					</i>
			  		<div class="content">Agregar Máquina</div>
				</h2>
				<div class="ui large form">
					<div class="sixteen wide field">
						<label>Patente</label>
						<input type="text" placeholder="First Name">
					</div>
					<div class="field">
                        <label>Zonas Asociadas</label>
  						<select class="ui dropdown">
  							<option value="">State</option>
  							<option value="AL">Alabama</option>
  							<option value="AK">Alaska</option>
  							<option value="AZ">Arizona</option>
  						</select>
                    </div>
					<div class="sixteen wide field">
						<label>Velocidad Máxima</label>
						<input type="text" placeholder="Last Name">
					</div>
					<div class="sixteen wide field">
						<label>Año</label>
						<input type="text" placeholder="Last Name">
					</div>
					<div class="sixteen wide field">
						<label>Tara</label>
						<input type="text" placeholder="Last Name">
					</div>
					<div class="sixteen wide field">
						<label>Carga Máxima</label>
						<input type="text" placeholder="Last Name">
					</div>
					<button class="ui right floated green inverted button">Agregar</button>
				</div>
			</div>
<!--CONTENIDO ..............................................................................-->
		</div>
    </body>
</html>