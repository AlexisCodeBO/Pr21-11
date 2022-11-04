<?php include_once('Dividida/cabecera.php');
session_start();?>	

<?php include_once('Dividida/foot_cabecera.php') ?>	
		<?php include_once('Dividida/menu.php'); 
		include_once('Productos.php');
		if (isset($_GET['id'])){
			$arr=Productos::ListarProducto($_GET['id']);
		} 
		$sw = isset($arr);
		
		?>
		<div class="container">
		<form action="" method="POST" role="form" id="fproducto">
		
			<?php if ($sw) { ?>
				<legend>Modificación de Productos</legend>
			<?php }
			else {
			 ?>
			
			<legend>Añadir Nuevo Producto</legend>
			<?php } ?>
			
		
			<div class="form-group">
				<label for="nombre">Nombre de Producto</label>
				<input type="text" class="form-control" id="titulo" name="titulo" value="<?=$sw?$arr[0]->getTitulo():''?>" placeholder="Nombre del producto">
			</div>
			<div class="form-group">
				<label for="nombre">Tipo de Producto</label>
				<input type="text" class="form-control" id="tipo" name="tipo" value="<?=$sw?$arr[0]->getTipo():''?>" placeholder="Tipo del producto">
			</div>
			<div class="form-group">
				<label for="nombre">Precio</label>
				<input type="text" class="form-control" id="precio" name="precio" value="<?=$sw?$arr[0]->getPrecio():''?>"  placeholder="Precio del Producto">
			</div>
			<div class="form-group">
				<label for="nombre">Stock</label>
				<input type="text" class="form-control" id="stock" name="stock" value="<?=$sw?$arr[0]->getStock():''?>" placeholder="Stock del producto">
			</div>
			<input type="file" name="foto">
			<hr>
			<?php if($sw){ ?>
			<input type="hidden" name="id" value="<?=$sw?$arr[0]->getId():''?>">
			<input type="hidden" name="dir" value="<?=$sw?$arr[0]->getFoto():''?>">
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<div class="thumbnail">
					<img src="<?=$sw?$arr[0]->getFoto():''?>" alt="">
				</div>
			</div>
			</div>
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
		<?php include('Dividida/cabecera_footer.php') ?>
		<script type="text/javascript">
			var f = document.getElementById('fproducto');
			f.onsubmit=insertar;
			function insertar(e) {
				alert('Los datos fueron ingresados con exito');
				e.preventDefault();
				var xht = new XMLHttpRequest();
				xht.onreadystatechange=function () {
					if (this.status==200&&this.readyState==4) {
						document.getElementById('res').innerHTML=this.responseText;	
					}
				}
				var btn=document.getElementById("btn").innerHTML;
				if (btn == 'Modificar') {
					xht.open('POST','modificarProducto.php');
				}
				else{
					xht.open('POST','insercionProducto.php');
				}
				xht.send(new FormData(f));	
			}
		</script>
<?php include('Dividida/footer.php') ?>	