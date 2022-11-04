<?php
	include_once('Usuario.php');
	$usuario = new Usuario($_POST['nombre'],$_POST['APaterno'],$_POST['email'],$_POST['telefono'],$_POST['fechanacimiento'],$_POST['ciudad'],$_POST['ci'],$_POST['password'],$_POST['id']);
	//var_dump($usuario);
	echo $usuario->actualizar();
?>