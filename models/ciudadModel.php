<?php 

class ciudadModel{

	private $id;
	private $ciudad;
	private $id_region;

	public function __construct(){
		$this->db = Database::connect();
	}
	function getId(){
		return $this->id;
	}
	function getCiudad(){
		return $this->ciudad;
	}
	function getIdregion(){
		return $this->id_region;
	}
	function setId($id){
		$this->id = $this->db->real_escape_string($id);
	}
	function setCiudad($ciudad){
		$this->ciudad = $this->db->real_escape_string($ciudad);
	} 
	function setIdregion($id_region){
		$this->id_region = $this->db->real_escape_string($id_region);
	}
	public function getCityByRegion(){
		$sql = "SELECT id_ciudad,ciudad 
				  FROM tbl_region r 
			INNER JOIN tbl_ciudad c 
			        ON c.id_region = r.id_region
			     WHERE c.id_region ='{$this->getIdregion()}'";
		$ciudades = $this->db->query($sql);
		return $ciudades;
	}
	public function getCityByIdRegion(){
		$ciudades = $this->db->query("SELECT * FROM tbl_ciudad WHERE id_region = '{$this->getIdregion()}'");
		return $ciudades;
	}
	public function getAll(){
		$ciudades = $this->db->query("SELECT * FROM tbl_ciudad ORDER BY ciudad ASC ");
		return $ciudades;
	}
}