<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Imprime los datos de la tabla usuario en un rango de 10 filas
        $users=User::get();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //FUncion para crear usuarios en la base de datos
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosUsers=request()->all();
        //trae los daots de la peticion exceptuando el toque que le ppone por defecto laravel
        $datosUsers=request()->except('_token');        
        User::insert($datosUsers);
        return redirect('admin/user')->with('Mensaje','Empleado agregado con exito');
        //return response()->json($datosUsers);  

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
    public function edit($id)
    {
        //Edita un usuario dependiendo su id
        $user=User::findOrfail($id);
        return view('admin.user.edit',compact('user'));
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
        //Actualiza a un usuario y el excep elimina el toquen y el metodo de peticion que se esta haciendo de los datos
        $datosUsers=request()->except(['_token','_method']);
        User::where('id','=',$id   )->update($datosUsers); 
        //$user= users::findOrfail($id);
        //return view('users.edit',compact('user'));
        return redirect('admin/user')->with('Mensaje','Empleado modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Elimina un usuario mediante una id
        User::destroy($id);
        return redirect('admin/user')->with('Mensaje','Empleado eliminado con exito');
    }
}
