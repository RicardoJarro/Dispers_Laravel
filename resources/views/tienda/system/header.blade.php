
    
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container position-relative">
                <!-- en este ul  estaba float-left -->
                <div class="row">
                    <div class="col-9">
                <ul class="header-links ">
                    <li><a href="#"><i class="fa fa-phone"></i> +593989100245</a>
                    </li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> dispers.store@gmail.com.com</a>
                    </li>
                    <li><a href="https://www.google.es/maps/place/Universidad+De+Cuenca/@-2.9002615,-79.0120829,17.3z/data=!4m5!3m4!1s0x91cd180d08006233:0x59ff5aaba4301326!8m2!3d-2.9006441!4d-79.0102078"><i class="fa fa-map-marker"></i> ubicacion</a>
                    </li>
                <li><a href="{{route('asistencia')}}"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Asistencia</a>
                    </li>
                </ul>
            </div>
            <div class="col-3">
                @include('tienda/system/usuario_logueado')</div>
                </div>
            </div>
        </div>
        <!-- /TOP HEADER -->
        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-lg-3">
                        <div class="header-logo"> <a href="{{route('inicio')}}" class="logo">

                            <img src="/images/tienda/logo.png" alt="" width="220" height="60">

                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->
                    <!-- SEARCH BAR -->
                    <div class="col-lg-7 aling-itme-center">
                        <div class="header-search">
                            <form>
                                <input class="input offset-md-2" placeholder="Buscar Producto">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-lg-2 clearfix">
                        <div class="header-ctn">

                            @include('tienda.carrito.carrito_header')

                            <!-- Menu Toogle -->
                            <div class="menu-toggle"> <a href="#">

                                    <i class="fa fa-bars"></i>

                                    <span>Menu</span>

                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
        <!-- /HEADER -->

        

        <!-- <nav id="navigation">
       
            <div class="container">
           
                <div id="responsive-nav">

                 
                    <ul class="main-nav nav">
                        <li class="nav-item"><a href="Inicio%20-%20DISPERS.html" class="nav-link dropdown-toggle" data-toggle="dropdown"> Inicio </a>
                        </li>
                        <li class="nav-item dropdown"> <a href="catalogo_hombre.php" class="nav-link dropdown-toggle" data-toggle="dropdown"> Ropa </a>
                            <div class="dropdown-menu"> <a href="catalogo_hombre.php" class="dropdown-item">Ropa de hombre </a>
                                <br> <a href="http://dispers.test/dispers/catalogo_mujer.php" class="dropdown-item"> Ropa de mujeres </a>
                                <br> <a href="http://dispers.test/dispers/catalogo_ninos.php" class="dropdown-item"> Ropa de niños </a>
                                <br>
                            </div>
                        </li>
                        <li class="nav-item"> <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="Mujer">Accesorios</a>
                            <div class="dropdown-menu"> <a href="#" class="dropdown-item"> Billeteras </a>
                                <br> <a href="#" class="dropdown-item"> Gorras </a>
                                <br>
                            </div>
                        </li>
                        <li class="nav-item"> <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="nino">Articulos del hogar</a>
                            <div class="dropdown-menu"> <a href="#" class="dropdown-item"> Tazas </a>
                                <br> <a href="#" class="dropdown-item"> Posters </a>
                                <br> <a href="#" class="dropdown-item"> Padmouse </a>
                                <br>
                            </div>
                        </li>
                    </ul>

                </div>

            </div>

        </nav> -->
      
    

    
  
 