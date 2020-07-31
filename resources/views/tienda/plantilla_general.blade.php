<html lang="es">

<head>
@include('tienda/header_estilos')
</head>
@yield('estilos')
<body>
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container position-relative">
                <!-- en este ul  estaba float-left -->
                <ul class="header-links ">
                    <li><a href="#"><i class="fa fa-phone"></i> +593989100245</a>
                    </li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> dispers.store@gmail.com.com</a>
                    </li>
                    <li><a href="https://www.google.es/maps/place/Universidad+De+Cuenca/@-2.9002615,-79.0120829,17.3z/data=!4m5!3m4!1s0x91cd180d08006233:0x59ff5aaba4301326!8m2!3d-2.9006441!4d-79.0102078"><i class="fa fa-map-marker"></i> ubicacion</a>
                    </li>
                    <li><a href="formulario.php"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Asistencia</a>
                    </li>
                </ul>
                <ul class="header-links">
                    <div class="btn-group " id="boton-cuenta">
                        <button type="button" class="btn btn-dark btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-o"></i> Cuenta</button>
                        <div class="dropdown-menu">
                            <a href="perfil.php" class="dropdown-item"> <i class="fa fa-user-o"></i> Perfil de usuario </a>
                            <br> <a href="compras_realizadas.php" class="dropdown-item"> <i class="fa fa-list-ol" aria-hidden="true"></i> Listar compras </a>
                            <br> <a href="#" class="dropdown-item"> <i class="fa fa-times" aria-hidden="true"></i> Cerrar Sesion </a>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->
 

        <!-- MAIN HEADER -->
        @include('tienda/header_main')
        <!-- MAIN HEADER -->
        
    </header>
    <div class="container-fluid">
        @yield('contenido')
    </div>

    <div>
    @include('tienda/footer')
    </div>
</body>
</html>