 <?php /*$regiones = Utils::getRegiones();*/

	  $rol = Utils::getTiposUser();?>

<div id="registroUser" class="container-fluid">
	<div class="container-fluid d-flex justify-content-center">
		<h1 class="text-center mt-4">Registro de usuario</h1>
	</div>
	<hr>

	<?php 
		if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
 			<strong class="alert_green">Registro completado con exito</strong>
	<?php   elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
			<strong class="alert_red">Registro fallido, ingresa los datos correctamente</strong>
	<?php 	endif; ?>
	<?php  Utils::deleteSession('register'); ?>
		<form action="<?=base_url?>usuario/save" method="POST" class="row">
			<div class="search">
				<div class="col-md-6 col-xs-12 row">
					<div class="col-auto">
					<!-- <label for="rut" class="visually-hidden">Rut</label> -->
						<input type="text" class="form-control" id="rut" placeholder="12.232.211-5" required>
					</div>
					<div class="col-auto">
						<button class="btn btn-warning mb-3"><i class='bx bx-search-alt-2'></i> Buscar</button>
					</div>
	    		</div>
	    	</div>
	    
		<div class="col-12">
			<!-- <button class="w-60 btn btn-lg btn-primary" type="submit" name="consultar" id="consultar">Consultar</button> -->
			<button class="w-60 btn btn-lg btn-primary" type="submit" name="actualizar" id="actualizar"><i class='bx bx-edit'></i>&nbsp;&nbsp;Actualizar</button>			
		</div>
</form>
	

</div>