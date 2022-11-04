<?php include_once('dividida/cabecera.php');
session_start(); ?>	
<style type="text/css">
	#carousel-turismo div div img{
		width: 100%;
	}
</style>
<?php include_once('dividida/foot_cabecera.php') ?>	
		<?php include_once('dividida/menu.php'); 
				include_once('Usuario.php');
				$arr = Usuario::seleccionarTodo();			
		?>

		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h2>Lista de Usuarios</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>NOMBRE</th>
								<th>APELLIDO PATERNO</th>
								<th>EMAIL</th>
								<th>TELEFONO</th>
								<th>FECHA DE NACIMIENTO</th>
								<th>CIUDAD</th>
								<th>CI</th>
								<th>PASSWORD</th>
								<th>EDITAR/ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($arr as $user) { ?>
							<tr>
								<td><?=$user->getCodUsuario()?></td>
								<td><?=$user->getNombre()?></td>
								<td><?=$user->getAPPat()?></td>
								<td><?=$user->getEmail()?></td>
								<td><?=$user->getTel()?></td>
								<td><?=$user->getFN()?></td>
								<td><?=$user->getCiudad()?></td>
								<td><?=$user->getCI()?></td>
								<td><?=$user->getPass()?></td>

								
								

								<td>
									<div class="btn-group">
									<a href="Registrese.php?id=<?=$user->getCodUsuario()?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
									<a href="eliminarUsuarios.php?id=<?=$user->getCodUsuario()?>" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span></a>
									</div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php include_once('dividida/cabecera_footer.php') ?>

<?php include_once('dividida/footer.php') ?>	