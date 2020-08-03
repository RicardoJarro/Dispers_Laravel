<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompraController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}

    public function compra(){
        return view('tienda.compra.facturacion');
        
    }
}
