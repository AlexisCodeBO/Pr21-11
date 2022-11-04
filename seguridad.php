<?php
session_start();
if (!isset($_SESSION['usuario']))
    header('Location: http://localhost/Programacion3FAyalaR/pr21-11/index.php');
?>