<?php 
			$cargos = Utils::get_cargos();      
      $regiones = Utils::get_regiones();
      if(isset($trabajador) && is_object($trabajador)){
				$titulo = 'EDITAR '.$trabajador->nombre;
				$url_action = base_url."trabajador/save&id=".$trabajador->id_user;
				$ciudades = Utils::get_ciudades();
		  }else{ 
				$url_action = base_url."trabajador/save";
				$ciudades = Utils::get_ciudades();
			}
?>
 <link href="<?=base_url?>assets/css/style.css" rel="stylesheet">
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Agregar trabajador</p>
</div>
<section class="form-register pantalla-princ" id="registroUser">
		
		<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
 				<div class="container-fluid d-flex justify-content-center alert alert-success" role="alert">Registro completado con exito</div>
		<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
				<div class="container-fluid d-flex justify-content-center alert alert-danger" role="alert"><?=$_SESSION['message']?></div>
		<?php endif;?>
		<?php  Utils::deleteSession('register'); ?>
		<form action="<?=$url_action;?>" method="POST" class="container-fluid row pt-5">
						<p></p>
		    <div class="col-lg-4  col-md-6 col-xs-12">
		        <div class="form-floating mb-3">
					<input type="text" class="form-control" name="rut_trabajador" id="rut_registro" placeholder="12222333-1" aria-describedby="validationServer03Feedback" maxlength="10" value="<?=isset($trabajador) && is_object($trabajador) ? $trabajador->rut : ''?>" required>
		            <div id="validationServer03Feedback" class="invalid-feedback">
                            * Ingreso obligatorio
                    </div>
                        <label for="inputPassword6">Rut</label>
                </div>      
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nombre_trabajador" id="validationnombre" placeholder="N" aria-describedby="validationServer03Feedback" value="<?=isset($trabajador) && is_object($trabajador) ? $trabajador->nombre : ''?>" required>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            * Ingreso obligatorio
                        </div>
						<label for="nombre">Nombre</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
                    <input type="text" class="form-control" name="apellido_trabajador" id="validationapllido" placeholder="A" aria-describedby="validationServer03Feedback" value="<?=isset($trabajador) && is_object($trabajador) ? $trabajador->apellido : ''?>" required>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            * Ingreso obligatorio
                        </div>
					<label for="apellido">Apellido</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email_trabajador" id="validatioemail" placeholder="E" aria-describedby="validationServer03Feedback" value="<?=isset($trabajador) && is_object($trabajador) ? $trabajador->email : ''?>" required>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            * Ingreso obligatorio
                        </div>
                    <label for="apellido">Email</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
          <input type="tel" class="form-control" name="telefono_trabajador" id="validatiotelefono" value="<?=isset($trabajador) && is_object($trabajador) ? $trabajador->fono : '+569'?>" placeholder="T" aria-describedby="validationServer03Feedback" maxlength="12" required>
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
          <label for="apellido">Telefono</label>
				</div>
			</div>

			</div>
		<hr class="mt-5 mb-5">
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
					<input name="direccion_trabajador" class="form-control mb3" id="direccion_registro" value="<?=isset($trabajador) && is_object($trabajador) ? $trabajador->direccion : ''?>">
					<label for="direccion_registro">Direccion</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
					<select id="regionSelect" name="region_trabajador" class="form-control mb3">
						<option>Seleccione</option>
						<?php while($region = $regiones->fetch_object()): ?>
							<option value="<?=$region->id_region?>" <?=isset($trabajador) && is_object($trabajador) && $region->id_region == $trabajador->region_id ? 'selected' : '' ?>><?=$region->region?></option>
						<?php endwhile; ?>
					</select>
					<label for="ciudad">Region</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
					<select id="ciudadSelect" name="ciudad_trabajador" class="form-control mb3">
						<option>Seleccione</option>
						<?php while($ciudad = $ciudades->fetch_object()): ?>
							<option value="<?=$ciudad->id_ciudad?>" <?=isset($trabajador) && is_object($trabajador) && $ciudad->id_ciudad == $trabajador->id_ciudad ? 'selected' : '' ?>><?=$ciudad->ciudad?></option>
						<?php endwhile; ?>
					</select>
					<label for="ciudad">Ciudad</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
					<select name="cargo_trabajador" id="cargo_in" class="form-control">
						<?php while ($cargo = $cargos->fetch_object()):?>
							<option value="<?=$cargo->id_cargo?>"<?=isset($trabajador) && is_object($trabajador) && $cargo->id_cargo == $trabajador->cargo_id ? 'selected' : '' ?>><?=$cargo->nombre;?></option>
						<?php endwhile; ?>
					</select>
					<label for="cargo_in">Cargo</label>	
				</div>
			</div>

	

			<p></p>
			<div class="col-12 mt-3" align="right">
				<button class="w-60 btn btn-lg btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#mi-question" name="add" id="add"><i class='bx bx-edit'></i>&nbsp;&nbsp;Ingresar</button>
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


