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
        // DB::table('sexos')->truncate();
        DB::table('sexos')->insert(['nombresexo'=>'Masculino',]);
        DB::table('sexos')->insert(['nombresexo'=>'Femenino',]);
        DB::table('sexos')->insert(['nombresexo'=>'Prefiero no decirlo',]);
    }
}
