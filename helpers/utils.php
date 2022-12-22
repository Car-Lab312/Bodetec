<?php 

	class Utils{
		public static function get_TiposUser(){
			require_once 'models/usuarioModel.php';
			$tipoUser = new usuarioModel();
			$tipoUser = $tipoUser->get_tipo();
			return $tipoUser;
		}
		public static function get_productos(){
			require_once 'models/productoModel.php';
			$producto = new productoModel();
			$producto = $producto->getAll();
			return $producto;
		}
		public static function get_cargos(){
			require_once 'models/usuarioModel.php';
			$cargos = new usuarioModel();
			$cargos = $cargos->get_cargos();
			return $cargos;
		}
		public static function get_regiones(){
			require_once 'models/regionModel.php';
			$regiones = new regionModel();
			$regiones = $regiones->getAll();
			return $regiones;
		}
		public static function get_ciudades(){
			require_once 'models/ciudadModel.php';
			$ciudades = new ciudadModel();
			$ciudades = $ciudades->getAll();
			return $ciudades;
		}
		public static function get_ciudadesByRegion($id_region){
			require_once 'models/ciudadModel.php';
			$ciudades = new ciudadModel();
			$ciudades->setIdregion($id_region);
			$ciudad = $ciudades->getCityByIdRegion($id_region);
			return $ciudad;
		}
		public static function get_proveedores(){
			require_once 'models/proveedoresModel.php';
			$proveedores = new proveedoresModel();
			$listaProv = $proveedores->getAll();
			return $listaProv;
		}
		public static function getCargos(){
			require_once 'models/trabajadorModel.php';
			$cargo = new trabajadorModel();
			$cargos = $cargo->all_Cargos();
			return $cargos;
		}
		public static function deleteSession($name){
			if(isset($_SESSION[$name])){
				$_SESSION[$name] = null;
				unset($_SESSION[$name]);
				}
			return $name;
		}
		public static function get_Usuario($datos){
			$result = false;
			require_once 'models/usuarioModel.php';
			$user = new usuarioModel();
			$user->setRut($datos['rut']);
			$user->setEmail($datos['email']);
			$usuario = $user->get_One();
			if($usuario){
				$result = true;
			}else{
				$result = false;
			}
			return $result;
		}
		public static function verifyRepeat($pass,$passR){
			$result = false;
			if($pass == $passR && strlen($pass) >=6 ){
				$result = true;
			}
			$_SESSION['message'] = 'Error en la password';
			return $result;
		}
		public static function isAdmin(){
			if(!isset($_SESSION['admin']) || $_SESSION['admin']== null){
				header("Location: ".base_url);
			}else{
				return true;
			}
		}
		public static function get_Familia(){
			require_once 'models/familiaModel.php';
			$familia = new familiaModel();
			$listaFamilia = $familia->getAll();
			return $listaFamilia;
		}
		public static function get_Subfamilia(){
			require_once 'models/subfamiliaModel.php';
			$subFamilia = new subfamiliaModel();
			$listaSubf = $subFamilia->getAll();
			return $listaSubf;
		}
		public static function get_ListaPedido($id){
			require_once 'models/entregacargoModel.php';
			$producto = new entregacargoModel();
			$producto->setId($id);
			$producto = $producto->get_PedidoProductos();
			return $producto;
		}
		public static function consultaCiudadById(){
			require_once 'models/ciudadModel.php';
			$id = $_POST['id_region_search'];
			$ciudades = new ciudadModel();
			$ciudades->setIdregion($id);
			$ciudades = $ciudades->getCityByRegion();
			$lista = '';
			$i=0;
			while ($city = $ciudades->fetch_object()){
				$lista.='<option value="'.$city->id_ciudad.'">'.$city->ciudad.'</option>';	

			}
			print ($lista);
		}
		public static function consultaSubfamiliaById(){
			require_once 'models/subfamiliaModel.php';
			$id = $_POST['id_fam_search'];
			$sbfamilia = new subfamiliaModel();
			$sbfamilia->setId_fam($id);
			$sbfamilia = $sbfamilia->get_sbfamilyById();
			$lista = '';
			while($sf = $sbfamilia->fetch_object()){
				$lista.='<option value="'.$sf->id_subf.'">'.$sf->descripcion.'</option>';
			}
			print $lista;
		}
		public static function consultaProveedor(){
			if($_POST['val_prov_search']){
				require_once 'models/proveedoresModel.php';
				$valor = $_POST['val_prov_search'];
				$proveedor = new proveedoresModel();
				$proveedor->setValor($valor);
				$proveedor = $proveedor->like_Prov();
				$listado = '';
				if($proveedor){
					while($prov = $proveedor->fetch_object()){
						echo '<tr><td>'.$prov->rut.'</td><td>'.$prov->nombre.'</td><td>'.$prov->email.'</td><td>'.$prov->direccion.'</td><td>'.$prov->telefono.'</td><td><a href="'.base_url.'proveedores/editar&id='.$prov->id.'" class="btn btn-xss btn-primary"><i class="bx bxs-pencil"></i></a></td></tr>';
					}die();	
				}
			}
		}
		public static function consultaTrabajador(){
			if($_POST['search_job']){
				require_once 'models/trabajadorModel.php';
				$valor = $_POST['search_job'];
				$trabajador = new trabajadorModel();
				$trabajador->setValor($valor);
				$trabajador = $trabajador->get_Like();
				if($trabajador){
					while($job = $trabajador->fetch_object()){
						echo '<tr><td id="rutid" value="'.$job->rut.'">'.$job->rut.'</td><td>'.$job->nombre.'</td><td>'.$job->apellido.'</td><td><a class="btn btn-xss btn-primary entrega" href="'.base_url.'entregacargo/ver&id='.$job->id_user.'" ><i class="bx bx-play-circle me-2"></i>Seleccione</a></td><tr>';
					}die();
				}
			}
		}
		public static function consultaLikeTrabajador(){
			if(isset($_POST['job_search'])){
				require_once 'models/trabajadorModel.php';
				$valor = $_POST['job_search'];
				$trabajador = new trabajadorModel();
				$trabajador->setValor($valor);
				$trabajador = $trabajador->get_all();
				while($job = $trabajador->fetch_object()){
					echo '<tr><td>'.$job->rut.'</td><td>'.$job->nombre.'</td><td>'.
						$job->apellido.'</td><td>'.$job->direccion.'</td><td>'.$job->ciudad.'</td><td>'.$job->fono.'</td><td>'.
						$job->cargo.'</td><td>'.
						'<a href="'.base_url.'trabajador/editar&id='.$job->id_user.'" class="btn btn-xss btn-primary"><i class="bx bxs-pencil me-2"></i>Editar</a></td><tr>';
				}die();	
			}
		}
		public static function consultaProducto(){
			if(isset($_POST['val_prod_search'])){
				require_once 'models/productoModel.php';
				$valor = $_POST['val_prod_search'];
				$producto = new productoModel();
				$producto->setCod_producto($valor);
				$producto = $producto->like_Producto();
				if($producto){
					while($prod = $producto->fetch_object()){
						echo '<tr><td>'.$prod->cod_producto.'</td><td>'.$prod->nombre.'</td><td>'.$prod->descripcion_P.'</td><td>'.$prod->valor.'</td></tr>';
					}die();
				}
			}
		}
		public static function allProductosTrabajador(){
			require_once 'models/productoModel.php';
			$producto = new productoModel();
			$producto = $producto->getAll();
			return $producto;
		}
		public static function consultaCodProducto(){
			if(isset($_POST['cod_prod_search'])){
				require_once 'models/productoModel.php';
				$cod = $_POST['cod_prod_search'];
				$producto = new productoModel();
				$producto->setCod_producto($cod);
				$prod = $producto->get_One();
				$lista ='<tr><td><input type="text" class="form-control" name="art[]" value="'.$prod->cod_producto.'"></td>'.
				'<td><input type="text" class="form-control" value="'.$prod->nombre.'"></td>'. 
				'<td><input type="num" class="form-control" name="cant[]" ></td>'.
				'<td class="text-center"><button type="button" class="btn btn-xs btn-danger">Eliminar<button>';
			}
			return $lista;
			//return $prod;
		}
		public static function consultaProductoCod(){
			if(isset($_POST['codProd_search'])){
				require_once 'models/productoModel.php';
				$cod = $_POST['codProd_search'];
				$producto = new productoModel();
				$producto->setCod_producto($cod);
				$producto = $producto->get_NombreProd();
				$nombre = $producto->nombre;
				$stock = $producto->stock;
				
			}
			
		
			echo $nombre;
		}
		public static function getStockProductoCod(){
			if(isset($_POST['id_prod_select'])){
				require_once 'models/productoModel.php';
				$cod = $_POST['id_prod_select'];
				$producto = new productoModel();
				$producto->setCod_producto($cod);
				$producto = $producto->get_NombreProd();
				$stock = $producto->stock;
				$lista = '<td><input type="mun" value="'.$stock.'" class="form-control" name="stock" id="stockProd"></td>';
			}
			echo $stock;
		}
		public static function getCodScanProdStock(){
			if(isset($_POST['search_prod_stock'])){
				require_once 'models/productoModel.php';
				$producto = new productoModel();
				$producto->setCod_producto($_POST['search_prod_stock']);
				$producto = $producto->get_NombreProd();
				$nombre = $producto->nombre;
			}
			echo $nombre;
		}
		/*public static function getStockPorFechas(){
			if(isset($_POST['inicio_search']) && isset($_POST['final_search'])){
				require_once 'models/productoModel.php';
				$producto = new productoModel();
				$producto->setFechaIn($_POST['inicio_search']);
				$producto->setFechaOut($_POST['final_search']);
				$productos = $producto->get_stockPorFechas();
				
			}
			while($prod = $productos->fetch_object()){
					echo '<tr><td>'.$prod->producto_cod.'</td><td>'.$prod->nombre.'</td><td>'.$prod->cantidad.'</td><td>'.$prod->fecha.'</td></tr>';
				}
		
		}*/
	


	}



	if(isset($_POST)){
		if(isset($_POST['id_region_search'])){ Utils::consultaCiudadById(); }
		if(isset($_POST['id_fam_search'])){ Utils::consultaSubfamiliaById(); }
		if(isset($_POST['val_prov_search'])){ Utils::consultaProveedor(); }
		if(isset($_POST['val_prod_search'])){ Utils::consultaProducto(); }
		if(isset($_POST['cod_prod_search'])){ Utils::consultaCodProducto(); }
		if(isset($_POST['search_job'])){ Utils::consultaTrabajador(); }
		if(isset($_POST['job_search'])){ Utils::consultaLikeTrabajador();}
		if(isset($_POST['codProd_search'])){ Utils::consultaProductoCod(); }
		if(isset($_POST['id_prod_select'])){ Utils::getStockProductoCod(); }
		if(isset($_POST['search_prod_stock'])){ Utils::getCodScanProdStock(); }
		if(isset($_POST['inicio_search'])){ Utils::getStockPorFechas(); }
	}

