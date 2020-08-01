<html lang="es">

<head>
@include('tienda/system/header_estilos_scripts')
</head>
@yield('estilos')
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