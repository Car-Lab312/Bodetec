<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Buscar Productos</p>
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
	    <p></p>
			<p></p>
			<table class="table table-striped table-hover tabla rounded-top" id="tablaProductos">
        <thead class="estilo-tabla">
         <tr>
           <th>Codigo</th>
           <th>Nombre producto</th>
           <th>Descripcion</th>
           <th>Valor</th>
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
	</section>