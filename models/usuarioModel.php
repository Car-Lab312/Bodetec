<?php 
	class usuarioModel{
		private $id;
		private $rut;
		private $nombre;
		private $apellido;
		private $direccion;
		private $ciudad;		
		private $email;
		private $telefono;
		private $cargo;
		private $password;
		private $estado;
		private $id_tipo;
		private $is_job;

		private $valor;

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
		public function getRut(){
			return $this->rut; 
		} 
		public function setRut($rut){
			$this->rut = $this->db->real_escape_string($rut); 
		} 
		public function getNombre(){
			return $this->nombre; 
		} 
		public function setNombre($nombre){
			$this->nombre = $this->db->real_escape_string($nombre); 
		} 
		public function getApellido(){
			return $this->apellido; 
		} 
		public function setApellido($apellido){
			$this->apellido = $this->db->real_escape_string($apellido); 
			return $this; 
		}
		public function getDireccion(){ 
			return $this->direccion; 
		} 
		public function setDireccion($direccion){ 
			$this->direccion = $this->db->real_escape_string($direccion);
		}
		public function getCiudad(){ 
			return $this->ciudad; 
		} 
		public function setCiudad($ciudad){ 
			$this->ciudad = $this->db->real_escape_string($ciudad);
		}   
		public function getEmail(){
			return $this->email; 
		} 
		public function setEmail($email){
			$this->email = $this->db->real_escape_string($email); 
		} 
		public function getTelefono(){ 
			return $this->telefono;
		} 
		public function setTelefono($telefono){ 
			$this->telefono = $this->db->real_escape_string($telefono);
		}
		public function getCargo(){ 
			return $this->cargo; 
		} 
		public function setCargo($cargo){ 
			$this->cargo = $this->db->real_escape_string($cargo); 
		}  
		public function getPassword(){
			return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost'=>4]);
		} 
		public function setPassword($password){
			$this->password = $password; 
		} 
		public function getEstado(){
			return $this->estado; 
		} 
		public function setEstado($estado){
			$this->estado = $this->db->real_escape_string($estado); 	
		}
		public function getId_tipo(){
			return $this->id_tipo; 
		} 
		public function setId_tipo($id_tipo){
			$this->id_tipo = $this->db->real_escape_string($id_tipo); 
		}
		public function getIs_job() { 
			return $this->is_job; 
		} 
		public function setIs_job($is_job) { 
			$this->is_job = $this->db->real_escape_string($is_job);
		}
		public function getValor(){
			return $this->valor; 
		} 
		public function setValor($valor){ 
			$this->valor = $this->db->real_escape_string($valor); 
		} 


		/* ----------------------------------- Consultas y otros ----------------------------------------- */
		
		public function get_cargos(){
			$query = $this->db->query("SELECT * FROM tbl_cargo");
			return $query;
		}
		public function get_tipo(){
			$tipoUser = $this->db->query("SELECT * FROM tipo_usuario");
			return $tipoUser;
		} 
		public function login(){
			$result = false;
			$email = $this->getEmail();
			$password = $this->password;
			$sql = "SELECT 
							*,
							tbl_usuario.nombre AS nombreUser,
							tbl_cargo.nombre AS cargo 
					FROM tbl_usuario INNER JOIN tbl_cargo ON tbl_usuario.cargo_id = tbl_cargo.id_cargo WHERE email = '$email' ";
			$login = $this->db->query($sql);
			if($login && $login->num_rows == 1){
				$usuario = $login->fetch_object();
				$verify = password_verify($password, $usuario->password);
				if($verify){
					$result = $usuario;
				}
				if($usuario->estado !=1){
					$result='';
				}
			}
			return $result;
		}
		public function get_One(){
			$query = $this->db->query("SELECT *
										FROM tbl_usuario
										WHERE id_user = '{$this->getId()}' OR rut = '{$this->getRut()}' OR email = '{$this->getEmail()}'");
			
			return $query->fetch_object();
		}
		public function get_usuarios(){
			$result = false;
			$query = $this->db->query("SELECT * FROM tbl_usuario WHERE rut LIKE '%{$this->getValor()}%' 
									OR nombre LIKE '%{$this->getValor()}%' 
									OR apellido LIKE '%{$this->getValor()}%' 
									OR cargo LIKE '%{$this->getValor()}%' 
								    ");
			
			return $query->fetch_object();
		}
		public function get_all(){
			$sql = "SELECT *,tipo_usuario.descripcion AS tipo  FROM tbl_usuario INNER JOIN tipo_usuario ON tbl_usuario.id_tipo = tipo_usuario.id_tipo WHERE tbl_usuario.id_tipo <> 0";
			$query = $this->db->query($sql);
			return $query;
		}
		public function save(){

			$result = false;
			$sql = "INSERT INTO tbl_usuario VALUES (null,'{$this->getRut()}','{$this->getNombre()}','{$this->getApellido()}','{$this->getDireccion()}','{$this->getCiudad()}','{$this->getTelefono()}','{$this->getCargo()}', '{$this->getEmail()}','{$this->getPassword()}','{$this->getEstado()}','{$this->getId_Tipo()}','{$this->getIs_job()}')";
			$save = $this->db->query($sql);
			if($save){
				$result = true;
			}
			return $result;
		}
		public function update(){
			$sql = "UPDATE tbl_usuario SET rut='{$this->getRut()}',nombre='{$this->getNombre()}',apellido='{$this->getApellido()}',direccion='{$this->getDireccion()}',ciudad='{$this->getCiudad()}',fono='{$this->getTelefono()}',cargo_id='{$this->getCargo()}',estado='{$this->getEstado()}',id_tipo='{$this->getId_Tipo()}',is_job='{$this->getIs_job()}' WHERE id_user='{$this->getId()}'";
			$save = $this->db->query($sql);
			$result = false;
			if($save){
				$result = true;
			}
			return $result;
		}
		public function delete(){
			$sql = "DELETE FROM tbl_usuario WHERE id_user='{$this->id}'";
			$del = $this->db->query("DELETE FROM tbl_usuario WHERE id_user='{$this->getId()}'");
			$result = false;
			if($del){
				$result = true;
			}
			return $result;
		}
	}