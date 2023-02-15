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
            <span class="input-group-text BotonBarra boton-active" title="Home">
            <a href="<?=base_url?>" class="titulo">Home</a>
            <a href="<?=base_url?>"><i class="bx bxs-home iconos"></i>
            </a>
            </span>
          </li>
          <li>
            <!--   TRABAJADOR  -->
            <span class="input-group-text BotonBarra" title="Trabajador">
            <a href="<?=base_url?>trabajador/menu_tabs" class="titulo">Trabajador</a>
            <a href="<?=base_url?>trabajador/menu_tabs">
            <i class="fas fa-users fa-fw iconos"></i>
            </a>
            </span>
          </li>
          <li>
            <!--   ENTREGA DE CARGO  -->
            <span class="input-group-text BotonBarra" title="Entrega de cargo">
            <a href="<?=base_url?>entregacargo/menu_tabs" class="titulo">Entrega de pedido</a>
            <a href="<?=base_url?>entregacargo/menu_tabs">
            <i class='bx bxs-calendar iconos'></i></a>
            </span>
          </li>
          <li>
            <!--   PRODUCTO  -->
            <span class="input-group-text BotonBarra" title="Producto">
            <a href="<?=base_url?>producto/menu_tabs" class="titulo">Productos</a>
            <a href="<?=base_url?>producto/menu_tabs">
            <i class='bx bxs-cube iconos'></i></a>
            </span>
          </li>
          <li>
            <!--   STOCK  -->
            <span class="input-group-text BotonBarra" title="Stock">
            <a href="<?=base_url?>stock/menu_tabs" class="titulo">Stock</a>
            <a href="<?=base_url?>stock/menu_tabs">
            <i class="bx bxs-component iconos"></i></a>
            </span>
          </li>
          <li>
            <!--   PROVEEDORES  -->
            <span class="input-group-text" title="Proveedores">
            <a href="<?=base_url?>proveedores/menu_tabs" class="titulo">Proveedores</a>
            <a href="<?=base_url?>proveedores/menu_tabs">
            <i class='bi bi-truck iconos'></i></a>
            </span>
          </li>
          <li>
            <!--   USUARIOS  -->
            <span class="input-group-text" title="Usuarios">
            <a href="<?=base_url?>usuario/menu_tabs" class="titulo">Usuarios</a>
            <a href="<?=base_url?>usuario/menu_tabs">
            <i class='bx bx-user iconos' ></i></a>
            </span>
          </li>
          <li>
            <!--   SALIR  -->
            <span class="input-group-text salida" title="Salir">
            <a href="#" data-bs-toggle="modal" data-bs-target="#Cerrar_sesion" class="titulo">Salir</a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#Cerrar_sesion">
            <i class='bx bx-exit bx-flip-horizontal iconos-salida' data-bs-toggle="modal" data-bs-target="#Cerrar_sesion"></i></a>
            </span>
          </li>
        </ul>
      </nav>
  </div>
</div>
</section>
<!-- Modal consulta-->
<div class="modal fade" id="Cerrar_sesion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <i class="text-center bi bi-door-open text-danger"></i>
    <label class="text-center mensaje" Style="margin-top: 20px" for="">¿Esta seguro de cerrar sesion?</label> 
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x"></i>No</button>
        <button type="button" class="btn btn-primary"><i class="bi bi-check"></i>Si</button>
      </div>
    </div>
  </div>
</div>