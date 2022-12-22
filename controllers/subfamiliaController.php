<?php 
	require_once 'models/subfamiliaModel.php';

	class subfamiliaController{

		public function save(){
			$_SESSION['register'] == '';
			if(isset($_POST)){
				if($_POST['subfam_in'] != '' && $_POST['id_fam_in'] != ''){
					$subfamilia = new subfamiliaModel();
					$subfamilia->setDescripcion($_POST['subfam_in']);
					$subfamilia->setId_fam($_POST['id_fam_in']);
					$existe = $subfamilia->get_Nombre();
					if($existe != 0){
						$_SESSION['register'] = "failed";
						$_SESSION['mesage'] = "El dato que intenta ingresar ya existe";
						require_once 'views/producto/subfamilia.php';
					}else{
						$save = $subfamilia->save();
					}
					if($save){
						$_SESSION['register'] = "complete";
					}else{
						$_SESSION['register'] = "failed";
					}
					
				}	

			}
			if($_SESSION['register'] == "complete"){
				require_once 'views/producto/subfamilia.php';
			}else{
				require_once 'views/producto/subfamilia.php';
			}

		}

	}