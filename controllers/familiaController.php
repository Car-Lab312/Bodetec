<?php 

require_once 'models/familiaModel.php';



	class familiaController{

		public function save(){
			if(isset($_POST)){
				if($_POST['fam_in'] != ''){
					$familia = new familiaModel();
					$familia->setdescripcion($_POST['fam_in']);
					$existe = $familia->get_Nombre();
					if($existe){
						$_SESSION['register'] = "failed";
						$_SESSION['mesage'] = "El dato que intenta ingresar ya existe";
						require_once 'views/producto/familia.php';
					}else{
						$save = $familia->save();	
					}
				
					if($save){
						$_SESSION['register'] = "complete";
						/*header("Location".base_url."producto/familia");*/
					}else{
						$_SESSION['register'] = "failed";
					}
				}
					
			}
			if($_SESSION['register'] == "complete"){
				require_once 'views/producto/familia.php';
			}else{
				require_once 'views/producto/familia.php';
			}

			

		}



	}