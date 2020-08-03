<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = ['name','created_at','updated_at'];

    // public function rols(){
    //     return $this->belongsToMany('App\Rol');
    // }

    public function image(){
        return $this->morphOne('App\Image','imageable');
    }
}
