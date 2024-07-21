<?php

//Conectar a la base de datos

	class Conexion{
		private $host = "localhost";
		private $user = "root";
		private $password = "";
		private $db = "user";
		private $conect;
		
		public function __construct(){
			$conectionString = "mysql:hos=".$this->host.";dbname=".$this->db.";charset=utf8";
			try {
				$this->conect = new PDO($conectionString,$this->user,$this->password);
				$this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (Exception $e) {
				$this->conect = 'Error de conexion';
				echo "Error: ".$e->getMessage();
			}
		}	

		public function conect()
		{
			return $this->conect;
		}
		
	}
?>