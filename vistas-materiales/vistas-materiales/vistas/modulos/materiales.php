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
            <h1>Administrar materiales
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt m-1"></i>Inicio</a></li>
              <li class="breadcrumb-item active">Administrar materiales</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">

        <div class="card-header">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMaterial">
            
            Agregar Material

          </button>

        </div>

        <div class="card-body">

          <table class="table table-bordered table-striped dt-responsive tablas" style="width: 100%;">

            <thead>
              
              <tr>
                
                <th style="width: 10px">#</th>
                <th>Codigo</th>
                <th>Material</th>
                <th>Unidad</th>
                <th>Acciones</th>

              </tr>

            </thead>

            <tbody>

              <?php

              $item = null;
              $valor = null;

              $categorias = ControladorMateriales::ctrMostrarMateriales($item, $valor);

              foreach ($categorias as $key => $value) {

                echo '<tr>
                
                      <td>'.($key+1).'</td>

                      <td>'.$value["cod_material"].'</td>

                      <td>'.$value["desc_material"].'</td>

                      <td>'.$value["und_material"].'</td>

                      <td>
                        
                        <div class="btn-group">
                          
                          <button class="btn btn-warning btnEditarMaterial" idMaterial="'.$value["id_material"].'" data-toggle="modal" data-target="#modalEditarMaterial"><i class="fas fa-pencil-alt text-white"></i></button>';

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

  <div class="modal fade" id="modalAgregarMaterial">

        <div class="modal-dialog">

          <div class="modal-content">

            <form role="form" method="post">

            <div class="modal-header" style="background: #3c8dbc; color: white">

              <h4 class="modal-title">Agregar material</h4>

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

                  <input type="number" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar código" required>

                  </div>
                  
                </div>

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-th"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="nuevoMaterial" placeholder="Ingresar material" required>

                  </div>
                  
                </div>

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-th"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="nuevaUnidad" placeholder="Ingresar unidad" required>

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

            $crearMaterial = new ControladorMateriales();
            $crearMaterial -> ctrCrearMaterial();

          ?>

          </div>

        </div>

  </div>

   <!-- Modal Editar Categoría -->

  <div class="modal fade" id="modalEditarMaterial">

        <div class="modal-dialog">

          <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

            <div class="modal-header" style="background: #3c8dbc; color: white">

              <h4 class="modal-title">Editar material</h4>

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

                  <input type="number" class="form-control input-lg" name="editarCodigo" id="editarCodigo" required>

                  <input type="hidden" name="idMaterial" id="idMaterial" required>

                  </div>
                  
                </div>

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-th"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="editarMaterial" id="editarMaterial" required>


                  </div>
                  
                </div>

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-th"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="editarUnidad" id="editarUnidad" required>


                  </div>
                  
                </div>

                
              </div>

            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-primary">Guardar</button>

            </div>

            <?php

              $editarMaterial = new ControladorMateriales();
              $editarMaterial -> ctrEditarMaterial();

            ?>

          </form>

          </div>

        </div>

  </div>

 