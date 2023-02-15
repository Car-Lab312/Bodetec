<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Cantidad Productos</p>
</div>
<section class="pantalla-princ form-register">
<div class="search">
		  <div class="col-md-6 col-xs-12 row">
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Fecha inicio</span>
            <input type="date" class="form-control" name="codigo_in" id="codigo_producto" placeholder="Codigo producto" aria-describedby="validationServer03Feedback" required> 
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Fecha Final</span>
            <input type="date" class="form-control" name="codigo_in" id="codigo_producto" placeholder="Codigo producto" aria-describedby="validationServer03Feedback" required> 
          </div>
        </div>
			  <div class="col-auto">
			  	<button class="btn btn-primary mb-3"><i class='bx bx-search-alt-2'></i> Buscar</button>
	      </div>
	    </div>
      <p></p>
      <hr>
      <table class="table table-striped table-hover">
        <thead class="estilo-tabla">
         <tr>
           <th>Fecha actualizada</th>
           <th>Codigo</th>
           <th>Nombre</th>
           <th>Familia</th>
           <th>Stock</th>
           <th>Valor</th>
         </tr>
        </thead>
        <tbody>
          <?php $totalFinal=0;?>
          <?php while($producto = $stock->fetch_object()):?>
            <tr>
              <td></td>
              <td><?=$producto->cod_producto?></td>
              <td><?=$producto->nombre?></td>
              <td><?=$producto->familia?></td>
              <td><?=$producto->stock?></td>
              <td><?=$producto->valor?></td>
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
      <div class="col-12" align="right">
        <button class="w-60 btn btn-lg btn-primary" type="submit" name="add" id="add"><i class='bx bx-revision' style='color:#ffffff'  ></i>Actualizar</button>
      </div>
    </form>
  </section>