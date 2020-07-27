<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($id){
        return "hola usuario este es el index";
    }

    public function vista(){
        return "Esta es la vista";
    }
}
