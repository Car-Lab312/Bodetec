<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Stock por fecha</p>
</div>
	<section class="pantalla-princ form-register">
		<form method="POST" action="<?=base_url?>stock/stockEntreFechas" class="search">
			<div class="col-md-6 col-xs-12 row">
        <div class="col-lg-4 col-md-6 col-xs-12" style="width: 170px;">
          <div class="form-floating mb-3">
            <input type="date" class="form-control" name="dateI_in" id="dateI_in" placeholder="DI" required>
            <label for="nombre">Fecha inicial</label>
          </div>
				</div>
        <div class="col-lg-4 col-md-6 col-xs-12" style="width: 170px;">
          <div class="form-floating mb-3">
            <input type="date" class="form-control" name="dateF_in" id="dateF_in" placeholder="DF" required>
            <label for="nombre">Fecha Final</label>
          </div>
        </div>
			   <div class="col-auto">
			   	<button type="submit" class="btn btn-primary mb-3" id="btn_buscaPorFechas"><i class='bx bx-search-alt-2'></i> Buscar</button>
			   </div>
	    </div>
	  </form>
	   
			<table class="tabla table table-striped table-hover mt-3" id="tablaStockEntreFechas">
        <thead>
         <tr>
           <th><font color="black">Codigo Producto</font></th>
           <th><font color="black">Nombre Producto</font></th>
           <th><font color="black">Salidas</font></th>
           <th><font color="black">Stock</font></th>
          <!--  <th><font color="black">Opcion</font></th> -->
         </tr>
        </thead>
        <tbody>
          <!-- <?php while($prod = $productos->fetch_object()): ?> -->
         
            <tr>
              <td><?=$prod->producto_cod?></td>
              <td><?=$prod->nombre?></td>
              <td><?=$prod->cantidad?></td>
             
              <td><?=$prod->stock?></td>
              <!-- <td><a href="<?=base_url?>stock/detalle&id=<?=$prod->id_pedimento?>" class="btn btn-sm btn-secondary"><i class='bx bx-show me-2'></i>Ver</a></td> -->
            </tr>
          <?php endwhile;?>
        </tbody>
      </table>
    <div class="col-12" align="right">
      <button class="w-60 btn btn-lg btn-primary" type="submit" name="actualizar" id="actualizar"><i class='bx bx-revision' style='color:#ffffff'  ></i>&nbsp;&nbsp;Actualizar</button>     
    </div>
	</section>