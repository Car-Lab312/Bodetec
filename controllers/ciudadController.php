<?php 

require_once 'models/ciudadModel.php';

class ciudadController{

	public function getCityByRegion($id){
		$id_region = $id;
		$ciudades = new ciudadModel();
		$ciudades->setIdregion($id_region);
		$ciudades = $ciudades->getCityByIdRegion();
		return $ciudades;
	}
	public function getCiudades(){
		$ciudades = new ciudadModel();
		$ciudades = $ciudades->getAll();
		$c = $ciudades->fetch_object();
		return $c;
	}
	public function getCiudadPorRegion($id){
		$id_region = $id;
		$ciudades = new ciudadModel();
		$ciudades->setIdregion(14);
		$ciudades = $ciudades->getCityByIdRegion();
		return $ciudades;
	}
/*	public function getCityByRegion(){
		$id = $_POST['id_region_search'];
		$ciudades = new ciudadModel();
		$ciudades->setIdregion($id);
		$ciudades = $ciudades->getCityByRegion();
		$lista = '';
		while ($city = $ciudades->fetch_object()) {
			$lista.='<option value="'.$city->id_ciudad.'">'.$city->ciudad.'</option>';
		}
		echo $lista;
	}*/

}