<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    public function procesarPedido(Request $request){

        
        if(Cart::getContent()->count()>0){
            
            
            $pedido=new Order();
            $pedido->fecha_creacion=Carbon::now()->toDateTimeString();
            $pedido->fecha_envio='';
            $pedido->nombre_completo=$request->nombre_completo;
            $pedido->user_id=Auth::user()->id;
            $pedido->subtotal=number_format(Cart::getSubTotal(),2);
            $pedido->iva=number_format(Cart::getSubTotal()*0.12,2);
            $pedido->total=number_format(Cart::getTotal(),2)+number_format(Cart::getTotal()*0.12,2);
            $pedido->estado='pendiente';
            $pedido->estado_compra='pagado';
            $pedido->direccion=$request->direccion;
            $pedido->detalle=$request->detalle;
            $pedido->ciudad=$request->ciudad;        
            $pedido->provincia=$request->provincia;
            $pedido->codigo_zip=$request->codigo_postal;
            $pedido->telefono=$request->telefono;
            $pedido->save();

            foreach(Cart::getContent() as $item):
                $producto=Product::find($item->id);
                $detalle=new OrderDetail();
                $detalle->cantidad=$item->quantity;
                $detalle->product_id=$item->id;
                $detalle->order_id=$pedido->id;
                $detalle->nombre_producto=$producto->nombre;
                $detalle->costo_unitario=$producto->precio;
                $detalle->subtotal=number_format($producto->precio,2)*number_format($item->quantity);
                $detalle->save();
            endforeach;

            Cart::clear();
            return redirect()->route('ver_compra', ['id' => $pedido->id]);
        }else{
            return redirect()->route('inicio');
        }
    }
}
