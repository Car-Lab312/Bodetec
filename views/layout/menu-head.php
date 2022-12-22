<nav class="full-box navbar-info shadow-lg pt-3 mb-5" style="height: 85; background-color: #2d1f83;">
	<div class="btn-group barra-notifi">
		<div class="roboto-medium text-center" style="color:#ffffff">
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
			<i class='bx bx-bell' title="Mi perfil"></i>
		</a>
	</div>
	<script src="assets/js/script.js"></script>
</nav>