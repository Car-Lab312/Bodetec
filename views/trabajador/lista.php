<link href="<?=base_url?>assets/css/style.css" rel="stylesheet">
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Lista de Trabajador</p>
</div>
  <section class="pantalla-princ form-register">
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
            <td class="text-center"><a href="<?=base_url?>trabajador/delete&id=<?=$job->id_user?>" class="btn btn-xss btn-danger"><i class='bx bx-minus-circle'></i></a></td>
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
	</section>