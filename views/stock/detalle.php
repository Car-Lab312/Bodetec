<?php 

      $lista = Utils::get_ListaPedido($pedido->id_pedimento);

 ?>

<ul class="pantalla-princ nav nav-pills mb-3 ps-3" id="pills-tab" role="tablist">

  <li class="nav-item">

    <a class="nav-link" aria-current="page" href="<?=base_url?>stock/nuevo"><i class="fas fa-plus fa-fw"></i>Agregar Stock</a>

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

    <a class="nav-link active" aria-current="page" href="<?=base_url?>stock/fecha"><i class='bx bxs-calendar' ></i></i>Stock por fecha</a>

  </li>

</ul>

<div class="pantalla-princ container">

  <div class="row">

    <div class="col-md-8 border p-5 hoja">

      <div class="col-12 d-flex justify-content-center">

        <h1>Pedimento N <?=$pedido->id_pedimento?></h1>

      </div>

      <div class="col-12">

        <table class="table">

          <tr>

            <th>Nombre</th>

            <td><?=$pedido->nombre?></td>

          </tr>

          <tr>

            <th>Rut</th>

            <td><?=$pedido->rut?></td>

          </tr>

          <tr>

            <th>Cargo</th>

            <td><?=$pedido->cargo?></td>

          </tr>

        </table>

      </div>

    </div>

    <div class="col-md-4 border d-flex justify-content-center align-items-center hoja">

      <img src="<?=base_url?>assets/images/logo.png" alt="" class="img-flui p-3">

    </div>

  </div>

  <div class="row">

    <div class="col-md-12 p5 hoja">

      <table class="table" id="tablaPedimento">

        <thead>

          <tr>

            <th colspan="2" class="text-center"><font color="black">DETALLE</font></th></tr>

          <tr>

            <th><font color="black">Producto</font></th>

            <th><font color="black">Cantidad</font></th>

          </tr>

        </thead>

        <?php while($row = $lista->fetch_object()): ?>

          <tr>

            <td><?=$row->nombre?></td>

            <td><?=$row->cantidad?></td>

          </tr>

      <?php endwhile; ?>

      </table>

      <div class="col-md-12 d-flex justify-content-end p-5">

        <div class="boxFirma">

          Autorizado por: 

        </div>

      </div>

    </div>

  </div>

</div>