<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre=$request->get('nombre');
        $productos=Product::with('images','category')->where('nombre','like',"%$nombre%")->orderBy('nombre')->paginate(5);
        return view('admin.product.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Category::orderBy('nombre')->get();
        return view('admin.product.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'nombre'=>'required|max:50|unique:products,nombre',
            'slug'=>'required|max:50|unique:products,slug',
            'imagenes.*'=>'image|mimes:jpeg,png,gif,svg|max:5000'
        ]);

        $urlimagenes=[];
        if($request->hasFile('imagenes')){
            $imagenes=$request->file('imagenes');
            foreach($imagenes as $image){
                $nombre=time().'_'.$image->getClientOriginalName();
                $ruta=public_path().'/images/products';
                $image->move($ruta,$nombre);
                $urlimagenes[]['url']='/images/products/'.$nombre;
            }
        }

        $prod = new Product;
        $prod->nombre=$request->nombre;
        $prod->slug=$request->slug;
        $prod->descripcion='asd';//$request->descripcion;
        $prod->category_id=$request->category_id;
        $prod->precio=$request->precio;
        $prod->peso=$request->peso;
        $prod->stock=$request->stock;
        $prod->estado=$request->estado;

        if($request->estado=='1'){
            $prod->estado='activo';
        }else{
            $prod->estado='no activo';
        }

        $prod->save();
        $prod->images()->createMany($urlimagenes);
        return redirect()->route('admin.product.index')->with('datos','Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $producto=Product::with('images','category')->where('slug',$slug)->firstOrFail();
        $categorias=Category::orderBy('nombre')->get();
        return view('admin.product.edit',compact('producto','categorias'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
