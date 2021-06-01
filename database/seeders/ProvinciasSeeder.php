<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProvinciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincias')->truncate();
        DB::table('provincias')->insert(['provinciaDescripcion'=>'Mendoza']);
        DB::table('provincias')->insert(['provinciaDescripcion'=>'San Juan']);
        DB::table('provincias')->insert(['provinciaDescripcion'=>'San Luis']);
    }
}
