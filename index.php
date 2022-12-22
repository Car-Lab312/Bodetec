<?php 
	session_start();
	require_once 'autoload.php';
	require_once 'config/db.php';
	require_once 'config/parametros.php';
	//require_once 'lib/pdf/mpdf.php';
	require_once 'helpers/utils.php';
	require_once 'lib/dompdf/autoload.inc.php';
	
?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="img/png" href="<?=base_url?>assets/images/Icono.ico">
		<title>Sistema de gestion de Bodega</title>
	</head>
<?php 
	if(isset($_SESSION['admin'])){
		require_once 'views/layout/link.php';
		echo '<main class="full-box main-container mn">';
	}else{
		?>	
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link href="<?=base_url?>assets/css/signin.css" rel="stylesheet">
<?php
	}
?>		<!-- Nav lateral -->
<?php 
		if(isset($_SESSION['admin'])){
			include "views/layout/sidebar.php";
		}
?>
		<!-- Page content -->
<?php if(isset($_SESSION['admin'])):?>
		<section class="full-box page-content">
		<?php include "views/layout/menu-head.php";?>
<?php endif;?>		
<?php 
	function show_error(){
		$error = new errorController();
		$error->index();
	}
	if(isset($_GET['controller'])){
		$nombre_controlador =$_GET['controller'].'Controller';
	}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		$nombre_controlador = controller_default;
	}else{
		show_error();
		exit();
	}
			if (class_exists($nombre_controlador)) {	
				$controlador = new $nombre_controlador();
				if (isset($_GET['action']) && method_exists($controlador,$_GET['action'])) {
					$action = $_GET['action'];
					$controlador->$action();
				}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
					$default = action_default;
					$controlador->index();
				}else{
					show_error();
				}
			}else{
				show_error();
			}
			require_once 'views/layout/script.php';
		?>
</section>
</main>
 <?php require_once 'views/layout/footer.php'; ?>
