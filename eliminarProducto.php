<?php
	include_once('Productos.php');
	Productos::eliminar($_GET['id']);
	header('Location:http://localhost/Programacion3FAyalaR/Pr21-11/Index.php');
?>