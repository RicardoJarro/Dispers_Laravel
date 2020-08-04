@extends('admin.system.admin')
@section('titulo', 'Administración de pedidos')

@section('breadcrumb')
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection
@section('estilos')

<style>
    .btn_input {
        background: none !important;
        border: none;
        padding: 0 !important;
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
        <h3 class="card-title">Todas las compras</h3>

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
                        {{-- <th>Acciones</th> --}}
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
                                {{-- <a href="#" onclick="event.preventDefault(); this.parentNode.submit()">{{$pedido->id}}</a>
                                --}}
                                {{-- <a href="pages/examples/invoice.html"></a> --}}
                            </form>

                        </td>
                        <td>{{$pedido->order_details[0]->nombre_producto}}...</td>
                        <td>
                            @if ($pedido->estado=='pendiente')
                            <span class="badge badge-warning">{{$pedido->estado}}</span>
                            @else
                            <span class="badge badge-success">{{$pedido->estado}}</span>
                            @endif
                            

                        </td>
                        <td>{{$pedido->nombre_completo}}</td>
                        <td>
                            <div class="sparkbar" data-color="#00a65a" data-height="20">${{$pedido->total}}</div>
                        </td>
                        <td>
                            {{-- <a href="{{route('admin.cambiar.pedido',$pedido->id)}}" class="btn btn-block
                            btn-outline-success "> Enviado</a>
                        </td>
                    </tr> --}}
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
        {{-- <a href="" class="btn btn-sm btn-secondary float-right">Ver todos los pedidos</a> --}}
    </div>
    <!-- /.card-footer -->
</div>
<!-- /.card -->


@endsection