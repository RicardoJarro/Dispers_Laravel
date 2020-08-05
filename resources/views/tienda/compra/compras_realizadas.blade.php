@extends('tienda/system/plantilla_general')

@section('titulo','Compra realizada')
@section('estilos')
<link rel="stylesheet" href="css/estilo_carrito_pago_compras.css">
@endsection
@section('contenido')

<div>
    <br>
    <h1>Compras Realizadas</h1>
</div>
<hr>
<div id="container-compras" class="no-seleccionable">

    @if( session('status') )
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('datos') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

    <!-- plantilla -->
    @forelse($compras->orders as $compra)
    <div class="compra-unitaria border m-2 rounded p-2 mano position-relative" id="item-pedido-unitario">
        <a href="{{route('ver_compra', $compra->id)}}">
            <div>
                {{-- <div class="container-imagen d-inline-block">
                                <img src="images/camisa-rubik_1_negro.jpg" class="h-100">
                            </div> --}}
                <div class="info-compra">
                    <h3 class="display-5 cod-compra ">Pedido #{{$compra->id}}</h3>
                    <div>
                        <div>
                            <p class="d-inline">Cantidad de productos: </p>
                            <p class="cantidad-productos d-inline">{{count($compra->order_details)}}</p>
                        </div>
                        <div>
                            <p class="d-inline">Estado: </p>
                            <p class="estado-pedido  d-inline">{{$compra->estado}}</p>
                        </div>
                        <div>
                            <p class="d-inline">Fecha: </p>
                            <p class="fecha-pedido  d-inline">{{$compra->fecha_creacion}}</p>
                        </div>
                    </div>
                </div>
                <div class="precio-pagado mr-3" style="text-align: right">
                    <p class="d-inline"><b>Total</b></p>
                    <br>
                    <p class="d-inline">{{$compra->total}} $</p>
                </div>
            </div>
        </a>
    </div>
    <!-- plantilla -->
    @empty
    <br>
    <div class="text-center">
        <p> Parece que no has relizado ninguna compra</p>
        <br>
        <div style="tex-cl">
            <i class="fas fa-shopping-cart fa-7x" style="color: #EA4A4A;"></i>
        </div>
        <br>
        <p> porque no vas a hecha un vistazo a nuestro productos</p>
    </div>
    @endforelse


</div>
@endsection