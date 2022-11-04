<?php
	include_once('Productos.php');
	echo $_POST['titulo']; 
	echo $_POST['tipo'];
	echo $_POST['precio'];
	echo $_POST['stock'];
	echo $_FILES['foto']['name'];
	$dir = 'img/'.$_FILES['foto']['name'];
	move_uploaded_file($_FILES['foto']['tmp_name'],$dir);
	$producto = new Productos($_POST['titulo'],$_POST['tipo'],$_POST['precio'],$_POST['stock'],$dir);
	echo $producto->insertar();
?>