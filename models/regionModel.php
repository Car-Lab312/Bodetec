<?php 

class regionModel{
	private $id;
	private $region;


	public function __construct(){
		$this->db = Database::connect();
	}
	function getId(){
		return $this->id;
	}
	function getRegion(){
		return $this->region;
	}
	function setId($id){
		$this->id = $this->db->real_escape_string($id);
	} 
	function setRegion($region){
		$this->region = $this->db->real_escape_string($region);
	}
	public function getAll(){
		$regiones = $this->db->query("SELECT * FROM tbl_region");
		return $regiones;
	} 

}