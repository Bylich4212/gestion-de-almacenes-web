<?php

if($_SESSION["perfil"] == "Especial"){

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

            <h1>Crear venta

            </h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt m-1"></i>Inicio</a></li>

              <li class="breadcrumb-item active">Crear venta</li>

            </ol>

          </div>

        </div>

      </div>

    </section>

    <section class="content">

      <div class="row">

        <!--=====================================
        EL FORMULARIO
        ======================================-->
        
        <div class="col-lg-5 col-xs-12">

          <div class="card card-outline card-danger">

            <div class="card-header">
              
            </div>

            <form role="form" method="post" class="formularioVenta">

            <div class="card-body">

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->

                <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-user"></i></span>

                  </div>

                  <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                  <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                </div>

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->

                <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-key"></i></span>

                  </div>

                  <?php

                  $item = null;
                  $valor = null;

                  $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                  if(!$ventas){

                    echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001" readonly>';

                  }else{

                    foreach ($ventas as $key => $value) {
                    }

                    $codigo = $value["codigo"] +1;

                    echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';

                  }


                  ?>

                </div>

                <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================-->

                <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-users"></i></span>

                  </div>

                  <select class="form-control" name="seleccionarCliente" id="seleccionarCliente" required>

                    <option value="">Seleccionar Cliente</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                  </select>

                  <span class="input-group-text"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar Cliente</button></span>

                </div>

                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================-->

                <div class="form-group row nuevoProducto">

                    

                </div>

                <hr>

                <input type="hidden" id="listaProductos" name="listaProductos">


                <div class="row">

                  <!-- AGREGAR PRODUCTO -->

                  <div class="col-lg-4">

                    <button type="button" class="btn btn-default mb-3 d-xl-none d-lg-none btnAgregarProducto">Agregar producto</button>

                  </div>

                  <!-- IMPUESTOS Y TOTAL -->

                  <div class="col-lg-8 float-right">
                    
                    <table class="table">

                      <thead>
                        
                        <tr>
                          <th>Impuesto</th>
                          <th>Total</th>      
                        </tr>

                      </thead>

                      <tbody>
                        
                        <tr>
                      
                          <td style="width: 50%">
                            
                            <div class="input-group">
                           
                              <input type="number" class="form-control form-control-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>

                              <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>

                              <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                              <span class="input-group-text"><i class="fa fa-percent"></i></span>
                        
                            </div>

                          </td>

                          <td style="width: 50%">
                            
                            <div class="input-group">

                              <span class="input-group-text"><i class="ion ion-social-usd"></i></span>

                              <input type="text" class="form-control form-control-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>

                              <input type="hidden" name="totalVenta" id="totalVenta">

                        
                            </div>

                          </td>

                        </tr>

                      </tbody>
                      


                    </table>

                  </div>
                  
                </div>

                <hr>

                <!-- MÉTODO DE PAGO -->

                <div class="form-group">

                  <div class="row col-lg-6" style="padding-right: 0px">

                    <div class="input-group mb-3">

                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        <option value="">Seleccione método de pago</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="QR">Pago QR</option>                  
                      </select>                  

                    </div>

                  </div>

                  <div class="row cajasMetodoPago"></div>

                  <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">
                                    
                </div>
              
            </div>

            <div class="card-footer">
              
              <button type="submit" class="btn btn-primary float-right">Guardar venta</button>

            </div>

          </form>

          <?php

            $guardarVenta = new ControladorVentas();
            $guardarVenta -> ctrCrearVenta();
            
          ?>

          </div>

        </div>

        <!--=====================================
        LA TABLA DE PRODUCTOS
        ======================================-->

        <div class="col-lg-7 hidden-md hidden-sm hidden-xs">


          <div class="card card-outline card-warning">

            <div class="card-header with-border"></div>

            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive tablaVentas" style="width: 100%;">
                
                 <thead>

                   <tr>
                    <th style="width: 10px">#</th>
                    <th>Imagen</th>
                    <th>Código</th>
                    <th>Descripcion</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                  </tr>

                </thead>

              </table>

            </div>
          
          </div>

        </div>

      </div>

   </section>

</div>

<!-- Modal Agregar Cliente -->

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