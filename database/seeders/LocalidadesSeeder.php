<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('localidades')->truncate();
        DB::table('localidades')->insert(['localidadDescripcion'=>'Ciudad','localidadCP'=>5500]);
        DB::table('localidades')->insert(['localidadDescripcion'=>'San Martín','localidadCP'=>5570]);
        DB::table('localidades')->insert(['localidadDescripcion'=>'Palmira','localidadCP'=>5570]);
        DB::table('localidades')->insert(['localidadDescripcion'=>'Rivadavia','localidadCP'=>5570]);
        DB::table('localidades')->insert(['localidadDescripcion'=>'Junín','localidadCP'=>5570]);
    }
}
