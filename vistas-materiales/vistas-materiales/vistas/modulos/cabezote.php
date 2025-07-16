 <!-- Barra de navegación -->

 <!-- Barra de navegación -->

 <nav class="main-header navbar navbar-expand navbar-white navbar-light">

 	<ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

	  <li class="nav-item d-none d-sm-inline-block">

      <a class="nav-link">Hola <?php echo $_SESSION["perfil"]; ?>

      	</a>

      </li>
  	</ul>

  	<!-- Right navbar links -->
     
      <!-- Notifications Dropdown Menu -->
      <div class="navbar-custom-menu ml-auto">

	 	<ul class="nav navbar-nav">

	 		<li class="dropdown user user-menu">

	 			<a href="inicio" class="dropdown-toggle" data-toggle="dropdown">

	 				<?php

	 					if($_SESSION["foto"] != ""){

	 						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';
	 					}else{

	 						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

	 					}

	 				?>
	 				
	 				<span class="hidden-xs text-dark m-1"><?php echo $_SESSION["nombre"]; ?></span>

	 			</a>

	 			<!-- Dropdown-toggle -->

			 	<ul class="dropdown-menu">

			 		<li class="user-body">
			 			
			 			<div class="pull-right">
			 				
			 				<a href="salir" class="btn btn-default btn-flat">Salir</a>

			 			</div>

			 		</li>
			 		
			 	</ul>
	 			
	 		</li>
	 		
	 	</ul>
	 	
	 </div>


 </nav>

	 




