<?php 
	include_once('Conexion.php');
	/**
	* 
	*/
	class Productos
	{
		private $IdProducto,$Titulo,$Tipo,$Precio,$Stock,$foto;
		function __construct($Titulo,$Tipo,$Precio,$Stock,$foto,$IdProducto=null)
		{
			$this->IdProducto=$IdProducto;
			$this->Titulo=$Titulo;
			$this->Tipo=$Tipo;
			$this->Precio=$Precio;
			$this->Stock=$Stock;
			$this->foto=$foto;
		}
		public function insertar()
		{
			$pdo = Conexion::conectar();
			$sql="INSERT INTO productos(Titulo,Tipo,Precio,Stock,foto) VALUES
			(:titulo,:tipo,:precio,:stock,:foto)";
			$query = $pdo->prepare($sql);
			$query->bindParam(':titulo',$this->Titulo);
			$query->bindParam(':tipo',$this->Tipo);
			$query->bindParam(':precio',$this->Precio);
			$query->bindParam(':stock',$this->Stock);
			$query->bindParam(':foto',$this->foto);
			if ($query->execute()) {
			 	echo "Exito";
			 } 
			 else{
			 	echo "Error";
			 }
		}
		static public function listarTodo()
		{
			$pdo = Conexion::conectar();
			$sql = 'SELECT * FROM productos';
			$query = $pdo->prepare($sql);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Productos',array('Titulo','Tipo','Precio','Stock','foto'));
		}
		static function ListarProducto($id)
		{
			$pdo = Conexion::conectar();
			$sql="SELECT * FROM productos WHERE IdProducto = :id";
			$query = $pdo->prepare($sql);
			$query->bindParam(':id',$id);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Productos',array('Titulo','Tipo','Precio','Stock','foto'));
		}
		public function modificar()
		{
			$pdo = Conexion::conectar();
			$sql = "UPDATE productos set Titulo = :titulo, Tipo = :tipo, Precio = :precio, Stock = :stock, foto = :foto WHERE IdProducto = :id";
			$query = $pdo->prepare($sql);
			$query->bindParam(':titulo',$this->Titulo);
			$query->bindParam(':tipo',$this->Tipo);
			$query->bindParam(':precio',$this->Precio);
			$query->bindParam(':stock',$this->Stock);
			$query->bindParam(':foto',$this->foto);
			$query->bindParam(':id',$this->IdProducto);
			if ($query->execute()) {
			 	echo "Exito";
			 } 
			 else{
			 	echo "Error";
			 }	
		}
		static function eliminar($id)
		{
			$pdo = Conexion::conectar();
			$sql = "DELETE FROM productos WHERE IdProducto = :id";
			$query = $pdo->prepare($sql);
			$query->bindParam(':id',$id);
			return $query->execute();
		}

		public function getFoto()
		{
			return $this->foto;
		}
		public function getTitulo()
		{
			return $this->Titulo;
		}
		public function getTipo()
		{
			return $this->Tipo;
		}
		public function getPrecio()
		{
			return $this->Precio;
		}
		public function getStock()
		{
			return $this->Stock;
		}
		public function getId()
		{
			return $this->IdProducto;
		}

	}
 ?>