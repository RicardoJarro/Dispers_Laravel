<?php

namespace App\Seguridad;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends  Authenticatable
{
    protected $remembre_token=false;
    protected $table='users';
    public $timestamps = true;

    protected $fillable = ['nombre','email','password','nickname','slug','created_at','updated_at'];

    protected $guarded=['id'];

    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
}
