<nav class="navbar navbar-inverse" role="navigation">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php" src="logo.jpg">Dungeon's Geek</a>
						</div>
						<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search"></span></button>
				</form>
				
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav">
								<li><a href="LProductos.php">Productos</a></li>
								<li><a href="contactenos.php">Contactenos</a></li>
							</ul>
							<form class="navbar-form navbar-left" role="search">
								
							</form>
							<ul class="nav navbar-nav navbar-right">
									
							</ul>
							<?php if (isset($_SESSION['usuario'])&&$_SESSION['tipo']==1) { ?>
							<ul class="nav navbar-nav">
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Añadir Productos<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="formProducto.php">Insertar</a></li>								
							</ul>
						</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="Registrese.php">Insertar</a></li>
								<li><a href="listaUsuarios.php">Listado de Usuarios</a></li>								
							</ul>
							</ul>
							<?php } ?>
						</li>	
						<ul class="nav navbar-nav navbar-right">
						<?php if (!isset($_SESSION['usuario'])) { ?>
						<li><a data-toggle="modal" href='#registro-id'><span class="glyphicon glyphicon-log-in"></span> Registrese<span class="caret"></span></a>
						<div class="modal fade" id="registro-id">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Registro de Usuarios</h4>
									</div>
									<div class="modal-body">
											<form action="insercionUsuario.php" method="POST" role="form" id="fregistro">

											<div class="form-group">
												<label for="nombre">Nombre</label>
												<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
											</div>
											<div class="form-group">
												<label for="APaterno">Apellido</label>
												<input type="text" class="form-control" id="APaterno" name="APaterno" placeholder="Apellido">
											</div>	

											<div class="form-group">
												<label for="email">Email</label>
												<input type="email" class="form-control" id="email" name="email" placeholder="Email">
											</div>	

											<div class="form-group">
												<label for="telefono">Telefono</label>
												<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
											</div>	
											<div class="form-group">
												<label for="fechanacimiento">Fecha de Nacimiento</label>
												<input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento" placeholder="Telefono">
											</div>		
											<div class="form-group">
												<label for="ciudad">Ciudad</label>
												<input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad">
											</div>	
											<div class="form-group">
												<label for="ci">Cedula de Identidad</label>
												<input type="text" class="form-control" id="ci" name="ci" placeholder="Cedula de Identidad">
											</div>
											<div class="form-group">
												<label for="password">Password</label>
												<input type="password" class="form-control" id="password" name="password" placeholder="Password">
											</div>
											<button type="submit" class="btn btn-danger" id="btnr">Guardar</button>
										</form>
									</div>
									
								</div>
							</div>
						</div></li>
						<li class="dropdown">
							<?php } if (!isset($_SESSION['usuario'])) { ?>
							
							<a data-toggle="modal" href='#modal-id'>Login</a>
								<div class="modal fade" id="modal-id">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title">Modal title</h4>
											</div>
											<div class="modal-body">
												<form action="validar.php" method="POST" role="form">
													
												
													<div class="form-group">
														<label for="">Email</label>
														<input type="email" class="form-control" id="usuario" name="usuario" placeholder="correo@ejemplo.com">
													</div>
													<div class="form-group">
														<label for="">Contraseña</label>
														<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
													</div>
													<button type="submit" class="btn btn-danger">Iniciar Sesion</button>
												</form>
											</div>
											
										</div>
									</div>
								</div>	
						</li>
						<?php } 
						else {?>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$_SESSION['usuario']?><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="logoff.php">Salir</a></li>								
							</ul>
						</li>
						<?php } ?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>