<?php

namespace App\Http\Controllers\Mashups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;

class MashupGooglechartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $numprod_categoria=Category::withCount('products')->get();
        // return $producto;
        $usuarios_count=User::count();
        $usuarios_compra=0;
        $usuarios=User::withCount('orders')->get();
        $array = json_decode($usuarios, true);

        foreach ($array as $value) {
            if ($value['orders_count']!='0')
            $usuarios_compra++;
         }
        $user_no_compra= $usuarios_count-$usuarios_compra;

        $user_facebook=User::where('provider','facebook')->count();
        $user_dispers=User::where('provider','dispers')->count();

        return view('admin.mashups.googlecharts',compact('numprod_categoria','usuarios_compra','user_no_compra','user_facebook','user_dispers'));

    
    }

    
}
