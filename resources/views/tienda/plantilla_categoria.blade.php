@extends('tienda/plantilla_general')

@section('titulo','Categorias')
@section('contenido')
<div class="section">
    <div class="container-fluid">
        <div class="row position-relative">
            <!-- MENU LATERAL -->
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 contenedor-menu m-0 pt-0 d-inline-block">
                <a href="#" class="btn-menu p-2 w-100">Menu<i class="icono fas fa-bars"></i></a>
                <ul class="menu ">
                    <li><a href="#">Inicio</a></li>
                    <li id="cat-ropa"><a href="#">Ropa<i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li id="cat-ropa-mujer"><a href="catalogo_mujer.php">Mujer</a></li>
                            <li id="cat-ropa-hombre"><a href="catalogo_hombre.php">Hombre</a></li>
                            <li id="cat-ropa-ninos"><a href="catalogo_ninos.php">Niños y niñas</a></li>
                        </ul>
                    </li>
                    <li id="cat-accesorios"><a href="#">Accesorios<i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li id="cat-acces-mujer"><a href="catalogo_gorras.php">Billeteras</a></li>
                            <li id="cat-acces-gorras"><a href="catalogo_gorras.php">Gorras</a></li>
                            <li id="cat-acces-ninos"><a href="catalogo_gorras.php">Varios</a></li>
                        </ul>
                    </li>
                    <li id="cat-articulosh"><a href="#">Articulos del hogar<i class="icono derecha fas fa-chevron-down"></i></a>
                        <ul>
                            <li id="cat-art-tazas"><a href="catalogo_accesorios_tazas.php">Tazas</a></li>
                            <li id="cat-art-posters"><a href="catalogo_accesorios_tazas.php">Posters</a></li>
                            <li id="cat-art-padmouse"><a href="catalogo_accesorios_tazas.php">Padmouse</a></li>
                            <li id="cat-art-varios"><a href="catalogo_accesorios_tazas.php">Varios</a></li>
                        </ul>
                    </li>
                </ul>
            </div>


            <!-- MENU LATERAL -->

            <!-- CATALOGO DE PRODUCTOS -->
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 d-inline-block contenedor-catalogo m-0 p-0">
                <div class="w-100">
                    <div class="product-catalog">
                        <a href="producto.php">
                            <img src="images/camisa-tiburon_1_blanco.jpg">
                            <div class="product-catalog-info">
                                <p id="nombre">CAMISETA TIBURON</p>
                                <p id="precio">19.99 $</p>
                            </div>
                        </a>
                    </div>

                    <div class="product-catalog mano">
                        <a href="producto.php">
                            <img src="images/camisa-rubik_1_negro.jpg">
                            <div class="product-catalog-info">
                                <p id="nombre">CAMISETA CUBO RUBIK</p>
                                <p id="precio">19.99 $</p>
                            </div>
                        </a>
                    </div>


                    <div class="product-catalog mano">
                        <a href="producto.php">
                            <img src="images/camisa-motivacion1_1_negro.jpg">
                            <div class="product-catalog-info">
                                <p id="nombre">CAMISETA MOTIVACION</p>
                                <p id="precio">19.99 $</p>
                            </div>
                        </a>
                    </div>


                    <div class="product-catalog mano">
                        <a href="producto.php">
                            <img src="images/camisa-foco_1_blanco.jpg">
                            <div class="product-catalog-info">
                                <p id="nombre">CAMISETA FOCO</p>
                                <p id="precio">19.99 $</p>
                            </div>
                        </a>
                    </div>


                    <div class="product-catalog">
                        <img src="http://localhost:8099/dispers/2-home_default/hummingbird-printed-t-shirt.jpg">
                        <div class="product-catalog-info">
                            <p id="nombre">CAMISETA CON COLIBRI</p>
                            <p id="precio">19.99 $</p>
                        </div>
                    </div>
                    <div class="product-catalog">
                        <img src="http://localhost:8099/dispers/2-home_default/hummingbird-printed-t-shirt.jpg">
                        <div class="product-catalog-info">
                            <p id="nombre">CAMISETA CON COLIBRI</p>
                            <p id="precio">19.99 $</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CATALOGO DE PRODUCTOS -->
        </div>
    </div>
</div>
@endsection
@section('addScript')
<script>
    $(document).ready(function() {
        $('#cat-ropa-hombre').addClass('seleccionado');
        $('#cat-accesorios ul').slideUp();
        $('#cat-articulosh ul').slideUp();
    });
    $(".btn-menu").click(function() {
        $(".contenedor-menu .menu").slideToggle("slow");
    });
    $("#cat-ropa").click(function() {
        $('#cat-ropa ul').slideToggle();
        // $('#cat-ropa').addClass('seleccionado');
    });
    $("#cat-accesorios").click(function() {
        $('#cat-accesorios ul').slideToggle();
        // $('#cat-ropa').addClass('seleccionado');
    });
    $("#cat-articulosh").click(function() {
        $('#cat-articulosh ul').slideToggle();
        // $('#cat-ropa').addClass('seleccionado');
    });
</script>
@endsection
