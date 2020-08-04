<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('fecha_creacion',30);
            $table->string('fecha_envio',30);
            $table->string('estado',20);
            $table->string('estado_compra',20);

            $table->string('nombre_completo',50);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedFloat('subtotal');
            $table->unsignedFloat('iva');
            $table->unsignedFloat('total');

            $table->string('direccion',255);
            $table->string('detalle',255);
            $table->string('ciudad',50);
            $table->string('provincia',50);
            $table->string('codigo_zip',10);
            $table->string('telefono',12);



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
