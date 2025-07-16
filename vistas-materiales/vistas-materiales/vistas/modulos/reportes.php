<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Reportes de ventas
            </h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt m-1"></i>Inicio</a></li>

              <li class="breadcrumb-item active">Reportes de ventas</li>

            </ol>

          </div>

        </div>

      </div>

    </section>

    <section class="content">

      <div class="card">

        <div class="card-header">

          <button type="button" class="btn btn-default" id="daterange-btn2">
            
            <span>
              
              <i class="far fa-calendar-times"></i> Rango de fecha

            </span>

            <i class="fa fa-caret-down"></i>

          </button>
            
            <?php

              if(isset($_GET["fechaInicial"])){

                echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';

              }else{

                 echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte">';

              }         

            ?>

              <button class="btn btn-success float-right" style="margin-top: 5px;">Descargar reporte en excel</button>

            </a>

        </div>

        <div class="card-body">

          <div class="row">
            
            <div class="col-lg-12">

              <?php

                include "reportes/grafico-ventas.php";

              ?>
              
            </div>

            <div class="col-md-6 col-xs-12">

              <?php

                include "reportes/productos-mas-vendidos.php";

              ?>
              
            </div>

            <div class="col-md-6 col-xs-12">

              <?php

                include "reportes/vendedores.php";

              ?>
              
            </div>

           <!--  <div class="col-md-6 col-xs-12">

              <?php

                // include "reportes/compradores.php";

              ?>
              
            </div> -->

          </div>

        </div>

      </div>

    </section>

  </div>
