<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['fecha_creacion','telefono', 'fecha_envio','nombre_completo','user_id','subtotal','total','direccion','detalle','provincia','codigo_zip','estado','estado_compra'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }

}
