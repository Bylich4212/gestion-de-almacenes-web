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
            <h3><b>Administrar Movimiento de Materiales</b></h3>
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
                    <label class="form-label">Proyectos</label>
                    <select class="form-control" id="buscadorProyectoTodos" name="buscadorProyectoTodos" style="width:100%">
                        <option value=''>- Buscar Proyecto -</option>
                    </select>
              </div>
              <div class="col-md-2">
                <label class="form-label">Tipo Movimiento</label>
                <select class="form-control" id='tipoMovMat' name='tipoMovMat' style="width:100%">
                  <option value=""></option>
                  <option value="1">Retiro</option>
                  <option value="2">Adicional</option>
                  <option value="3">Devolucion</option>                 
                </select>
              </div>
              <div class="col-md-2">
                    <label class="form-label">Trabajador Entrega</label>
                    <select class="form-control" id='buscadorTrabajador' name='buscadorTrabajador' style="width:100%">    
                        <option value=''>- Buscar Trabajador -</option>
                    </select>
              </div>
              <div class="col-md-2">
                    <label class="form-label">Trabajador Recibe</label>
                    <select class="form-control" id='buscadorTrabajador2' name='buscadorTrabajador2' style="width:100%">    
                        <option value=''>- Buscar Trabajador -</option>
                    </select>
              </div>

              <div class="col-md-2">
                    <label class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="fechaMov" name="fechaMov">
              </div>

              <div class="col-md-1">
                <label class="form-label">Numero Reg</label>
                <input type="number" id="numRegistro" name="numRegistro" class="form-control" value="0" />
                
              </div>

              
            </div>  
            
            <hr>
            <h3><b>Agregar Material</b></h3>

           <div class="row"> 

               <div class="col-md-4">
                    <label class="form-label">Materiales</label>
                    <select class="form-control" id='buscadorMateriales' name='buscadorMateriales' style="width:100%">    
                        <option value=''>- Buscar Material -</option>
                    </select>
              </div> 

              <div class="col-md-2">
                <label class="form-label">Cantidad</label>
                <input type="number" min="0" step="0.01" id="cantidadMaterial" name="cantidadMaterial" class="form-control" />
              </div>


              <div class="col-md-2">
                <label class="form-label">Estado</label>
                <select class="form-control" id='estadoMat' name='estadoMat' style="width:100%">
                  <option value=""></option>
                  <option value="1">Nuevo</option>
                  <option value="2">Medio Uso</option>
                  <option value="3">Mal Estado</option>                  
                </select>
              </div>
              <div class="col-md-2">
                <label class="form-label">numero de serie</label>
                <input type="texto" min="0" step="0.01" id="num_serie" name="num_serie" class="form-control" value="0"/>
              </div>


              <!--
              <div class="col-md-3 btn-agregar-tmp btnAgregarTmp">
                  <button type="button" class="btn btn-info btn-sm mb-4" > <i class="fas fa-plus-square"></i> Agregar Categoría</button>
              </div>
              -->

              <div class="col-md-2 btn-agregar-tmp btnAgregarTmp">
                  <label class="form-label"></label>
                  <button type="button" class="btn btn-primary w-100">Agregar</button>
              </div>
             

        <div class="card-body">

                <table id="tablaMatTmp" class="table table-striped table-bordered nowrap" style="width:100%;">
                  <thead class="table-dark">
                    <tr>
                      <th>ID</th>
                      <th>Proyecto</th>
                      <th>Material</th>
                      <th>Cantidad</th>
                      <th>Num. Serie</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>

       <div class="col-md-2 btn-agregar-tmp btnAgregarTmp">
                  <label class="form-label"></label>
                  <button type="button" id="btn-registrotemp" class="btn btn-primary w-100">Registrar Materiales</button>
              </div>

    </section>

</div>
