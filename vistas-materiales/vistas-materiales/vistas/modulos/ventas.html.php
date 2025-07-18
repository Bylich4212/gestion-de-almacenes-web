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

              <tr>

              <td>1</td>

              <td>1000123</td>

              <td>Juan Villegas</td>

              <td>Julio Gómez</td>

              <td>TC-12412425346</td>

              <td>$ 1,000.00</td>

              <td>$ 1,190.00</td>

              <td>2017-12-11 12:05:32</td>

              <td>

                <div class="btn-group">
                    
                  <button class="btn btn-info"><i class="fa fa-print"></i></button>

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