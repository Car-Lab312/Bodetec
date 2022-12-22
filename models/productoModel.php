<?php 

	class productoModel{
		private $id;
		private $nombre;
		private $cod_producto;
		private $descripcion;
		private $valor;
		private $id_subfamilia;
		private $id_proveedor;
		private $stock;
		private $fechaIn;
		private $fechaOut;
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
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
		 	$this->nombre = $this->db->real_escape_string($nombre);
		} 
		public function getCod_producto(){
			return $this->cod_producto;
		}
		public function setCod_producto($cod_producto){
		 	$this->cod_producto = $this->db->real_escape_string($cod_producto);
		} 
		public function getDescripcion(){
			return $this->descripcion;
		}
		public function setDescripcion($descripcion){
		 	$this->descripcion = $this->db->real_escape_string($descripcion);
		} 
		public function getValor(){
			return $this->valor;
		}
		public function setValor($valor){
		 	$this->valor = $this->db->real_escape_string($valor);
		} 	
		public function getId_subfamilia(){
			return $this->id_subfamilia;
		}
		public function setId_subfamilia($id_subfamilia){
		 	$this->id_subfamilia = $this->db->real_escape_string($id_subfamilia);
		}
		public function getId_proveedor(){ 
			return $this->id_proveedor;
		} 
		public function setId_proveedor($id_proveedor){ 
			$this->id_proveedor = $this->db->real_escape_string($id_proveedor);
		}
		public function getStock(){ 
			return $this->stock; 
		} 
		public function setStock($stock){ 
			$this->stock = $this->db->real_escape_string($stock); 
		} 
		public function getFechaIn(){ 
			return $this->fechaIn; 
		} 
		public function setFechaIn($fechaIn){ 
			$this->fechaIn = $this->db->real_escape_string($fechaIn);  
		} 
		public function getFechaOut(){ 
			return $this->fechaOut; 
		} 
		public function setFechaOut($fechaOut){ 
			$this->fechaOut = $this->db->real_escape_string($fechaOut); 
		} 
		/* -------------------- FUNCIONES ------------------ */

		public function getAll(){
			$sql = "SELECT id_producto,cod_producto,nombre,valor,tbl_familia.descripcion 
					  FROM tbl_producto
				INNER JOIN tbl_familia ON tbl_familia.id_fam = tbl_producto.id_subfamilia";
			$query = $this->db->query($sql);
			return $query;
		}
		public function get_One(){
			$query = $this->db->query("SELECT * FROM tbl_producto WHERE id_producto = '{$this->getId()}' OR cod_producto = '{$this->getCod_producto()}' ");
			return $query->fetch_object();
		}
		public function get_NombreProd(){
			$query = $this->db->query("SELECT * FROM tbl_producto WHERE cod_producto = '{$this->getCod_producto()}'");
			return $query->fetch_object();
		}
		public function save(){
			$result = false;
			$sql = "INSERT INTO tbl_producto VALUES (null,'{$this->getNombre()}','{$this->getCod_producto()}','{$this->getDescripcion()}','{$this->getValor()}','{$this->getId_subfamilia()}','{$this->getId_proveedor()}','{$this->getStock()}')";
			$save = $this->db->query($sql);
			if($save){
				$result = true;
			}
			return $result;
		}
		public function update(){
			$sql = "UPDATE tbl_producto SET nombre = '{$this->getNombre()}',cod_producto = '{$this->getCod_producto()}', 
											descripcion = '{$this->getDescripcion()}',
											valor = '{$this->getValor()}', id_subfamilia = '{$this->getId_subfamilia()}', 
											id_proveedor = '{$this->getId_proveedor()}', stock = '{$this->getStock()}'
										WHERE id_producto = '{$this->getId()}'";
			$save = $this->db->query($sql);
			$result = false;
			if($save){
				$result = true;
			}
			return $result;
		}
		public function descuentaStock(){
			$sql = "UPDATE tbl_producto SET stock = (stock - '{$this->getStock()}') WHERE cod_producto = '{$this->getCod_producto()}'";
			$update = $this->db->query($sql);
			$result = false;
			if($update){
				$result = true;
			}
			return $result;
		}
		public function like_Producto(){
			$sql = $this->db->query("SELECT * FROM tbl_producto WHERE cod_producto LIKE '%{$this->getCod_producto()}%'");
			return $sql;
		} 
		public function delete(){
			$result = false;
			$sql = "DELETE FROM tbl_producto WHERE id_producto = '{$this->getId()}'";
			$del = $this->db->query("DELETE FROM tbl_producto WHERE id_producto = '{$this->getId()}'");
			if($del){
				$result = true;
			}
			return $result;
		}
		public function updateStock(){
			$updateStock = $this->db->query("UPDATE tbl_producto SET stock = (stock+'{$this->getStock()}'), valor = ((valor + '{$this->getValor()}') /2)  WHERE cod_producto = '{$this->getCod_producto()}'");
			$result = false;
			if($updateStock){
				$result = true;
			}
			return $result;
		}
		public function get_Stock(){
			$query = $this->db->query("SELECT id_producto,nombre,cod_producto,stock,valor,(stock*valor) AS total,tbl_familia.descripcion AS familia FROM tbl_producto INNER JOIN tbl_familia on tbl_familia.id_fam = tbl_producto.id_subfamilia");
			return $query;
		}
		public function get_stockPorFechas(){
			$sql="SELECT    tbl_articulo_pedidos.id_pedimento,
							fecha,
							tbl_usuario.rut, 
    						tbl_usuario.nombre,
    						tbl_usuario.apellido,
    						tbl_articulo_pedidos.producto_cod,
    						tbl_producto.nombre,
    						tbl_producto.valor,
    						tbl_producto.stock,
    					SUM(tbl_articulo_pedidos.cantidad) AS cantidad
					FROM    tbl_pedimento AS TP
					INNER JOIN tbl_usuario ON TP.id_usuario = tbl_usuario.id_user
					INNER JOIN tbl_articulo_pedidos ON TP.id_pedimento = tbl_articulo_pedidos.id_pedimento
					INNER JOIN tbl_producto ON tbl_articulo_pedidos.producto_cod = tbl_producto.cod_producto
					WHERE fecha BETWEEN '{$this->getFechaIn()}' AND '{$this->getFechaOut()}' GROUP BY tbl_producto.cod_producto";

			$consulta = $this->db->query($sql);
			return $consulta;
		}
	}