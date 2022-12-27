<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Buscar Proveedores</p>
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
      <p></p>
      <p></p>
      <table class="table table-striped table-hover" id="tablaProveedores">
        <thead class="estilo-tabla">
         <tr>
           <th>Rut</th>
           <th>Nombre</th>
           <th>Direccion</th>
           <th>Email</th>
           <th>Teléfono</th>
           <th class="text-center">Opcion</th>
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
    <div class="col-12" align="right">
      <button class="w-60 btn btn-lg btn-primary" type="submit" name="actualizar" id="actualizar"><i class='bx bx-revision' style='color:#ffffff'  ></i>&nbsp;&nbsp;Actualizar</button>     
    </div>
  </section>