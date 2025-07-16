<?php

  session_start();

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Control Materiales| Trifasica</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="text/css" href="vistas/img/plantilla/icono-negro.jpg">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/responsive.bootstrap.min.css">

  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- SELECT2 -->
  <link rel="stylesheet" type="text/css" href="vistas/plugins/select2/css/select2.min.css"/>

  <link rel="stylesheet" type="text/css" href="vistas/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"/>

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/plugins/morris.js/morris.css">


  <!-- ============================================================
    =ESTILOS PARA USO DE DATATABLES BAJADOS CSS
    ===============================================================-->
    <link rel="stylesheet" href="vistas/dist/baj/jquery.dataTables.min.css">
    <link rel="stylesheet" href="vistas/dist/baj/responsive.dataTables.min.css">
    <link rel="stylesheet" href="vistas/dist/baj/buttons.dataTables.min.css">

    <link rel="stylesheet" href="vistas/dist/baj/fixedHeader.dataTables.min.css">

    <link rel="stylesheet" href="vistas/dist/baj/dataTables.dataTables.css">

  <!-- PLUGINS DE JAVASCRIPT -->

  <!-- jQuery -->
  <script src="vistas/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.js"></script>
  <!-- DataTables -->
  <script src="vistas/plugins/datatables/jquery.dataTables.js"></script>
  <script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

  <script src="vistas/plugins/datatables-bs4/js/dataTables.responsive.min.js"></script>
  <script src="vistas/plugins/datatables-bs4/js/responsive.bootstrap.min.js"></script>

  <!-- SELECT2 -->
  <script type="text/javascript" src="vistas/plugins/select2/js/select2.full.min.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>

  <!-- InputMask -->
  <script src="vistas/plugins/moment/moment.min.js"></script>
  <script src="vistas/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

  <!-- jQuery Number -->
  <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <!-- daterangepicker -->
  <script src="vistas/plugins/moment/moment.min.js"></script>
  <script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>

  <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
  <script src="vistas/plugins/raphael/raphael.min.js"></script>
  <script src="vistas/plugins/morris.js/morris.min.js"></script>

  <script src="vistas/plugins/chart.js/Chart.js"></script>

  <!-- ============================================================
    =LIBRERIAS PARA EXPORTAR A ARCHIVOS bajados
    ===============================================================-->
    
    <script src="vistas/dist/baj/buttons.colVis.min.js"></script>

    <script src="vistas/dist/baj/dataTables.rowGroup.js"></script>
    <script src="vistas/dist/baj/rowGroup.dataTables.js"></script>

     <!-- ============================================================
    =LIBRERIAS PARA USO DE DATATABLES bajados
    ===============================================================-->
    <script src="vistas/dist/baj/jquery.dataTables.min.js"></script>        
    <script src="vistas/dist/baj/dataTables.responsive.min.js"></script> 

     <script src="vistas/dist/baj/sum().js"></script>   

    <script src="vistas/dist/baj/dataTables.fixedHeader.min.js"></script>

    <script src="vistas/dist/baj/popper.min.js"></script>
    <script src="vistas/dist/baj/bootstrap.min.js"></script>

    <!-- Datatables bajados -->
    <link rel="stylesheet" href="vistas/dist/baj/datatables.min.css">
    

    <script src="vistas/dist/baj/dataTables.buttons.min.js"></script>
    <script src="vistas/dist/baj/buttons.html5.min.js"></script>

    <script src="vistas/dist/baj/pdfmake.min.js"></script>
    <script src="vistas/dist/baj/vfs_fonts.js"></script>
    <script src="vistas/dist/baj/buttons.flash.min.js"></script>
    <script src="vistas/dist/baj/buttons.print.min.js"></script>
    <script src="vistas/dist/baj/jszip.min.js"></script>
   <!--
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
   -->
    <style type="text/css">
    #tabla thead input {
    width: 100%;
    padding: 3px;
    box-sizing: border-box;
    margin-top: 5px;
    font-size: 12px;
}

#tabla thead th {
    padding-bottom: 10px;
}
</style>  

</head>
<body class="hold-transition sidebar-mini sidebar-collapse login-page">

<?php

  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

    echo '<div class="wrapper">';

    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/cabezote.php";

    /*=============================================
    MENU
    =============================================*/

    include "modulos/menu.php";

    /*=============================================
    CONTENIDO
    =============================================*/

    if(isset($_GET["ruta"])){

      if($_GET["ruta"] == "inicio" ||
         $_GET["ruta"] == "usuarios" ||
         $_GET["ruta"] == "categorias" ||
         $_GET["ruta"] == "productos" ||
         $_GET["ruta"] == "clientes" ||
         $_GET["ruta"] == "ventas" ||
         $_GET["ruta"] == "crear-venta" ||
         $_GET["ruta"] == "editar-venta" ||
         $_GET["ruta"] == "reportes" ||
         $_GET["ruta"] == "materiales" ||
         $_GET["ruta"] == "cat" ||
         $_GET["ruta"] == "trabajadores" ||
         $_GET["ruta"] == "mov-materiales" ||
         $_GET["ruta"] == "sistema-materiales" ||
         $_GET["ruta"] == "ver" ||
          $_GET["ruta"] == "resumen" ||
         $_GET["ruta"] == "salir"
        ){

        include "modulos/".$_GET["ruta"].".php";

      }else{

        include "modulos/404.php";

      }

    }else{

      include "modulos/inicio.php";

    }

    /*=============================================
    FOOTER
    =============================================*/

    include "modulos/footer.php";

    echo '</div>';


  }else{

    include "modulos/login.php";

  }

  ?>
  
<!-- ./wrapper -->

<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/ventas.js"></script>
<script src="vistas/js/reportes.js"></script>
<script src="vistas/js/materiales.js"></script>
<script src="vistas/js/cat.js"></script>
<script src="vistas/js/trabajadores.js"></script>
<script src="vistas/js/mov-materiales.js"></script>
<script src="vistas/js/sistema-materiales.js"></script>
<script src="vistas/js/ver.js"></script>
<script src="vistas/js/resumen.js"></script>
</body>
</html>
