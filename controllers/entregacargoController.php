<?php 
require_once 'models/entregacargoModel.php';
require_once 'models/trabajadorModel.php';

	class entregacargoController{
        public function cargotrabajador(){
        	require_once 'views/entregacargo/cargotrabajador.php';
            require_once 'views/entregacargo/menu_tabs.php';
        }
        public function listadecargo(){
            $pedidos = new entregacargoModel();
            $pedidosAll = $pedidos->get_All();
        	require_once 'views/entregacargo/listadecargo.php';
            require_once 'views/entregacargo/menu_tabs.php';
        }
        public function pedido(){
            if(isset($_GET['id'])){
                $pedidos = new entregacargoModel();
                $pedidos->setId($_GET['id']);
                $pedidos = $pedidos->get_One();
                
                require_once 'views/entregacargo/pedido.php';
            }
            require_once 'views/entregacargo/pedido.php';
        }
        public function pdf(){
            if(isset($_GET['id'])){
                $pedidos = new entregacargoModel();
                $pedidos->setId($_GET['id']);
                $pedidos = $pedidos->get_One(); 

                ob_start();                
                require_once 'views/entregacargo/pdf.php';
                
            }
            ob_start();   
            require_once 'views/entregacargo/pdf.php';
        }
        public function menu_tabs(){
            require_once 'views/entregacargo/menu_tabs.php';
        }
        public function ver(){
            if(isset($_GET['id'])){      
                $trabajador = new trabajadorModel();
                $trabajador->setId($_GET['id']);
                $trabajador = $trabajador->select_One();
                require_once 'views/entregacargo/cargotrabajador.php';
            }else{
                header("Location:".base_url.'entregacargo/cargotrabajador');
            }
        }
        public function save(){
            if(isset($_POST)){
                $pedimento = new entregacargoModel();
                $pedimento->setId_usuario($_POST['id_trab']);
                $save = $pedimento->save();
                if($save){
                    $id = $save->id;
                    $cont = count($_POST['art']);
                    $total = 0;
                    for($i=0; $i<$cont ; $i++){
                        $pedimento->setId($id);
                        $pedimento->setProducto_cod($_POST['art'][$i]);
                        $pedimento->setCantidad($_POST['cant'][$i]); 
                        $save_pedido = $pedimento->save_Articulos_pedidos();
                        if($save_pedido){
                            $total++;
                        }
                    }
                }
            }
            if($total == $cont):
                $_SESSION['register'] = "complete";
                else:
                    $_SESSION['register'] = "failed";
            endif;
            if($_SESSION['register'] == "complete"){
                $consulta = $pedimento->ultimoIngreso();
                $ultimo = $consulta->id;
                header("Location:".base_url.'entregacargo/pedido&id='.$ultimo);
            }else{
                require_once 'views/entregacargo/cargotrabajador.php';
            }
        }
        function SaveMultiple($cont){
            for($i=0; $i<$cont ; $i++){
                $pedimento->setProducto_cod($_POST['art'][$i]);
                $pedimento->setCantidad($_POST['cant'][$i]);
                $pedimento->save_Articulos_pedidos();
            }
        }
        public function editar(){
            $id = $_GET['id'];
        } 
	}
