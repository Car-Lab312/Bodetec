<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Stock Productos</p>
</div>
<section class="pantalla-princ form-register">
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
          <input type="number" class="form-control" name="valor_in" id="validationvalor" placeholder="CP" aria-describedby="validationServer03Feedback" required> 
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
          <label for="nombre">Valor producto</label>
        </div>
      </div>
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
      <div class="col-lg-4 col-md-6 col-xs-12" style="width: 350px" disable>
        <div class="form-floating mb-3">
          <input type="tel" class="form-control" name="familia_in" id="validationfamilia" value="Solo se muestra y confirma dato" placeholder="CP" aria-describedby="validationServer03Feedback" required disabled> 
          <div id="validationServer03Feedback" class="invalid-feedback">
            * Ingreso obligatorio
          </div>
          <label for="nombre">Familia</label>
        </div>
      </div>
      <p></p>
      <div class="col-12 mt-3" align="right">
        <button class="w-60 btn btn-lg btn-primary" type="submit" name="add" id="add"><i class='bx bx-edit'></i>&nbsp;&nbsp;Guardar</button>
      </div>
      <p></p>
      <hr>
      <p></p>
      <table class="table table-striped table-hover">
        <thead class="estilo-tabla">
         <tr>
           <th>Codigo</th>
           <th>Nombre</th>
           <th>Descripcion</th>
           <th>Familia</th>
           <th>Valor</th>
         </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>Otto</td>
            <td>Otto</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>Otto</td>
            <td>Otto</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry the Bird</td>
            <td>Thornton</td>
            <td>Otto</td>
            <td>Otto</td>
          </tr>
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
        <button class="w-60 btn btn-lg btn-primary" type="submit" name="add" id="add"><i class='bx bx-revision' style='color:#ffffff'  ></i>&nbsp;&nbsp;Actualizar</button>
      </div>
    </form>
  </section>