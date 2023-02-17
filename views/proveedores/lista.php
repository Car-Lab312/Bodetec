<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Listar Proveedores</p>
</div>
<section class="pantalla-princ form-register">
<div class="search">
      <div class="col-md-6 col-xs-12 row">
        <div class="col-auto">
          <input type="text" class="form-control" id="rut_prov" name="rut_prov" placeholder="Rut, Nombre o Email" required>
        </div>
        <div class="col-auto">
          <button class="btn btn-primary mb-3"><i class='bx bx-search-alt-2'></i> Buscar</button>
        </div>
        </div>
      </div>
      <table class="table table-striped table-hover pt-5 tabla rounded-top">
        <thead class="estilo-tabla">
         <tr>
           <th>Rut</th>
           <th>Nombre</th>
           <th>Direccion</th>
           <th>ciudad</th>
           <th>Email</th>
           <th>Telefono</th>
           <th colspan="2" class="text-center">Opciones</th>
         </tr>
        </thead>
        <tbody>
          <?php while ($prov = $proveedores->fetch_object()): ?>
            <tr>
              <th scope="row"><?=$prov->rut;?></th> 
              <td><?=$prov->nombre;?></td>
              <td><?=$prov->direccion;?></td>
              <td><?=$prov->city;?></td>
              <td><?=$prov->email;?></td>
              <td><?=$prov->telefono;?></td>
              <!-- <td><a href="<?=base_url?>proveedores/editar&id=<?=$prov->id?>" class="btn btn-xss btn-primary"><i class='bx bxs-pencil'></i></a></td> -->
              <!-- <td><a data-id="<?=$prov->id?>" class="btn btn-xss btn-danger del" id="question" data-bs-toggle="modal" data-bs-target="#Eliminar"><i class='bx bx-minus-circle'></i></a></td> -->
              <td><a class="btn btn-xss btn-primary" id="question" data-bs-toggle="modal" data-bs-target="#Editar_prod"><i class='bx bxs-pencil'></i></a></td>
              <td><a class="btn btn-xss btn-danger del" id="question" data-bs-toggle="modal" data-bs-target="#Eliminar"><i class='bx bx-minus-circle'></i></a></td>
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
  <!-- Modal consulta-->
<div class="modal fade" id="Eliminar" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<i class="text-center bi bi-question-circle text-danger"></i>
<label class="text-center mensaje" Style="margin-top: 20px" for="">¿Seguro que desea eliminar el proveedor?</label> 
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x"></i>No</button>
<button type="button" class="btn btn-primary"><i class="bi bi-check"></i>Si</button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="Editar_prod" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Editar proveedor</h5>
<button class="btn-close" data-bs-dismiss="modal" aria-label="cerrar"></button>
</div>
<div class="modal-body" Style="margin-left: 10px">
<div class="row mt-1">
<div class="col-3">
<div class="form-group form-floating res">
  <input type="text" class="form-floating form-control" id="producto_in_scan" > 
  <label for="nombreProd">Rut</label>
</div>
</div>
<div class="col-4">
<div class="form-group form-floating res">
  <input type="text" class="form-floating form-control" id="producto_in_scan" > 
  <label for="nombreProd">Nombre</label>
</div>
</div>
<div class="col-5">
<div class="form-group form-floating res">
  <input type="text" class="form-floating form-control" id="producto_in_scan" > 
  <label for="nombreProd">Direccion</label>
</div>
</div>
</div>
<div class="row mt-3">
<div class="col-5">
<div class="form-group form-floating res">
  <input type="text" class="form-floating form-control" id="producto_in_scan" > 
  <label for="nombreProd">Region</label>
</div>
</div>
<div class="col-7">
<div class="form-group form-floating res">
  <input type="text" class="form-floating form-control" id="producto_in_scan" > 
  <label for="nombreProd">Ciudad</label>
</div>
</div>
</div>
<div class="row mt-3">
<div class="col-6">
<div class="form-group form-floating res">
  <input type="text" class="form-floating form-control" id="producto_in_scan" > 
  <label for="nombreProd">Email</label>
</div>
</div>
<div class="col-6">
<div class="form-group form-floating res">
  <input type="text" class="form-floating form-control" id="producto_in_scan" > 
  <label for="nombreProd">Telefono</label>
</div>
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