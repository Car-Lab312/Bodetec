<?php 
      $productos = Utils::get_productos();
      ?>

<div class="Titulos">
  <p class="text-center" id="titulo-usuario">Nuevos Productos</p>
</div>
<section class="pantalla-princ form-register">
  <form action="<?=base_url?>stock/update" method="POST" class="container-fluid mb-3 row">
    <div class="col-lg-4 col-md-6 col-xs-12">
      <div class="mb-3">
        <button class="btn btn-warning" data-bs-toggle="modal" type="button" data-bs-target="#EscanearProduc" name="addStock" id="addStock"><i class='bx bx-barcode me-2' ></i>Ingresar codigo</button>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-xs-12">
      <div class="mb-3">
        <button class="btn btn-warning" data-bs-toggle="modal" type="button" data-bs-target="#modalSelectIn" name="addStock" id="addStock"><i class='bx bx-barcode me-2' ></i>Seleccionar producto</button>
      </div>
    </div>
  </form>
  <form action="" class="container-fluid row">
      <div class="container-fluid">
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="input-group input-group-lg" style="width: 350px;">
            <span class="input-group-text" id="inputGroup-sizing-lg"><i class='bx bx-barcode-reader'></i></span>
            <input type="text" class="form-control" name="codigo_in" id="validationcodigo" placeholder="Codigo producto" aria-describedby="validationServer03Feedback" required value="<?=isset($producto) && is_object($producto) ? $producto->cod_producto : ''?>"> 
            <div id="validationServer03Feedback" class="invalid-feedback">
              * Ingreso obligatorio
            </div>
          </div>
        </div>
      </div>
      <p></p>
      <div class="col-lg-4 col-md-6 col-xs-12" style="width: 350px">
        <div class="form-floating mb-3">
          <input type="tel" class="form-control" name="nombre_in" id="validationnombre" value="Solo se muestra y confirma dato"placeholder="CP" aria-describedby="validationServer03Feedback" required disabled> 
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
          <label for="nombre">Nombre producto</label>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-xs-12" style="width: 350px" disable>
        <div class="form-floating mb-3">
          <input type="tel" class="form-control" name="descripcion_in" id="validationdescripcion" value="Solo se muestra y confirma dato" placeholder="CP" aria-describedby="validationServer03Feedback" required disabled> 
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
          <label for="nombre">Descripcion</label>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-xs-12" style="width: 350px">
        <div class="form-floating mb-3">
          <input type="number" class="form-control" name="cantidad_in" id="validationcantidad" placeholder="CP" aria-describedby="validationServer03Feedback" required> 
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
          <label for="nombre">Cantidad</label>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-xs-12" style="width: 350px" disable>
        <div class="form-floating mb-3">
          <input type="number" class="form-control" name="familia_in" id="validationfamilia" placeholder="CP" aria-describedby="validationServer03Feedback" required> 
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
          <label for="nombre">Valor</label>
        </div>
      </div>
      <div class="col-12 mt-3" align="right">
        <button class="w-60 btn btn-lg btn-primary" type="submit" name="add" id="add"><i class='bx bx-edit'></i> Ingresar</button>
      </div>
      <p></p>
			<hr>
			<table class="table table-striped table-hover border" id="tablaStockIngreso">
        <thead class="estilo-tabla">
         <tr>
           <th>Codigo Producto</th>
           <th>Nombre producto</th>
           <th>Cantidad ingresada</th>
           <th>Precio Unitario</th>
         </tr>
        </thead>
        <tbody>
          
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
			<div class="col-12 mt-3" align="right">
				<button class="w-60 btn btn-lg btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#NuevoStock" name="add" id="add"><i class='bx bx-save' style='color:#ffffff'></i> Guardar</button>
			</div>
		</form>

    <!----------------------------------------------------- Modal  SCANER ----------------------------------------------->
      <div class="modal fade" id="EscanearProduc" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-labelledby="modalArticulosLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                    <span class="input-group-text" id="basic-addon1"><i class='bx bx-barcode-reader'></i></span>
                    <input type="text" class="form-control" name="codigoEscanStock" id="codigoEscaneoStock" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12">
                  <div class="form-group form-floating res">
                    <input type="text" class="form-floating form-control" id="producto_in_scan" > 
                    <label for="nombreProd">Producto</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="btnAgregarStockCod">Agregar</button>
            </div>
          </div>
        </div>
      </div>
  <!------------------------------------------------------- Modal    SELECT ------------------------------------------>    

      <div class="modal fade" id="modalSelectIn" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-labelledby="modalArticulosLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Seleccione producto</h5>
              <button class="btn-close" data-bs-dismiss="modal" aria-label="cerrar"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group form-floating">
                    <select name="producto_in" id="producto_in" class="form-control" >
                      <?php while($p = $productos->fetch_object()): ?>
                        <option value="<?=$p->cod_producto?>"><?=$p->nombre?></option>
                      <?php endwhile; ?>
                    </select>
                    <label for="producto_in">Producto</label>
                  </div>
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="btnAgregarStock" >Agregar</button>
            </div>
          </div>
        </div>
      </div>
	</section>
  <div class="modal fade" id="NuevoStock" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <i class="text-center bx bxs-component iconos text-danger"></i>
    <label class="text-center mensaje" Style="margin-top: 20px" for="">¿Desea confirmar ingreso stock?</label> 
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x"></i>No</button>
        <button type="button" class="btn btn-primary"><i class="bi bi-check"></i>Si</button>
      </div>
    </div>
  </div>
</div>

  