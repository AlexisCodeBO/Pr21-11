<?php 
	include_once('conexion.php');
	/**
	* 
	*/
	class Tipo
	{
		private $IdTipo, $tipo;
		function __construct($tipo, $IdTipo=null)
		{
			$this->tipo= $tipo;
			$this->idTipo=$IdTipo;
		}
		public function getTipo()
		{
			return $this->tipo;
		}
		public function getIdTipo()
		{
			return $this->IdTipo;
		}		
		public function insertar()
		{
			$pdo = Conexion::conectar();
			$sql = 'INSERT INTO tipo(tipo) values(:tipo)';			
			$sentencia = $pdo->prepare($sql);
			$sentencia->bindParam(':tipo',$this->tipo);			
			return $sentencia->execute();
		}
		static public function seleccionarTodo()
		{
			$pdo = Conexion::conectar();			
			$sql='SELECT * FROM tipo';
			$stn = $pdo->prepare($sql);	
			$stn->execute();
			return $stn->FetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Tipo',array('tipo'));
		}
		public function actualizar()
		{
			$pdo = Conexion::conectar();
			$sql="UPDATE tipo SET tipo = :tipo WHERE IdTipo = :id";
			$query = $pdo->prepare($sql);
			$query->bindParam(':tipo',$this->tipo);			
			$query->bindParam(':id',$this->IdTipo);
			return $query->execute();
		}
		static public function seleccionartipoUsuario($id)
		{
			$pdo = Conexion::conectar();
			$sql='SELECT * FROM tipo WHERE IdTipo = :id';
			$stn = $pdo->prepare($sql);	
			$stn->bindParam(':id',$id,PDO::PARAM_INT); 
			$stn->execute();
			return $stn->FetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Tipo',array('tipo'));
		}
		static function eliminar($id)
		{
			$pdo = Conexion::conectar();
			$sql = "DELETE FROM tipo WHERE IdTipo = :id";
			$query = $pdo->prepare($sql);
			$query->bindParam(':id',$id,PDO::PARAM_INT);
			$query->execute();
		}
	}
 ?>