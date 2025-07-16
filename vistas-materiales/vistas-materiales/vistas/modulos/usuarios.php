<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

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
            <h1>Administrar usuarios
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt m-1"></i>Inicio</a></li>
              <li class="breadcrumb-item active">Administrar usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">

        <div class="card-header">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            
            Agregar usuario

          </button>

        </div>

        <div class="card-body">

          <table class="table table-bordered table-striped dt-responsive tablas" style="width: 100%;">

            <thead>
              
              <tr>
                
                <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Último login</th>
                <th>Acciones</th>

              </tr>

            </thead>

            <tbody>

              <?php

              $item = null;

              $valor = null;

              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

              // var_dump($usuarios);

              foreach ($usuarios as $key => $value) {

                echo '<tr>
                
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["usuario"].'</td>';

                        if($value["foto"] != ""){

                          echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                        }else{

                          echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                        

                        }

                        echo '<td>'.$value["perfil"].'</td>';

                        if($value["estado"] != 0){

                        echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                        }else{

                          echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                        }

                        echo '<td>'.$value["ultimo_login"].'</td>
                        <td>
                          
                          <div class="btn-group">
                            
                            <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-pencil-alt text-white"></i></button>

                            <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'" idActual="'.$_SESSION["id"].'"><i class="fa fa-times"></i></button>

                          </div>

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

  <!-- Modal Agregar Usuario -->

  <div class="modal fade" id="modalAgregarUsuario">

        <div class="modal-dialog">

          <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

            <div class="modal-header" style="background: #3c8dbc; color: white">

              <h4 class="modal-title">Agregar usuario</h4>

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

                    <span class="input-group-text"><i class="fas fa-user"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

                </div>
                  
                </div>

                <!-- ENTRADA PARA EL USUARIO -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-key"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

                </div>
                  
                </div>

                <!-- ENTRADA PARA CONTRASEÑA -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-lock"></i></span>

                  </div>

                  <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

                </div>
                  
                </div>

                <!-- ENTRADA PARA SELECCIONAR PERFIL -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-users"></i></span>

                  </div>

                  <select class="form-control input-lg" name="nuevoPerfil">
                    
                    <option value="">Seleccionar perfil</option>

                    <option value="Administrador">Administrador</option>

                    <option value="Especial">Especial</option>

                    <option value="Vendedor">Vendedor</option>

                  </select>

                </div>
                  
                </div>

                <!-- ENTRADA PARA SUBIR FOTO -->

                <div class="form-group">

                  <div class="panel">SUBIR FOTO</div>

                  <input type="file" class="nuevaFoto" name="nuevaFoto">

                  <p class="help-block">Peso máximo de la foto 2 MB</p>

                  <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                  
                </div>

                
              </div>

            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-primary">Guardar</button>

            </div>

            <?php

              $crearUsuario = new ControladorUsuarios();
              $crearUsuario -> ctrCrearUsuario();

            ?>

          </form>

          </div>

        </div>

  </div>

  <!-- Modal Editar Usuario -->

  <div class="modal fade" id="modalEditarUsuario">

        <div class="modal-dialog">

          <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

            <div class="modal-header" style="background: #3c8dbc; color: white">

              <h4 class="modal-title">Editar usuario</h4>

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

                    <span class="input-group-text"><i class="fas fa-user"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

                </div>
                  
                </div>

                <!-- ENTRADA PARA EL USUARIO -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-key"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="editarUsuario" value="" id="editarUsuario" readonly>

                </div>
                  
                </div>

                <!-- ENTRADA PARA CONTRASEÑA -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-lock"></i></span>

                  </div>

                  <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña" required>

                  <input type="hidden" id="passwordActual" name="passwordActual">

                </div>
                  
                </div>

                <!-- ENTRADA PARA SELECCIONAR PERFIL -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-users"></i></span>

                  </div>

                  <select class="form-control input-lg" name="editarPerfil">
                    
                    <option value="" id="editarPerfil"></option>

                    <option value="Administrador">Administrador</option>

                    <option value="Especial">Especial</option>

                    <option value="Vendedor">Vendedor</option>

                  </select>

                </div>
                  
                </div>

                <!-- ENTRADA PARA SUBIR FOTO -->

                <div class="form-group">

                  <div class="panel">SUBIR FOTO</div>

                  <input type="file" class="nuevaFoto" name="editarFoto">

                  <p class="help-block">Peso máximo de la foto 2 MB</p>

                  <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                  <input type="hidden" name="fotoActual" id="fotoActual">
                  
                </div>

                
              </div>

            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-primary">Guardar</button>

            </div>

            <?php

              $editarUsuario = new ControladorUsuarios();
              $editarUsuario -> ctrEditarUsuario();

            ?>

          </form>

          </div>

        </div>

  </div>

  <?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

  ?>