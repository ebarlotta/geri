<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorReferenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actors')->insert([
            'nombre'=>'Ninguno',
            'tipos_documento'=>1,
            'documento'=>0,
            'nacimiento'=>'1976-08-19',
            'domicilio'=> '',
            'sexo_id'=> 1,
            'email'=> '',
            'nacionalidad_id'=> 1,
            'localidad_id'=> 1,
            'obrasocial_id'=> 1,
            'escolaridad_id'=> 1,
            'telefono'=> 0,
            'empresa_id'=> 1,
            'tipopersona_id'=> 1,
            'personactivo_id'=> 2,
            'urlfoto'=> '',
            'activo'=> 0,
        ]);
    }
}
