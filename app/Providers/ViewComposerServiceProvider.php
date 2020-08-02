<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Cart;

class ViewComposerServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        //
    }

    public function boot()
    {        
        View::composer('tienda.carrito.carrito_header','App\Http\ViewComposers\CarritoComposer');
                
    }    
}
