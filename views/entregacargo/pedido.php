

<?php   
			$pedido = $pedidos->fetch_object();
			$lista = Utils::get_ListaPedido($pedido->id_pedimento);
 ?>
<div class="Titulos-pedidos">
	Pedido # <?=$pedido->id_pedimento?>
</div>
<div class="container pt-3 ">
	<div class="row pb-3">
		<div class="col-4"></div>
		<div class="col-4"></div>
		<div class="col-4"><a class="btn btn-primary" href="<?=base_url?>entregacargo/pdf&id=<?=$pedido->id_pedimento?> "><i class='bx bxs-file-pdf' ></i>PDF</a></div> 
	</div>
	<div class="row">
	<div class="col-8 border border-secondary p-3">
		<table class="table table-bordered">
			<tbody >
				<tr>
				    <td width="200">Rut</td>
				    <td><?=$pedido->rut;?></td>
				</tr>
				<tr>
					<td width="200">Nombre</td>
					<td><?=$pedido->nombre;?></td>
				</tr>
				<tr>
					<td width="200">Apellido</td>
				    <td><?=$pedido->apellido;?></td>
			    </tr>
				<tr>
					<td width="200">Seccion</td>
				    <td><?=$pedido->cargo;?></td>
			    </tr>	
			</tbody>
		</table>
	</div>
	<div class="col-4 border border-secondary p-3">
		<img src="<?=base_url?>assets/images/logo.png" alt="">
	</div>
	</div>
	<div class="row">
		<div class="col-12 border border-secondary p-3">
			<table class="table table-bordered">
				<thead class="estilo-tabla">
					<tr>
						<th width="800">Producto</th>
					    <th>Cantidad</th>
					</tr>
				</thead>
				<tbody>
				<?php while($row = $lista->fetch_object()): ?>
					<tr>
						<td><?=$row->nombre;?></td>
						<td><?=$row->cantidad;?></td>
					</tr>
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>