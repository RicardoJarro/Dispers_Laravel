<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['users']=User::paginate(10);
        return view('tienda.usuario.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tienda.usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosUsers=request()->except('_token');
        User::insert($datosUsers);
        //retorna el login
        #return redirect('users')->with('Mensaje','Empleado agregado con exito');
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
        $user =User::findOrfail($id);
        return view('users.edit',compact('user'));
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
        $datosUsers=request()->except(['_token','_method']);
        User::where('id','=',$id   )->update($datosUsers); 
        //$user= users::findOrfail($id);
        //return view('users.edit',compact('user'));
        return redirect('users')->with('Mensaje','Empleado modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->estado='no activo';
        User::where('id','=',$id   )->update($user); 
        return redirect('tienda.index')->with('Mensaje',"Usuario eliminado");
    }

    public function verperfil(){
        $user = auth()->user();
        return view('tienda.usuario.perfil')->with('user',$user);
    }
    public function actualizar(Request $request){

        

        if($request->atributo !='password'){
            
            User::where('id', $request->id)->update(array($request->atributo => $request->nuevo));
            return redirect('/perfil')->with('datos','Usuario actualizado');
        }else{
            
            if($request->password1 == $request->password2){
                
                $pass=bcrypt($request->password1);
                User::where('id', $request->id)->update(array('password'=> $pass));
                return redirect('/perfil')->with('datos','Usuario actualizado');

            }else{
                return redirect('/perfil')->with('datos','Las contraseñas no son iguales');
            }
        }

    }

    public function ver_fomulario(){
        return view('tienda/usuario/registrar_usuarios');
    }

    public function registrar(Request $request ){            
        $pass=bcrypt($request->password);
        $request->merge([
            'password' => $pass,
        ]);         
        $slug=Str::slug($request->nickname);
        $request->request->add(['slug' => $slug]);
        

        $datosUsers=request()->except(['_token','_method','confirm_password']);
        User::insert($datosUsers);
        return redirect('login')->with('datos','Usuario registrado');
    }

}
