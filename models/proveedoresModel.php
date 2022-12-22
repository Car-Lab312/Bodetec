<?php 

	class proveedoresModel{
		private $id;
		private $rut;
		private $nombre;
		private $direccion;
		private $ciudad;
		private $fono;
		private $email;
		private $valor;

		private $db;

		public function __construct(){
			$this->db = DataBase::connect();
		}
		public function getId(){ 
			return $this->id; 
		} 
		public function setId($id){ 
			$this->id = $this->db->real_escape_string($id);
		} 
		public function getRut(){ 
			return $this->rut; 
		}
		public function setRut($rut){ 
			$this->rut = $this->db->real_escape_string($rut);  
		}
		public function getNombre(){ 
			return $this->nombre; 
		} 
		public function setNombre($nombre){ 
			$this->nombre = $this->db->real_escape_string($nombre); ; 
		}  
		public function getDireccion(){ 
			return $this->dieccion; 
		} 
		public function setDireccion($dieccion){ 
			$this->dieccion = $this->db->real_escape_string($dieccion);  
		} 
		public function getEmail(){ 
			return $this->email; 
		} 
		public function setEmail($email){ 
			$this->email = $this->db->real_escape_string($email); 
		} 
		public function getCiudad(){ 
			return $this->ciudad; 
		} 
		public function setCiudad($ciudad){ 
			$this->ciudad = $this->db->real_escape_string($ciudad); 
		} 
		public function getFono(){ 
			return $this->fono; 
		} 
		public function setFono($fono){ 
			$this->fono = $this->db->real_escape_string($fono);
		}
		public function getValor(){
		 	return $this->valor;
		} 
		public function setValor($valor){
		 	$this->valor = $this->db->real_escape_string($valor);
		} 

		public function add(){
			$result = false;
			$sql="INSERT INTO tbl_proveedor VALUES (null,'{$this->getRut()}','{$this->getNombre()}','{$this->getDireccion()}','{$this->getCiudad()}','{$this->getFono()}','{$this->getEmail()}')";
			$save = $this->db->query($sql);
			if($save){
				$result = true;
			}
			return $result;
		}
		public function getAll(){
			$sql = "SELECT id,nombre,rut,direccion,email,telefono, tbl_ciudad.ciudad AS city FROM tbl_proveedor INNER JOIN tbl_ciudad on tbl_proveedor.ciudad = tbl_ciudad.id_ciudad";
			$query = $this->db->query($sql);
			return $query;
		} 
		public function delete(){
			$result = false;
			$query = $this->db->query("DELETE FROM tbl_proveedor WHERE id='{$this->getId()}'");
			if($query){
				$result = true;
			}
			return $result;
		}
		public function get_One(){
			$query = $this->db->query("SELECT *
										FROM tbl_proveedor
										WHERE id='{$this->getId()}' OR '{$this->getRut()}'");
			return $query->fetch_object();
		}
		public function like_Prov(){
			$query = $this->db->query("SELECT * FROM tbl_proveedor WHERE rut LIKE '%{$this->getValor()}%' OR nombre LIKE '%{$this->getValor()}%' OR email LIKE '%{$this->getValor()}%' ");
			return $query;
		}
		public function update(){
			$retult = false;
			$sql = "UPDATE tbl_proveedor 
				       SET rut ='{$this->getRut()}',
				       	   nombre = '{$this->getNombre()}',
				       	   direccion = '{$this->getDireccion()}',
				       	   ciudad = '{$this->getCiudad()}',
				       	   telefono = '{$this->getFono()}',
				       	   email = '{$this->getEmail()}' 
				     WHERE id = '{$this->getId()}'";
			$update = $this->db->query($sql);
			
			if($update){
				$result = true;
			}
			return $result;
		}
	}