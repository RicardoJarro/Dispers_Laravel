@extends('tienda/system/plantilla_general')

@section('titulo',$categoria->nombre)

@section('contenido')
{{-- @include('nav_categorias') --}}

        <div class="row">
            <!-- MENU LATERAL -->
            <div class="col-xs-12 col-sm-4 col-md-2  contenedor-menu">

                <a href="#" class="btn-menu p-2 w-100">Menu<i class="icono fas fa-bars"></i></a>
                <ul class="menu">
                    <li><a href="#">Inicio</a></li>
                    
                    @foreach ($categorias as $categoria)
                    
                    <li id="cat-ropa"><a href="#
                        {{-- {{ url('categoria/'.$categoria->slug) }}--}}">
                    {{$categoria->nombre}}
                        <i class="icono derecha fas fa-chevron-down"></i></a>
                        @foreach ($categoria->categories as $subcat)
                            <ul>
                                <li><a href="{{ url('categoria/'.$categoria->slug.'/'.$subcat->slug) }}">{{$subcat->nombre }}</a></li>
                            </ul>
                        @endforeach
                    @endforeach
                    </li>
                    
                </ul>
            </div>


            <!-- MENU LATERAL -->

            <!-- CATALOGO DE PRODUCTOS -->
            <div class="col-xs-12 col-sm-8 col-md-10  contenedor-catalogo">
                @foreach ($categorias_productos as $categoria)
                    
                
                @foreach($categoria->products as $item)                
                
                <div class="w-100 d-inline">
                    <div class="product-catalog">
                        <a href="{{ url('producto/'.$item->slug) }}">
                            @if(!$item->images->isEmpty())
                            <img src={{$item->images[0]->url}}>
                            @else
                            <img src="/images/admin/noImagen.png">
                            @endif                                                        
                            <div class="product-catalog-info">
                                <p id="nombre">{{$item->nombre}}</p>
                            <p id="precio"> $ {{$item->precio}}</p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
                @endforeach
                
            </div>
            <!-- CATALOGO DE PRODUCTOS -->
            
        </div>
        <div style="float: right">
            {{-- {{ $categorias_productos->appends($_GET)->links() }} --}}
            </div>
            <br>
            <br><br>

@endsection
@section('addScript')
<script>
    // $(document).ready(function() {
    //     $('#cat-ropa-hombre').addClass('seleccionado');
    //     $('#cat-accesorios ul').slideUp();
    //     $('#cat-articulosh ul').slideUp();
    // });
    // $(".btn-menu").click(function() {
    //     $(".contenedor-menu .menu").slideToggle("slow");
    // });
    // $("#cat-ropa").click(function() {
    //     $('#cat-ropa ul').slideToggle();
    //     // $('#cat-ropa').addClass('seleccionado');
    // });
    // $("#cat-accesorios").click(function() {
    //     $('#cat-accesorios ul').slideToggle();
    //     // $('#cat-ropa').addClass('seleccionado');
    // });
    // $("#cat-articulosh").click(function() {
    //     $('#cat-articulosh ul').slideToggle();
    //     // $('#cat-ropa').addClass('seleccionado');
    // });
</script>
@endsection
