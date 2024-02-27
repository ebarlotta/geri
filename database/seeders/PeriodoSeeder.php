<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodos')->insert(['nombreperiodo'=>'Mensual']);
        DB::table('periodos')->insert(['nombreperiodo'=>'Bimestral']);
        DB::table('periodos')->insert(['nombreperiodo'=>'Trimestral']);
        DB::table('periodos')->insert(['nombreperiodo'=>'Cuatrimestral']);
        DB::table('periodos')->insert(['nombreperiodo'=>'Semestral']);
        DB::table('periodos')->insert(['nombreperiodo'=>'Anual']);
    }
}
