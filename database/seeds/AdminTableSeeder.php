<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'nombre'=>'Ricardo Jarro',
            'nickname'=>'Rick619',
            'slug'=>'rick619',
            'email'=>'ricardo.jarro98@ucuenca.edu.ec',
            'admin'=>'si',
            'password'=>bcrypt('chocolate'),
            'estado'=>'activo',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'nombre'=>'Juan Orellana',
            'nickname'=>'Juanrt88',
            'slug'=>'juantr88',
            'email'=>'diego.orellana@ucuenca.edu.ec',
            'admin'=>'si',
            'password'=>bcrypt('chocolate'),
            'estado'=>'activo',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'nombre'=>'Juan Lazo',
            'nickname'=>'juancl19',
            'slug'=>'juancl19',
            'email'=>'juanc.lazol@ucuenca.edu.ec',
            'admin'=>'si',
            'password'=>bcrypt('chocolate'),
            'estado'=>'activo',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
