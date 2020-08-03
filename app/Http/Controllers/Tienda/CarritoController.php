<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Cart;


class CarritoController extends Controller
{
    public function agregar(Request $request){
        $producto=Product::with('images')->find($request->id);
        if(!$producto->images()->count()==0){
            $imageurl=$producto->images[0]->url;
            }else{
                $imageurl='/images/admin/noImagen.png';
            }
              
            $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'Express Shipping $15',
                'type' => 'shipping',
                'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
                'value' => '+5',
                'order' => 1 // the order of calculation of cart base conditions. The bigger the later to be applied.
            ));
            Cart::condition($condition);

        Cart::add(
            $producto->id,
            $producto->nombre,
            $producto->precio,
            $request->quantity,
            array('imageurl'=>$imageurl,'producto_slug'=>$producto->slug)        
        );
        return back()->with('succes','Producto agregado');
    }

    public function resumen(){

        return view('tienda.carrito.resumen');
    }

    public function remover(Request $request){

        $producto=Product::find($request->id);
        Cart::remove(['id'=>$request->id]);
        return back()->with('succes','Producto removido');
    }

    public function vaciar(){
        Cart::clear();
        return back()->with('succes','Carrito vacio');

    }

    
}
