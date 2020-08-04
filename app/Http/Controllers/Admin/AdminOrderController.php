<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(){
        $pedidos=Order::with('order_details')->where('estado','pendiente')->paginate(6);
        //return $pedidos;
        return view ('admin.order.index',compact('pedidos'));
    }


    public function ver_factura(Request $request){
        
        
        return redirect()->route('admin.order.factura_get',$request->id);
        
    }

    public function cambiar_estado($id){
        Order::where('id', $id)->update(array('estado' => 'enviado'));
        $pedidos=Order::with('order_details')->where('estado','pendiente')->paginate(6); 
        return redirect()->route('admin.order.index')->with('datos', 'Pedido actualizado correctamente'); 

        //return view ('admin.order.index',compact('pedidos'))->with('datos','Pedido actualizado correctamente');
    }

    public function todos(){
        $pedidos=Order::with('order_details')->paginate(10); 
        return view('admin.order.pedidos_todos',compact('pedidos')); 
    }
    public function ver_factura_get($id){
        $pedido=Order::with('order_details.product')->find($id);
        $fecha=Carbon::now()->toDateTimeString();
         return view('admin.order.factura',compact('pedido','fecha'));
    }
}
