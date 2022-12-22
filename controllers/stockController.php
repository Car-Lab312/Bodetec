<?php 
require_once 'models/productoModel.php';

	class stockController{
		

		public function nuevo(){
			require_once 'views/stock/nuevo.php';
			require_once 'views/stock/menu_tabs.php';
		}
		public function cierre(){
			require_once 'views/stock/cierre.php';
			require_once 'views/stock/menu_tabs.php';
		}
		public function fecha(){
			require_once 'views/stock/fecha.php';
			require_once 'views/stock/menu_tabs.php';
		}
		public function valor(){
			require_once 'views/stock/valor.php';
			require_once 'views/stock/menu_tabs.php';
		}
		public function cantidad(){
			$prod = new productoModel();
    		$stock = $prod->get_Stock();
			require_once 'views/stock/cantidad.php';
			require_once 'views/stock/menu_tabs.php';
		}
    	public function menu_tabs(){
    		require_once 'views/stock/menu_tabs.php';
    	}
    	public function lista(){
    		$producto = new productoModel();
    		$stock = $producto->get_Stock();
    		require_once 'views/stock/lista.php';
			require_once 'views/stock/menu_tabs.php';
    	}
    	public function update(){
    		
  			if(isset($_POST)){
    			$producto = new productoModel();
    			$cont = count($_POST['cod']);
    			$total = 0;
    			
    			for($i=0;$i<$cont;$i++){
    				$producto->setCod_producto($_POST['cod'][$i]);
    				$producto->setStock($_POST['cant'][$i]);
    				$producto->setValor($_POST['precio'][$i]);

    				$update = $producto->updateStock();
    				if($update){
    					$total++;
    				}
    			}
    		}
    		if($total == $cont):
                $_SESSION['register'] = "complete";
                else:
                    $_SESSION['register'] = "failed";
            endif;
            if($_SESSION['register'] == "complete"){
                header("Location:".base_url.'stock/lista');
            }else{
                require_once 'views/stock/nuevo.php';
            }
    	}
    	public function stockEntreFechas(){
    		$producto = new productoModel();
    		$producto->setFechaIn($_POST['dateI_in']);
			$producto->setFechaOut($_POST['dateF_in']);
			$productos = $producto->get_stockPorFechas();
			require_once 'views/stock/fecha.php';
			require_once 'views/stock/menu_tabs.php';
    	}
    	public function detalle(){
    		if(isset($_GET['id'])){
    			require_once 'models/entregacargoModel.php';
    			$pedimento = new entregacargoModel();
    			$pedimento->setId($_GET['id']);
    			$pedido = $pedimento->get_One();
    			$pedido = $pedido->fetch_object();
    			require_once 'views/stock/detalle.php';
				require_once 'views/stock/menu_tabs.php';
    		}
    		
    	}
	}
