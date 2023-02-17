<?php   $cargos = Utils::get_cargos();
        $productos = Utils::get_productos(); 
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Entregar a Trabajador</p>
</div>
<section class="pantalla-princ form-register ">
    <ul class="nav nav-tabs">
        <li class="nav-item nav-tab">
          <a class="nav-link link-tab" data-bs-toggle="tab" href="#buscar_trabajador">Buscar trabajador</a>
        </li>
        <li class="nav-item nav-tab">
          <a class="nav-link link-tab" data-bs-toggle="tab" href="#ingresar_productos">Ingresar productos</a>
        </li>
        <li class="nav-item nav-tab">
          <a class="nav-link link-tab" data-bs-toggle="tab" href="#confirmar_ingreso">Confirmar ingreso</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="buscar_trabajador">
            <div class="search" style="margin-top: 20px; margin-left: 20px;">
		        <div class="col-md-6 col-xs-12 row">
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <input type="text" class="form-control" name="codigo_in" id="codigo_producto" placeholder="Rut, Nombre o Apellido" aria-describedby="validationServer03Feedback" required> 
                    </div>
			        <div class="col-auto">
			  	        <button class="btn btn-primary mb-3"><i class='bx bx-search-alt-2'></i> Buscar</button>
                        <button class="btn btn-primary mb-3" type="submit" name="actualizar" id="actualizar"><i class='bx bx-revision' style='color:#ffffff'  ></i>Actualizar</button>     
	                </div>
	            </div>
            </div>
            <table class="table table-striped table-hover pt-5 tabla rounded-top" style="width: 1300px;">
                <thead class="estilo-tabla">
                 <tr>
                   <th>Rut</th>
                   <th>Nombre</th>
                   <th>Apellido</th>
                   <th>Cargo</th>
                   <th class="text-center">Seleccionar</th>
                 </tr>
                </thead>
                <tbody>
                    <tr>
                      <th></th> 
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="text-center"><a class="btn btn-xss btn-primary del" id="question" data-bs-toggle="modal" data-bs-target="#Eliminar"><i class="bi bi-check2"></i></a></td>
                    </tr>
                </tbody>
            </table>
            <nav aria-label="..." style="width: 1300px;">
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
            <!-- <div class="col-12 mt-3 position-absolute bottom-0 end-0 botones_entrega" align="right">
				<button class="w-60 btn btn-lg btn-primary" type="button" data-bs-toggle="tab"" data-bs-target="#mi-question" name="add"><i class="bi bi-chevron-double-right"></i> Siguiente</button>
			</div> -->
        </div>
        <div class="tab-pane fade" id="ingresar_productos">
            <div class=" row col-lg-4 col-md-6 col-xs-12" style="margin-top: 20px; margin-left: 20px; margin-bottom: 20px; ">
                <div class="col-4">
                  <button class="btn btn-warning" data-bs-toggle="modal" type="button" data-bs-target="#escan_producto" name="addStock" id="addStock"><i class='bx bx-barcode me-2'></i> Ingresar codigo</button>
                </div>
                <div class="col-5">
                  <button class="btn btn-warning" data-bs-toggle="modal" type="button" data-bs-target="#seleccion_producto" name="addStock" id="addStock"><i class="bi bi-pencil"></i> Seleccionar producto</button>
                </div>
            </div>
            <table class="table table-striped table-hover pt-5 tabla rounded-top" style="width: 950px;">
                <thead class="estilo-tabla">
                 <tr>
                   <th>Código</th>
                   <th>Nombre</th>
                   <th>Cantidad</th>
                 </tr>
                </thead>
                <tbody>
                    <tr>
                      <th></th> 
                      <td></td>
                      <td></td>
                    </tr>
                </tbody>
            </table>
            <nav aria-label="..." style="width: 950px;">
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
            <div class="container datos-trabajador col-12 col-md-2 row-cols-lg-12 g-2">
                <div class="row row-cols-lg-12 g-2" style="margin-top: 10px; margin-bottom: 10px;">
                    <h5>Datos del trabajador seleccionado</h5>
                    <div class="col-10">  
                       <div class="form-group form-floating res">
                          <input type="text" class="form-floating form-control" id="producto_in_scan" require disabled> 
                          <label for="nombreProd">Rut</label>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="form-group form-floating res">
                          <input type="text" class="form-floating form-control" id="producto_in_scan" require disabled> 
                          <label for="nombreProd">Nombres</label>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="form-group form-floating res">
                          <input type="text" class="form-floating form-control" id="producto_in_scan" require disabled> 
                          <label for="nombreProd">Apellidos</label>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="form-group form-floating res">
                          <input type="text" class="form-floating form-control" id="producto_in_scan" require disabled> 
                          <label for="nombreProd">Cargo</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-12 mt-3 position-absolute bottom-0 end-0 botones_entrega" align="right">
				<button class="w-60 btn btn-lg btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#mi-question" name="add" id="add"><i class="bi bi-chevron-double-right"></i> Siguiente</button>
			</div> -->
        </div>
        <div class="tab-pane fade" id="confirmar_ingreso">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Datos del trabajador
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="container ">
                            <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                                <div class="col-3">  
                                   <div class="form-group form-floating res">
                                      <input type="text" class="form-floating form-control" id="producto_in_scan" require disabled> 
                                      <label for="nombreProd">Rut</label>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group form-floating res">
                                      <input type="text" class="form-floating form-control" id="producto_in_scan" require disabled> 
                                      <label for="nombreProd">Nombres</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container col-12 col-md-6 row-cols-lg-12">
                            <div class="row row-cols-lg-12 g-2" style="margin-top: 10px; margin-bottom: 10px;">
                                <div class="col-10">
                                    <div class="form-group form-floating res">
                                      <input type="text" class="form-floating form-control" id="producto_in_scan" require disabled> 
                                      <label for="nombreProd">Apellidos</label>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="form-group form-floating res">
                                      <input type="text" class="form-floating form-control" id="producto_in_scan" require disabled> 
                                      <label for="nombreProd">Cargo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Datos de los productos
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table table-striped table-hover pt-5 tabla rounded-top" style="width: 950px;">
                            <thead class="estilo-tabla">
                             <tr>
                               <th>Código</th>
                               <th>Nombre</th>
                               <th>Cantidad</th>
                             </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <th>85478569</th> 
                                  <td>Martillo</td>
                                  <td>9</td>
                                </tr>
                                <tr>
                                  <th>52345896</th> 
                                  <td>Taladro</td>
                                  <td>10</td>
                                </tr>
                            </tbody>
                        </table>
                        <nav aria-label="..." style="width: 950px;">
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
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-12 mt-3 position-absolute bottom-0 end-0 botones_entrega" align="right">
				<button class="w-60 btn btn-lg btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#Confirmar_ingreso" name="add" id="add"><i class="bi bi-check2-square"></i> Guardar</button>
			</div>
        </div>
    </div>
</section>

<!-- Modal Buscandor de producto -->
<div class="modal fade" id="escan_producto" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
  <div class="escan-prod modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Escanear producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-10">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class='bx bx-barcode-reader barra'></i></span>
                  <input type="text" class="form-control" name="codigo_in" id="cod_prod" placeholder="Codigo producto" aria-describedby="validationServer03Feedback" required> 
                </div>
            </div>
            <div class="col-2">
                <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="form-group form-floating">
                    <input type="text" id="nombre_prod" class="form-control" name="nombre">
                    <label for="nombre_prod">Producto</label>
                </div>
            </div>
            <div class="col-4">
                
                    <div class="form-goup form-floating">
                        <input type="number" min="1" step="1" class="form-control" name="cantidad" id="cantidad">
                        <label for="cantidad">Cantidad</label>
                    </div>
                
                <div class="col-12 d-flex justify-content-center">
                    <div id=""></div>
                </div>
            </div>
        </div>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnAddPedidoScan">Agregar producto</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Seleccione producto -->
<div class="modal fade" id="seleccion_producto" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog escan-prod modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectProdModalLabel">Seleccione producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body col-12">
                <div class="row">
                    <div class="col-10">
                        <select class="form-control mb-3" name="prodSelect" id="prodSelect">
                            <option value="" selected>Elija Producto</option>
                        <?php while ($prod = $productos->fetch_object()):?>
                            <option value="<?=$prod->cod_producto;?>"><?=$prod->nombre;?></option>
                        <?php endwhile ; ?>
                    </select>  
                    </div>
                    <div class="col-2">
                         <input type="text" class="form-floating form-control" name="stock" id="Modalstock" placeholder="Stock" disabled>
                    </div> 
                </div>
                <div class="col-12">
                    <div class="col-4">
                        <div class="form-floating">
                            <input type="number" min="1" step="1" class="form-control" name="cantidad" id="ModalcantidadPedida">
                            <label for="cantidad">Cantidad a solicitar</label>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <div id="msg"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnAddPedidoManual">Agregar producto</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Confirmar_ingreso" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <i class="text-center bi bi-hdd text-danger"></i>
        <label class="text-center mensaje" Style="margin-top: 20px" for="">¿Desea confirmar ingreso de pedido?</label> 
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x"></i>No</button>
          <button type="button" class="btn btn-primary"><i class="bi bi-check"></i>Si</button>
        </div>
      </div>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>