@extends('tienda/system/plantilla_general')

@section('titulo','Compra realizada')
@section('estilos')
<link rel="stylesheet" href="css/estilo_carrito_pago_compras.css">
@endsection
@section('contenido')


<div id="container-resumen-compra row">
    <div class="row">
        <div id="titulo-detalle-compra" class="col-11">
            <br>
            <h1>Detalle del pedido </h1>
            <h3>#{{$pedido->id}}</h3>
        </div>
        <div class=" col-1 text-center my-auto">
            <button class="btn " onclick="goBack()"><i class="fas fa-arrow-circle-left fa-3x" onclick=""></i></button>
        </div>

    </div>
    <hr>

    {{-- <div class="info-pedido-detallado  border rounded row ">
        <div class="col-6 p-2">
        <p><b>Fecha:</b></p>
        <p>{{$pedido->fecha_creacion}}</p>


    <p><b>Estado:</b></p>
    <p>{{$pedido->estado}}</p>


    <p><b>Metodo de pago:</b></p>
    <p>Tarjeta de credito</p>
</div>

<div class="pago-pedido position-relative col-6 p-2">

    <p><b>Subtotal:</b></p>
    <p class="dolares">{{$pedido->subtotal}}</p>


    <p><b>Envio:</b></p>
    <p class="dolares">5,00</p>


    <p><b>Total:</b></p>
    <p class="dolares"><b>{{$pedido->total}}</b></p>

    <div id="div-factura">
        <a href="" class="btn btn-warning">Enviar factura</a>
    </div>
</div>
</div>

<br>

<div id="container-productos-pedido row">
    <h5 class="display-5">Productos en el pedido</h5>
    <!-- Plantilla -->
    <div class="producto-pedido border rounded position-relative m-2 row">
        <div class="container-imagen d-inline-block">
            <img src="http://dispers.test/dispers/images/camisa-rubik_1_negro.jpg" class="h-100">
        </div>
        <div class="producto-pedido-info">
            <h5><a href="producto.php">Camiseta Rubik</a></h5>
            <h6 class="d-inline">Color: </h6>
            <h6 class="d-inline">negro</h6>
            <br>
            <h6 class="d-inline-block">Talla: </h6>
            <h6>negro </h6>
            <br>
            <div class="item-cantidad">
                <h6 class="d-inline">Cantidad:</h6>
                <p class="d-inline">2</p>
            </div>
        </div>
        <div class="producto-total-pedido">
            <h5 class="dolares">19.99</h5>
        </div>
    </div>
    <!-- Plantilla -->

    <!-- Ejemplo -->

</div> --}}

<div class="row border-darken-2 rounded">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper border rounded m-1 p-1">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Factura</h1>
                    </div>
                    {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div> --}}
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        {{-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Nota:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> --}}


                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Dispers, Inc.
                                        <small class="float-right">Fecha: {{$fecha}}</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                        <strong>Admin, Inc.</strong><br>
                                        638 Gonzales Suarez Ave, Roma 109<br>
                                        Cuenca, AZ 010107<br>
                                        Telf: (+593) 0989969542<br>
                                        Email: dispers.store@gmail.com.com
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong>{{$pedido->nombre_completo}}</strong><br>
                                        {{$pedido->direccion}} , {{$pedido->detalle}}<br>
                                        {{$pedido->ciudad}}, {{$pedido->provincia}} {{$pedido->codigo_zip}}<br>
                                        Telf: {{$pedido->telefono}}<br>
                                        Email: {{$pedido->user->email}}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Factura #{{$pedido->id}}j23</b><br>
                                    <br>
                                    <b>Orden ID:</b> 4F3{{$pedido->id}}<br>
                                    <b>Fecha Compra:</b> {{$pedido->fecha_creacion}}<br>
                                    <b>Cuenta:</b> {{$pedido->user->id}}
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Qty</th>
                                                <th>Producto</th>
                                                <th>Serial #</th>
                                                <th>Descripcion</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pedido->order_details as $item)
                                            <tr>
                                                <td>{{$item->cantidad}}</td>
                                                <td>{{$item->nombre_producto}}</td>
                                                <td>983f{{$item->id}}-90</td>
                                                <td>{{$item->product->descripcion}}</td>
                                                <td>${{$item->subtotal}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead">Payment Methods:</p>


                                    <img src="{{URL::asset('images/credit/visa.png')}}">
                                    <img src="{{URL::asset('images/credit/mastercard.png')}}">
                                    <img src="{{URL::asset('images/credit/american-express.png')}}">
                                    <img src="{{URL::asset('images/credit/paypal2.png')}}">



                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning
                                        heekya handango imeem
                                        plugg
                                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead">Cantidad a pagar</p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>${{$pedido->subtotal}}</td>
                                            </tr>
                                            <tr>
                                                <th>Iva (12%)</th>
                                                <td>${{$pedido->iva}}</td>
                                            </tr>
                                            <tr>
                                                <th>Envio:</th>
                                                <td>$5.00</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>${{$pedido->total}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="invoice-print.html" target="_blank" class="btn btn-default"><i
                                            class="fas fa-print"></i> Print</a>
                                    <button type="button" class="btn btn-success float-right"><i
                                            class="far fa-credit-card"></i> Enviar a correo
                                    </button>
                                    <button type="button" class="btn btn-primary float-right"
                                        style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Generar PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>


</div>

@endsection

@section('addScript')
<script>
    function goBack() {
      window.history.back();
    }
</script>
@endsection