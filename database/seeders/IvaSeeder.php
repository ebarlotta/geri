<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IvaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('ivas')->truncate();
        DB::table('ivas')->insert(['descripcioniva'=>'Consumidor Final','porcentaje'=>0,'activo'=>true]);
        DB::table('ivas')->insert(['descripcioniva'=>'Responsable Inscripto','porcentaje'=>0,'activo'=>true]);
        DB::table('ivas')->insert(['descripcioniva'=>'Monotributista','porcentaje'=>0,'activo'=>true]);
    }
}
