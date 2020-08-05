<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //'products'
        $this->truncateTablas(['rols','users','categories']);

        $this->call(RolTableSeeder::class);
        $this->call(UserTableSeeder::class);        
        $this->call(CategoryTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        //$this->call(ProductTableSeeder::class);
        //$this->call(ClientTableSeeder::class);
    }

    protected function truncateTablas(array $tablas){
        //your code

        foreach ($tablas as $tabla){
            DB::statement("TRUNCATE TABLE {$tabla} RESTART IDENTITY CASCADE");
            
        }

        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // foreach ($tablas as $tabla){
        //     DB::table($tabla)->truncate();
        // }
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
