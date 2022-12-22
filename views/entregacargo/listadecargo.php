
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Listar Entregas de cargo</p>
</div>
	<section class="pantalla-princ form-register">
			<p></p>
			<table class="table table-striped table-hover">
        <thead>
         <tr>
           <th><font color="black">Rut</font></th>
           <th><font color="black">Nombre</font></th>
           <th><font color="black">Apellido</font></th>
           <th><font color="black">Cargo</font></th>
           <th><font color="black"># </font></th>
           <th colspan="2" class="text-center"><font color="black">Opciones</font></th>
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
	</section>