<?php
	include_once('Usuario.php');
	if (isset($_POST['IdTipo'])) {
		$tipo=$_POST['IdTipo'];
	}
	else {
		$tipo=2;
	}
	$usuario = new Usuario($_POST['nombre'],$_POST['APaterno'],$_POST['email'],$_POST['telefono'],$_POST['fechanacimiento'],$_POST['ciudad'],$_POST['ci'],$_POST['password'],$tipo);
	//var_dump(expression);
	echo $usuario->insertar();
?>
