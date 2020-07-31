<?php

namespace App\Http\Controllers\Tienda;

use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index($slug)
    {
        $categoria=Category::where('slug',$slug)->firstOrFail();
        $productos=Product::with('images')->where('category_id',$categoria->id)->orderBy('nombre')->paginate(9);
        // return $productos;
        return view('tienda.plantilla_categoria',compact('productos'));
    }
}
