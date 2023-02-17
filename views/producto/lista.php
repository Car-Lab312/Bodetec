<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Listar Productos</p>
</div>
	<section class="pantalla-princ form-register">
  <div class="search">
		  <div class="col-md-6 col-xs-12 row">
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class='bx bx-barcode-reader'></i></span>
            <input type="text" class="form-control" name="codigo_in" id="codigo_producto" placeholder="Codigo producto" aria-describedby="validationServer03Feedback" required> 
          </div>
        </div>
			  <div class="col-auto">
			  	<button class="btn btn-primary mb-3"><i class='bx bx-search-alt-2'></i> Buscar</button>
          <button class="btn btn-primary mb-3" type="submit" name="actualizar" id="actualizar"><i class='bx bx-revision' style='color:#ffffff'  ></i>Actualizar</button>     
	      </div>
	    </div>
	  <table class="table table-striped table-hover pt-5 tabla rounded-top">
      <thead class="estilo-tabla">
        <tr>
          <th>Codigo</th>
          <th>Nombre producto</th>
          <th>Descripcion</th>
          <th>Sub-Familia</th>
          <th>Valor</th>
          <th colspan="2" class="text-center">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while($producto = $prod->fetch_object()): ?>
        <tr>
          <th scope="row"><?=$producto->cod_producto;?></th>
          <td><?=$producto->nombre;?></td>
          <th></th> <!-- Cambiar nombre a Descripcion -->
          <td><?=$producto->descripcion;?></td> <!-- Cambiar nombre a sub familia -->
          <td>$ <?=$producto->valor;?></td>
          <!-- <td class="text-center"><a href="<?=base_url?>ventanas/modalEditarproduc.php" data-bs-toggle="modal" data-bs-target="#Editar" class="btn btn-xss btn-primary"><i class='bx bxs-pencil'></i></a></td> -->
          <td class="text-center"><a data-bs-toggle="modal" data-bs-target="#Editar_producto" class="btn btn-xss btn-primary"><i class='bx bxs-pencil'></i></a></td>
          <td class="text-center"><a data-bs-toggle="modal" data-bs-target="#Eliminar" class="btn btn-xss btn-danger"><i class='bx bx-minus-circle'></i></a></td>
        </tr>
        <?php endwhile; ?>
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
	</section>

  <!-- Modales productos - CONFIRMAR ELIMINAR -->
<div class="modal fade" id="Eliminar" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <i class="text-center bi bi-question-circle text-danger"></i>
      <label class="text-center mensaje" Style="margin-top: 20px" for="">¿Seguro que desea eliminar el producto?</label> 
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x"></i>No</button>
        <button type="button" class="btn btn-primary"><i class="bi bi-check"></i>Si</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Editar_producto" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Producto</h5>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="cerrar"></button>
      </div>
      <div class="modal-body" Style="margin-left: 10px">
        <div class="row mt-3">
          <div class="col-5">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class='bx bx-barcode-reader'></i></span>
              <input type="text" class="form-control" name="codigo_in" id="codigo_producto" placeholder="Codigo producto" aria-describedby="validationServer03Feedback" required> 
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-4">
            <div class="form-group form-floating res">
              <input type="text" class="form-floating form-control" id="producto_in_scan" > 
              <label for="nombreProd">Nombres producto</label>
            </div>
          </div>
          <div class="col-5">
            <div class="form-group form-floating res">
              <input type="text" class="form-floating form-control" id="producto_in_scan" > 
              <label for="nombreProd">Descripcion</label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group form-floating res">
              <input type="number" class="form-floating form-control" id="producto_in_scan" > 
              <label for="nombreProd">Valor</label>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-4">
            <div class="form-group form-floating res">
              <input type="text" class="form-floating form-control" id="producto_in_scan" > 
              <label for="nombreProd">Proveedor</label>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group form-floating res">
              <input type="text" class="form-floating form-control" id="producto_in_scan" > 
              <label for="nombreProd">Familia</label>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group form-floating res">
              <input type="text" class="form-floating form-control" id="producto_in_scan" > 
              <label for="nombreProd">Sub Familia</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x"></i> Cancelar</button>
          <button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar</button>
        </div>
      </div>
    </div>
  </div>
</div>