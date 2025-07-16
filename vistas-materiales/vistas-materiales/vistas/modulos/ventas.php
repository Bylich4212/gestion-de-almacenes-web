<?php

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar ventas
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt m-1"></i>Inicio</a></li>
              <li class="breadcrumb-item active">Administrar ventas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">

        <div class="card-header">

          <a href="crear-venta">

          <button class="btn btn-primary">
            
            Agregar venta

          </button>

          </a>

          <button type="button" class="btn btn-default float-right" id="daterange-btn">
            
            <span>
              
              <i class="far fa-calendar-times"></i> Rango de fecha

            </span>

            <i class="fa fa-caret-down"></i>

          </button>

        </div>

        <div class="card-body">

          <table class="table table-bordered table-striped dt-responsive tablas" style="width: 100%;">

            <thead>
              
              <tr>
                
                <th style="width:10px">#</th>
                <th>Código factura</th>
                <th>Cliente</th>
                <th>Vendedor</th>
                <th>Forma de pago</th>
                <th>Neto</th>
                <th>Total</th> 
                <th>Fecha</th>
                <th>Acciones</th>

              </tr>

            </thead>

            <tbody>

              <?php

                if(isset($_GET["fechaInicial"])){

                  $fechaInicial = $_GET["fechaInicial"];
                  $fechaFinal = $_GET["fechaFinal"];

                }else{

                  $fechaInicial = null;
                  $fechaFinal = null;

                }

                $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

                foreach ($respuesta as $key => $value) {

                  echo '<tr>

                  <td>'.($key+1).'</td>

                  <td>'.$value["codigo"].'</td>';

                  $itemCliente = "id";
                  $valorCliente = $value["id_cliente"];

                  $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                  echo '<td>'.$respuestaCliente["nombre"].'</td>';

                  $itemUsuario = "id";
                  $valorUsuario = $value["id_vendedor"];

                  $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                  echo '<td>'.$respuestaUsuario["nombre"].'</td>

                  <td>'.$value["metodo_pago"].'</td>

                  <td>Bs. '.number_format($value["neto"],2).'</td>

                  <td>Bs. '.number_format($value["total"],2).'</td>

                  <td>'.$value["fecha"].'</td>

                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-info btnImprimirFactura" codigoVenta="'.$value["codigo"].'">

                        <i class="fa fa-print">

                      </i></button>';

                      if($_SESSION["perfil"] == "Administrador"){

                      echo '<button class="btn btn-warning btnEditarVenta" idVenta="'.$value["id"].'"><i class="fas fa-pencil-alt text-white"></i></button>

                      <button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                      }

                    echo '</div>  

                  </td>

                </tr>';

                }

              ?>
              
            </tbody>
            
          </table>

          <?php

            $eliminarVenta = new ControladorVentas();
            $eliminarVenta -> ctrEliminarVenta();

          ?>

        </div>

      </div>

    </section>

  </div>