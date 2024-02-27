<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escalas')->insert(['nombreescala'=>'Lógica','tipodatos'=>'numerico','minimo'=>0,'maximo'=>1,'empresa_id'=>1]);
        DB::table('escalas')->insert(['nombreescala'=>'Numérica','tipodatos'=>'numerico','minimo'=>0,'maximo'=>1,'empresa_id'=>1]);
        DB::table('escalas')->insert(['nombreescala'=>'Porcentaje','tipodatos'=>'numerico','minimo'=>0,'maximo'=>100,'empresa_id'=>1]);
    
    }
}
