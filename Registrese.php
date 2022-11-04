<?php include_once('dividida/cabecera.php');
session_start();?>
<?php include_once('dividida/foot_cabecera.php') ?>	
		<?php include_once('dividida/menu.php');
		include_once('Usuario.php');
		include_once('Tipo.php');
		if (isset($_GET['id'])){
			$arr=Usuario::seleccionarTodo($_GET['id']);
		} 
		$arrTipos=Tipo::seleccionarTodo(); 
		$sw = isset($arr);
		
		?>
		<div class="container">
		<form action="" method="POST" role="form" id="fusuario">
			<?php if ($sw) { ?>
				<legend>Modificacion de Usuario</legend>
			<?php }
			else {
			 ?>
			
			<legend>Añadir Nuevo Usuario</legend>
			<?php } ?>
			<div class="form-group">
				<label for="IdTipo">Tipo de Usuario</label>
				<select name="IdTipo" id="IdTipo" class="form-control" required="required">
				<?php foreach ($arrTipos as $tipo) { ?>
				<option value="<?=$tipo->getIdTipo()?>"><?=$tipo->getTipo()?></option>
				<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" value="<?=$sw?$arr[0]->getNombre():''?>" placeholder="Nombre">
			</div>
			<div class="form-group">
				<label for="APaterno">Apellido Paterno</label>
				<input type="text" class="form-control" id="APaterno" name="APaterno" value="<?=$sw?$arr[0]->getAPPat():''?>" placeholder="Apellido Paterno">
			</div>	

			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" class="form-control" id="email" name="email" value="<?=$sw?$arr[0]->getEmail():''?>" placeholder="Email">
			</div>	

			<div class="form-group">
				<label for="telefono">Telefono</label>
				<input type="text" class="form-control bfh-phone" id="telefono" name="telefono" value="<?=$sw?$arr[0]->getTel():''?>" placeholder="Telefono">
			</div>	
			<div class="form-group">
				<label for="fechanacimiento">Fecha de Nacimiento</label>
				<input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento" value="<?=$sw?$arr[0]->getFN():''?>" placeholder="Telefono">
			</div>		
			<div class="form-group">
				<label for="ciudad">Ciudad</label>
				<input type="text" class="form-control" id="ciudad" name="ciudad" value="<?=$sw?$arr[0]->getCiudad():''?>" placeholder="Ciudad">
			</div>	
			<div class="form-group">
				<label for="ci">Cedula de Identidad</label>
				<input type="text" class="form-control" id="ci" name="ci" value="<?=$sw?$arr[0]->getCI():''?>" placeholder="Cedula de Identidad">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" value="<?=$sw?$arr[0]->getPass():''?>" placeholder="Password">
			</div>
			<?php if($sw){ ?>
			<input type="hidden" name="id" value="<?=$sw?$arr[0]->getCodUsuario():''?>">
					
			<?php } ?>
			<hr>
			<?php if($sw){ ?>
			<button type="submit" class="btn btn-danger" id="btn">Modificar</button>
			<?php } 
			else { ?>
			<button type="submit" class="btn btn-danger" id="btn">Guardar</button>
			<?php } ?>
		</form>
		<div id="res"></div>

		<?php include_once('dividida/cabecera_footer.php') ?>
		<script type="text/javascript">
			var f = document.getElementById('fusuario');
			f.onsubmit=insertar;
			function insertar(e) {

				e.preventDefault();
				var xht = new XMLHttpRequest();
				xht.onreadystatechange=function () {
					if (this.status==200&&this.readyState==4) {
						document.getElementById('res').innerHTML=this.responseText;	
					}
				}
				var btn=document.getElementById("btn").innerHTML;
				if (btn == 'Modificar') {
					xht.open('POST','modificarUsuario.php');
				}
				else if (btn == 'Guardar'){
					xht.open('POST','insercionUsuario.php');
				}
				xht.send(new FormData(f));	
			}
		</script>
<?php include_once('dividida/footer.php') ?>	