<?php 
  // if($usuarios){
  //   var_dump($usuarios);
  // }
 ?>
 <link href="<?=base_url?>assets/css/style.css" rel="stylesheet">
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Buscar Usuario</p>
</div>
  <section class="pantalla-princ form-register">
    <div class="search">
      <form action="<?=base_url?>usuario/buscar" method="POST">
      <div class="col-md-6 col-xs-12 row">
        <div class="col-auto">
          <input type="text" name="busqueda" class="form-control" id="rut" placeholder="11.222.333-4" required>
        </div>
        <div class="col-auto">
          <button class="btn btn-primary mb-3" type="submit"><i class='bx bx-search-alt-2'></i> Buscar</button>
        </div>
        </div>
      </form>
      </div>
      <p></p>
      <p></p>
      <table class="table table-striped table-hover">
        <thead>
         <tr>
           <th><font color="black">Rut</font></th>
           <th><font color="black">Nombre</font></th>
           <th><font color="black">Apellido</font></th>
           <th><font color="black">Email</font></th>
           <th><font color="black">Telefono</font></th>
           <th><font color="black">Cargo</font></th>
           <th><font color="black">Estado</font></th>
           <th><font color="black">Tipo de usuario</font></th>
           <th><font color="black">Trabajador</font></th>
         </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    <div class="col-12" align="right">
      <button class="w-60 btn btn-lg btn-primary" type="submit" name="actualizar" id="actualizar"><i class='bx bx-revision' style='color:#ffffff'  ></i>&nbsp;&nbsp;Actualizar</button>     
    </div>
  </section>