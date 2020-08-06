<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\User;

class UserController extends Controller
{
     
    public function show($slug)
    {
        
        if (User::where('slug',$slug)->first()) {
            return 'Nickname existe';
        }    
        else {
            return 'Nickname Disponible';
        }
        
    }

 
}