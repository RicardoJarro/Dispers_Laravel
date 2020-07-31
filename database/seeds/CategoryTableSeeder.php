<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=[
            'Articulos del hogar',
            'Ropa Hombres',
            'Ropa mujeres',
            'Ropa ninios',
        ];
        foreach($categories as $key => $value){
            DB::table('categories')->insert([
                'nombre'=> $value,
                'slug'=>Str::slug($value),
                'descripcion'=>'esto es una descripcion',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
