<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}

    public function compra(){
        return view('tienda.compra.facturacion');
        
    }
    public function ver_compra($id){

        $pedido=Order::with('order_details.product')->find($id);
        $fecha=Carbon::now()->toDateTimeString();
        return view('tienda.compra.detalle_compra',compact('pedido','fecha'));
        
    }

    public function listar_compras(){        
        $compras=User::with('orders')->find( Auth::user()->id);       
        return view ('tienda.compra.compras_realizadas',compact('compras'));
    }
}
