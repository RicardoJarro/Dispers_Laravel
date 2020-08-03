<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view ('seguridad.login_admin');
    }

    protected function authenticated(Request $request, $user)
    {
        if($user->rol=='admin'){

        }else{
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('seguridad/login')->withErrors(['error'=>'Tu no eres un administrador']);
        }
    }    
    //laravel usa correo para conectarse
    //si queremos por otro parametro sobreescribimos el siguiente metodo        
}
