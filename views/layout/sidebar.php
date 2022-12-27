<link rel='stylesheet' href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
<section class="full-box nav-lateral border-end">
<div class='nav-lateral-cerrado'>
  <div class="full-box nav-lateral-content">
    <div class="name_page_expandir">
      <i class="fas fa-bars show-nav-lateral" ></i>
    </div>
    <div class="full-box nav-lateral-bar"></div>
      <nav class="full-box nav-lateral-menu">
        <ul class="mt-3 ">
          <li>
            <!--   HOME  -->
            <span class="input-group-text espacio BotonBarra">
            <a href="<?=base_url?>" class="titulo">Home</a>
            <a href="<?=base_url?>">
            <i class="bx bxs-home iconos" ></i>
            </a>
            </span>
          </li>
          <li>
            <!--   TRABAJADOR  -->
            <span class="input-group-text BotonBarra">
            <a href="<?=base_url?>trabajador/menu_tabs" class="titulo">Trabajador</a>
            <a href="<?=base_url?>trabajador/menu_tabs">
            <i class="fas fa-users fa-fw iconos"></i>
            </a>
            </span>
          </li>
          <li>
            <!--   ENTREGA DE CARGO  -->
            <span class="input-group-text BotonBarra">
            <a href="<?=base_url?>entregacargo/menu_tabs" class="titulo">Entrega de cargo</a>
            <a href="<?=base_url?>entregacargo/menu_tabs">
            <i class='bx bx-notepad iconos'></i></a>
            </span>
          </li>
          <li>
            <!--   PRODUCTO  -->
            <span class="input-group-text BotonBarra">
            <a href="<?=base_url?>producto/menu_tabs" class="titulo">Productos</a>
            <a href="<?=base_url?>producto/menu_tabs">
            <i class='bx bx-cart iconos'></i></a>
            </span>
          </li>
          <li>
            <!--   STOCK  -->
            <span class="input-group-text BotonBarra">
            <a href="<?=base_url?>stock/menu_tabs" class="titulo">Stock</a>
            <a href="<?=base_url?>stock/menu_tabs">
            <i class="fas fa-file-invoice-dollar fa-fw iconos"></i></a>
            </span>
          </li>
          <li>
            <!--   PROVEEDORES  -->
            <span class="input-group-text">
            <a href="<?=base_url?>proveedores/menu_tabs" class="titulo">Proveedores</a>
            <a href="<?=base_url?>proveedores/menu_tabs">
            <i class='bx bx-buildings iconos'></i></a>
            </span>
          </li>
          <li>
            <!--   USUARIOS  -->
            <span class="input-group-text">
            <a href="<?=base_url?>usuario/menu_tabs" class="titulo">Usuarios</a>
            <a href="<?=base_url?>usuario/menu_tabs">
            <i class='bx bx-user iconos' ></i></a>
            </span>
          </li>
          <li>
            <!--   SALIR  -->
            <span class="input-group-text salida">
            <a href="#" class="titulo">Salir</a>
            <a href="#">
            <i class='bx bx-exit bx-flip-horizontal iconos-salida' ></i></a>
            </span>
          </li>
        </ul>
      </nav>
  </div>
</div>
</section>