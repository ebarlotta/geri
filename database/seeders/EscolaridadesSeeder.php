<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscolaridadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('escolaridades')->truncate();
        DB::table('escolaridades')->insert(['escolaridadDescripcion'=>'Primaria Incompleta',]);
        DB::table('escolaridades')->insert(['escolaridadDescripcion'=>'Primaria Completa',]);
        DB::table('escolaridades')->insert(['escolaridadDescripcion'=>'Secundaria Incompleta',]);
        DB::table('escolaridades')->insert(['escolaridadDescripcion'=>'Secundaria Completa',]);
    }
}
