<?php
 include_once('Usuario.php');
 
 $arr = Usuario::seleccionarUsuarioMail($_POST['usuario']);
 
if (isset($_POST['usuario']) && isset($_POST['password']))
    {
        
    if (($_POST['usuario']==$arr[0]->getEmail())&&(password_verify($_POST['password'],$arr[0]->getPass())))
        {
        session_start();
        $_SESSION['usuario']=$arr[0]->getEmail();
        $_SESSION['tipo']=$arr[0]->getTipo();
        $_SESSION['tiempo']=time();
        var_dump($_SESSION);
        header('Location: http://localhost/Programacion3FAyalaR/pr21-11/index.php');
        }
    else{
        header('Location: http://localhost/Programacion3FAyalaR/pr21-11/index.php');
    }
 
    }
else
    {
        header('Location: http://localhost/Programacion3FAyalaR/pr21-11/index.php');
    }