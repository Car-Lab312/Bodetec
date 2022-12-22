<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Listar Proveedores</p>
</div>
<section class="pantalla-princ form-register">
    <form action="" class="container-fluid row">
      <table class="table table-striped table-hover mt-5">
        <thead>
         <tr>
           <th><font color="black">Rut</font></th>
           <th><font color="black">Nombre</font></th>
           <th><font color="black">Direccion</font></th>
           <th><font color="black">ciudad</font></th>
           <th><font color="black">Email</font></th>
           <th><font color="black">Telefono</font></th>
           <th colspan="2"><font color="black" class="text-center">Opciones</font></th>
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
              <td><a href="<?=base_url?>proveedores/editar&id=<?=$prov->id?>" class="btn btn-xss btn-primary"><i class='bx bxs-pencil'></i></a></td>
              <td><a data-id="<?=$prov->id?>" class="btn btn-xss btn-danger del" id="question" data-bs-toggle="modal" data-bs-target="#My_Delete"><i class='bx bx-minus-circle'></i></a></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
            <!-- Modal consulta-->
        <div class="modal fade" id="My_Delete" tabindex="-1" aria-hidden="true" aria-labelledby="My_Delete">
            <!-- Caja de dialogo -->
            <div class="modal-dialog">
            <!-- Contenido -->  
              <div class="modal-content">
                <div class="modal-header bg-warning">
                  <h5 class="modal-title">Confirmacion</h5>
                  <button class="btn-close" data-bs-dismiss="modal" aria-label="cerrar"></button>
                </div>
                <div class="modal-body">
                  <h4 class="pt-3 pb-3">La informacion se Eliminara  ¿Esta seguro? </h4>
                </div>
                <div class="modal-footer bg-warning">
                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                  <a class="btn btn-primary" id="acepta">Aceptar</a>     
                </div>
              </div>
            </div>
        </div>
      <!-- Fin modal consulta -->
    </form>
  </section>