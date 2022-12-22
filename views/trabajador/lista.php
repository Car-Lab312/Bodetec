<link href="<?=base_url?>assets/css/style.css" rel="stylesheet">
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Lista de Trabajador</p>
</div>
  <section class="pantalla-princ form-register">
			<table class="table table-striped table-hover">
        <thead>
         <tr>
           <th><font color="black">Rut</font></th>
           <th><font color="black">Nombre</font></th>
           <th><font color="black">Apellido</font></th>
           <th><font color="black">Direccion</font></th>
           <th><font color="black">Ciudad</font></th>
           <!--<th><font color="black">Teléfono</font></th>-->
           <th><font color="black">Cargo</font></th>
           <th colspan="2"><font color="black" class="text-center">Opciones</font></th>
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
            <td><a href="<?=base_url?>trabajador/editar&id=<?=$job->id_user?>" class="btn btn-xss btn-primary"><i class='bx bxs-pencil'></i></a></td>
            <td><a href="<?=base_url?>trabajador/delete&id=<?=$job->id_user?>" class="btn btn-xss btn-danger"><i class='bx bx-minus-circle'></i></a></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
	</section>