<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NacionalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('nacionalidad')->truncate();
        DB::table('nacionalidad')->insert(['nacionalidad_descripcion'=>'Argentina',]);
        DB::table('nacionalidad')->insert(['nacionalidad_descripcion'=>'Española',]);
        DB::table('nacionalidad')->insert(['nacionalidad_descripcion'=>'Italiana',]);
        DB::table('nacionalidad')->insert(['nacionalidad_descripcion'=>'Otra',]);
    }
}
