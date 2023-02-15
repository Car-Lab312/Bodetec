<?php   
			$pedido = $pedidos->fetch_object();
			$lista = Utils::get_ListaPedido($pedido->id_pedimento);
 ?>
 <section class="pantalla-princ form-register">
<div class="Titulos-pedidos">
	Pedido # <?=$pedido->id_pedimento?>
</div>
<div class="container pt-4 ">
	<div class="row justify-content-start">
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
	    				<td width="200">Cargo</td>
	    			    <td><?=$pedido->cargo;?></td>
	    		    </tr>	
	    		</tbody>
	    	</table>
	    </div>
		<div class="imprimir">
	        <button type="button" class="btn btn-primary" href="<?=base_url?>entregacargo/pdf&id=<?=$pedido->id_pedimento?> "><i class='bx bxs-file-pdf' ></i>PDF</button>
	    </div>	
    </div>
	<div class="row">
		<div class="col-12 p-3">
			<table class="table table-bordered">
				<thead class="estilo-tabla">
					<tr>
						<th width="800">Codigo</th>
						<th width="800">Producto</th>
					    <th width="50">Cantidad</th>
					</tr>
				</thead>
				<tbody>
				<?php while($row = $lista->fetch_object()): ?>
					<tr>
						<td></td>
						<td><?=$row->nombre;?></td>
						<td><?=$row->cantidad;?></td>
					</tr>
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<a type="button" class="volver btn btn-primary" href="<?=base_url?>entregacargo/listadecargo"><i class='bx bx-share'></i> Volver</a>
</section>