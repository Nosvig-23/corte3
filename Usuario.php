<?php 
	require_once("autoload.php");

	class Usuario extends Conexion{
		private $strNombre;
		private $intTelefono;
		private $strEmail;
		private $conexion;

		public function __construct(){
			$this->conexion = new Conexion();
			$this->conexion = $this->conexion->conect();
		}

//funcion de insertar usuario

		public function inertUsuario(string $nombre, float $telefono, string $email)
		{
			$this->strNombre = $nombre;
			$this->intTelefono = $telefono;			
			$this->strEmail = $email;

			$sql = "INSERT INTO actividad(nombre,telefono,email) VAlUES(?,?,?)";			
			$insert = $this->conexion->prepare($sql);
			$arrData = array($this->strNombre,$this->intTelefono,$this->strEmail);			
			$resInsert = $insert->execute($arrData);
			$idInsert = $this->conexion->lastInsertId();
			return $idInsert;
		} 

//funcion de mostrar la base de datos

		public function getUsuarios()
		{
			$sql = "SELECT * FROM actividad";
			$execute = $this->conexion->query($sql);
			$request = $execute->fetchall(PDO::FETCH_ASSOC);
			return $request;
		}

//funcion de modificar un usuario

		public function updateUser(int $id,string $nombre, float $telefono, string $email)
		{
			$this->strNombre = $nombre;
			$this->intTelefono = $telefono;			
			$this->strEmail = $email;
			$sql = "UPDATE actividad SET nombre=?, telefono=?, email=? WHERE id=$id";
			$update = $this->conexion->prepare($sql);
			$arrData = array($this->strNombre,$this->intTelefono,$this->strEmail);
			$resExecute = $update->execute($arrData);
			return $resExecute;
		}

//funcion de buscar un usuario

		public function getUser(int $id)
		{
			$sql = "SELECT * FROM actividad WHERE id = ?";
			$arrWhere = array($id);
			$query = $this->conexion->prepare($sql);
			$query->execute($arrWhere);
			$request = $query->fetch(PDO::FETCH_ASSOC);
			return $request;
		}

//funcion de elminar un usuario

		public function deluser(int $id)
		{
			$sql = "DELETE FROM actividad WHERE id = ?";
			$arrWhere = array($id);
			$delete = $this->conexion->prepare($sql);
			$del = $delete->execute($arrWhere);
			return $del;
		}


	}

?>