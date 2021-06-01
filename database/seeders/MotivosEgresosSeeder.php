<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotivosEgresosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('motivos_egresos')->truncate();
        DB::table('motivos_egresos')->insert(['motivoegresoDescripcion'=>'Fallecimiento']);
        DB::table('motivos_egresos')->insert(['motivoegresoDescripcion'=>'Traslado a Domicilio']);
        DB::table('motivos_egresos')->insert(['motivoegresoDescripcion'=>'Traslado a II Nivel']);
    }
}
