<link rel='stylesheet' href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
<link href="<?=base_url?>assets/css/login.css" rel="stylesheet">

<img class="fondo" src="<?=base_url?>assets/images/fondo-login.jpg">

<div class="login container d-flex justify-content-center" >
 <form class="p-5" style="width:400px;" method="POST" action="<?=base_url?>usuario/login" >
    	<div class="login-head">
			<img class="Logo_login" src="<?=base_url?>assets/images/Icono_paguina.png">
			<h1 class="inicio h3 mb-3 fw-normal"><font COLOR="blue">Inicio Sesion</font></h1>
		</div>
		<div class="form-floating input-group mb-3">
			<span class=" input-group-text login-icono">
				<i class="bi bi-envelope-at"></i>
			</span>
			<div class="form-floating" >
				<input type="email" name="email_log" class="form-control" id="floatingInput" value="csoto@transmarko.cl" placeholder="name@example.com">
				<label for="floatingInput">Ingrese email</label>
			</div>	
    	</div>
		<hr />
    	<div class="form-floating mt-3 input-group mb-3">
			<span class="input-group-text login-icono">
			<i class="bi bi-key-fill icono"></i>
			</span>
			<div class="form-floating">
				<input type="password" class="form-control" name="pass_log" value="252001" id="floatingPassword" placeholder="Password">
				<label for="floatingPassword">Ingrese contraseña </label>
			</div>	
    	</div>
    	<div class="checkbox mb-3">
      		<label>
        		<input type="checkbox" value="remember-me" > <font COLOR="blue">Mostrar contraseña</font>
      		</label>
    	</div>
    	<button class="w-100 btn btn-lg btn-primary" type="submit"><i class='bx bxs-lock-open-alt' ></i>Ingresar</button>
  	</form>
</div>
