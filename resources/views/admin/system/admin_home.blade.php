@extends('admin.system.admin')
@section('titulo','Sistema Para Administradores')

@section('usuarioID')
{{$var}}
@endsection

@section('contenido')


<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
        <h3>{{$num_ordenes}}</h3>

          <p>Ordenes Pendientes</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
      <a href="{{route('admin.order.index')}}" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
        <h3>$ {{$ganancia}}<sup style="font-size: 20px"></sup></h3>

          <p>Ganancias</p>
        </div>
        <div class="icon">
          <i class="fas fa-dollar-sign"></i>
          {{-- <i class="ion ion-stats-bars"></i> --}}
        </div>
      <a href="{{route('admin.order.todos')}}" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
        <h3>{{$num_usuarios}}</h3>

          <p>Usuarios Registrados</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
      <a href="{{route('admin.user.index2')}}" class="small-box-footer">Mas Información <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box " style="background-color: #48C9B0 ">
        <div class="inner">
          <h3>{{$num_productos}}</h3>

          <p>Productos en linea</p>
        </div>
        <div class="icon">
          <i class="fas fa-tshirt"></i>
        </div>
      <a href="{{route('admin.product.index')}}" class="small-box-footer">Mas Información<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>

</div><!-- /.container-fluid -->

@endsection