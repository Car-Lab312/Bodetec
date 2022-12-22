<?php

class trabajadorModel{
	private $id;
	private $rut;
	private $nombre;
	private $apellido;
	private $imagen;
	private $direccion;
	private $ciudad;
	private $fono;
	private $idCargo;
	private $email;
	private $estado;
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
		$this->nombre = $this->db->real_escape_string($nombre); 
	} 
	public function getApellido(){ 
		return $this->apellido;
	}	
	public function setApellido($apellido){ 
		$this->apellido = $this->db->real_escape_string($apellido);
	} 
	public function getImagen(){ 
		return $this->imagen; 
	} 		
	public function setImagen($imagen){ 
		$this->imagen = $this->db->real_escape_string($imagen);
	} 
	public function getDireccion(){ 
		return $this->direccion;
	} 
	public function setDireccion($direccion){ 
		$this->direccion = $this->db->real_escape_string($direccion);
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
	public function getIdCargo(){ 
		return $this->idCargo; 
	} 	
	public function setIdCargo($idCargo){ 
		$this->idCargo = $this->db->real_escape_string($idCargo);
	} 
	public function getEmail(){ 
		return $this->email; 
	} 		
	public function setEmail($email){ 
		$this->email = $this->db->real_escape_string($email);
	} 
	public function getEstado(){ 
		return $this->estado; 
	} 		
	public function setEstado($estado){ 
		$this->estado = $this->db->real_escape_string($estado);
	}
	public function getValor(){ 
		return $this->valor; 
	} 
	public function setValor($valor){ 
		$this->valor = $this->db->real_escape_string($valor);
	} 
	public function save(){
		$result = false;
		$sql = "INSERT INTO tbl_usuario VALUES (null,'{$this->getRut()}','{$this->getNombre()}','{$this->getApellido()}','{$this->getDireccion()}','{$this->getCiudad()}','{$this->getFono()}','{$this->getIdCargo()}','{$this->getEmail()}',null,1,0,1)";
		$save = $this->db->query($sql);
		if($save){
			$result = true;
		}
		return $result;
	}
	public function get_all(){
		$sql = "SELECT tbl_usuario.id_user,tbl_usuario.rut,tbl_usuario.nombre,tbl_usuario.apellido,tbl_usuario.direccion,tbl_usuario.email,tbl_usuario.fono,tbl_ciudad.ciudad,tbl_cargo.nombre AS cargo
				  FROM tbl_usuario
			INNER JOIN tbl_ciudad ON tbl_ciudad.id_ciudad = tbl_usuario.ciudad
			INNER JOIN tbl_cargo ON tbl_cargo.id_cargo = tbl_usuario.cargo_id
				 WHERE tbl_usuario.is_job = 1
				   AND tbl_usuario.rut LIKE '%{$this->getValor()}%' 
				   	OR tbl_usuario.nombre LIKE '%{$this->getValor()}%'
				   	OR tbl_usuario.apellido LIKE '%{$this->getValor()}%'
				   	OR tbl_usuario.email LIKE '%{$this->getValor()}%'";
		$query = $this->db->query($sql);
		return $query;
	}
	public function get_One(){
		$query = $this->db->query("SELECT *,tbl_region.id_region AS region_id
									FROM tbl_usuario
									INNER JOIN tbl_ciudad ON tbl_ciudad.id_ciudad = tbl_usuario.ciudad
									INNER JOIN tbl_region ON tbl_region.id_region = tbl_ciudad.id_region
									WHERE id_user='{$this->getId()}' OR rut='{$this->getRut()}' OR email='{$this->getEmail()}'");
		/*$query1 = $this->db->query("SELECT *
									FROM tbl_usuario
									WHERE id_user='{$this->getId()}' OR rut='{$this->getRut()}' OR email='{$this->getEmail()}'");*/
		return $query->fetch_object();
	}
	public function select_One(){
		$query = $this->db->query("SELECT * FROM tbl_usuario WHERE id_user = '{$this->getId()}'");
		return $query->fetch_object();
	}
	public function get_Like(){
		$query = $this->db->query("SELECT *
									FROM tbl_usuario
									WHERE nombre LIKE '%{$this->getValor()}%' OR rut LIKE '%{$this->getValor()}%' OR email LIKE '%{$this->getValor()}%'");
		return $query;
	}
	public function delete(){
		$sql = "DELETE FROM tbl_usuario WHERE id_user='{$this->id}'";
		$del = $this->db->query("DELETE FROM tbl_usuario WHERE id_user='{$this->getId()}'");
		$result = false;
		if($del){
			$result = true;
		}
		return $result;
	}
	public function update(){
		$sql = "UPDATE tbl_usuario SET rut='{$this->getRut()}',nombre='{$this->getNombre()}',apellido='{$this->getApellido()}',direccion='{$this->getDireccion()}',ciudad='{$this->getCiudad()}',fono='{$this->getFono()}',cargo_id='{$this->getIdCargo()}',email='{$this->getEmail()}' WHERE id_user='{$this->getId()}'";
		$save = $this->db->query($sql);
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	public function all_Cargos(){
		$query = $this->db->query("SELECT * FROM tbl_cargo");
		return $query;
	}

}