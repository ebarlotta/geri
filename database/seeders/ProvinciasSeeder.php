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
        //DB::table('provincias')->truncate();
        DB::table('provincias')->insert(['provincia_descripcion'=>'Mendoza','nacionalidads_id'=>1]);
        DB::table('provincias')->insert(['provincia_descripcion'=>'San Juan','nacionalidads_id'=>1]);
        DB::table('provincias')->insert(['provincia_descripcion'=>'San Luis','nacionalidads_id'=>1]);
    }
}
