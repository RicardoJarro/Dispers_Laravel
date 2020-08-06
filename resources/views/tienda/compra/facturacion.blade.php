@extends('tienda/system/plantilla_general')

@section('titulo','Confirmar Compra')

@section('estilos')
<link rel="stylesheet" href="{!! asset('css/tienda/estilo_carrito_pago_compras.css')!!}">

@endsection

@section('contenido')

@if (count(Cart::getContent()))
<div>
    <h2 class="m-3">Facturacion</h2>
    <hr>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col col-12 col-sm-12 col-md-7 col-lg-7 fac-container-izquierdo">
            <form action="{{route('procesar_orden_post')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <!-- Full Name -->
                        <label for="full_name_id" class="control-label">Nombre completo</label>
                        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo"
                            placeholder="Ricardo Jarro" requiered value="Ricardo Jarro" />
                    </div>

                </div>
                <div class="form-group">
                    <!-- Street 1 -->
                    <label for="street1_id" class="control-label">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion"
                        placeholder="Ramayana y Telemaco" requiered value="Cdla. Ingenieros" />
                </div>

                <div class="form-group">
                    <!-- Street 2 -->
                    <label for="street2_id" class="control-label">Detalle secundario</label>
                    <input type="text" class="form-control" id="detalle" name="detalle"
                        placeholder="Condominio Valle de los Rios, casa 2" requiered value="Roma y paris" />
                </div>

                <div class="form-group">
                    <!-- City-->
                    <label for="city_id" class="control-label">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Cuenca" requiered
                        value="Cuenca" />
                </div>

                <div class="form-group">
                    <!-- State Button -->
                    <label for="provincia" class="control-label">Provincia</label>
                    <select class="form-control" name='provincia' id="state_id">
                        <option value="01">Azuay</option>
                        <option value="02">Bolivar</option>
                        <option value="03">Cañar</option>
                        <option value="04">Carchi</option>
                        <option value="05">Cotopaxi</option>
                        <option value="06">Chimborazo</option>
                        <option value="07">El Oro</option>
                        <option value="08">Esmeraldas</option>
                        <option value="09">Guayas</option>
                        <option value="10">Imbabura</option>
                        <option value="11">Loja</option>
                        <option value="12">Los Rios</option>
                        <option value="13">Manabi</option>
                        <option value="14">Monora Santiago</option>
                        <option value="15">Napo</option>
                        <option value="16">Pastaza</option>
                        <option value="17">Pichincha</option>
                        <option value="18">Tungurahua</option>
                        <option value="19">Zamora Chinchipe</option>
                        <option value="20">Galapagos</option>
                        <option value="21">Sucumbios</option>
                        <option value="22">Orellana</option>
                        <option value="23">Santo Domingo de los Tschilas</option>
                        <option value="24">Santa Elena</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="phone">Telefono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="089969542" required>
                </div>
                <div class="form-group">
                    <!-- Zip Code-->
                    <label for="zip_id" class="control-label">Zip Code</label>
                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="#####"
                        value="09092" requiered />
                </div>

                <div class="form-group center">
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-danger">Confirmar Compra</button>
                <a href="{{url('/paypal/pay')}}" class="btn btn-danger">Comprar con  Paypal</a>

                    <!-- <a href="pago.php"><button class="btn btn-danger">Confirmar compra</button></a> -->
                </div>
            </form>
        </div>
        <div class="col col-12 col-sm-12 col-md-5 col-lg-5 border rounded" id="fact-container-derecho">

            <div class="mt-3 position-relative">
                <p class="texto-resumen-pedido d-inline-block ">Subtotal</p>
                <p class="valor-resumen d-inline-block" id="subtotal-resumen-pedido ">
                    <b>{{number_format(Cart::getSubTotal(),2)}} $</b></p>
            </div>
            <div class="position-relative">
                <p class="texto-resumen-pedido">Envio</p>
                <p class="valor-resumen" id="envio-resumen-pedido"><b>5,00 $</b></p>
            </div>
            <hr>
            <div class="position-relative">
                <p class="texto-resumen-pedido"><b>Total</b></p>
                <p class="valor-resumen" id="total-resumen-pedido"><b>{{number_format(Cart::getTotal(),2)}} $</b></p>
            </div>
            <hr>
            <div>
                <p><b>Productos en la cesta</b></p>
            </div>
            <div id="fact-items-compra">
                @foreach (Cart::getContent() as $item)

                <div class="row item-carrito border rounded">
                    <div class="container-imagen d-inline-block">
                        <img src="{{$item->attributes->imageurl}}" class="h-100">
                    </div>
                    <div class="info-item-carrito d-inline-block ">
                        <h5><a href="{{ url('producto/'.$item->attributes->producto_slug) }}">{{$item->name}}</a></h5>
                        {{-- <h6 class="d-inline">Color: </h6>
                            <h6 class="d-inline">negro</h6> --}}
                        <br>
                        {{-- <h6 class="d-inline-block">Talla: </h6> --}}
                        <br>
                        <div class="item-cantidad">
                            <h6 class="d-inline">Cantidad:</h6>
                            <p class="d-inline">{{$item->quantity}}</p>
                        </div>
                    </div>
                    <div class="price_now-price">
                        <h5>{{$item->price * $item->quantity}} $</h5>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>

</div>
@else

@endif



@endsection