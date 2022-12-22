<?php 

	class familiaModel{
		private $id_fam;
		private $descripcion;

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
		public function getDescripcion(){ 
			return $this->descripcion; 
		} 
		public function setDescripcion($descripcion){ 
			$this->descripcion = $this->db->real_escape_string($descripcion); 
		}  
		public function getAll(){
			$query = $this->db->query("SELECT * FROM tbl_familia ORDER BY id_fam DESC");
			return $query;
		}
		public function get_Nombre(){
			$query = $this->db->query("SELECT descripcion FROM tbl_familia WHERE descripcion = '{$this->getDescripcion()}'");
			return $query;
		}
		public function save(){
			$result = false;
			$save = $this->db->query("INSERT INTO tbl_familia VALUES (null,'{$this->getDescripcion()}')");
			if($save){
				$result = true;
			}
			return $result;
		}

	}