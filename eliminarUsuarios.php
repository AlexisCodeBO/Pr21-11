<?php
	include_once('Usuario.php');
	Usuario::eliminar($_GET['id']);
	header('Location:http://localhost/Programacion3FAyalaR/Pr21-11/listaUsuarios.php');
?>