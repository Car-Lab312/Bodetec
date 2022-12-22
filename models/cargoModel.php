<?php 


	class cargoModel{
		private $id_cargo;
		private $nombre;
		private $descripcion;
		private $seccion_id;

		private $db;

		public function __construct(){
			$this->db = DataBase::connect();
		}

		public function getId_cargo(){ return $this->id_cargo; } 
		public function setId_cargo($id_cargo){ $this->id_cargo = $this->db->real_escape_string($id_cargo);} 
		public function getNombre(){ return $this->nombre; } 
		public function setNombre($nombre){ $this->nombre = $this->db->real_escape_string($nombre);} 
		public function getDescripcion(){ return $this->descripcion; } 
		public function setDescripcion($descripcion){ $this->descripcion = $this->db->real_escape_string($descripcion);} 
		public function getSeccion_id(){ return $this->seccion_id; } 
		public function setSeccion_id($seccion_id){ $this->seccion_id = $this->db->real_escape_string($seccion_id);} 


		public function get_all(){
			$query = $this->db->query("SELECT * FROM tbl_cargo");
			return $query;
		}

	}