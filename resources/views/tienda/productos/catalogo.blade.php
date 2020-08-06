<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>Catalogo de productos</title>
</head>

<body>

    <style>
        body{
            background-color:#2C3E50;
        }
        .page-break {
            page-break-after: always;
        }
        
        .titulo   {
            text-align:center;
            font-size: 120px;
            line-height: 150px;
            margin: 1em 0 .6em 0;
            font-weight: normal;
            color: white;
            font-family: 'Hammersmith One', sans-serif;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
            position: relative;
            color: #6Cf;
        }

        .categoria{
            text-align:center;
            font-size: 100px;
            line-height: 150px;
            color: #D35400 
        }

        .descripcion{
            text-align:justify;
            font-size: 40px;
            line-height: 40px;
        }
        .subcategoria{
            font-size: 40px;
            color: #DC7633
        }
        h2 {
            margin: 1em 0 .6em 0;
            padding: 0 0 0 20px;
            font-weight: normal;
            color: white;
            font-family: 'Hammersmith One', sans-serif;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
            position: relative;
            font-size: 30px;
            line-height: 40px;
        }

        h3 {
            margin: 1em 0 .6em 0;
            padding: 0 0 0 20px;
            font-weight: normal;
            color: white;
            font-family: 'Hammersmith One', sans-serif;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
            position: relative;
            font-size: 24px;
            line-height: 40px;
            font-family: 'Questrial', sans-serif;
        }

        h4 {
            margin: 1em 0 .6em 0;
            padding: 0 0 0 20px;
            font-weight: normal;
            color: white;
            font-family: 'Hammersmith One', sans-serif;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
            position: relative;
            font-size: 18px;
            line-height: 20px;
            font-family: 'Questrial', sans-serif;
        }
    </style>
    <div class="container">
        <br>
        <img src="images/tienda/logo.png" width="520">
        {{-- <img src="{{ url('/images/tienda/logo.png') }}"> --}}
        <p class="titulo">Catalogo de Productos</p>
        <br>
        <div class="page-break"></div>

        @forelse ($catalogo as $categoria)
        <br><br><br><br>
        <h3 class="categoria">Categoria {{$categoria->nombre}}</h3>
        <h4 class="descripcion">{{$categoria->descripcion}}</h4>
        <br>
        <div class="page-break"></div>
        @forelse ($categoria->categories as $subcategoria)
        <br>
        <h3 class="subcategoria">{{$subcategoria->nombre}}</h3>
        <h4>{{$subcategoria->descripcion}}</h4>
        <br>
        @forelse ($subcategoria->products as $producto)

        <div class="table-responsive">
            <br>
            <table class="table">
                <tr>
                    <td>
                        <h3>{{$producto->nombre}}</h3>
                        <br>
                        <h4>{{$producto->descripcion}}
                        </h4>
                        <br>
                        <h4> $ {{$producto->precio}}</h4>
                    </td>
                    <td>
                        <br>
                        <img src="{{ public_path($producto->images[0]->url) }}" alt="" height="200" width="200">
                    </td>
                </tr>
            </table>
        </div>


        @empty
        <div class="page-break"></div>

        @endforelse
        @empty
        <br><br>
        @endforelse


        @empty
        <h2>No hay Productos</h2>
        @endforelse

    </div>

</body>

</html>