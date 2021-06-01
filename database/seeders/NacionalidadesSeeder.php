<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NacionalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nacionalidades')->truncate();
        DB::table('nacionalidades')->insert(['nacionalidadDescripcion'=>'Argentina',]);
        DB::table('nacionalidades')->insert(['nacionalidadDescripcion'=>'Española',]);
        DB::table('nacionalidades')->insert(['nacionalidadDescripcion'=>'Italiana',]);
        DB::table('nacionalidades')->insert(['nacionalidadDescripcion'=>'Otra',]);
    }
}
