<?php 

require_once 'models/usuarioModel.php';
	class usuarioController{
		public function login(){
			if(isset($_POST)){
				$usuario = new usuarioModel();
				$usuario->setEmail($_POST['email_log']);
				$usuario->setPassword($_POST['pass_log']);
				$identity = $usuario->login();
           		if($identity && is_object($identity)){
            	    $_SESSION['identity'] = $identity;
            	    if($identity->id_tipo == '1' || $identity->id_tipo == '2'){
            	        $_SESSION['admin'] = true;
            	        $_SESSION['name'] = $identity->nombre;
            	    }
           		}else{
            	    $_SESSION['error_login'] = 'Error en la identificacion';
            	}
        	}
        	header("Location:".base_url);
		}
		public function logout(){
        	if(isset($_SESSION['identity'])){
        	    unset($_SESSION['identity']);
        	}
        	if(isset($_SESSION['admin'])){
        	    unset($_SESSION['admin']);
        	}
        	header("Location:".base_url);
    	}
		public function save(){
			if(isset($_POST)){
				$usuario = new usuarioModel();
				$usuario->setRut($_POST['rut_registro']);
				$usuario->setNombre($_POST['nombre_registro']);
				$usuario->setApellido($_POST['apellido_registro']);
				$usuario->setDireccion($_POST['direccion_registro']);
				$usuario->setCiudad($_POST['ciudad_registro']);
				$usuario->setTelefono($_POST['telefono_registro']);
				$usuario->setCargo($_POST['cargo_registro']);
				$usuario->setEmail($_POST['email_registro']);
				$usuario->setPassword($_POST['password_registro']);
				$usuario->setId_tipo($_POST['tipo_registro']);
				$usuario->setEstado($_POST['estado_registro']);
				$usuario->setIs_job($_POST['trabajador_registro']);
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$usuario->setId($id);
					$save = $usuario->update();
				}else{
					$datos['rut'] = $usuario->getRut();
					$datos['email'] = $usuario->getEmail();
					$contrasenas = Utils::verifyRepeat($_POST['password_registro'],$_POST['passwordrepite_registro']);
					$existe = Utils::get_Usuario($datos);	
					if($contrasenas && !$existe){
						$save = $usuario->save();
					}else{
						if ($existe){
							$_SESSION['message'] = 'El usuario o correo ya existe!';
						}else{
							$_SESSION['message'] = 'Verifique la contraseña';
						}
					}	
				}
				if ($save){
                    $_SESSION['register'] = "complete";
                }else{
                    $_SESSION['register'] = "failed";
                }
			}
			if($_SESSION['register'] == "complete"){
				header("Location:".base_url.'usuario/lista');
			}else{
				require_once 'views/usuario/nuevo.php';
			}
		}
		public function delete(){
			Utils::isAdmin();
        	if(isset($_GET['id'])){
            	$id = $_GET['id'];
            	$usuario = new usuarioModel();
            	$usuario->setId($id);
            	$delete = $usuario->delete();
            	if($delete){
            		$_SESSION['delete'] = 'complete';
            	}else{
            		$_SESSION['delete'] = 'failed';
            	}
            	$_SESSION['delete'] = 'failed';
            }
            header("Location:".base_url."usuario/lista");
		}
    	public function info(){
    		require_once 'views/usuario/info.php';
    	}
    	public function menu_tabs(){
    		require_once 'views/usuario/menu_tabs.php';
    	}
		public function notificaciones(){
			require_once 'views/usuario/notificaciones.php';
		}
    	public function nuevo(){
    		Utils::isAdmin();
    		require_once 'views/usuario/nuevo.php';
    		require_once 'views/usuario/menu_tabs.php';
    	}
    	public function lista(){
    		$users = new usuarioModel();
    		$usuarios = $users->get_all();
    		require_once 'views/usuario/lista.php';
			require_once 'views/usuario/menu_tabs.php';
    	}
    	public function editar(){
    		Utils::isAdmin();
        	if(isset($_GET['id'])){
        		$id = $_GET['id'];
        		$edit = true;
        		$usuario = new usuarioModel();
        		$usuario->setId($id);
        		$user = $usuario->get_One();
        		require_once 'views/usuario/nuevo.php'; 

        	}else{
        		header("Location:".base_url.'usuario/lista');
        	}
    	}
    	
    	public function buscar(){
    		
    		if (isset($_POST['busqueda']) && $_POST['busqueda'] == ''){
    			$valor = $_POST['busqueda'];
    			$usuario = new usuarioModel();
    			$usuario->setValor($valor);
    			$usuarios = $usuario->get_usuarios();	
    			
    			header("Location:".base_url.'usuario/buscar');
    		}else{
    			require_once 'views/usuario/buscar.php';
				require_once 'views/usuario/menu_tabs.php';
    		}
    		
    		
    	}
    	
    	
    	/*public function get_usuario(){
    		if(isset($_POST)){
    			$usuario = new usuarioModel();
    			$user = $usuario->setRut($_POST['rut_registro']);
    		}
    		return $user; 
    	}*/
	}
	  