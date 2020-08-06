
<head>

    <title>Factura</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/estilospdfhorizontal.css') }}"> --}}    
    <!-- Google font -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet"> --}}
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >
    <!-- Iconos -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet"> --}}
    {{-- <script src="https://kit.fontawesome.com/63fafe2dae.js" crossorigin="anonymous"></script> --}}

    <link rel="stylesheet" href="{{ asset('css/estilospdfhorizontal.css') }}">    

</head>
<body>
    
<style>
    @media print {
    @page {
        size: auto;
    }
}
</style>
<div id="container-resumen-compra row">
    <div class="row">
        <div id="titulo-detalle-compra" class="col-11">
            <br>
            <h1>Factura</h1>
            <h3>#{{$pedido->id}}</h3>
        </div>
        <div class=" col-1 text-center my-auto">
            {{-- <button class="btn " onclick="goBack()"><i class="fas fa-arrow-circle-left fa-3x" onclick=""></i></button> --}}
        </div>

    </div>
    <hr>

    <div class="row border-darken-2 rounded">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper border rounded m-1 p-1">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            {{-- <h1>Factura</h1> --}}
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
                                {{-- <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        From
                                        <address>
                                            <strong>Admin, Inc.</strong><br>
                                            638 Gonzales Suarez Ave, Roma 109<br>
                                            Cuenca, AZ 010107<br>
                                            Telf: (+593) 0989969542<br>
                                            Email: dispers.store@gmail.com
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
                                        <b>Fecha Compra:</b>4F3{{$pedido->id}}<br>
                                        <b>Cuenta:</b> {{$pedido->user->id}}
                                    </div>
                                    <!-- /.col -->
                                </div> --}}
                                <!-- /.row -->



                                <div class="col-12 table-responsive">
                                    <table >
                                        <tbody>
                                            <tr>
                                                <td>From </td>
                                                <td>To </td>
                                                <td> Factura #{{$pedido->id}}j23</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Admin, Inc.</strong> </td>
                                                <td> <strong>{{$pedido->nombre_completo}}</strong></td>
                                                <td> </td>
                                            </tr>
                                            <tr>
                                                <td> 638 Gonzales Suarez Ave, Roma 109</td>
                                                <td> {{$pedido->direccion}} , {{$pedido->detalle}} </td>
                                                <td>Pedido:4F3{{$pedido->id}}</td>
                                            </tr>
                                            <tr>
                                                <td> Cuenca, AZ 010107</td>
                                                <td>{{$pedido->ciudad}}, {{$pedido->provincia}} {{$pedido->codigo_zip}}</td>
                                                <td>Fecha compra:{{$pedido->fecha_creacion}} </td>
                                            </tr>
                                            <tr>
                                                <td> Telf: (+593) 0989969542</td>
                                                <td>Telf: {{$pedido->telefono}} </td>
                                                <td>ClienteID:{{$pedido->user->id}} </td>
                                            </tr>
                                            <tr>
                                                <td> Email: dispers.store@gmail.com</td>
                                                <td> Email: {{$pedido->user->email}}</td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

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
                                    
                                    
                                    {{-- <div class="col-6">
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
                                    </div> --}}
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
                                        {{-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i
                                                class="fas fa-print"></i> Print</a>
                                        <button type="button" class="btn btn-success float-right"><i
                                                class="far fa-credit-card"></i> Enviar a correo
                                        </button>
                                        <button type="button" class="btn btn-primary float-right"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-download"></i> Generar PDF
                                        </button> --}}
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
<script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(270, 820, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
        ');
    }
</script>
</body>

