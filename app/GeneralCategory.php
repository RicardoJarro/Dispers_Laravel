<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralCategory extends Model
{
    protected $fillable = ['nombre', 'slug','descripcion'];


    public function categories(){
        return $this->hasMany(Category::class);
    }
}
