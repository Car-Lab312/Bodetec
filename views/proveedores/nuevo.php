<?php $ciudades = Utils::get_ciudades(); 
      $regiones = Utils::get_regiones();?>
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Nuevos Proveedores</p>
</div>
    <div class="container-fluid d-flex justify-content-center">
    <?php if(isset($proveedor) && is_object($proveedor)): ?>
        <?php $titulo= " Editar Proveedor : ".$proveedor->nombre; 
              $url_action = base_url."proveedores/update&id=".$proveedor->id;?>
    <?php else: ?>
        <?php $url_action = base_url."proveedores/save";
              $titulo = " Ingreso de Proveedor"; ?>
    <?php endif; ?>
    </div>
    <?php 
      if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
        <div class="container-fluid d-flex justify-content-center alert alert-success" role="alert">Registro completado con exito</div>
    <?php  
      elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
        <div class="container-fluid d-flex justify-content-center alert alert-danger" role="alert">Registro fallido, ingresa los datos correctamente</div>
    <?php endif; ?>
    <?php  Utils::deleteSession('register'); ?>
  <section class="pantalla-princ form-register" id="registro_proveedores">
    <!-- <div class="col-12 d-flex justify-content-center"><h1><?=$titulo?> </h1></div> -->
    <div class="container-fluid d-flex justify-content-center">

      <form method="POST" action="<?=$url_action?>" class="container-fluid row pt-5">
      <div class="col-lg-4  col-md-6 col-xs-12">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="rut_prov_registro" id="rut_registro" placeholder="12222333-1" aria-describedby="validationServer03Feedback" maxlength="10" value="<?=isset($proveedor) && is_object($proveedor) ? $proveedor->rut : ''?>" required>
          <div id="validationServer03Feedback" class="invalid-feedback">
              * Ingreso obligatorio
          </div>
          <label for="inputPassword6">Rut</label>
        </div>      
      </div>
      <div class="col-lg-4 col-md-6 col-xs-12">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nombre_prov_registro" id="validationnombre" placeholder="N" aria-describedby="validationServer03Feedback" value="<?=isset($proveedor) && is_object($proveedor) ? $proveedor->nombre : ''?>" required>
            <div id="validationServer03Feedback" class="invalid-feedback">
              * Ingreso obligatorio
            </div>
            <label for="nombre">Nombre</label>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-xs-12">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="direccion_prov_registro" id="validationapllido" placeholder="A" aria-describedby="validationServer03Feedback" value="<?=isset($proveedor) && is_object($proveedor) ? $proveedor->direccion : ''?>" required>
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
          <label for="apellido">Direccion</label>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-xs-12">
        <div class="form-floating mb-3">
          <input type="email" class="form-control" name="email_prov_registro" id="validationapllido" placeholder="A" aria-describedby="validationServer03Feedback" value="<?=isset($proveedor) && is_object($proveedor) ? $proveedor->email : ''?>" required>
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
          <label for="apellido">Email</label>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-xs-12">
        <div class="form-floating mb-3">
          <select id="regionSelect" name="region_prov_registro" class="form-control mb3">
            <option>Seleccione</option>
            <?php while($region = $regiones->fetch_object()): ?>
              <option value="<?=$region->id_region?>"<?=isset($prov) && is_object($prov) && $region->id_region == $user->ciudad ? 'selected' : '' ?>><?=$region->region?></option>
            <?php endwhile; ?>
          </select>
          <label for="ciudad">Region</label>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-xs-12">
        <div class="form-floating mb-3">
          <select id="ciudadSelect" name="ciudad_prov_registro" class="form-control mb3">
            <option>Seleccione</option>
            <?php while($ciudad = $ciudades->fetch_object()): ?>
              <option value="<?=$ciudad->id_ciudad?>"<?=isset($proveedor) && is_object($proveedor) && $ciudad->id_ciudad == $proveedor->ciudad ? 'selected' : '' ?>><?=$ciudad->ciudad?></option>
            <?php endwhile; ?>
          </select>
          <label for="ciudad">Ciudad</label>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-xs-12">
        <div class="form-floating mb-3">
          <input type="tel" class="form-control" name="fono_prov_registro" id="validatiotelefono" placeholder="T" aria-describedby="validationServer03Feedback" maxlength="12" value="<?=isset($proveedor) && is_object($proveedor) ? $proveedor->telefono : ''?>" required>
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
          <label for="apellido">Telefono</label>
        </div>
      </div>
      <div class="col-12 mt-3" align="right">
        <button class="w-60 btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#q-prov" name="add" id="add"><i class='bx bx-save me-2'></i>Guardar</button>
      </div>
      <!-- Modal consulta-->
        <div class="modal fade" id="q-prov" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <i class="text-center bi bi-truck text-danger"></i>
                    <label class="text-center mensaje" Style="margin-top: 20px" for="">¿Desea confirmar ingreso de proveedor?</label> 
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x"></i>No</button>
                      <button type="button" class="btn btn-primary"><i class="bi bi-check"></i>Si</button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      <!-- Fin modal consulta -->
    </form>
    </div>
  </section> 
    
