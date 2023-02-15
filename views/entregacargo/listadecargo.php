
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Listar Entregas de cargo</p>
</div>
	<section class="pantalla-princ form-register">
  <div class="row">
			<div class="col-2">
				<!-- <div class="col-auto"> -->
				<input type="text" class="form-control" id="buscaRut" placeholder="Rut, nombre, apellido o email" required>
			</div>
			<div class="col-md-10">
				<button class="btn btn-primary mb-3"><i class='bx bx-search-alt-2'></i>Buscar</button>
			</div>
	  <!-- </div> -->
	  </div>
			<p></p>
			<table class="table table-striped table-hover">
        <thead class="estilo-tabla">
         <tr>
           <th>Rut</th>
           <th>Nombre</th>
           <th>Apellido</th>
           <th>Cargo</th>
           <th>Numero de pedido</th>
           <th class="text-center">Opciones</th>
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
              <td class="text-center"><a href="<?=base_url?>entregacargo/pedido&id=<?=$pedido->id_pedimento?>" class="btn btn-xss btn-danger"><i class="bi bi-clipboard2-check"></i></a></td>
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
