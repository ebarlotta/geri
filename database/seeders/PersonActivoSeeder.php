<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonActivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('person_activos')->truncate();
        DB::table('person_activos')->insert(['estado'=>'Alta',]);
        DB::table('person_activos')->insert(['estado'=>'Baja',]);
        DB::table('person_activos')->insert(['estado'=>'En proceso de Baja',]);
    }
}
