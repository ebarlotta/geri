<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CamasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('camas')->truncate();
        DB::table('camas')->insert(['NroHabitacion'=>1,'NroCama'=>1,'EstadoCama'=>1,'SexoCama'=>1]);
        DB::table('camas')->insert(['NroHabitacion'=>1,'NroCama'=>2,'EstadoCama'=>1,'SexoCama'=>0]);
        DB::table('camas')->insert(['NroHabitacion'=>1,'NroCama'=>3,'EstadoCama'=>0,'SexoCama'=>1]);
        DB::table('camas')->insert(['NroHabitacion'=>2,'NroCama'=>4,'EstadoCama'=>0,'SexoCama'=>0]);
    }
}
