<?php

namespace App\Http\Controllers\Admin;

use App\GeneralCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminGeneralCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');
        $categorias = GeneralCategory::with('categories')->where('nombre','like',"%$nombre%")->orderBy('nombre')->paginate(10);
        //return $categorias;
        return view('admin.general_category.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.general_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50|unique:general_categories,nombre',
            'slug' => 'required|max:50|unique:general_categories,slug',
        ]);        
        GeneralCategory::create($request->except('_token'));  
        return redirect()->route('admin.general_category.index')->with('datos','Registro creado correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $cat= GeneralCategory::where('slug',$slug)->firstOrFail();
        $editar = 'Si';
        
        return view('admin.general_category.show',compact('cat','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $cat= GeneralCategory::where('slug',$slug)->firstOrFail();
        $editar = 'Si';
        
        return view('admin.general_category.edit',compact('cat','editar'));
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
        $cat= GeneralCategory::findOrFail($id);
        $request->validate([
            'nombre' => 'required|max:50|unique:general_categories,nombre,'.$cat->id,
            'slug' => 'required|max:50|unique:general_categories,slug,'.$cat->id,

        ]);
      
        $cat->fill($request->all())->save();
       //return $request;
       return redirect()->route('admin.general_category.index')->with('datos','Registro actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat= GeneralCategory::findOrFail($id);
        $cat->delete();
        return redirect()->route('admin.general_category.index')->with('datos','Registro eliminado correctamente!');
    }
}
