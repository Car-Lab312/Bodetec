<?php $cargos = Utils::get_cargos(); 
			$tipo = Utils::get_TiposUser();
			$regiones = Utils::get_regiones();
			// $regiones = Utils::get_regiones();
			if(!Utils::isAdmin() || Utils::isAdmin()==null){
				header("Location: ".base_url);
			}
			?>
 <link href="<?=base_url?>assets/css/style.css" rel="stylesheet">
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Nuevo Usuario</p>
</div>
<section class="pantalla-princ form-register" id="registroUser">
		<div class="container-fluid d-flex justify-content-center">
		<?php if(isset($user) && is_object($user)): ?>
				<h1 class="text-center mt-4">Editar usuario : <?=$user->nombre;?></h1>
				<?php $url_action = base_url."usuario/save&id=".$user->id_user;?>
		<?php else: ?>
				<?php $url_action = base_url."usuario/save" ?>
		<?php endif; ?>
		</div>
		<?php 
			if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
 				<div class="container-fluid d-flex justify-content-center alert alert-success" role="alert">Registro completado con exito</div>
		<?php  
			elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
				<?php if(isset($_SESSION['mesajeError']) && $_SESSION['mesajeError'] == 'existe'): ?>
					<div class="container-fluid d-flex justify-content-center alert alert-danger" role="alert">El usuario ya existe</div>
				<?php else: ?>
				<div class="container-fluid d-flex justify-content-center alert alert-danger" role="alert"><?=$_SESSION['message']?></div>
			<?php endif; ?>
		<?php endif; ?>
		<?php  Utils::deleteSession('register'); ?>
		<form action="<?=$url_action;?>" method="POST" class="container-fluid row pt-5">
	<div class="col-lg-4  col-md-6 col-xs-12">
        <div class="form-floating mb-3">
        	<input type="text" class="form-control" name="rut_registro" id="rut_registro" placeholder="12222333-1" aria-describedby="validationServer03Feedback" maxlength="10" value="<?=isset($user) && is_object($user) ? $user->rut : ''?>" required>
          <div id="validationServer03Feedback" class="invalid-feedback">
              * Ingreso obligatorio
          </div>
          <label for="inputPassword6">Rut</label>
        </div>      
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
            <input type="text" class="form-control" name="nombre_registro" id="validationnombre" placeholder="N" aria-describedby="validationServer03Feedback" value="<?=isset($user) && is_object($user) ? $user->nombre : ''?>" required>
            <div id="validationServer03Feedback" class="invalid-feedback">
              * Ingreso obligatorio
            </div>
						<label for="nombre">Nombre</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
          <input type="text" class="form-control" name="apellido_registro" id="validationapllido" placeholder="A" aria-describedby="validationServer03Feedback" value="<?=isset($user) && is_object($user) ? $user->apellido : ''?>" required>
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
					<label for="apellido">Apellido</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
          <input type="email" class="form-control" name="email_registro" id="validatioemail" placeholder="E" aria-describedby="validationServer03Feedback" value="<?=isset($user) && is_object($user) ? $user->email : ''?>" required>
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
          <label for="apellido">Email</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
          <input type="tel" class="form-control" name="telefono_registro" id="validatiotelefono" value="<?=isset($user) && is_object($user) ? $user->fono : '+569'?>" placeholder="T" aria-describedby="validationServer03Feedback" maxlength="12" required>
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
          <label for="apellido">Telefono</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3" >
          <input type="password" class="form-control" name="password_registro" id="validatiocontraseña" placeholder="C" aria-describedby="validationServer03Feedback" <?=isset($user) && is_object($user)  ? 'readonly' : 'required' ?> required>
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
          <label for="apellido">Contraseña</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
          <input type="password" class="form-control" name="passwordrepite_registro" id="validatiocontraseñarepite" placeholder="CR" aria-describedby="validationServer03Feedback" <?=isset($user) && is_object($user)  ? 'readonly' : 'required' ?>>
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
          <label for="apellido">Confirme contraseña</label>
				</div>
			</div>
		<hr class="mt-5 mb-5">
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
					<input name="direccion_registro" class="form-control mb3" id="direccion_registro" value="<?=isset($user) && is_object($user) ? $user->direccion : ''?>">
					<label for="direccion_registro">Direccion</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
					<select id="regionSelect" name="region_registro" class="form-control mb3">
						<option>Seleccione</option>
						<?php while($region = $regiones->fetch_object()): ?>
							<option value="<?=$region->id_region?>"<?=isset($user) && is_object($user) && $region->id_region == $user->ciudad ? 'selected' : '' ?>><?=$region->region?></option>
						<?php endwhile; ?>
					</select>
					<label for="ciudad">Region</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
					<select id="ciudadSelect" name="ciudad_registro" class="form-control mb3">

					</select>
					<label for="ciudad">Ciudad</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
					<select name="cargo_registro" id="cargo_in" class="form-control">
						<option>Seleccione</option>
						<?php while ($cargo = $cargos->fetch_object()):?>
							<option value="<?=$cargo->id_cargo?>"<?=isset($user) && is_object($user) && $ciudad->id_ciudad == $user->cargo_id ? 'selected' : '' ?>><?=$cargo->nombre;?></option>
						<?php endwhile; ?>
					</select>
					<label for="cargo_in">Cargo</label>	
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
					<select name="estado_registro" id="estado_in" class="form-control">
						<option>Seleccione</option>
							<option value="0" <?=isset($user) && is_object($user) && $user->estado == 0  ? 'selected' : '' ?>>Deshabilitado</option>
							<option value="1" <?=isset($user) && is_object($user) && $user->estado == 1  ? 'selected' : '' ?>>Habilitado</option>
					</select>
					<label for="estado_in">Estado</label>	
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
					<select name="tipo_registro" id="tipo_in" class="form-control">
						<option>Seleccione</option>
						<?php while ($tipos = $tipo->fetch_object()):?>
							<option value="<?=$tipos->id_tipo?>"<?=isset($user) && is_object($user) && $tipos->id_tipo == $user->id_tipo ? 'selected' : '' ?>><?=$tipos->descripcion;?></option>
						<?php endwhile; ?>
					</select>
					<label for="tipo_in">Tipo usuario </label>	
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
					<select name="trabajador_registro" id="trabajador_in" class="form-control">
						<option>Seleccione</option>
						<option value="1" <?=isset($user) && is_object($user) && $user->is_job == 1  ? 'selected' : '' ?>>Trabajador</option>
						<option value="0" <?=isset($user) && is_object($user) && $user->is_job == 0  ? 'selected' : '' ?>>Externo</option>
					</select>
					<label for="trabajador_in">Trabajador</label>	
				</div>
			</div>
			<p></p>
			<div class="col-12 mt-3" align="right">
				<button class="w-60 btn btn-lg btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#mi-question" name="add" id="add"><i class='bx bx-save me-2'></i>Ingresar</button>
			</div>
			<!-- Modal consulta-->
				<div class="modal fade" id="mi-question" tabindex="-1" aria-hidden="true" aria-labelledby="mi-question">
						<!-- Caja de dialogo -->
						<div class="modal-dialog">
						<!-- Contenido -->	
							<div class="modal-content">
								<div class="modal-header bg-warning">
									<h5 class="modal-title">Confirmacion</h5>
									<button class="btn-close" data-bs-dismiss="modal" aria-label="cerrar"></button>
								</div>
								<div class="modal-body">
									<h4 class="pt-3 pb-3">La informacion se Guardará en la base de datos</h4>
								</div>
								<div class="modal-footer bg-warning">
									<button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
									<input type="submit" class="btn btn-primary" value="Aceptar">
									
								</div>
							</div>
						</div>
				</div>
			<!-- Fin modal consulta -->
		</form>
</section>

