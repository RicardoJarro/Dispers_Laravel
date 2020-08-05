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
        $general_categories=[           
            'Ropa',
            'Articulos del hogar',
        ];
        foreach($general_categories as $key => $value){
            DB::table('general_categories')->insert([
                'nombre'=> $value,
                'slug'=>Str::slug($value),
                'descripcion'=>'Varios productos interesantes en esta categoria',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

        $categories_ropa=['Hombre','Mujer','Niños'];
        foreach($categories_ropa as $key => $value){
            DB::table('categories')->insert([
                'nombre'=> $value,
                'slug'=>Str::slug($value),
                'general_category_id'=>1,
                'descripcion'=>'Las mas sensacionales y originales prendas de vestir para '.$value,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
