
@extends('tienda/system/plantilla_general')

@section('titulo','Carrito de compras')
@section('estilos')
<link rel="stylesheet" href="css/estilo_carrito_pago_compras.css">
@endsection
@section('contenido')
    <div class="container-fluid">        
            <div class="position-relative">
                <br>
                <h2 class="display-4">Cesta de productos</h2>
                {{-- <p id="btn-vaciar-carrito"><i class="fas fa-trash mano"></i></p> --}}
                <form action="{{route('carrito.vaciar')}}" method="post">
                    @csrf
                    <input type="hidden" name='id' >
                    <button class="delete btn btn-vaciar-carrito " type="submit"><i class="fas fa-trash mano"></i>
                    </button>
                </form>

                <hr class="separador-carrito">
            </div>
            @if (count(Cart::getContent()))
            <!-- PRODUCTOS EN LA CESTA-PARTE IZQUIERDA -->
            <div class="row">
                <div class="col col-xs-12 col-sm-12 col-md-7 col-lg-7 container-iquierdo">                            
                <div class="container carrito w-100">
                    @foreach (Cart::getContent() as $item) 
                    <!-- Plantila-->
                    <div class="row item-carrito border rounded w-100 p-2">
                        <div class="container-imagen d-inline-block col-3">
                            <img src="{{$item->attributes->imageurl}}" class="h-100">
                        </div>
                        <div class="info-item-carrito d-inline-block col-8 position-relative">
                        <a href="#"><h4>{{$item->name}}</h4></a>
                                {{-- <h6 class="d-inline">Color: </h6>
                                <h6 class="d-inline">negro</h6> --}}                                    
                                    <h5 class="d-inline-block">Cantidad:</h5>
                                        <h6>{{$item->quantity}}</h6>                                    
                                    <h5 class="d-inline-block">Precio Unitario</h5>
                                        <h6>{{$item->price}} $</h6>
                                    <h5 class="d-inline-block">Subtotal Producto</h5>
                                        <h6>{{$item->price * $item->quantity}} $</h6> 
                                        <form action="{{route('carrito.remover')}}" method="post">
                                            @csrf
                                            <input type="hidden" name='id' value="{{$item->id}}">
                                            <button type="submit" class="btn-danger border-0 btn-elimina-producto float-right">
                                                <i class="fas fa-trash"></i></button>

                                        </form>                                 
                        </div>                                                
                    </div>
                    <br>
                    @endforeach
                    <!-- Plantila-->                 
                </div>

            </div>

            <!-- EESUMEN DEL PEDIDO-->
            <div class="col col-12 col-sm-12 col-md-5 col-lg-5 border-0">
                <div id="container-resumen-carrito" class=" border rounded p-3">
                    <h4>Resumen del pedido</h4>
                    <div class="mt-3 position-relative">
                        <p class="texto-resumen-pedido">Subtotal</p>
                        <p class="valor-resumen" id="subtotal-resumen-pedido"><b>{{number_format(Cart::getSubTotal(),2)}} $</b></p>
                    </div>
                    <div class="position-relative">
                        <p class="texto-resumen-pedido">Envio</p>
                        <p class="valor-resumen" id="envio-resumen-pedido"><b>5,00 $</b></p>
                    </div>
                    <hr>
                    <div class="position-relative">
                        <p class="float-right" id="total-resumen-pedido"><b>{{number_format(Cart::getTotal(),2)}}$</b></p>
                        <p class="texto-resumen-pedido "><b>Total</b></p>
                    </div>                    
                    <div class="mt-3 centrar-forzado"><a href="facturacion.php">
                    <button type="button" class="btn btn-danger">Comprar</button></a>
                </div>
                </div>
            </div>
            @else
                <div>
                    <br>
                    <br>
                    <br>

                    <p style="font-size: xx-large;">Oops parece que usted no a agregado productos</p>
                    <br>
                    <br>
                    <br>

                </div>
            @endif

        </div>
    </div>
    @endsection
