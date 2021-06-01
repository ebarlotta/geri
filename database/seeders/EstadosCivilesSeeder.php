<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosCivilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados_civiles')->truncate();
        DB::table('estados_civiles')->insert(['estadocivil'=>'Casado/a',]);
        DB::table('estados_civiles')->insert(['estadocivil'=>'Viudo/a',]);
    }
}
