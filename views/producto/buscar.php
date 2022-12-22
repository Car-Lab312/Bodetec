<div class="Titulos">
    <p class="text-center" id="titulo-usuario">Buscar Productos</p>
</div>
	<section class="pantalla-princ form-register">
		<div class="search">
			<div class="col-md-6 col-xs-12 row">
      <div class="col-lg-4 col-md-6 col-xs-12">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><box-icon name='barcode-reader'></box-icon></span>
          <input type="text" class="form-control" name="codigo_in" id="codigo_producto" placeholder="Codigo producto" aria-describedby="validationServer03Feedback" required> 
        </div>
      </div>
				<div class="col-auto">
					<button class="btn btn-primary mb-3"><i class='bx bx-search-alt-2'></i> Buscar</button>
				</div>
	    	</div>
	    </div>
	    <p></p>
			<p></p>
			<table class="table table-striped table-hover" id="tablaProductos">
        <thead>
         <tr>
           <th><font color="black">Codigo</font></th>
           <th><font color="black">Nombre producto</font></th>
           <th><font color="black">Descripcion</font></th>
           <th><font color="black">Valor</font></th>
         </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    <div class="col-12" align="right">
      <button class="w-60 btn btn-lg btn-primary" type="submit" name="actualizar" id="actualizar"><i class='bx bx-revision' style='color:#ffffff'  ></i>&nbsp;&nbsp;Actualizar</button>     
    </div>
	</section>