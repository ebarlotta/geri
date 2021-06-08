<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonasCamposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personas_campos')->truncate();
        DB::table('personas_campos')->insert(['NombreCampo'=>'Nombres','TipoCampo'=>'text','OrdenCampo'=>2,'TipoPersona_id'=>1,'LabelCampo'=>'Nombre de la Persona']);
        DB::table('personas_campos')->insert(['NombreCampo'=>'Apellido','TipoCampo'=>'text','OrdenCampo'=>1,'TipoPersona_id'=>1,'LabelCampo'=>'Apellido de la Persona']);
    }
}
