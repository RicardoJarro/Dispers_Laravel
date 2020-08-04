@extends('admin.system.admin')
@section('titulo', 'Administración de pedidos')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection
@section('estilos')

<style>
  .btn_input {
  background: none!important;
  border: none;
  padding: 0!important;
  /*optional*/
  font-family: arial, sans-serif;
  /*input has OS specific font-family*/
  color: #069;
  /* text-decoration: underline; */
  cursor: pointer;
}
</style>
    
@endsection

@section('contenido')

<!-- TABLE: LATEST ORDERS -->
<div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Compras pendientes</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button> --}}
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
          <tr>
            <th>Pedido ID</th>
            <th>Item</th>
            <th>Estado</th>
            <th>Cliente</th>
            <th>Total</th>
            <th>Acciones</th>
          </tr>
          </thead>
          <tbody>
            @forelse ($pedidos as $pedido)
            <tr>            
              <td>
                <form name="myform" action="{{route('admin.order.factura')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$pedido->id}}">
                <input type="submit" class="btn_input" value="{{$pedido->id}}">
                  {{-- <a href="#" onclick="event.preventDefault(); this.parentNode.submit()">{{$pedido->id}}</a> --}}
                  {{-- <a href="pages/examples/invoice.html"></a> --}}
                </form>

              </td>
              <td>{{$pedido->order_details[0]->nombre_producto}}...</td>
              <td><span class="badge badge-warning">{{$pedido->estado}}</span></td>
              <td>{{$pedido->nombre_completo}}</td>
              <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20">${{$pedido->total}}</div>
              </td>
              <td>
              <a href="{{route('admin.cambiar.pedido',$pedido->id)}}" class="btn btn-block btn-outline-success "> Enviado</a>
                      </td>
            </tr>
            @empty
                
            @endforelse
          
          </tbody>
        </table>
        {{ $pedidos->appends($_GET)->links() }}
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> --}}
    <a href="{{route('admin.order.todos')}}" class="btn btn-sm btn-secondary float-right">Ver todos los pedidos</a>
    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->


{{-- <div id="confirmareliminar" class="row">
  <span style="display:none;" id="urlbase">{{route('admin.order.index')}}</span>
  @include('custom.modal_eliminar')
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de ordenes</h3>

          <div class="card-tools">
            
            <form>              
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="nombre" class="form-control float-right" 
                placeholder="Buscar"
                value="{{ request()->get('nombre') }}">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>

          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 550px;">
                <a class=" m-2 float-right btn btn-primary"  href="{{ route('admin.category.create') }}">Crear</a>
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Slug</th>
                <th>Descripción</th>
                <th>Fecha creación</th>
                <th>Fecha modificación</th>
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($categorias as $categoria)
               
                    <tr>
                        <td> {{$categoria->id }} </td>
                        <td> {{$categoria->nombre }} </td>
                        <td> {{$categoria->slug }} </td>
                        <td> {{$categoria->descripcion }} </td>
                        <td> {{$categoria->created_at }} </td>
                        <td> {{$categoria->updated_at }} </td>

                        <td> <a class="btn btn-default"  
                            href="{{ route('admin.category.show',$categoria->slug) }}">Ver</a>
                        </td>

                        <td> <a class="btn btn-info" 
                            href="{{ route('admin.category.edit',$categoria->slug) }}">Editar</a>
                        </td>

                        <td> <a class="btn btn-danger" 
                            href="{{ route('admin.category.index') }}" 
                            v-on:click.prevent="deseas_eliminar({{$categoria->id}})"
                            >Eliminar</a>
                        </td>
                        
                    </tr>
                @endforeach
             
              
            </tbody>
          </table>
          {{ $categorias->appends($_GET)->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div> --}}
  <!-- /.row -->
 @endsection   