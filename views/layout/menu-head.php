<nav class="full-box navbar-info border-bottom">
	<div class="btn-group barra-notifi">
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
			<i class="fas fa-user-cog" title="Mi perfil"></i>
		</a>
		<ul class="dropdown-menu" style="width: 250px; height: 195px;">
             <li><div class="col-auto">
	         <img src="../../../fotos-usuarios/_hsb6.jpg" class="rounded-circle" width = "70" height = "70" style="background-color: brown;">
             </div>
	         </li>
             <li><div class="roboto-medium text-center" style="color:#2d1f83;">
        	 <p><?=$_SESSION['identity']->nombreUser?>&nbsp; 
             <?=$_SESSION['identity']->apellido?></p>
             <small class="roboto-condensed-light"><?=$_SESSION['identity']->cargo?></small>
    	     </div></li>
             <li><hr class="dropdown-divider"></li>
             <li><a class="dropdown-item" href="<?=base_url?>usuario/info">Ver mi perfil</a></li>
			</li>
		</ul>
		<i class='bx bx-dots-vertical-rounded'></i>
		<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
			<i class='bx bx-bell' title="Notificaciones"></i>
		</a>
		<ul class="dropdown-menu" style="width: 350px; height: 240px;">
			<li><a class="text-start text-decoration-none" style="margin-left: 10px; margin-right: 130px;" href="<?=base_url?>usuario/notificaciones">Ver mas</a>
			<a class="text-end text-decoration-none">Marcar visto todo</a><i class="bi bi-check-all"></i></li>
			<li><hr class="dropdown-divider"></li>
			 <li><a class="text-start text-decoration-none" style="margin-left: 10px;">Ver notificacion 1</a></li>
			 <li><a class="text-start text-decoration-none" style="margin-left: 10px;">Ver notificacion 2</a></li>
			 <li><a class="text-start text-decoration-none" style="margin-left: 10px;">Ver notificacion 3</a></li>
			</li>
		</ul>
	</div>
</nav>