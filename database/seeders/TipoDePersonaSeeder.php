<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TipoDePersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('tipo_de_personas')->truncate();
        //DB::table('tipo_de_personas')->insert(['tipodepersona'=>'Residente',]);
        //DB::table('tipo_de_personas')->insert(['tipodepersona'=>'Referente',]);
        DB::table('tipo_de_personas')->truncate();
        DB::table('tipo_de_personas')->insert(['tipodepersona'=>'Residente',]);
        DB::table('tipo_de_personas')->insert(['tipodepersona'=>'Referente',]);
    }
}
