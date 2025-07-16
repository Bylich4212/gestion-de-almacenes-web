<?php

$item = null;
$valor = null;
$orden = "ventas";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

$colores = array("red","green","yellow","aqua","purple","blue","cyan","magenta","orange","gold");

$totalVentas = ControladorProductos::ctrMostrarSumaVentas();


?>

<div class="card card-warning card-outline">

  <div class="card-header">

    <h3 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Productos más vendidos</font></font></h3>

  </div>

  <div class="card-body">

    <div class="row">

      <div class="col-md-7">

        <div class="chart-responsive"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
          <canvas id="pieChart" height="164" width="330" class="chartjs-render-monitor" style="display: block; width: 165px; height: 82px;"></canvas>
        </div>

      </div>

      <div class="col-md-5">

        <ul class="chart-legend clearfix">

          <?php

          for($i =0; $i < 10; $i++){

            echo '<li><i class="far fa-circle text-'.$colores[$i].'"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> '.$productos[$i]["descripcion"].'</font></font></li>';

          }


          ?>

        </ul>

      </div>

    </div>

  </div>

  <div class="card-footer bg-white p-0">

    <ul class="nav nav-pills flex-column">

      <?php

        for($i =0; $i < 5; $i++){

          echo '<li class="nav-item">

                <a href="#" class="nav-link">
                  '.$productos[$i]["descripcion"].'
                  </font></font>

                  <span class="float-right text-'.$colores[$i].'">

                    <i class="fas fa-arrow-down text-sm"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    '.ceil($productos[$i]["ventas"]*100/$totalVentas["total"]).'%</font></font></span>
                </a>

              </li>';

        }


      ?>

    </ul>

  </div>

</div>

<script>

  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {

      <?php

          echo "labels: [
              '".$productos[0]["descripcion"]."', 
              '".$productos[1]["descripcion"]."', 
              '".$productos[2]["descripcion"]."', 
              '".$productos[3]["descripcion"]."', 
              '".$productos[4]["descripcion"]."', 
              '".$productos[5]["descripcion"]."', 
              '".$productos[6]["descripcion"]."',

          ],

          
          datasets: [
            {
              data: [".$productos[0]["ventas"].",".$productos[1]["ventas"].",".$productos[3]["ventas"].",".$productos[4]["ventas"].",".$productos[5]["ventas"].",".$productos[6]["ventas"]."],
              backgroundColor : ['".$colores[0]."', '".$colores[1]."', '".$colores[2]."', '".$colores[3]."', '".$colores[4]."', '".$colores[5]."', '".$colores[6]."'],
            }
          ]";

      ?>

    };
    var pieOptions     = {
      legend: {
        display: false
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'doughnut',
      data: pieData,
      options: pieOptions      
    })

  //-----------------
  //- END PIE CHART -
  //-----------------


</script>