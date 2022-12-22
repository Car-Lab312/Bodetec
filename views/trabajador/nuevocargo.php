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

      <div class="col-md-6 col-sm-12 p-5">

        <div class="form-floating">

          <input type="text" name="cargo" id="cargos" class="form-control">

          <label for="cargos">Cargo</label>

        </div>

      </div>

      <div class="col-md-6 col-sm-12 p-5">

        <ul class="list-group">

          <?php while($cr = $cargos->fetch_object()):?>

            <a href="<?=base_url?>/trabajador/nuevocargo&id=<?=$cr->id_cargo?>" class="list-group-item list-group-item-action"><?=$cr->nombre?></a>

          <?php endwhile;?>

        </ul>

      </div>

    </form>

</section>