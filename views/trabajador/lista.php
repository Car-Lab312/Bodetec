<link href="<?=base_url?>assets/css/style.css" rel="stylesheet">
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Lista de Trabajador</p>
</div>
  <section class="pantalla-princ form-register">
  <div class="search">
			<div class="col-md-6 col-xs-12 row">
				<div class="col-auto">
					<input type="text" class="form-control" id="buscaRut" placeholder="Rut, nombre, apellido o email" required>
				</div>
				<div class="col-auto">
					<button class="btn btn-primary mb-3"><i class='bx bx-search-alt-2'></i>Buscar</button>
				</div>
	    	</div>
	    </div>
	    <p></p>
			<p></p>
			<table class="table table-striped table-hover tabla">
        <thead class="estilo-tabla">
         <tr>
           <th>Rut</th>
           <th>Nombre</th>
           <th>Apellido</th>
           <th>Direccion</th>
           <th>Ciudad</th>
           <!--<th><font color="black">Teléfono</font></th>-->
           <th>Cargo</th>
           <th colspan="2" class="text-center">Opciones</th>
         </tr>
        </thead>
        <tbody>
          <?php while($job = $trabajadores->fetch_object()): ?>
          <tr>
            <th scope="row"><?=$job->rut?></th>
            <td><?=$job->nombre?></td>
            <td><?=$job->apellido?></td>
            <td><?=$job->direccion?></td>
            <td><?=$job->ciudad?></td>
            <!--<td><?=$job->fono?></td>-->
            <td><?=$job->cargo?></td>
            <td class="text-center"><a href="<?=base_url?>trabajador/editar&id=<?=$job->id_user?>" class="btn btn-xss btn-primary"><i class='bx bxs-pencil'></i></a></td>
            <td class="text-center"><a data-bs-toggle="modal" data-bs-target="#Eliminar" class="btn btn-xss btn-danger"><i class='bx bx-minus-circle'></i></a></td>
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
  <div class="modal fade" id="Eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <i class="text-center bi bi-question-circle text-danger"></i>
      <label class="text-center mensaje" Style="margin-top: 20px" for="">¿Seguro que desea eliminar el trabajador?</label> 
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x"></i>No</button>
        <button type="button" class="btn btn-primary"><i class="bi bi-check"></i>Si</button>
      </div>
    </div>
  </div>
</div>
	</section>