<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClienteLoginController extends Controller
{    

    protected $redirectTo = 'admin';

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function verusuario()
    {
      return 'eres un cliente';
    }

    public function index(){
      return view('seguridad.login_cliente');
    }
}
