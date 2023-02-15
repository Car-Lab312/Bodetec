<?php 
require_once 'models/productoModel.php';
	class productoController{
        public function nuevo(){
            $productos = new productoModel();
            $prod = $productos->getAll();
        	require_once 'views/producto/nuevo.php';
            require_once 'views/producto/menu_tabs.php';
        }
        public function lista(){
            $productos = new productoModel();
            $prod = $productos->getAll();
            require_once 'views/producto/lista.php';
            require_once 'views/producto/menu_tabs.php';
        }
        public function familia(){
            require_once 'views/producto/familia.php';
            require_once 'views/producto/menu_tabs.php';
        }
        public function subfamilia(){
            require_once 'views/producto/subfamilia.php';
            require_once 'views/producto/menu_tabs.php';
        }
        public function menu_tabs(){
            require_once 'views/producto/menu_tabs.php';
        }	
        public function save(){
             if(isset($_POST)){
                $producto = new productoModel();
                $producto->setNombre($_POST['nombre_in']);
                $producto->setCod_producto($_POST['codigo_in']);
                $producto->setDescripcion($_POST['descripcion_in']);
                $producto->setValor($_POST['valor_in']);
                $producto->setId_subfamilia($_POST['fam_in']);
                $producto->getId_proveedor($_POST['prov_in']);
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->update();
                    header("Location:".base_url.'producto/lista');
                }else{
                    $existe = $producto->get_One();
                    if(!$existe):
                        $save = $producto->save();
                    else:
                        $_SESSION['message'] = 'El producto ya existe';
                    endif;  
                } 
                if($save):
                    $_SESSION['register'] = "complete";
                else:
                    $_SESSION['register'] = "failed";
                endif;  
            }
            if($_SESSION['register'] == "complete"):
                header("Location:".base_url.'producto/lista');
            else:
                header("Location:".base_url.'producto/nuevo');
            endif;
            
        }
        public function editar(){
            Utils::isAdmin();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $edit = true;
                $productos = new productoModel();
                $productos->setId($id);
                $producto = $productos->get_One();
                require_once 'views/producto/nuevo.php'; 
            }else{
                header("Location:".base_url.'producto/lista');
            }
        }
        public function delete(){
            Utils::isAdmin();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $producto = new productoModel();
                $producto->setId($id);
                $delete = $producto->delete();
                if($delete){
                    $_SESSION['delete'] = 'complete';
                }else{
                    $_SESSION['delete'] = 'failed';
                }
                $_SESSION['delete'] = 'failed';
            }
            header("Location:".base_url."producto/lista");
        }
	}