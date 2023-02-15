
 <link href="<?=base_url?>assets/css/style.css" rel="stylesheet">
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Listar Usuario</p>
</div>
<section class="pantalla-princ form-register">
<div class="search">
      <div class="col-md-6 col-xs-12 row">
        <div class="col-auto">
          <input type="text" name="busqueda" class="form-control" id="rut" placeholder="11.222.333-4" required>
        </div>
        <div class="col-auto">
          <button class="btn btn-primary mb-3" type="submit"><i class='bx bx-search-alt-2'></i> Buscar</button>
        </div>
        </div>
      </div>
		<table class="table table-striped table-hover pt-5 tabla rounded-top">
      <thead class="estilo-tabla">
        <tr>
           <th>Rut</th>
           <th>Nombre</th>
           <th>Apellido</th>
           <th>Direccion</th>
           <th>Ciudad</th>
           <th>Email</th>
           <th>Teléfono</th>
           <th>Cargo</th>
           <th colspan="2" class="text-center">Opciones</th>
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
      <nav aria-label="...">
      <ul class="pagination Tabla-list-bus">
        <li class="page-item disabled">
          <a class="page-link">Previous</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a></li>
        <li class="page-item active" aria-current="page">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
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
