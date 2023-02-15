<?php $ciudades = Utils::get_ciudades(); 
      $cargos = Utils::get_cargos(); 
      $tipo = Utils::get_TiposUser(); ?>
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Mi perfil</p>
</div>
<section class="pantalla-princ form-register-user-perfil">
	<form action="" class="Registro-usu-perfil container-fluid row" style="width: 1200px;">
  		<div class="col-md-6 col-xs-12 mt-5">
			<!-- solo mostrar informacion y no modificar -->
  			<label for="rut_log" class="form-label">Rut</label>
  			<input type="rut_log" class="form-control" id="rut_log" value="<?=$_SESSION['identity']->rut?>">
		</div>
		<div class="col-md-6 col-xs-12 mt-5">
  			<label for="exampleFormControlInput1" class="form-label">Email address</label>
  			<input type="text" class="form-control" id="exampleFormControlInput1" value="<?=$_SESSION['identity']->email?>">
        </div>
		<div class="col-md-6 col-xs-12">
  			<label for="direccion" class="form-label">Direccion</label>
  			<input type="text" name="direccion_log" class="form-control" value="<?=$_SESSION['identity']->direccion?>" id="direccion">
		</div>
		<div class="col-md-6 col-xs-12">
  			<label for="ciudad_log" class="form-label">Ciudad</label>
  			<select name="ciudad_log" id="ciudad_log" class="form-control">
  				<?php while($ciudad = $ciudades->fetch_object()): ?>
						<option value="<?=$ciudad->id_ciudad?>"<?=$_SESSION['identity'] && $_SESSION['identity'] && $ciudad->id_ciudad == $_SESSION['identity']->ciudad ? 'selected' : '' ?>><?=$ciudad->ciudad?></option>
					<?php endwhile; ?>
  			</select>
			</div>
			<div class="col-md-6 col-xs-12">
  			<label for="fono" class="form-label">Fono</label>
  			<input type="text" class="form-control" id="fono" name="fono_log" value="<?=$_SESSION['identity']->fono?>">
			</div>
			<div class="col-md-6 col-xs-12">
				<!-- solo mostrar informacion y no modificar -->
				<label for="cargo" class="form-label">Cargo</label>
				<input type="text" class="form-control" id="cargo" name="fono_log" value="Soporte informático" required disabled>
			</div>
			<div class="col-md-6 col-xs-12">
				<!-- solo mostrar informacion y no modificar -->
				<label for="estado" class="form-label">Estado</label>
				<input type="text" class="form-control" id="estado" name="fono_log" value="Deshabilitado" required disabled>
			</div>
			<div class="col-md-6 col-xs-12">
				<!-- solo mostrar informacion y no modificar -->
				<label for="tipo" class="form-label">Tipo usuario</label>
				<input type="text" class="form-control" id="tip_usuario" name="fono_log" value="none" required disabled>
			</div>
			<div class="col-12 mt-3" align="right">
			<button class="w-60 btn btn-lg btn-primary" type="submit" name="actualizar" id="actualizar"><i class='bx bx-revision'></i>Actualizar perfil</button>
			</div>
		</form>
	<form action="" class=" container-fluid row card-body" style="width: 550px;">
	<div class="row g-2 align-items-center">
        <div class="col-auto">
	         <img src="../../../fotos-usuarios/_hsb6.jpg" class="rounded-circle" width = "150" height = "150" style="background-color: brown;">
        </div>
        <div class="col-auto">
          <label for="nombres" class="col-form-label"><b><h3><?=$_SESSION['identity']->nombre?></h3></b></label>
          <label for="apellidos" class="col-form-label"><b><h3><?=$_SESSION['identity']->apellido?></h3></b></label>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 mb-3" style="width: 350px;">
        <label for="formFile" class="form-label">Foto de perfil</label>
        <input class="form-control" type="file" id="fotoperfil" name="imagen">
      </div>
      <div class="col-12 mt-3" align="left">
          <button class="w-60 btn btn-lg btn-primary" type="submit" name="subir" id="subir"><i class='bx bxs-cloud-upload'></i>Subir foto</button>
      </div>
			<p></p>
			<!-- <?php
         //Resivimos los datos de la imagen
        $nombre_imagen=$_FILES['imagen']['name'];
        $tipo_imagen=$_FILES['imagen']['type'];
        $tamaño=$_FILES['imagen']['size'];

        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/bodetec/assets/foto-usuarios/';
        move_uploaded_file($_FILES['imagen'],['tmp_imagen'],$carpeta_destino.$nombre_imagen);
      ?> -->
			</form>
</section>