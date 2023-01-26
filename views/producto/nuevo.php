<?php $familia = Utils::get_Familia(); 
			$p = Utils::get_proveedores();
			?>
		<?php if(isset($producto) && is_object($producto)): ?>
			<?php $titulo = 'Editar: '.$producto->nombre;
			      $url_action = base_url."producto/save&id=".$producto->id_producto;
			      $buttonAction = 'Actualizar';?>
		<?php else: ?>
			<?php $titulo='AGREGAR PRODUCTO';
			      $url_action = base_url."producto/save";
			      $buttonAction = 'Guardar'; ?>
		<?php endif; ?>
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Agregar Productos</p>
</div>
	<section class="pantalla-princ form-register">

		<?php 
			if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
 				<div class="container-fluid d-flex justify-content-center alert alert-success" role="alert">Registro completado con exito</div>
		<?php  
			elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
				<div class="container-fluid d-flex justify-content-center alert alert-danger" role="alert"><?=$_SESSION['message']?></div>
		<?php endif; ?>
		<?php  Utils::deleteSession('register'); ?>

		<form action="<?=$url_action?>" method="POST" class="container-fluid row">
			<div class="container-fluid">
				<div class="col-lg-4 col-md-6 col-xs-12">
					<div class="input-group input-group-lg" style="width: 350px;">
					  <span class="input-group-text" id="inputGroup-sizing-lg"><i class='bx bx-barcode-reader'></i></span>
            <input type="text" class="form-control" name="codigo_in" id="validationcodigo" placeholder="Codigo producto" aria-describedby="validationServer03Feedback" required value="<?=isset($producto) && is_object($producto) ? $producto->cod_producto : ''?>"> 
            <div id="validationServer03Feedback" class="invalid-feedback">
              * Ingreso obligatorio
            </div>
					</div>
				</div>
			</div>
			<p></p>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
          <input type="text" class="form-control" name="nombre_in" id="validationnombre" placeholder="N" value="<?=isset($producto) && is_object($producto) ? $producto->nombre : ''?>" aria-describedby="validationServer03Feedback" required>
          <div id="validationServer03Feedback" class="invalid-feedback" >
            * Ingreso obligatorio
          </div>
					<label for="nombre">Nombre producto</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12" style="width: 250px;">
				<div class="form-floating mb-3">
            <input type="number" class="form-control" name="valor_in" id="validationapllido" value="<?=isset($producto) && is_object($producto) ? $producto->valor : ''?>" placeholder="A" aria-describedby="validationServer03Feedback" required>
            <div id="validationServer03Feedback" class="invalid-feedback">
              * Ingreso obligatorio
            </div>
					<label for="apellido">Valor</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
          <input type="text" class="form-control" name="descripcion_in" id="validationemail" value="<?=isset($producto) && is_object($producto) ? $producto->descripcion : ''?>" placeholder="E" aria-describedby="validationServer03Feedback" required>
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
					<label for="email">Descripcion</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
					<select name="fam_in" class="form-control mb3" id="family_in" placeholder="SF">
						<option value="" selected>Seleccione</option>
						<?php while ($sfamilia = $familia->fetch_object()):?>
							<option value="<?=$sfamilia->id_fam;?>" <?=isset($producto) && is_object($producto) && $producto->id_subfamilia == $sfamilia->id_fam ? 'selected' : '' ?>><?=$prov->nombre;?><?=$sfamilia->descripcion;?></option>
						<?php endwhile; ?>
					</select>
					<label for="subFam_in">Familia</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
					<select name="subfam_in" class="form-control mb3" id="subFam_in" placeholder="SF">
						
					</select>
					<label for="subFam_in">Subfamilia</label>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="form-floating mb-3">
					<select name="prov_in" class="form-control mb3" id="prov_in" placeholder="SF">
						<option value="" >Seleccione</option>
						<?php while ($prov = $p->fetch_object()):?>
							<option value="<?=$prov->id;?>" <?=isset($producto) && is_object($producto) && $producto->id_proveedor == $prov->id ? 'selected' : '' ?>><?=$prov->nombre;?></option>
						<?php endwhile; ?>
					</select>
					<label for="prov_in">Proveedor</label>
				</div>
			</div>
			<p></p>
			<div class="col-12 mt-3">
				<!-- <button class="w-60 btn btn-lg btn-primary" type="submit" name="consultar" id="consultar">Consultar</button> -->
				<button class="w-60 btn btn-lg btn-primary" type="submit" name="add" id="add"><i class='bx bx-edit'></i>&nbsp;&nbsp;<?=$buttonAction?></button>
			</div>
			<p></p>
			<hr>
			</form>
			<?php if(!isset($producto)):?>
      <?php endif; ?>	
		</form>
	</section>