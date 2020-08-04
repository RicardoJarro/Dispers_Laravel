<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['product_id','order_id','nombre_producto','cantidad','costo_unitario','subtotal'];


    public function order(){
        return $this->belongsTo(OrderDetail::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
