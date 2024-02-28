<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('areas')->truncate();
        DB::table('areas')->insert(['areasdescripcion'=>'Administración','areashabilitada'=>1]);
        DB::table('areas')->insert(['areasdescripcion'=>'Médica','areashabilitada'=>1]);
        DB::table('areas')->insert(['areasdescripcion'=>'Social','areashabilitada'=>1]);
        DB::table('areas')->insert(['areasdescripcion'=>'Historia De Vida','areashabilitada'=>1]);
        DB::table('areas')->insert(['areasdescripcion'=>'Pagos','areashabilitada'=>1]);
        DB::table('areas')->insert(['areasdescripcion'=>'Nutricional','areashabilitada'=>1]);
    }
}
