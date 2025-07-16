 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar clientes
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt m-1"></i>Inicio</a></li>
              <li class="breadcrumb-item active">Administrar clientes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">

        <div class="card-header">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
            
            Agregar cliente

          </button>

        </div>

        <div class="card-body">

          <table class="table table-bordered table-striped dt-responsive tablas" style="width: 100%;">

            <thead>
              
              <tr>
                
                <th style="width:10px">#</th>
                <th>Nombre</th>
                <th>Documento ID</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Fecha nacimiento</th> 
                <th>Total compras</th>
                <th>Última compra</th>
                <th>Ingreso al sistema</th>
                <th>Acciones</th>

              </tr>

            </thead>

            <tbody>

              <tr>

                <td>1</td>

                <td>Juan Villegas</td>

                <td>8161123</td>

                <td>juan@hotmail.com</td>

                <td>555 57 67</td>

                <td>calle 27 # 40 - 36</td>

                <td>1982-15-11</td>

                <td>2017-12-11 12:05:32</td>

                <td>35</td>

                <td>2017-12-11 12:05:32</td>

                <td>

                  <div class="btn-group">
                      
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt text-white"></i></button>

                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                  </div>  

                </td>

            </tr>
              
            </tbody>
            
          </table>

        </div>

      </div>

    </section>

  </div>

  <!-- Modal Agregar Categoría -->

  <div class="modal fade" id="modalAgregarCliente">

        <div class="modal-dialog">

          <div class="modal-content">

            <form role="form" method="post">

            <div class="modal-header" style="background: #3c8dbc; color: white">

              <h4 class="modal-title">Agregar cliente</h4>

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

                  <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

                  </div>
                  
                </div>

                <!-- ENTRADA PARA EL DOCUMENTO ID -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-key"></i></span>

                  </div>

                  <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" required>

                  </div>
                  
                </div>

                <!-- ENTRADA PARA EL EMAIL -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>

                  </div>

                  <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

                  </div>
                  
                </div>

                <!-- ENTRADA PARA EL TELÉFONO -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-phone"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'999-999-999'" data-mask required>

                  </div>
                  
                </div>

                <!-- ENTRADA PARA LA DIRECCIÓN -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

                  </div>
                  
                </div>

                <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>

                  </div>

                  <input type="date" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" required>

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

            $crearCliente = new ControladorClientes();
            $crearCliente -> ctrCrearCliente();

          ?>

          </div>

        </div>

      </div>