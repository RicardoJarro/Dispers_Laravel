<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->string('nickname',50)->unique();
            $table->string('slug',50);            
            $table->string('email',50)->unique();
            $table->string('password')->nullable();
            $table->string('estado',10)->default('activo');
            $table->string('admin',15)->default('no');
            $table->string('provider')->default('dispers');
            $table->string('provider_id')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}
