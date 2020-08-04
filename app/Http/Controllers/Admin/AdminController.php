<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $var=Auth::user()->nickname;
        $num_ordenes=Order::where('estado','pendiente')->count();
        $num_usuarios=User::where('estado','activo')->count();
        return view('admin.system.admin_home',compact('var','num_ordenes','num_usuarios'));
    }
}
