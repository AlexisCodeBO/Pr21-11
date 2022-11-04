<?php
	include_once('Productos.php');
	if ($_FILES['foto']['name']!='') {
		$dir = 'img/'.$_FILES['foto']['name'];
		move_uploaded_file($_FILES['foto']['tmp_name'],$dir);
	}
	else{
		$dir = $_POST['dir'];
	}
	$producto = new Productos($_POST['titulo'],$_POST['tipo'],$_POST['precio'],$_POST['stock'],$dir,$_POST['id']);
	echo $producto->modificar();
?>