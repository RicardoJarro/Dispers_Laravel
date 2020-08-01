<html lang="es">

<head>
@include('tienda/system/header_estilos_scripts')
@yield('estilos')
</head>

<body>
    <header>
        @include('tienda/system/header')
    </header>
    <div class="container-fluid">
        @yield('contenido')
    </div>

    <div>
    @include('tienda/system/footer')
    </div>
</body>
</html>