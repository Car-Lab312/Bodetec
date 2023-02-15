<?php 
require_once 'models/proveedoresModel.php';
	class proveedoresController{
        public function nuevo(){
        	require_once 'views/proveedores/nuevo.php';
            require_once 'views/proveedores/menu_tabs.php';
        }
        public function lista(){
            $proveedor = new proveedoresModel();
            $proveedores = $proveedor->getAll();
        	require_once 'views/proveedores/lista.php';
            require_once 'views/proveedores/menu_tabs.php';
        }
        public function menu_tabs(){
            require_once 'views/proveedores/menu_tabs.php';
        }
        public function save(){
            
            if(isset($_POST)){
                $proveedor = new proveedoresModel();
                $proveedor->setRut($_POST['rut_prov_registro']);
                
                $query = $proveedor->get_One();
                
                if($query){
                    exit();
                }
                else{
                    $proveedor->setNombre($_POST['nombre_prov_registro']);
                    $proveedor->setDireccion($_POST['direccion_prov_registro']);
                    $proveedor->setEmail($_POST['email_prov_registro']);
                    $proveedor->setCiudad($_POST['ciudad_prov_registro']);
                    $proveedor->setFono($_POST['fono_prov_registro']);
                    $save = $proveedor->add();
                }
                if ($save){
                    $_SESSION['register'] = "complete";
                }else{
                    $_SESSION['register'] = "failed";
                }
                if($_SESSION['register'] == 'complete'){
                    header("Location:".base_url.'proveedores/nuevo');
                }
            }
            header("Location:".base_url.'proveedores/nuevo');
        }

        public function delete(){
            Utils::isAdmin();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $proveedor = new proveedoresModel();
                $proveedor->setId($id);
                $delete = $proveedor->delete();
                if($delete){
                    $_SESSION['delete'] = 'complete';
                }else{
                    $_SESSION['delete'] = 'failed';
                }
                $_SESSION['delete'] = 'failed';
            }
            header("Location:".base_url."proveedores/lista");
        }
        public function editar(){
            Utils::isAdmin();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $proveedores = new proveedoresModel();
                $proveedores->setId($id);
                $proveedor = $proveedores->get_One();
                require_once 'views/proveedores/nuevo.php'; 
            }else{
                header("Location:".base_url.'proveedores/lista');
            }
        }
        public function update(){
            Utils::isAdmin();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $proveedor = new proveedoresModel();
                $proveedor->setId($id);
                $proveedor->setRut($_POST['rut_prov_registro']);
                $proveedor->setNombre($_POST['nombre_prov_registro']);
                $proveedor->setDireccion($_POST['direccion_prov_registro']);
                $proveedor->setEmail($_POST['email_prov_registro']);
                $proveedor->setCiudad($_POST['ciudad_prov_registro']);
                $proveedor->setFono($_POST['fono_prov_registro']);
                $update = $proveedor->update();
                if($update){
                   $_SESSION['register'] = "complete"; 
               }else{
                   $_SESSION['register'] = "failed";
               } 
            }
            if($_SESSION['register'] == "complete"){
                header("Location:".base_url.'proveedores/nuevo');
            }else{
                header("Location:".base_url.'proveedores/nuevo');
            }
        }
   
	}