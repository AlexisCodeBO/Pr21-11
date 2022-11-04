<?php
 /**
  * 
  */
  class Conexion
  {
  	
  	static function conectar()
  	{
  		define('DB_HOST','localhost');
  		define('DB_USER','root');
  		define('DB_PASS','');
  		define('DB_NAME','turismo');
  		try {
  			return new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
  		} catch (Exception $e) {
  			exit('ERROR EN AL HACER LA CONEXION '.$e->getMessage());
  		}
  	}
  } 
 ?>