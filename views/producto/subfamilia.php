<?php   $sbfamily = Utils::get_Subfamilia();
        $familia = Utils::get_Familia();?>
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Sub Familia de Productos</p>
</div>
<section class="pantalla-princ form-register">
  <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
          <div class="container-fluid d-flex justify-content-center alert alert-success" role="alert">Registro completado con exito</div>
  <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
    <div class="container-fluid d-flex justify-content-center alert alert-danger" role="alert"><?=$_SESSION['mesage'];?></div>
  <?php endif; ?>
  <?php  Utils::deleteSession('register');
         Utils::deleteSession('mesage');
  ?> 
  <div class="col-md-4 col-xs-12">
    <form action="<?=base_url?>subfamilia/save" method="POST" class="row d-flex align-content-stretch">
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="subfam_in" placeholder="Subfamilia de productos" aria-label="Familia de productos" aria-describedby="ingreso" required>
      </div>
      <div class="input-group mb-3">
        <select class="form-select" name="id_fam_in" id="id_fam" required>
          <?php while($family = $familia->fetch_object()): ?>
            <option value="<?=$family->id_fam;?>"><?=$family->descripcion;?></option>
          <?php endwhile;?>
        </select>
      </div>
      <div class="input-group mb-3">
        <button class="w-60 btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#mi-question" name="add" id="add"><i class='bx bx-save me-2'></i>Ingresar</button>
      </div>
    </div>
    <div class="col-md-4 col-xs-8 family">  
      <ul class="list-group">
      <?php while($subfamilia = $sbfamily->fetch_object()): ?>
        <li class="list-group-item"><?=$subfamilia->descripcion;?></li>
      <?php endwhile; ?>
      </ul>
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
                  <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class='bx bxs-x-circle me-2'></i>Cancelar</button>
            
                  <button type="submit" class="btn btn-primary"><i class='bx bx-check-circle me-2'></i>Aceptar</button>
                </div>
              </div>
            </div>
        </div>
       
  <!-- Fin modal consulta -->
    </form>
  

</section>