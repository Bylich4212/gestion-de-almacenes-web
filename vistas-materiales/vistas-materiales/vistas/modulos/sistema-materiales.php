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
            <h1>Administrar categorías
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt m-1"></i>Inicio</a></li>
              <li class="breadcrumb-item active">Administrar categorías</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">

        <div class="card-header">

          <div class="row">
            
              <div class="col-md-3">
              
                 <label class="form-label">Codigo Proyecto</label>
                 <select id='buscadorProyecto' name='buscadorProyecto' style="width:100%">
                   <option value=''>- Buscar Proyecto -</option>
                 </select>
              </div>

            

            <div class="col-md-3">
              
              <h3>trabajadores</h3>              
              
            </div>

            <div class="col-md-3">
              
              <h3>fecha</h3>
              
            </div>


          </div>

        </div>

        <div class="card-body">

          <table class="table table-bordered table-striped dt-responsive tablas" style="width: 100%;">

            <thead>
              
              <tr>
                
                <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>Acciones</th>

              </tr>

            </thead>

            <tbody>

              <?php

              $item = null;
              $valor = null;

              $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

              foreach ($categorias as $key => $value) {

                echo '<tr>
                
                      <td>'.($key+1).'</td>

                      <td>'.$value["categoria"].'</td>

                      <td>
                        
                        <div class="btn-group">
                          
                          <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fas fa-pencil-alt text-white"></i></button>';

                          if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                          }

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

  