<?php 

	class subfamiliaModel{
		private $id_subf;
		private $descripcion;
		private $id_fam;
		private $db;

		public function __construct(){
			$this->db = DataBase::connect();
		}

		public function getId_subf(){ 
			return $this->id_subf;
		} 
		public function setId_subf($id_subf){
			$this->id_subf = $this->db->real_escape_string($id_subf);
		}
		public function getDescripcion(){ 
			return $this->descripcion; 
		} 
		public function setDescripcion($descripcion){ 
			$this->descripcion = $this->db->real_escape_string($descripcion);
		}
		public function getId_fam(){ 
			return $this->id_fam; 
		} 
		public function setId_fam($id_fam){ 
			$this->id_fam = $this->db->real_escape_string($id_fam);
		} 
		public function getAll(){
			$query = $this->db->query("SELECT * FROM tbl_sub_familia");
			return $query;
		}
		public function get_sbfamilyById(){
			$query = $this->db->query("SELECT * FROM tbl_sub_familia WHERE id_fam = '{$this->getId_fam()}'");
			return $query;
		}
		public function get_Nombre(){
			$query = $this->db->query("SELECT descripcion FROM tbl_sub_familia WHERE descripcion = '{$this->getDescripcion()}' AND id_fam = '{$this->getId_fam()}' ");
			$result = $query->num_rows;
			return $result;
		}
		public function save(){
			$result = false;
			$query = $this->db->query("INSERT INTO tbl_sub_familia VALUES(null,'{$this->getDescripcion()}','{$this->getId_fam()}')");
			if($save):	
				$result = true; 
			endif;
			return $result;
		}  
	}