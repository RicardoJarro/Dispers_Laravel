<?php

namespace App\Seguridad;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends  Authenticatable
{
    protected $remembre_token=false;
    protected $table='clients';

    protected $fillable = ['nombre','email','password','nickname','slug'];

    protected $guarded=['id'];

    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
}
