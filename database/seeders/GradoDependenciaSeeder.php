<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradoDependenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grado_dependencias')->truncate();
        DB::table('grado_dependencias')->insert(['gradodependenciaDescripcion'=>'Autoválido']);
        DB::table('grado_dependencias')->insert(['gradodependenciaDescripcion'=>'Severa']);
    }
}
