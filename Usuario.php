<?php 
	include_once('Conexion.php');
	/**
	* 
	*/
	class Usuario
	{
		private $CodUsuario,$nombre,$APaterno,$Email,$Telefono,$FechaNacimiento,$Ciudad,$CI,$tipo,$Password;	
		function __construct($Nombre,$APaterno,$Email,$Telefono,$FechaNacimiento,$Ciudad,$CI,$Password,$tipo,$CodUsuario=null)
		{
			$this->Nombre=$Nombre;
			$this->APaterno=$APaterno;
			$this->Email=$Email;
			$this->Telefono=$Telefono;
			$this->FechaNacimiento=$FechaNacimiento;
			$this->Ciudad=$Ciudad;
			$this->CI=$CI;
			$this->tipo=$tipo;
			$this->Password=password_hash($Password,PASSWORD_DEFAULT);
			$this->CodUsuario= $CodUsuario;
		}
		
	
		public function insertar()
		{
			$pdo = Conexion::conectar();
			$sql = "INSERT INTO usuarios(Nombre, APaterno, Email, Telefono, FechaNacimiento, Ciudad, CI,tipo, Password) VALUES(:Nombre, :APaterno, :Email, :Telefono, :FechaNacimiento, :Ciudad, :CI, :tipo, :Password)";			
			$sentencia = $pdo->prepare($sql);
			$sentencia->bindParam(':Nombre',$this->Nombre);
			$sentencia->bindParam(':APaterno',$this->APaterno);
			$sentencia->bindParam(':Email',$this->Email);
			$sentencia->bindParam(':Telefono',$this->Telefono);
			$sentencia->bindParam(':FechaNacimiento',$this->FechaNacimiento);
			$sentencia->bindParam(':Ciudad',$this->Ciudad);
			$sentencia->bindParam(':CI',$this->CI);
			$sentencia->bindParam(':Password',$this->Password);
			$sentencia->bindParam(':tipo',$this->tipo);
			if ($sentencia->execute()) 
			{
			 	echo "Exito";
			 } 
			 else
			 {
			 	echo "Error";
			 }
		}
		static public function seleccionarTodo()
		{
			$pdo = Conexion::conectar();			
			$sql='SELECT * FROM usuarios';
			$stn = $pdo->prepare($sql);	
			$stn->execute();
			return $stn->FetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Usuario',array('nombre','APaterno','Email','1','1900-01-01','Ciudad','1','Password',1));
		}
		public function actualizar()
		{
			$pdo = Conexion::conectar();
			$sql="UPDATE usuarios SET Nombre = :Nombre, APaterno = :APaterno, Email = :Email, Telefono = :Telefono, FechaNacimiento = :FechaNacimiento, Ciudad = :Ciudad, CI = :CI, Password = :Password, tipo = :tipo WHERE CodUsuario = :id";
			$query = $pdo->prepare($sql);
			$query->bindParam(':Nombre',$this->Nombre);
			$query->bindParam(':APaterno',$this->APaterno);
			$query->bindParam(':Email',$this->Email);
			$query->bindParam(':Telefono',$this->Telefono);
			$query->bindParam(':FechaNacimiento',$this->FechaNacimiento);
			$query->bindParam(':Ciudad',$this->Ciudad);
			$query->bindParam(':CI',$this->CI);
			$query->bindParam(':Password',$this->Password);
			$query->bindParam(':tipo',$this->tipo);		
			$query->bindParam(':id',$this->CodUsuario);
			return $query->execute();
		}
		static public function seleccionarUsuario($id)
		{
			$pdo = Conexion::conectar();
			$sql='SELECT * FROM usuarios WHERE CodUsuario = :id';
			$stn = $pdo->prepare($sql);	
			$stn->bindParam(':id',$id); 
			$stn->execute();
			return $stn->FetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Usuario',array('nombre','APaterno','Email','1,1900-01-01','Ciudad','1','Password',1));
		}
		static public function seleccionarUsuarioMail($mail)
		{
			$pdo = Conexion::conectar();
			$sql='SELECT * FROM usuarios WHERE Email= :mail';
			$stn = $pdo->prepare($sql);	
			$stn->bindParam(':mail',$mail); 
			$stn->execute();
			return $stn->FetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Usuario',array('nombre','APaterno','mail','1','1900-01-01','Ciudad','1','Password',1));
		}
		static function eliminar($id)
		{
			$pdo = Conexion::conectar();
			$sql = "DELETE FROM usuarios WHERE CodUsuario = :id";
			$query = $pdo->prepare($sql);
			$query->bindParam(':id',$id,PDO::PARAM_INT);
			$query->execute();
		}
		public function getNombre()
		{
			return $this->Nombre;
		}
		public function getAPPat()
		{
			return $this->APaterno;
		}
		public function getEmail()
		{
			return $this->Email;
		}
		public function getTel()
		{
			return $this->Telefono;
		}
		public function getFN()
		{
			return $this->FechaNacimiento;
		}
		public function getCiudad()
		{
			return $this->Ciudad;
		}
		public function getCI()
		{
			return $this->CI;
		}
		public function getPass()
		{
			return $this->Password;
		}
		public function getCodUsuario()
		{
			return $this->CodUsuario;
		}
		public function getTipo()
		{
			return $this->tipo;
		}	
	}
 ?>