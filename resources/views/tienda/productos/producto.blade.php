@extends('tienda/system/plantilla_general')

@section('titulo',$producto->nombre)

@section('estilos')
<link rel="stylesheet" href="{!! asset('css/tienda/estilo_producto.css')!!}">

<style>
    .quantity .count {
    color: #000;
    display: inline-block;
    vertical-align: top;
    font-size: 25px;
    font-weight: 700;
    line-height: 30px;
    padding: 0 2px
    ;min-width: 35px;
    text-align: center;
}
.quantity .plus {
    cursor: pointer;
    display: inline-block;
    vertical-align: top;
    color: white;
    width: 30px;
    height: 30px;
    font: 30px/1 Arial,sans-serif;
    text-align: center;
    border-radius: 50%;
    }
.quantity .minus {
    cursor: pointer;
    display: inline-block;
    vertical-align: top;
    color: white;
    width: 30px;
    height: 30px;
    font: 30px/1 Arial,sans-serif;
    text-align: center;
    border-radius: 50%;
    background-clip: padding-box;
}
/* div {
    text-align: center;
} */
.minus:hover{
    background-color: #da132d !important;
}
.plus:hover{
    background-color: #da132d  !important;
}
/*Prevent text selection*/
span{
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}
input{  
    border: 0;
    width: 2%;
}

input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
/* input:disabled{
    background-color:white;
} */
    
</style>
@endsection


@section('contenido')

    <div class="section">
        <!-- ventana flotante cuando se pulsa agregar carrito -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Camiseta Daddy Shark</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Producto añadido al carrito
                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-danger"><i class="fas fa-shopping-cart"></i> <a href="carrito.php">Ver Carrito</a></button>
                        
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin -->

        <div class="container">

            <div class="row">
                <div class="col col-12 col-sm-12 col-md-7 col-lg-6 container-imagenes-min">

                    @if(!$producto->images->isEmpty())

                        <div class="producto-imagen-grande zoom">
                            <img src={{$producto->images[0]->url}} alt="" class="zoom img-responsive" id="img-grande">
                        </div>
                        
                        <div id="lista-imagenes">
                            @foreach ($producto->images as $image)
                            
                            @if ($loop->first)                            
                        <img src="{{$image->url}}" alt="" class="miniatura activado mano" id="img-{{$var}}">                        

                            @else
                                <img src="{{$image->url}}" alt="" class="miniatura mano" id="img-{{$var}}" >
                            @endif
                            <span style="display: none">{{++$var}}</span>
                           
                            @endforeach
                        </div>
    
                        
                        
                    @else                            
                    <div class="producto-imagen-grande zoom">
                        <img src="/images/admin/noImagen.png" alt="" class="zoom img-responsive" id="img-grande">
                    </div>
                    <div id="lista-imagenes">
                    </div>
                    @endif                 
                </div>
                <div class="col col-12 col-sm-12 col-md-5 col-lg-6 container-info">
                    <br>
                    <div id="deter-producto-nombre">
                    <h3>{{$producto->nombre}}</h3>
                    </div>
                    <div id="deter-producto-descripcion">
                        {{$producto->descripcion}}
                    </div>
                    <br>
                    <div id="deter-producto-precio">
                        <h3>{{$producto->precio}} $</h3>
                    </div>
                    <br>
                    

                    <form action="{{route('carrito.agregar')}}" method="POST">
                        @csrf

                        {{-- <h5>Color</h5>
                        <div id="determ-producto-colores">
                            <button class="boton-color amarillo"></button>
                            <button class="boton-color azul"></button>
                            <button class="boton-color blanco"></button>
                            <button class="boton-color negro"></button>
                        </div>
                        <br> --}}
                        
                            <h5>Talla</h5>
                            
                             <select name="talla" id="tallas-disponibles" class="form-control col-3">

                             </select>
                        
                        <br>
                        <div class="quantity">
                            <h5>Cantidad</h5>
                            <span class="minus bg-dark">-</span>
                            <input name="quantity" id="quantity" type="number"  class="count" value="1" readonly>
                            <span class="plus bg-dark">+</span>
                        </div>
                        <br>
                        <input type="hidden" name='id' value={{$producto->id}}>
                        {{-- data-toggle="modal" data-target="#exampleModal" --}}                        
                        <button type="submit" id="añadir-carrito" class="btn btn-danger d-block" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                    </form>
                </div>
            </div>

            {{-- PRODUCTOS SIMILARES --}}

            <div class="similar-product">
                <br>
                <h4>Productos similares</h4>
                <div class="slider-items">

                    @foreach ($productosRelacionados as $item)
                    <a href="{{ url('producto/'.$item->slug) }}">
                    <div class="item-recommend d-inline-block">                        
                        @if (!$item->images->isEmpty())
                        <img src="{{$item->images[0]->url}}" alt="" class="img-product-recommend">
                        @else
                        <img src="/images/admin/noImagen.png" alt="" class="img-product-recommend">
                        @endif                        
                        <div class="article__name" title="Camiseta hombre">
                            <h5>{{$item->nombre}}</h5>
                        </div>
                        <div class="price__now-price">
                        <h5> $ {{$item->precio}}</h5>
                        </div>                        
                    </div>    
                </a>                    
                    @endforeach                   
                </div>
            </div>
        </div>
    </div>
    

    @endsection
    <!-- LIBRERIAS -->
    @section('addScript')


    <script>
        $(document).ready(function(){
		    $('.count').prop('disabled', false);
   			$(document).on('click','.plus',function(){
				$('.count').val(parseInt($('.count').val()) + 1 );
    		});
        	$(document).on('click','.minus',function(){
    			$('.count').val(parseInt($('.count').val()) - 1 );
    				if ($('.count').val() == 0) {
						$('.count').val(1);
					}
    	    	});
 		});
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.js"></script>
    <!-- Para el efecto zoom sobre la imagen -->
    <script>
        // Este script intercambia las imagenes y hace el efecto zoom
        $(document).ready(function() {

            var img_actual = document.getElementById("img-grande").src;
            $('.producto-imagen-grande').zoom({
                url: img_actual,
                magnify: 1.5
            });
            $(function() {
                $('.miniatura').click(function() {
                    var id = $(this).attr('id');
                    $('#lista-imagenes').children().removeClass("activado");
                    $("#" + id).addClass("activado");
                    img_actual = document.getElementById(id).src;
                    $('#img-grande').attr('src', img_actual);
                    $('.producto-imagen-grande').zoom({
                        url: img_actual,
                        magnify: 1.5
                    });
                });
            });

            // $(function() {
            //     $('.boton-color').click(function() {
            //         var colorR = $(this).attr('class').split(/\s+/);
            //         colorReq = colorR[1];
            //         var ubicacion = $('#img-grande').attr('src').split("_");
            //         $('#img-grande').attr('src', ubicacion[0] + "_" + ubicacion[1] + "_" + colorR[1] + ".jpg");
            //         $('#img-1').attr('src', ubicacion[0] + "_1_" + colorR[1] + ".jpg");
            //         $('#img-2').attr('src', ubicacion[0] + "_2_" + colorR[1] + ".jpg");
            //         $('#img-3').attr('src', ubicacion[0] + "_3_" + colorR[1] + ".jpg");

            //         $('.producto-imagen-grande').zoom({
            //             url: ubicacion[0] + "_" + ubicacion[1] + "_" + colorR[1] + ".jpg",
            //             magnify: 1.5
            //         });

            //     });
            // });

            $(function() {
                var tallas = ["XS", "S", "M", "L", "XL", "XXL"];
                for (var i = 0; i < tallas.length; i++) {
                    var option = document.createElement("option");
                    $(option).html(tallas[i]);
                    $(option).appendTo("#tallas-disponibles");
                }
            });

            $(function() {
                $('#btn-menos').click(function() {
                    var n = parseInt($('#id_num_prenda').text()) - 1;
                    if (n <= 0) {
                        n = 1;
                    }
                    $('#id_num_prenda').text(n.toString());
                });

                $('#btn-mas').click(function() {
                    var n = parseInt($('#id_num_prenda').text()) + 1;
                    if (n >= 50) {
                        n = n - 1;
                    }
                    $('#id_num_prenda').text(n.toString());
                });
            });



        });
    </script>
@endsection
