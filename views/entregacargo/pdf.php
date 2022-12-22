<?php

  $pedido = $pedidos->fetch_object();
	$lista = Utils::get_ListaPedido($pedido->id_pedimento);

?>
<ul class="pantalla-princ nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="<?=base_url?>entregacargo/cargotrabajador"><i class="fas fa-plus fa-fw"></i>Entregar a trabajador</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="<?=base_url?>entregacargo/listadecargo"><i class="fas fa-clipboard-list fa-fw"></i>Lista entregas de cargo</a>
  </li>
</ul>
<div align="center">
	<font size="10">Pedido # <?=$pedido->id_pedimento?></font>
</div>
<div class="container pt-3 ">
	<div class="row pb-3">
		<div class="col-4"></div>
		<div class="col-4"></div>
		<!-- <div class="col-4"><a class="btn btn-primary" href="<?=base_url?>entregacargo/pdf&id='<?=$pedido->id_pedimento?>'"><i class='bx bxs-file-pdf' ></i>PDF</a></div> -->
	</div>
	<div class="row">
	<div class="col-8 border border-secondary p-3">
		<table class="table table-bordered">
			<tbody>
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
				<thead >
					<tr class="table-light">
						<th width="800"><font color="black">Producto</font></th>
					    <th><font color="black">Cantidad</font></th>
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

<?php 
	$html=ob_get_clean();
	echo $html;

	use Dompdf\Dompdf;
	$dompdf = new Dompdf();

  $options = $dompdf->getOptions();
	$options->set(array('isRemoteEnabled' => true));
	$dompdf->setOptions($options);

	$dompdf->loadHtml($html);
	$dompdf->setPaper('letter');
	$dompdf->render();
	$dompdf->stream("informe.pdf",array("Attachment" => false));
 ?>