
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Listar Entregas de cargo</p>
</div>
	<section class="pantalla-princ form-register">
			<p></p>
			<table class="table table-striped table-hover">
        <thead class="estilo-tabla">
         <tr>
           <th>Rut</th>
           <th>Nombre</th>
           <th>Apellido</th>
           <th>Cargo</th>
           <th>#</th>
           <th colspan="2" class="text-center">Opciones</th>
         </tr>
        </thead>
        <tbody>
          <?php while($pedido = $pedidosAll->fetch_object()):?>
            <tr>
              <td><?=$pedido->rut?></td>
              <td><?=$pedido->nombre?></td>
              <td><?=$pedido->apellido?></td>
              <td><?=$pedido->cargo?></td>
              <td><?=$pedido->id_pedimento?></td>
              <td><a href="#" class="btn btn-xss btn-primary"><i class='bx bx-printer' ></i></a></td>
              <td><a href="<?=base_url?>entregacargo/pedido&id=<?=$pedido->id_pedimento?>" class="btn btn-xss btn-danger"><i class='bx bxs-file-pdf' ></i></a></td>
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