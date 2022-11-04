<?php
include_once ("seguridad.php");
session_destroy();
session_unset();
header('Location: http://localhost/Programacion3FAyalaR/pr21-11/index.php');
?>