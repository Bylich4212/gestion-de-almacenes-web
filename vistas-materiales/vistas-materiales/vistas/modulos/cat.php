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
            <h1>Administrar categorías plantilla
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

          <div class="btn-agregar-categoria btnAgregar">
            <button type="button" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#modal-gestionar-categoria" data-dismiss="modal"> <i class="fas fa-plus-square"></i> Agregar Categoría</button>
          </div>

          <div style="width: 30%;" class="form-floating mx-1">
                                   
            <select id='buscadorProyectoTodos' name='buscadorProyectoTodos' style="width:100%">
                <option value=''>- Buscar Proyecto -</option>
            </select>

            <label>Buscar Proyecto: Activos-Pagados-Observados</label>

          </div>

        </div>

        <div class="card-body">

        <table id="tablaCat" class="table table-striped table-bordered nowrap" style="width:100%;">
            <thead class="bg-info">
                <tr>
                    <td style="width:5%;">Id</td>
                    <td>Categoria</td>
                    <td style="width:15%;">Fecha</td>
                    <td style="width:5%;">Acciones</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        </div>

      </div>

    </section>

  </div>

  <div class="modal fade" id="modal-gestionar-categoria">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <!-- ============================================================
            =MODAL HEADER
            ===============================================================-->
            <div class="modal-header bg-info">
                <h4 class="modal-title">Gestionar Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- ============================================================
            =MODAL BODY
            ===============================================================-->
            <div class="modal-body">
               <div class="row">
                   <div class="col-sm-4">
                        <div class="form-group">
                            <input type="hidden" id ="idCategoria" name ="categoria" value ="">
                            <label for="txtCategoria">Categoría</label>
                            <input type="text" class="form-control" name="categoria" id="txtCategoria" placeholder="Ingrese la categoría">
                        </div>
                   </div>
                   
               </div>
            </div>
            <!-- ============================================================
            =MODAL FOOTER
            ===============================================================-->
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
            </div>

        </div>

    </div>

</div>