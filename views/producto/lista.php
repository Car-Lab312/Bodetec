<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Listar Productos</p>
</div>
	<section class="pantalla-princ form-register">
		<p></p>
	  <table class="table table-striped table-hover pt-5 tabla rounded-top">
      <thead class="estilo-tabla">
        <tr>
          <th>Codigo</th>
          <th>Nombre producto</th>
          <th>Sub-Familia</th>
          <th>Valor</th>
          <th colspan="2" class="text-center">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while($producto = $prod->fetch_object()): ?>
        <tr>
          <th scope="row"><?=$producto->cod_producto;?></th>
          <td><?=$producto->nombre;?></td>
          <td><?=$producto->descripcion;?></td>
          <td>$ <?=$producto->valor;?></td>
          <td class="text-center"><a href="<?=base_url?>producto/editar&id=<?=$producto->id_producto?>" class="btn btn-xss btn-primary"><i class='bx bxs-pencil'></i></a></td>
          <td class="text-center"><a href="<?=base_url?>producto/delete&id=<?=$producto->id_producto?>" class="btn btn-xss btn-danger"><i class='bx bx-minus-circle'></i></a></td>
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