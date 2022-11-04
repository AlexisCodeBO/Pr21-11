<?php 
	include_once('conexion.php');
	/**
	* 
	*/
	class Reserva
	{
		private $CodUsuario,$Precio,$Cantidad,$CodReserva,$IdProducto;
		function __construct($CodUsuario,$Precio,$Cantidad,$IdProducto,$CodReserva=null)
		{
			$this->CodUsuario= $CodUsuario;
			$this->Precio=$Precio;
			$this->Cantidad=$Cantidad;
			$this->IdProducto=$IdProducto			
			$this->CodReserva = $CodReserva;			
		}
		public function getCodUsuario()
		{
			return $this->CodUsuario;
		}
		public function getPrecio()
		{
			return $this->precio;
		}
		public function getCantidad()
		{
			return $this->Cantidad;
		}
		public function getCodReserva()
		{
			return $this->CodReserva;
		}		
		public function getIdProducto()
		{
			return $this->IdProducto;
		}	
		public function insertar()
		{
			$sql = 'INSERT INTO reserva(IdProducto,CodReserva,CodUsuario,Precio,Cantidad) values(:IdProducto,:CodReserva,:CodUsuario,:Precio,:Cantidad)';
			$pdo = Conexion::conectar();
			$sentencia = $pdo->prepare($sql);
			$sentencia->bindParam(':IdProducto',$this->IdProducto);
			$sentencia->bindParam(':CodReserva',$this->CodReserva);
			$sentencia->bindParam(':CodUsuario',$this->CodUsuario);
			$sentencia->bindParam(':Precio',$this->Precio);	
			$sentencia->bindParam(':Cantidad',$this->Cantidad);		
			return $sentencia->execute();
		}
		static public function seleccionarTodo()
		{
			$pdo = Conexion::conectar();
			$sql='SELECT * FROM reserva';
			$stn = $pdo->prepare($sql);	
			$stn->execute();
			return $stn->FetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Reserva',array(1,1,0,1,0));
		}
		public function actualizar()
		{
			$pdo = Conexion::conectar();
			$sql="UPDATE reserva SET IdProducto = :IdProducto, CodUsuario = :CodUsuario,Precio = :Precio, Cantidad = :Cantidad WHERE CodReserva = :id";
			$sentencia = $pdo->prepare($sql);
			$sentencia->bindParam(':IdProducto',$this->IdProducto);
			$sentencia->bindParam(':CodUsuario',$this->CodUsuario);
			$sentencia->bindParam(':Precio',$this->Precio);
			$sentencia->bindParam(':Cantidad',$this->Cantidad);	
			$sentencia->bindParam(':id',$this->CodReserva);	
			return $sentencia->execute();
		}
		static public function seleccionarReserva($id)
		{
			$pdo = Conexion::conectar();
			$sql='SELECT * FROM reserva WHERE CodReserva = :id';
			$stn = $pdo->prepare($sql);	
			$stn->bindParam(':id',$id,PDO::PARAM_INT); 
			$stn->execute();
			return $stn->FetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Reserva',array(1,1,0,1,0));
		}
		static public function eliminar($id)
		{
			$pdo = Conexion::conectar();
			$sql = "DELETE FROM reserva WHERE CodReserva = :id";
			$query = $pdo->prepare($sql);
			$query->bindParam(':id',$id,PDO::PARAM_INT);
			$query->execute();
		}
	
		static public function cantReservas($id)
		{
			$pdo = Conexion::conectar();
			$sql='SELECT SUM(Cantidad) as cant FROM reserva WHERE IdProducto = :id and completada = 0';
			$stn = $pdo->prepare($sql);	
			$stn->bindParam(':id',$id,PDO::PARAM_INT); 
			$stn->execute();
			$row=$stn->fetch(PDO::FETCH_ASSOC);
			//var_dump($row);
			if (is_null($row['cant'])) {
				return 0;
			}
			else{
				return $row['cant'];
			}
			
		}

	}
 ?>