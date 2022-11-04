<?php include_once('dividida/cabecera.php');
session_start();?>	
<style type="text/css">
	#carousel-turismo div div img{
		width: 100%;
	}
</style>
<?php include_once('dividida/foot_cabecera.php') ?>	
		<?php include_once('dividida/menu.php'); 
				include_once('Productos.php');
				$arr = Productos::listarTodo();
				$i=0;
				//var_dump($arr);
		?>

		<div class="container">
			<div class="jumbotron">
				<div class="container">
					<h1>Dungeon's Geek</h1>
					<p>Prodcutos que ofrecemos</p>					
				</div>
			</div>	
			<div id="carousel-turismo" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
							<?php foreach ($arr as $producto) { ?>
								<li data-target="#carousel-producto" data-slide-to="<?=$i; ?>" class="<?=$i==0?'active':''; ?>"></li>
							<?php $i++; } $i=0;?>
								
							</ol>
							<div class="carousel-inner">
								<?php foreach ($arr as $producto) { ?>
								<div class="item <?=$i==0?'active':''; ?>">
									<img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="<?=$producto->getFoto(); ?>">
									<div class="container">
										<div class="carousel-caption">
											<h1>Los mejores precios para todos los productos</h1>
											<p><a class="btn btn-lg btn-primary" href="#" role="button" ><span class="glyphicon glyphicon-shopping-cart"></span> Reservar</a></p>
										</div>
									</div>
								</div>
								<?php $i++;} ?>
								
							</div>
							<a class="left carousel-control" href="#carousel-producto" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
							<a class="right carousel-control" href="#carousel-producto" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
			<div class="row">
			 <?php foreach ($arr as $producto) { ?>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="thumbnail">
						<img src="<?=$producto->getFoto(); ?>" alt="">
						<div class="caption">
							<h3><?=$producto->getTitulo(); ?></h3>
							<h4><?=$producto->getTipo(); ?></h4>
							<p>
								<?=$producto->getPrecio(); ?>
							</p>
							<p>
								<a href="#" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-shopping-cart"></span> Reservar</a>
								<div class="btn-group btn-group-justified">
									<a href="formProducto.php?id=<?=$producto->getId()?>" class="btn btn-primary">Modificar</a>
									<a href="eliminarProducto.php?id=<?=$producto->getId()?>" class="btn btn-danger">Eleminar</a>
								</div>
								
							</p>
						</div>
					</div>
				</div>
			<?php } ?>	
		</div>
		<?php include('dividida/cabecera_footer.php') ?>

<?php include('dividida/footer.php') ?>	