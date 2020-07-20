<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $incrementing = false;

    // public function rols(){
    //     return $this->belongsToMany('App\Rol');
    // }
}
