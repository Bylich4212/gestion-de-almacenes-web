 <?php

if($_SESSION["perfil"] == "Vendedor"){

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
            <h1>Administrar trabajadores
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt m-1"></i>Inicio</a></li>
              <li class="breadcrumb-item active">Administrar trabajadores</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">

        <div class="card-header">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTrabajador">
            
            Agregar trabajador

          </button>

        </div>

        <div class="card-body">

          <table class="table table-bordered table-striped dt-responsive tablas" style="width: 100%;">

            <thead>
              
              <tr>
                
                <th style="width: 10px">#</th>
                <th>Nombres</th>
                <th>Cargo</th>
                <th>Estado</th>
                <th>Acciones</th>

              </tr>

            </thead>

            <tbody>

              <?php

              $item = null;
              $valor = null;

              $categorias = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);

              foreach ($categorias as $key => $value) {

                echo '<tr>
                
                      <td>'.($key+1).'</td>

                      <td>'.$value["nombres"].'</td>

                      <td>'.$value["cargo"].'</td>

                      <td>'.$value["estado"].'</td>

                      <td>
                        
                        <div class="btn-group">
                          
                          <button class="btn btn-warning btnEditarTrabajador" idTrabajador="'.$value["id_trabajador"].'" data-toggle="modal" data-target="#modalEditarTrabajador"><i class="fas fa-pencil-alt text-white"></i></button>';

                        echo '</div>

                      </td>

                    </tr>';

              }

              ?>
              
            </tbody>
            
          </table>

        </div>

      </div>

    </section>

  </div>

  <!-- Modal Agregar Categoría -->

  <div class="modal fade" id="modalAgregarTrabajador">

        <div class="modal-dialog">

          <div class="modal-content">

            <form role="form" method="post">

            <div class="modal-header" style="background: #3c8dbc; color: white">

              <h4 class="modal-title">Agregar trabajador</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>
            <div class="modal-body">

              <div class="box-body">

                <!-- ENTRADA PARA EL NOMBRE -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-th"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="nuevoTrabajador" placeholder="Ingresar nombre completo" required>

                  </div>
                  
                </div>

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-th"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="nuevoCargo" placeholder="Ingresar cargo" required>

                  </div>
                  
                </div>
                
              </div>

            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-primary">Guardar</button>

            </div>

          </form>

          <?php

            $creartrabajador = new ControladorTrabajadores();
            $creartrabajador -> ctrCrearTrabajador();

          ?>

          </div>

        </div>

  </div>

   <!-- Modal Editar Categoría -->

  <div class="modal fade" id="modalEditarTrabajador">

        <div class="modal-dialog">

          <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

            <div class="modal-header" style="background: #3c8dbc; color: white">

              <h4 class="modal-title">Editar trabajador</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>
            <div class="modal-body">

              <div class="box-body">

                <!-- ENTRADA PARA EL NOMBRE -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-th"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" required>

                  <input type="hidden" name="idTrabajador" id="idTrabajador" required>

                  </div>
                  
                </div>

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-th"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="editarCargo" id="editarCargo" required>


                  </div>
                  
                </div>

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-th"></i></span>

                  </div>

                  <input type="number" min="0" max="1" class="form-control input-lg" name="editarEstado" id="editarEstado" required>


                  </div>
                  
                </div>

                
              </div>

            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-primary">Guardar</button>

            </div>

            <?php

              $editarTrabajador = new ControladorTrabajadores();
              $editarTrabajador -> ctrEditarTrabajador();

            ?>

          </form>

          </div>

        </div>

  </div>

 