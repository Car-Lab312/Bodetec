<?php 

      $cargos = Utils::get_cargos();

      if(isset($_GET['id'])){

        $titulo = 'EDITAR '.$cargo->nombre;

        $url_action = base_url."trabajador/editaeCargo&id=".$cargos->id_cargo;

        $titulo = "EDITAR CARGO";

      }else{ 

        $url_action = base_url."trabajador/saveCargo";

        $titulo = 'NUEVO CARGO';

      }

?>
 <link href="<?=base_url?>assets/css/style.css" rel="stylesheet">
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Nuevos Cargos</p>
</div>
<section class="pantalla-princ form-register" id="registroUser">

    <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>

      <div class="container-fluid d-flex justify-content-center alert alert-success" role="alert">Registro completado con exito</div>

    <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>

      <div class="container-fluid d-flex justify-content-center alert alert-danger" role="alert"><?=$_SESSION['message']?></div>

    <?php endif;?>

    <?php  Utils::deleteSession('register'); ?>

    <form action="<?=$url_action;?>" method="POST" class="container-fluid row pt-5">

      <div class="row" style="margin-bottom: 30px;">
        <div class="col-md-2">
          <div class="form-floating">
            <input type="text" name="cargo" id="cargos" class="form-control">
            <label for="cargos">Cargo</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-floating">
            <input type="text" name="" id="cargos" class="form-control">
            <label for="cargos">Tipo de cargo</label>
          </div>
        </div>
        <div class="col-md-2"">
				<button class="w-60 btn btn-lg btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#mi-question" name="add" id="add"><i class="bi bi-plus-circle"></i> Ingresar cargo</button>
			</div>
      </div>
      <table class="table table-striped table-hover tabla" style="width: 750px;">
        <thead class="estilo-tabla">
         <tr>
           <th>Cargo</th>
           <th>Tipo de cargo</th>
           <th colspan="2" class="text-center">Opciones</th>
         </tr>
        </thead>
      </table>
      <nav aria-label="..." >
      <ul class="pagination Tabla-list-bus" style="width: 740px;">
        <li class="page-item disabled">
          <a class="page-link">Previous</a>
        </li>
        <li class="page-item active" aria-current="page">
          <a class="page-link" href="#">1</a></li>
        <li class="page-item ">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
    </form>

</section>