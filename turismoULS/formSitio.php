<?php include('parciales/cabecera.php') ?>	

<?php include('parciales/foot_cabecera.php') ?>	
		<?php include('parciales/menu.php'); ?>
		<div class="container">
		<form action="" method="POST" role="form" id="fsitio">
			<legend>Añadir Nuevo Sitio</legend>
		
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre sitio">
			</div>
			<div class="form-group">
				<label for="textareaDescripcion" class="col-sm-2 control-label">Descripcion:</label>
				<div class="col-sm-10">
					<textarea name="descripcion" id="textareaDescripcion" class="form-control" rows="3" required="required"></textarea>
				</div>
			</div>
			<input type="file" name="foto">
		
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<div id="res"></div>

		<?php include('parciales/cabecera_footer.php') ?>
		<script type="text/javascript">
			var f = document.getElementById('fsitio');
			f.onsubmit=insertar;
			function insertar(e) {
				e.preventDefault();
				var xht = new XMLHttpRequest();
				xht.onreadystatechange=function () {
					if (this.status==200&&this.readyState==4) {
						document.getElementById('res').innerHTML=this.responseText;	
					}
				}
				xht.open('POST','insercionSitio.php');
				xht.send(new FormData(f));	
			}
		</script>
<?php include('parciales/footer.php') ?>	