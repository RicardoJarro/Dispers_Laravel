<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $var=Auth::user()->nickname;
        $num_ordenes=Order::where('estado','pendiente')->count();
        $num_usuarios=User::where('estado','activo')->count();
        $num_productos=Product::where('estado', '<>', 'No Activo')->count();
        $ordenes= Order::pluck('total');
        //return $ordenes;
        $ganancia=0;
        foreach ($ordenes as $valor)
   		{
            $ganancia=$ganancia+$valor;
           }
    
        return view('admin.system.admin_home',compact('var','num_ordenes','num_usuarios','ganancia','num_productos'));
    }
}
