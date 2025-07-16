<?php

$item = null;
$valor = null;
$orden = "id";

$ventas = ControladorVentas::ctrSumaTotalVentas();

$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
$totalCategorias = count($categorias);

$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($clientes);

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
$totalProductos = count($productos);

?>


<div class="col-lg-3 col-6">

  <div class="small-box bg-info">

    <div class="inner">

      <h3>Bs. <?php echo number_format($ventas["total"],2); ?></h3>

      <p>Ventas</p>

    </div>

    <div class="icon">

      <i class="ion ion-social-usd"></i>

    </div>

    <a href="ventas" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>

  </div>

</div>

<div class="col-lg-3 col-6">

  <div class="small-box bg-success">

    <div class="inner">

      <h3><?php echo number_format($totalCategorias); ?></h3>

      <p>Categorías</p>

    </div>

    <div class="icon">

      <i class="ion ion-clipboard"></i>

    </div>

    <a href="categorias" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>

  </div>

</div>

<div class="col-lg-3 col-6">

  <div class="small-box bg-warning">

    <div class="inner">

      <h3><?php echo number_format($totalClientes); ?></h3>

      <p>Clientes</p>

    </div>

    <div class="icon">

      <i class="ion ion-person-add"></i>

    </div>

    <a href="clientes" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>

  </div>

</div>

<div class="col-lg-3 col-6">

  <div class="small-box bg-danger">

    <div class="inner">

      <h3><?php echo number_format($totalProductos); ?></h3>

      <p>Productos</p>

    </div>

    <div class="icon">

      <i class="ion ion-ios-cart"></i>

    </div>

    <a href="usuarios" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>

  </div>

</div>