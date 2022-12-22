	<section class="pantalla-princ form-register">
		<h1 class="text-center">Trabajador</h1>
		<hr>
		<div class="search">
			<div class="col-md-6 col-xs-12 row">
				<div class="col-auto">
					<!-- <label for="rut" class="visually-hidden">Rut</label> -->
					<input type="text" class="form-control" id="rut" placeholder="12.232.211-5" required>
				</div>
				<div class="col-auto">
					<button class="btn btn-primary mb-3"><i class='bx bx-search-alt-2'></i> Buscar</button>
				</div>
	    	</div>
	    </div>
	    <div class="col-md-6 col-xs-12 mt-3 row">
	    	<div class="col-6 mb-3">
	    		<label for="nombre" class="form-label">Nombre</label>
				<input type="text" class="form-control" name="nombre" id="nombre">	
	    	</div>
	    	<div class="col-6 mb-3">
	    		<label for="apellido" class="form-label">Apellidos</label>
				<input class="form-control" type="text" name="apellido" id="apelido" placeholder="Apellidos">
	    	</div>
	    		    
		</div>
		<div class="col-md-6 col-xs-12 mb-3 row">
			<div class="col-6 mb-3">
				<label class="form-label" for="direccion">Direccion</label>
				<input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion">
			</div>
			<div class="col-6 mb-3">
				<label for="solicitudes" class="form-label">Solicitudes</label>
				<select class="form-control" name="solicitudes">
					<option>--Seleccione--</option>
					<option>Solicitud 1</option>
					<option>Solicitud 2</option>
					<option>Solicitud 3</option>
				</select>
			</div>	
		</div>
		<div class="col-12">
			<!-- <button class="w-60 btn btn-lg btn-primary" type="submit" name="consultar" id="consultar">Consultar</button> -->
			<button class="w-60 btn btn-lg btn-primary" type="submit" name="actualizar" id="actualizar"><i class='bx bx-edit'></i>&nbsp;&nbsp;Actualizar</button>			
		</div>
	</section>