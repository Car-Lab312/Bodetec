<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Listar Productos</p>
</div>
	<section class="pantalla-princ form-register">
		<p></p>
		<table class="table table-striped table-hover pt-5" style="width: 900px;" align="center">
        <thead>
         <tr>
           <th><font color="black">Codigo</font></th>
           <th><font color="black">Nombre producto</font></th>
           <th><font color="black">Sub-Familia</font></th>
           <th><font color="black">Valor</font></th>
           <th colspan="2"><font color="black" class="text-center">Opciones</font></th>
         </tr>
        </thead>
        <tbody>

        <?php while($producto = $prod->fetch_object()): ?>
          <tr>
            <th scope="row"><?=$producto->cod_producto;?></th>
            <td><?=$producto->nombre;?></td>
            <td><?=$producto->descripcion;?></td>
            <td>$ <?=$producto->valor;?></td>
            <td><a href="<?=base_url?>producto/editar&id=<?=$producto->id_producto?>" class="btn btn-xss btn-primary"><i class='bx bxs-pencil'></i></a></td>
            <td><a href="<?=base_url?>producto/delete&id=<?=$producto->id_producto?>" class="btn btn-xss btn-danger"><i class='bx bx-minus-circle'></i></a></td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>
	</section>