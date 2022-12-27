<?php   $cargos = Utils::get_cargos();
        $productos = Utils::get_productos(); 
?>
<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Entregar a Trabajador</p>
</div>
<section class="pantalla-princ form-register row">
    <div class="col-md-3 col-xs-12 border border-opacity-10 p-5">
        <div class="form-floating mb-3">
                <input type="text" autocomplete="off" id="trabajador_input" name="trabajador_registro" class="form-control mb3 trinp">
                <label for="ciudad">Rut, nombre o email</label>
        </div>
    </div>
    <div class="col-md-9 col-xs-12 border border-opacity-10 p-5">
        <table class="table table-striped table-hover" id="tablaTrabajador">
            <thead class="estilo-tabla">
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Opcion</th>
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
    </div>
</section>
<section class="container">
    <form action="<?=base_url?>entregacargo/save" method="POST">
        <div class="col-12 mt-3 p-3 border d-flex row">
            <div class="col-3">
                <input type="hidden" name="id_trab" id="id_trab" value="<?=isset($trabajador) && is_object($trabajador) ? $trabajador->id_user : ''?>">
                <input type="text" name="rut_trab" class="form-control" id="rut_trab" value="<?=isset($trabajador) && is_object($trabajador) ? $trabajador->rut : ''?>" readonly>    
            </div>
            <div class="col-3">
                <input type="text" name="nombre" class="form-control" id="nombre_trab" value="<?=isset($trabajador) && is_object($trabajador) ? $trabajador->nombre : ''?>" readonly>
            </div>
            <div class="col-3">
                <input type="text" name="apellido" class="form-control" id="apellido_trab" value="<?=isset($trabajador) && is_object($trabajador) ? $trabajador->apellido : ''?>" readonly>
            </div>
            <div class="col-3">
                <input type="text" name="email" class="form-control" id="correo_trab" value="<?=isset($trabajador) && is_object($trabajador) ? $trabajador->email : ''?>" readonly>
            
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="button" class="btn btn-secondary btn-sm mt-2" id="borraDatos"><i class='bx bx-trash me-2'></i>Borrar</button>
            </div>
        </div>
        <div class="col-12 mt-3 p-2 border d-flex d-flex row">
            <div class="col-4 d-flex justify-content-end">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bx-barcode-reader me-2' ></i>Ingresar código</button>
            </div>
            <div class="col-4"></div>
            <div class="col-4">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#selectProdModal"><i class='bx bx-pencil me-2'></i>Ingreso manual</button>
            </div>
        </div>
        <div class="col-12  mt-3 p-1 border d-flex d-flex row">
            <table class="table table-striped table-hover" id="tablaProdTrabajador">
                <thead>
                    <tr>
                        <th><font color="black">Codigo</font></th>
                        <th><font color="black">Nombre</font></th>
                        <th><font color="black">Cantidad</font></th>
                    </tr>
                </thead>
                <tbody>
            
                </tbody>
            </table>
        </div>
        <div class="col-12 row mt-5">
            <div class="col-6 d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" id="cancelar"><i class='bx bx-x-circle me-2'></i> Cancelar</button>
            </div>
            <div class="col-6 d-flex justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mi-question"><i class='bx bx-save me-2'></i>Guardar</button>
            </div>
        </div>
    <!-- Modal consulta-->
    <div class="modal fade" id="mi-question" tabindex="-1" aria-hidden="true" aria-labelledby="mi-question">
        <!-- Caja de dialogo -->
        <div class="modal-dialog">
        <!-- Contenido -->  
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title">Confirmacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="cerrar"></button>
                </div>
                <div class="modal-body">
                    <h2 class="pt-3 pb-3"><i class='bx bx-message-rounded-error me-2' ></i>La informacion se guardará en la base de datos</h4>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" value="Aceptar">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Fin modal consulta -->
    </form>

</section>


    <!-- <form method="POST" class="container-fluid row pt-5 " style="width: 350px; ">
        <div class="col-lg-4 col-md-6 col-xs-12" style="width: 300px;">
            <div class="form-floating mb-3">
                <input type="text" autocomplete="off" id="trabajador_input" name="trabajador_registro" class="form-control mb3 trinp">
                <label for="ciudad">Rut, nombre o email de trabajador</label>
            </div>
            <p class="nomb"></p><p class="rt"></p>
        </div>
    
        <div class="col-12 mt-3" align="right">
            <button class="w-60 btn btn-lg btn-primary" type="submit" name="add" id="add"><i class='bx bx-edit'></i>&nbsp;&nbsp;Ingresar</button>
        </div> 
 


    
    </form>-->

<!-- Modal Buscandor de producto -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
  <div class="escan-prod modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Buscador de Producto</h5>
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
        <button type="button" class="btn btn-primary" id="btnAddPedidoScan">Agregar al pedido</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Seleccione producto -->
<div class="modal fade" id="selectProdModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-primary" id="btnAddPedidoManual">Agregar alpedido</button>
            </div>
        </div>
    </div>
</div>
