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
        <thead>
         <tr>
           <th><font color="black">Rut</font></th>
           <th><font color="black">Nombre</font></th>
           <th><font color="black">Direccion</font></th>
           <th><font color="black">Email</font></th>
           <th><font color="black">Teléfono</font></th>
           <th class="text-center"><font color="black">Opcion</font></th>
         </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    <div class="col-12" align="right">
      <button class="w-60 btn btn-lg btn-primary" type="submit" name="actualizar" id="actualizar"><i class='bx bx-revision' style='color:#ffffff'  ></i>&nbsp;&nbsp;Actualizar</button>     
    </div>
  </section>