<?php 
	require_once 'models/cargoModel.php';
	class cargoController{
		public function nuevo(){
			$cargos = new cargoModel();
			$listaCargos = $cargos->get_all();
			require_once 'views/cargo/nuevo.php';
		}
}