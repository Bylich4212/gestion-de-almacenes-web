 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary">

    <!-- Brand Logo -->
    <a href="inicio" class="brand-link">
      <img src="vistas/img/plantilla/icono-negro.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Ctrl. Mat. - Trifasica</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-header text-center" style="background: #666666"><b>MENU PRINCIPAL</b></li>

          <?php

          if ($_SESSION["perfil"] == "Administrador") {

  echo '<li class="nav-item has-treeview menu-open mt-2">
          <a href="inicio" class="nav-link active">
            <i class="nav-icon fas fa-home"></i>
            <p>Inicio</p>
          </a>
        </li>';
}

          
          

          if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

          echo '<li class="nav-item">
            <a href="materiales" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Materiales
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>';

          }

          if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

          echo '<li class="nav-item">
            <a href="mov-materiales" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Mov. Materiales
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>';

          }

          

          if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

          echo '<li class="nav-item">
            <a href="trabajadores" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Trabajadores
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>';

          }

          if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

          echo '<li class="nav-item">
            <a href="ver" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p> ver el Mov. del Material 
                
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>';
          
          echo '<li class="nav-item">
            <a href="resumen" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p> Resumen materiales
                
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>';

          }

         

          ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>