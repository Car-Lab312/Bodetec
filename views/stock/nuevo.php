<?php 
      $productos = Utils::get_productos();
 ?>

<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Nuevos Productos</p>
</div>
<section class="pantalla-princ form-register">
		<form action="<?=base_url?>stock/update" method="POST" class="container-fluid mb-3 row">
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="input-group form-floating mb-3">
          <button class="btn btn-warning" data-bs-toggle="modal" type="button" data-bs-target="#modalProductosIn" name="addStock" id="addStock"><i class='bx bx-barcode me-2' ></i>Ingresar codigo</button>
        </div>
			</div>
      <div class="col-lg-4 col-md-6 col-xs-12"></div>
      <div class="col-lg-4 col-md-6 col-xs-12">
        <div class="form-floating mb-3">
          <button class="btn btn-warning" data-bs-toggle="modal" type="button" data-bs-target="#modalSelectIn" name="addStock" id="addStock"><i class='bx bx-barcode me-2' ></i>Seleccionar producto</button>
          
        </div>
      </div>
			<div class="col-lg-4 col-md-6 col-xs-12">
			</div>
			<p></p>
			<div class="col-12 mt-3" align="right">
				<button class="w-60 btn btn-primary" type="submit" name="add" id="add"><i class='bx bx-edit'></i>&nbsp;&nbsp;Agregar</button>
			</div>
			<p></p>
			<hr>
			<p></p>
			<table class="table table-striped table-hover border" id="tablaStockIngreso">
        <thead>
         <tr>
           <th><font color="black">Codigo Producto</font></th>
           <th><font color="black">Nombre producto</font></th>
           <th><font color="black">Cantidad ingresada</font></th>
           <th><font color="black">Precio Unitario</font></th>
           <th><font color="black">Precio Unitario</font></th>
         </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>

			<div class="col-12 mt-3" align="right">
				<button class="w-60 btn btn-lg btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#mi-question" name="add" id="add"><i class='bx bx-revision' style='color:#ffffff'  ></i>&nbsp;&nbsp;Guardar</button>
			</div>
      
      <div class="modal fade" id="mi-question" tabindex="-1" aria-hidden="true" aria-labelledby="mi-question">
        <!-- Caja de dialogo -->
        <div class="modal-dialog">
          <!-- Contenido -->  
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <h5 class="modal-title">Confirmacion</h5>
              <button class="btn-close" data-bs-dismiss="modal" aria-label="cerrar"></button>
            </div>
            <div class="modal-body">
              <h4 class="pt-3 pb-3">La informacion se Guardará en la base de datos</h4>
            </div>
            <div class="modal-footer bg-warning">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
              <input type="submit" class="btn btn-primary" value="Aceptar">                 
            </div>
          </div>
        </div>
      </div>
		</form>

    <!----------------------------------------------------- Modal      SCANER ----------------------------------------------->
      <div class="modal fade" id="modalProductosIn" tabindex="-1" role="dialog" aria-labelledby="modalArticulosLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Escaner de codigo</h5>
              <button class="btn-close" data-bs-dismiss="modal" aria-label="cerrar"></button>
            </div>
            <div class="modal-body">
              <div class="col-12">
                <div class="form-group">
                  <label>Escanear Código de Barras</label>
                  <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><box-icon name='barcode-reader'></box-icon></span>
                    <input type="text" class="form-control" name="codigoEscanStock" id="codigoEscaneoStock" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-6">
                  <div class="form-group form-floating res">
                    <input type="text" class="form-floating form-control" id="producto_in_scan" > 
                    <label for="nombreProd">Producto</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-goup form-floating">
                    <input type="number" class="form-control" id="cantidad_in_scan"  min="1" step="1" required>
                    <label for="cantidadProd">Cantidad</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-goup form-floating">
                    <input type="number" class="form-control" id="precioProducto_scan"  min="1" step="1" required>
                    <label for="precioProducto">Precio</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCerrarModal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="btnAgregarStockCod">Agregar</button>
            </div>
          </div>
        </div>
      </div>
  <!------------------------------------------------------- Modal    SELECT ------------------------------------------>    

      <div class="modal fade" id="modalSelectIn" tabindex="-1" role="dialog" aria-labelledby="modalArticulosLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Escaner de codigo</h5>
              <button class="btn-close" data-bs-dismiss="modal" aria-label="cerrar"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-6">
                  <div class="form-group form-floating">
                    <select name="producto_in" id="producto_in" class="form-control" >
                      <?php while($p = $productos->fetch_object()): ?>
                        <option value="<?=$p->cod_producto?>"><?=$p->nombre?></option>
                      <?php endwhile; ?>
                    </select>
                    <label for="producto_in">Producto</label>
                  </div>
                </div>
                <div class="col-3">
                    <div class="form-goup form-floating">
                      <input type="number" class="form-control" id="cantidad_in"  min="1" step="1" required>
                      <label for="cantidad">Cantidad</label>
                    </div>
                </div>
                <div class="col-3">
                  <div class="form-group form-floating">
                    <input type="number" class="form-control" id="precioProducto" min="1" step="1" required>
                    <label for="precioProducto">Precio</label>
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-12">
                  
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCerrarModal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="btnAgregarStock" >Agregar</button>
            </div>
          </div>
        </div>
      </div>
	</section>

  