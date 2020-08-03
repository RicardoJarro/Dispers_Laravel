<?php

namespace App\Seguridad;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends  Authenticatable
{
    protected $remembre_token=false;
    protected $table='users';

    protected $fillable = ['nombre','email','password','nickname','slug'];

    protected $guarded=['id'];

    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
}
