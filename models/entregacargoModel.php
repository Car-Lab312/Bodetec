<?php 

	class entregacargoModel{
		private $id;
		private $id_usuario;
		private $id_ccosto;
		private $fecha;
		private $cantidad;
		private $producto_cod;
		private $db;

		public function __construct(){
			$this->db = DataBase::connect();
		}
		public function getId(){ 
			return $this->id; 
		} 
		public function setId($id){ 
			$this->id = $this->db->real_escape_string($id);
		}
		public function getId_usuario(){ 
			return $this->id_usuario; 
		} 
		public function setId_usuario($id_usuario){ 
			$this->id_usuario = $this->db->real_escape_string($id_usuario);  
		} 
		public function getId_ccosto(){ 
			return $this->id_ccosto; 
		} 
		public function setId_ccosto($id_ccosto){ 
			$this->id_ccosto = $this->db->real_escape_string($id_ccosto); 
		} 
		public function getFecha(){
			return $this->fecha; 
		} 
		public function setFecha($fecha){ 
			$this->fecha = $this->db->real_escape_string($fecha); 
		}
		public function getCantidad(){ 
			return $this->cantidad; 
		} 
		public function setCantidad($cantidad){ 
			$this->cantidad = $this->db->real_escape_string($cantidad); 
		}
		public function getProducto_cod(){ 
				return $this->producto_cod; 
		} 
		public function setProducto_cod($producto_cod){ 
			$this->producto_cod = $this->db->real_escape_string($producto_cod);
		} 


		public function save(){
			$sql = "INSERT INTO tbl_pedimento VALUES (null,'{$this->getId_usuario()}',1,NOW())";
			$save = $this->db->query($sql);
			if($save){
				$ultimo = $this->db->query("SELECT MAX(id_pedimento) AS id FROM tbl_pedimento");
			}
			return $ultimo->fetch_object();
		}
		public function save_Articulos_pedidos(){
			$sql = "INSERT INTO tbl_articulo_pedidos VALUES ('{$this->getId()}','{$this->getProducto_cod()}','{$this->getCantidad()}')";
			$save = $this->db->query($sql);
			$result = false;
			if($save){
				$result = true;
			}
			return $result;
		}
		public function ultimoIngreso(){
			$ultimo = $this->db->query("SELECT MAX(id_pedimento) AS id FROM tbl_articulo_pedidos");
			return $ultimo->fetch_object();
		}
		public function listado(){
			$sql= "SELECT * FROM tbl_articulo_pedidos WHERE id_pedimento = '{$this->getId()}'";
		}
		public function get_All(){
			$sql = "SELECT
							tbl_usuario.rut,
							tbl_usuario.nombre,
							tbl_usuario.apellido,
							tbl_pedimento.id_pedimento,
							tbl_cargo.nombre AS cargo
					FROM    tbl_pedimento
					INNER JOIN tbl_usuario ON tbl_usuario.id_user = tbl_pedimento.id_usuario
					INNER JOIN tbl_cargo ON tbl_cargo.id_cargo = tbl_usuario.cargo_id";
			$pedidos = $this->db->query($sql);
			return $pedidos;
		}
		public function get_One(){

			$sql = "SELECT
							tbl_usuario.rut,
							tbl_usuario.nombre,
							tbl_usuario.apellido,
							tbl_producto.nombre AS producto,
							tbl_articulo_pedidos.cantidad,
							tbl_articulo_pedidos.id_pedimento,
							tbl_cargo.nombre AS cargo
					FROM
							tbl_pedimento
					INNER JOIN tbl_articulo_pedidos ON tbl_pedimento.id_pedimento = tbl_articulo_pedidos.id_pedimento
					INNER JOIN tbl_producto ON tbl_producto.cod_producto = tbl_articulo_pedidos.producto_cod
					INNER JOIN tbl_usuario ON tbl_pedimento.id_usuario = tbl_usuario.id_user
					INNER JOIN tbl_cargo ON tbl_cargo.id_cargo = tbl_usuario.cargo_id
					WHERE   tbl_articulo_pedidos.id_pedimento = '{$this->getId()}'";
			$result = $this->db->query($sql);

			return $result;
		}
		public function get_PedidoProductos(){
			$sql = "SELECT tbl_producto.nombre,tbl_articulo_pedidos.cantidad
					FROM   tbl_producto
					INNER JOIN tbl_articulo_pedidos ON tbl_articulo_pedidos.producto_cod = tbl_producto.cod_producto
					WHERE tbl_articulo_pedidos.id_pedimento = '{$this->getId()}'";
			$result = $this->db->query($sql);
			return $result;
		}
	}