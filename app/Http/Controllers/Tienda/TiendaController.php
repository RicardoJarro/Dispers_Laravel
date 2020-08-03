<?php

namespace App\Http\Controllers\Tienda;

use App\Category;
use App\GeneralCategory;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TiendaController extends Controller
{

    public function index(){
        $categorias=GeneralCategory::with('categories')->get();
        //return $categorias;
        return view('tienda.index',compact('categorias'));
    }

    //muestra un producto especifico
    public function producto($slug)
    {
        $producto=Product::with('category.general_category','images')->where('slug',$slug)->firstOrFail();
        $var=1;        
        $productosRelacionados=Product::with('images')->where('category_id',$producto->category->id)->inRandomOrder()->limit(7)->get();
        return view('tienda.productos.producto',compact('producto','var','productosRelacionados'));
    }
}
