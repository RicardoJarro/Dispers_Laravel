@extends('admin.system.admin')
@section('titulo','Graficas de la tienda')
@section('breadcrumb')
<li class="breadcrumb-item active">Mashup de Google Charts</li>
@endsection
@section('contenido')


<div class="card">
  <div class="card-header">
    <h3 class="card-title">Analisis de Productos</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    <div class="col-lg-6 col-6 offset-md-3">
      <div id="chart_wrap">




        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var data = google.visualization.arrayToDataTable([   
                ['Seccion', 'Registros'],
                @forelse ($numprod_categoria as $categoria)
                ['{{$categoria->nombre}}',{{$categoria->products_count}}],
                @empty
               
                @endforelse
      
              ]);
      
              var options = {
                title: 'Productos en las categorias',
                is3D: false,
         
              };
      
              var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
              chart.draw(data, options);
            }
        </script>
        <div id="piechart_3d" style="width: 500px; height: 300px;"></div>
      </div>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">

  </div>
  <!-- /.card-footer-->
</div>


<div class="card">
  <div class="card-header">
    <h3 class="card-title">Usuarios que realizan compras</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    <div class="col-lg-6 col-6 offset-md-3">
      <div id="chart_wrap">

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var data = google.visualization.arrayToDataTable([   
                ['Seccion', 'Registros'],
                
                ['Usuarios con almenos una compra',{{$usuarios_compra}}],
                ['Usuarios que no han comprado',{{$user_no_compra}}],
                
                
      
              ]);
      
              var options = {
                title: 'Compras de usuarios',
                is3D: false,
         
              };
      
              var chart = new google.visualization.PieChart(document.getElementById('piechart_3dd'));
              chart.draw(data, options);
            }
        </script>
        <div id="piechart_3dd" style="width: 500px; height: 300px;"></div>
      </div>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">

  </div>
  <!-- /.card-footer-->
</div>






<div class="card">
  <div class="card-header">
    <h3 class="card-title">Acceso de usuarios</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
    <div class="col-lg-6 col-6 offset-md-3">
      <div id="chart_wrap">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawVisualization);
      
          function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
              ['', 'Facebook', 'Tienda'],
              ['Login',  {{$user_facebook}},      {{$user_dispers}}],
              
            ]);
      
            var options = {
      
              title : 'Login de Usuarios',
              // vAxis: {title: 'Cups'},
              hAxis: {title: ''},
              seriesType: 'bars',
              series: {5: {type: 'line'}}        };
      
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          }
        </script>
        <div id="chart_div" style="width: 500px; height: 300px;"></div>

      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
    <!-- /.card-footer-->
  </div>



  <br>











  @endsection