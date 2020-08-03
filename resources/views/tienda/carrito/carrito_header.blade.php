<!-- Cart -->

{{-- {{$carrito}} --}}
<div class="dropdown position-static">
    <a class="dropdown-toggle mano" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-shopping-cart"></i>
        <span>Tu Carrito</span>
    <div class="qty">{{$carritoCount}}</div>

    </a>
    <div class="dropdown-menu ">
        @if (count(Cart::getContent()))
        <div class="cart-list p-2"> 

            
                @foreach (Cart::getContent() as $item)                   
                    <div class="product-widget ">
                        <div class="product-img"> 
                                                 
                            <img src="{{$item->attributes->imageurl}}" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-name"><a href="{{ url('producto/'.$item->attributes->producto_slug) }}">{{$item->name}}</a></h3>
                            <h4 class="product-price"><span class="qty">{{$item->quantity}}x</span>{{$item->price}}</h4>
                        </div>
                        <form action="{{route('carrito.remover')}}" method="post">
                            @csrf
                            <input type="hidden" name='id' value="{{$item->id}}">
                            <button class="delete" type="submit"><i class="fa fa-close"></i>
                            </button>
                        </form>
                        
                    </div>
                @endforeach

            {{-- <div class="product-widget">
                <div class="product-img">
                    <img src="http://dispers.test/dispers/images/camisa-tiburon_1_blanco.jpg" alt="">
                </div>
                <div class="product-body">
                    <h3 class="product-name"><a href="#">CAMISETA DADDY SHARK</a></h3>
                    <h4 class="product-price"><span class="qty">2x</span>$39,98</h4>
                </div>
                <button class="delete"><i class="fa fa-close"></i>
                </button>
            </div> --}}
        </div>
        <div class="cart-summary p-2"> <small>{{$carritoCount}} Articulos seleccionados</small>
        <h5>SUBTOTAL: {{number_format(Cart::getSubTotal(),2)}}</h5>

        </div>
        <div class="cart-btns p-2">
            <a href="{{route('carrito.resumen')}}">Ver Carrito</a>
            <a href="facturacion.php">Comprar <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        @else
        
        <div class="pt-2 pl-4">
        <p>Carrito vacio</p>
    </div>
        @endif
    </div>
</div>
<!-- /Cart -->