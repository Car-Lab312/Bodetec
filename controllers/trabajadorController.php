<?php 
require_once 'models/trabajadorModel.php';
	class trabajadorController{
		public function nuevo(){
			Utils::isAdmin();
			require_once 'views/trabajador/nuevo.php';
			require_once 'views/trabajador/menu_tabs.php';
		}
		public function lista(){
			Utils::isAdmin();
			$trabajador = new trabajadorModel();
			$trabajadores = $trabajador->get_all();
			require_once 'views/trabajador/lista.php';
			require_once 'views/trabajador/menu_tabs.php';
		}
		// public function buscar(){
		// 	Utils::isAdmin();
		// 	require_once 'views/trabajador/buscar.php';
		// 	require_once 'views/trabajador/menu_tabs.php';
		// }
		public function nuevocargo(){
			require_once 'views/trabajador/nuevocargo.php';
			require_once 'views/trabajador/menu_tabs.php';
		}
		public function save(){
			Utils::isAdmin();
			if(isset($_POST)){
				$trabajador = new trabajadorModel();
				$trabajador->setRut($_POST['rut_trabajador']);
				$trabajador->setNombre($_POST['nombre_trabajador']);
				$trabajador->setApellido($_POST['apellido_trabajador']);
				$trabajador->setEmail($_POST['email_trabajador']);
				$trabajador->setFono($_POST['telefono_trabajador']);
				$trabajador->setDireccion($_POST['direccion_trabajador']);
				$trabajador->setCiudad($_POST['ciudad_trabajador']);
				$trabajador->setIdCargo($_POST['cargo_trabajador']);
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$trabajador->setId($id);
					$save = $trabajador->update();
				}else{
					$existe = $trabajador->get_One();
					if($existe):
						$save = $trabajador->save();
					else:
						$_SESSION['message'] = 'El trabajador ya existe';
					endif;	
				}
				if ($save){
                    $_SESSION['register'] = "complete";
            	}else{
            		$_SESSION['message'] = 'Error en el ingreso de datos, verifique la informacion! ';
                	$_SESSION['register'] = "failed";
            	}
            }
            if($_SESSION['register'] == "complete"){
				header("Location:".base_url.'trabajador/lista');
			}else{
				require_once 'views/trabajador/nuevo.php';
			}
		}
		public function editar(){
    		Utils::isAdmin();
        	if(isset($_GET['id'])){
        		$id = $_GET['id'];
        		$edit = true;
        		$trabajador = new trabajadorModel();
        		$trabajador->setId($id);
        		$trabajador = $trabajador->get_One();
        		require_once 'views/trabajador/nuevo.php'; 
        	}else{
        		header("Location:".base_url.'usuario/buscar');
        	}
    	}
    	public function menu_tabs(){
    		require_once 'views/trabajador/menu_tabs.php';
    	}
    	public function delete(){
			Utils::isAdmin();
        	if(isset($_GET['id'])){
            	$id = $_GET['id'];
            	$trabajador = new trabajadorModel();
            	$trabajador->setId($id);
            	$delete = $trabajador->delete();
            	if($delete){
            		$_SESSION['delete'] = 'complete';
            	}else{
            		$_SESSION['delete'] = 'failed';
            	}
            	$_SESSION['delete'] = 'failed';
            }
            header("Location:".base_url."trabajador/lista");
		}
		public function get_Like(){
			if(isset($_POST['search_job'])){
				$valor = $_POST['search_job'];
				$trabajador = new trabajadorModel();
				$trabajador->setValor($valor);
				$job = $trabajador->get_Like();	

			}
			return "ssss-ss";
		}
		public function saveCargo(){

		}
		public function editarCargo(){
			
		}
	}
