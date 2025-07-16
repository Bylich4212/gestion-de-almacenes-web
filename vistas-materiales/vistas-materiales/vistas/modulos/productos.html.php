 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar productos
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt m-1"></i>Inicio</a></li>
              <li class="breadcrumb-item active">Administrar productos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">

        <div class="card-header">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
            
            Agregar producto

          </button>

        </div>

        <div class="card-body">

          <table class="table table-bordered table-striped dt-responsive tablas" style="width: 100%;">

            <thead>
              
              <tr>
                
                <th style="width:10px">#</th>
                <th>Imagen</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Agregado</th>
                <th>Acciones</th>

              </tr>

            </thead>

            <tbody>

              <tr>
                
                <td>1</td>
                <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                <td>0001</td>
                <td>Prod shshfhsh hshs dhshd ahdhaj</td>
                <td>Categoria 1</td>
                <td>20</td>
                <td>$ 5.00</td>
                <td>$ 10.00</td>
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

  <!-- Modal Agregar Usuario -->

  <div class="modal fade" id="modalAgregarProducto">

        <div class="modal-dialog">

          <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

            <div class="modal-header" style="background: #3c8dbc; color: white">

              <h4 class="modal-title">Agregar producto</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>
            <div class="modal-body">

              <div class="box-body">

                <!-- ENTRADA PARA EL CÓDIGO -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-code"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar código" required>

                </div>
                  
                </div>

                <!-- ENTRADA PARA LA DESCRIPCION -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-th"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripción" required>

                </div>
                  
                </div>

                <!-- ENTRADA PARA SELECCIONAR CATEGORIA -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-th"></i></span>

                  </div>

                  <select class="form-control input-lg" name="nuevaCategoria">
                    
                    <option value="">Seleccionar categoría</option>

                    <option value="Taladros">Taladros</option>

                    <option value="Andamios">Andamios</option>

                    <option value="Equipos para construcción">Equipos para construcción</option>

                  </select>

                </div>
                  
                </div>

                <!-- ENTRADA PARA STOCK -->

                <div class="form-group">

                  <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-check"></i></span>

                  </div>

                  <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>

                </div>
                  
                </div>

                <!-- ENTRADA PARA PRECIO COMPRA -->

                <div class="form-group row">

                  <div class="col-lg-6">

                      <div class="input-group mb-3">

                      <div class="input-group-prepend">

                        <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>

                      </div>

                      <input type="number" class="form-control input-lg" name="nuevoPrecioCompra" min="0" placeholder="Precio de compra" required>

                    </div>

                  </div>

                  <!-- ENTRADA PARA PRECIO VENTA -->

                  <div class="col-lg-6">

                      <div class="input-group mb-3">

                        <div class="input-group-prepend">

                          <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>

                        </div>

                        <input type="number" class="form-control input-lg" name="nuevoPrecioVenta" min="0" placeholder="Precio de venta" required>

                      </div>   

                  </div>
                  
                </div>

                <!-- ENTRADA PARA UTILIZAR PORCENTAJE -->

                <div class="form-group row">

                  <div class="col-lg-6"></div>

                  <div class="col-lg-2">

                      <label>
                        
                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar procentaje
                      </label>

                  </div>

                  <!-- ENTRADA PARA PORCENTAJE -->

                  <div class="col-lg-4">

                      <div class="input-group">

                        <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                        <div class="input-group-prepend">

                          <span class="input-group-text"><i class="fa fa-percent"></i></span>

                        </div> 

                      </div>   

                  </div>
                  
                </div>

                <!-- ENTRADA PARA SUBIR FOTO -->

                <div class="form-group">

                  <div class="panel">SUBIR IMAGEN</div>

                  <input type="file" id="nuevaImagen" name="nuevaImagen">

                  <p class="help-block">Peso máximo de la foto 2 MB</p>

                  <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="100px">
                  
                </div>

                
              </div>

            </div>

            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-primary">Guardar</button>

            </div>

          </form>

          </div>

        </div>

      </div>