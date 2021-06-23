<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeneficiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('beneficios')->truncate();
        DB::table('beneficios')->insert(['descripcionbeneficio'=>'PARTICULAR',]);
        DB::table('beneficios')->insert(['descripcionbeneficio'=>'PAMI',]);
    }
}
