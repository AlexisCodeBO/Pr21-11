<?php 
	include('Conexion.php');
	/**
	* 
	*/
	class Sitio
	{
		private $idSitio,$nombre,$descripcion,$foto;
		function __construct($nombre,$descripcion,$foto,$idSitio=null)
		{
			$this->idSitio=$idSitio;
			$this->nombre=$nombre;
			$this->descripcion=$descripcion;
			$this->foto=$foto;
		}
		public function insertar()
		{
			$pdo = Conexion::conectar();
			$sql="INSERT INTO sitios(nombre,descripcion,foto) VALUES
			(:nombre,:descripcion,:foto)";
			$query = $pdo->prepare($sql);
			$query->bindParam(':nombre',$this->nombre);
			$query->bindParam(':descripcion',$this->descripcion);
			$query->bindParam(':foto',$this->foto);
			return $query->execute();
		}
		static public function listarTodo()
		{
			$pdo = Conexion::conectar();
			$sql = 'SELECT * FROM sitios';
			$query = $pdo->prepare($sql);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Sitio',array('nombre','descripcion','foto'));
		}
		public function getFoto()
		{
			return $this->foto;
		}
		public function getNombre()
		{
			return $this->nombre;
		}
		public function getDesc()
		{
			return $this->descripcion;
		}

	}
 ?>