<?php 



class indexController{

	public function index(){

		if(!isset($_SESSION['admin'])){

			// header("Location: ".base_url."views/login.php");

			// require_once "views/admin/index.php";

			require_once "views/login.php";
			
		}else{
			
			require_once "views/admin/index.php";
			// require_once "views/admin/fondo.php";

		}
	
	}

}

