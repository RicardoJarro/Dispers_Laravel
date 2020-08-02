<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Cart;

class CarritoComposer
{
    
    public function compose(View $view)
    {
        $view->with('carritoCount',Cart::getContent()->count())->with('carrito',Cart::getContent());
    }
    
}
