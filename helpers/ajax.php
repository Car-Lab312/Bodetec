<?php 

/*if(isset($_POST['id_region_search'])){
	require_once 'models/ciudadModel.php';
	$id = $_POST['id_region_search'];
	$ciudades = new ciudadModel();
	$ciudades->setIdregion($id);
	$ciudades = $ciudades->getCityByRegion();
	$lista = '';
	while ($city = $ciudades->fetch_object()) {
		$lista.='<option value="'.$city->id_ciudad.'">'.$city->ciudad.'</option>';
	}
	var_dump($lista);
	return $lista;

}*/
if(isset($_POST['search_job'])){
	$valor = $_POST['search_job'];
	require_once 'models/trabajadorModel.php';
	$trabajador = new trabajadorModel();
	$trabajador->setValor($valor);
	$job = $trabajador->get_Like();	
	return 'sss';
}