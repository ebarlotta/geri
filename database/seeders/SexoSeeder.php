<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexos')->insert(['sexodescripcion'=>'Sin especificar',]);
        DB::table('sexos')->insert(['sexodescripcion'=>'Masculino',]);
        DB::table('sexos')->insert(['sexodescripcion'=>'Femenina',]);
        DB::table('sexos')->insert(['sexodescripcion'=>'No binario',]);
        DB::table('sexos')->insert(['sexodescripcion'=>'No contesta',]);

    }
}
