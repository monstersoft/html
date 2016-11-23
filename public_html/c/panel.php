<?php
    session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../../index.php");
    }
    else {
        include("../../php/funciones.php");
        $email = $_SESSION['correo'];
        //$empresa = devuelve_empresa($email);
    }
?>
<!DOCTYPE html>
<html>
    <head>
    	<?php require_once 'contenido/head.php'; ?>
    </head>
    <body>
        <?php require_once 'contenido/barra.php'; ?>
        <div class="pusher">
        	<?php require_once 'contenido/lateral.php'; ?>
        	<div class="ui grid">
        		<div class="sixteen wide column">
					<h1>RESULTADOS ACTUALES - PERFIL ARAUCO</h1>
				</div>
				<div class="sixteen wide mobile six wide computer column">
					<div class="ui fluid card">
						<div class="content">
							<i class="industry icon right floated"></i>
							<div class="header">Empresas</div>
							<div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque repellat aperiam quae nostrum minima quo quam tempora adipisci, sint temporibus sunt expedita ipsa maiores, laborum, placeat maxime velit modi nobis.</div>
						</div>
						<a id="wena" class="ui bottom attached button" href="#"><i class="user icon"></i>Ver</a>
					</div>
				</div>

				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="content">
							<i class="file icon right floated"></i>
							<div class="header">Proyectos</div>
							<div class="description">
								<div class="ui statistic">
									<div class="value">5,550</div>
									<div class="label">Downloads</div>
								</div>
							</div>
						</div>
						<a class="ui bottom attached button" href="ingresarProyectos.php"><i class="eye icon"></i>Ver</a>
					</div>
				</div>

				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="content">
							<i class="globe icon right floated"></i>
							<div class="header">Zonas</div>
							<div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque repellat aperiam quae nostrum minima quo quam tempora adipisci, sint temporibus sunt expedita ipsa maiores, laborum, placeat maxime velit modi nobis.</div>
						</div>
						<a class="ui bottom attached button" href="ingresarZonas.php">
						<i class="eye icon"></i>Ver</a>
					</div>
				</div>

				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="content">
							<i class="users icon right floated"></i>
							<div class="header">Supervisores</div>
							<div class="description">
								<div class="ui statistics">
								<div class="statistic">
									<div class="value">22</div>
									<div class="label">Faves</div>
								</div>
								<div class="statistic">
									<div class="value">31,200</div>
									<div class="label">Views</div>
								</div>
								<div class="statistic">
									<div class="value">22</div>
									<div class="label">Members</div>
								</div>
								</div>
							</div>
						</div>
						<a class="ui bottom attached button" href="ingresarSupervisores.php">
							<i class="eye icon"></i>Ver
						</a>
					</div>
				</div>


				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="content">
							<i class="users icon right floated"></i>
							<div class="header">Máquinas</div>
							<div class="description">
								<div class="ui statistics">
									<div class="statistic">
										<div class="value">22</div>
										<div class="label">Faves</div>
									</div>
									<div class="statistic">
										<div class="value">31,200</div>
										<div class="label">Views</div>
									</div>
									<div class="statistic">
										<div class="value">22</div>
										<div class="label">Members</div>
									</div>
								</div>
							</div>
						</div>
						<a class="ui bottom attached button" href="verMaquinas.php"><i class="eye icon"></i>Ver</a>
					</div>
				</div>

				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card ">
						<div class="content">
							<div class="header">
								<img src="../assets/images/wireframe/square-image.png" class="ui avatar right spaced image">
								Abbreviated Header
							</div>
							<div class="description">
								<img src="../assets/images/wireframe/paragraph.png" class="ui wireframe image">
							</div>
						</div>
						<div class="ui three bottom attached buttons">
							<div class="ui button">
								<i class="photo icon"></i>
							</div>
							<div class="ui button">
								<i class="photo icon"></i>
							</div>
							<div class="ui button">
								<i class="photo icon"></i>
							</div>
						</div>
					</div>
				</div>

				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="card">
							<div class="content">
								<img class="right floated mini ui image" src="/images/avatar/large/elliot.jpg">
								<div class="header">Elliot Fu</div>
								<div class="meta">Friends of Veronika</div>
								<div class="description">Elliot requested permission to view your contact details</div>
							</div>
							<div class="extra content">
								<div class="ui two buttons">
									<div class="ui basic green button">Approve</div>
									<div class="ui basic red button">Decline</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="card">
							<div class="content">
								<img class="right floated mini ui image" src="/images/avatar/large/elliot.jpg">
								<div class="header">Elliot Fu</div>
								<div class="meta">Friends of Veronika</div>
								<div class="description">Elliot requested permission to view your contact details</div>
							</div>
							<div class="extra content">
								<div class="ui two buttons">
									<div class="ui basic green button">Approve</div>
									<div class="ui basic red button">Decline</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="card">
							<div class="content">
								<img class="right floated mini ui image" src="/images/avatar/large/elliot.jpg">
								<div class="header">Elliot Fu</div>
								<div class="meta">Friends of Veronika</div>
								<div class="description">Elliot requested permission to view your contact details</div>
							</div>
							<div class="extra content">
								<div class="ui two buttons">
									<div class="ui basic green button">Approve</div>
									<div class="ui basic red button">Decline</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="card">
							<div class="content">
								<img class="right floated mini ui image" src="/images/avatar/large/elliot.jpg">
								<div class="header">Elliot Fu</div>
								<div class="meta">Friends of Veronika</div>
								<div class="description">Elliot requested permission to view your contact details</div>
							</div>
							<div class="extra content">
								<div class="ui two buttons">
									<div class="ui basic green button">Approve</div>
									<div class="ui basic red button">Decline</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="card">
							<div class="content">
								<img class="right floated mini ui image" src="/images/avatar/large/elliot.jpg">
								<div class="header">Elliot Fu</div>
								<div class="meta">Friends of Veronika</div>
								<div class="description">Elliot requested permission to view your contact details</div>
							</div>
							<div class="extra content">
								<div class="ui two buttons">
									<div class="ui basic green button">Approve</div>
									<div class="ui basic red button">Decline</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="card">
							<div class="content">
								<img class="right floated mini ui image" src="/images/avatar/large/elliot.jpg">
								<div class="header">Elliot Fu</div>
								<div class="meta">Friends of Veronika</div>
								<div class="description">Elliot requested permission to view your contact details</div>
							</div>
							<div class="extra content">
								<div class="ui two buttons">
									<div class="ui basic green button">Approve</div>
									<div class="ui basic red button">Decline</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="card">
							<div class="content">
								<img class="right floated mini ui image" src="/images/avatar/large/elliot.jpg">
								<div class="header">Elliot Fu</div>
								<div class="meta">Friends of Veronika</div>
								<div class="description">Elliot requested permission to view your contact details</div>
							</div>
							<div class="extra content">
								<div class="ui two buttons">
									<div class="ui basic green button">Approve</div>
									<div class="ui basic red button">Decline</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="card">
							<div class="content">
								<img class="right floated mini ui image" src="/images/avatar/large/elliot.jpg">
								<div class="header">Elliot Fu</div>
								<div class="meta">Friends of Veronika</div>
								<div class="description">Elliot requested permission to view your contact details</div>
							</div>
							<div class="extra content">
								<div class="ui two buttons">
									<div class="ui basic green button">Approve</div>
									<div class="ui basic red button">Decline</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="card">
							<div class="content">
								<img class="right floated mini ui image" src="/images/avatar/large/elliot.jpg">
								<div class="header">Elliot Fu</div>
								<div class="meta">Friends of Veronika</div>
								<div class="description">Elliot requested permission to view your contact details</div>
							</div>
							<div class="extra content">
								<div class="ui two buttons">
									<div class="ui basic green button">Approve</div>
									<div class="ui basic red button">Decline</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="card">
							<div class="content">
								<img class="right floated mini ui image" src="/images/avatar/large/elliot.jpg">
								<div class="header">Elliot Fu</div>
								<div class="meta">Friends of Veronika</div>
								<div class="description">Elliot requested permission to view your contact details</div>
							</div>
							<div class="extra content">
								<div class="ui two buttons">
									<div class="ui basic green button">Approve</div>
									<div class="ui basic red button">Decline</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="card">
							<div class="content">
								<i class="user icon"></i>
								<div class="header">Elliot Fu</div>
								<div class="meta">Friends of Veronika</div>
								<div class="description">Elliot requested permission to view your contact details</div>
							</div>
							<div class="extra content">
								<div class="ui two buttons">
									<div class="ui basic green button">Approve</div>
									<div class="ui basic red button">Decline</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="six wide mobile eight wide computer column">
					<div class="ui fluid card">
						<div class="card">
							<div class="content">
								<img class="right floated mini ui image" src="/images/avatar/large/elliot.jpg">
								<div class="header">Elliot Fu</div>
								<div class="meta">Friends of Veronika</div>
								<div class="description">Elliot requested permission to view your contact details</div>
							</div>
							<div class="extra content">
								<div class="ui two buttons">
									<div class="ui basic green button">Approve</div>
									<div class="ui basic red button">Decline</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php require_once 'contenido/script.php'; ?>
    </body>
</html>