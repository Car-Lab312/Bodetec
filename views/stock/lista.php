

<ul class="pantalla-princ nav nav-pills mb-3 ps-3" id="pills-tab" role="tablist">

  <li class="nav-item">

    <a class="nav-link active" aria-current="page" href="<?=base_url?>stock/nuevo"><i class="fas fa-plus fa-fw"></i>Agregar Stock</a>

  </li>

  <li class="nav-item">

    <a class="nav-link" aria-current="page" href="<?=base_url?>stock/cantidad"><i class="far fa-calendar-alt fa-fw"></i>Stock valorizado</a>

  </li>

  <li class="nav-item">

    <a class="nav-link" aria-current="page" href="<?=base_url?>stock/valor"><i class="fas fa-hand-holding-usd fa-fw"></i>Stock</a>

  </li>

  <li class="nav-item">

    <a class="nav-link" aria-current="page" href="<?=base_url?>stock/cierre"><i class="fas fa-clipboard-list fa-fw"></i>Cierre</a>

  </li>

  <li class="nav-item">

    <a class="nav-link" aria-current="page" href="<?=base_url?>stock/fecha"><i class='bx bxs-calendar' ></i></i>Stock por fecha</a>

  </li>

</ul>

	<section class="pantalla-princ form-register">

			<p></p>

			<table class="table table-striped table-hover">

        <thead>

         <tr>

           <th><font color="black">#</font></th>

           <th><font color="black">Codigo</font></th>

           <th><font color="black">Nombre</font></th>

           <th><font color="black">Stock</font></th>

           <th><font color="black">Valor</font></th>

           <th><font color="black">TOTAL</font></th>

           <th><font color="black">opcion</font></th>

         </tr>

        </thead>

        <tbody>

          <?php while($producto = $stock->fetch_object()):?>

            <tr>

            	<td><?=$producto->id_producto?></td>

            	<td><?=$producto->cod_producto?></td>

            	<td><?=$producto->nombre?></td>

            	<td><?=$producto->stock?></td>

            	<td><?=$producto->valor?></td>

            	<td><?=$producto->total?></td>

            	<td><a class="btn btn-success btn-sm" href="#"><i class='bx bx-edit-alt me-2' ></i>Editar</a></td>

          

            </tr>

          <?php endwhile; ?>

        </tbody>

      </table>

	</section>