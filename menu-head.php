<nav class="full-box navbar-info border-bottom">
	<div class="btn-group barra-notifi">
		<div class="roboto-medium text-center" style="color:#2d1f83;">
        	<p><?=$_SESSION['identity']->nombreUser?>&nbsp; 
            <?=$_SESSION['identity']->apellido?></p>
            <small class="roboto-condensed-light"><?=$_SESSION['identity']->cargo?></small>
    	</div>
		<i class='bx bx-dots-vertical-rounded'></i>
		<a href="<?=base_url?>usuario/info">
			<i class="fas fa-user-cog" title="Mi perfil"></i>
		</a>
		<i class='bx bx-dots-vertical-rounded'></i>
		<a href="#">
			<i class='bx bx-bell' title="Notificaciones"></i>
		</a>
		<!-- <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" aria-expanded="false">
			<i class='bx bx-bell' title="Mi perfil"></i>
		</a>
	       <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="#">Third</a></li>
             <li><a class="dropdown-item" href="#">Fourth</a></li>
             <li><hr class="dropdown-divider"></li>
             <li><a class="dropdown-item" href="#">Ver notificaciones</a></li>
           </ul> 
		</li> -->
	</div>
	<!-- <script src="assets/js/script.js"></script> -->
</nav>