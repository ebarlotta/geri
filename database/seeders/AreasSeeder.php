<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->truncate();
        DB::table('areas')->insert(['AreasDescripcion'=>'Administración',]);
        DB::table('areas')->insert(['AreasDescripcion'=>'Médica',]);
    }
}
