
 <link href="<?=base_url?>assets/css/style.css" rel="stylesheet">
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Listar Usuario</p>
</div>
<section class="pantalla-princ form-register">
	<form action="" class="container-fluid row">
		<table class="table table-striped table-hover mt-5">
      <thead>
        <tr>
           <th><font color="black">Rut</font></th>
           <th><font color="black">Nombre</font></th>
           <th><font color="black">Apellido</font></th>
           <th><font color="black">Direccion</font></th>
           <th><font color="black">Telefono</font></th>
           <th><font color="black">Email</font></th>
           <th><font color="black">Estado</font></th>
           <th><font color="black">Tipo de usuario</font></th>
           <th><font color="black">Trabajador</font></th>
           <th colspan="2"><font color="black" class="text-center">Opciones</font></th>
        </tr>
      </thead>
      <tbody>
        <?php while ($user = $usuarios->fetch_object()): ?>
          <tr>
            <th scope="row"><?=$user->rut;?></th>
            <td><?=$user->nombre;?></td>
            <td><?=$user->apellido;?></td>
            <td><?=$user->direccion;?></td>
            <td><?=$user->fono;?></td>
            <td><?=$user->email;?></td>
            <?php if($user->estado==1): ?>
              <td>Habilitado</td>
            <?php else: ?>
              <td>Deshabilitado</td>
            <?php endif; ?>
            <td><?=$user->tipo;?></td>
            <?php if($user->is_job==0): ?>
              <td>Externo</td>
            <?php else: ?>
              <td>Trabajador</td>
            <?php endif; ?>
              <td><a href="<?=base_url?>usuario/editar&id=<?=$user->id_user?>" class="btn btn-xss btn-primary"><i class='bx bxs-pencil'></i></a></td>
              <td><a href="<?=base_url?>usuario/delete&id=<?=$user->id_user?>" class="btn btn-xss btn-danger"><i class='bx bx-minus-circle'></i></a></td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>
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
