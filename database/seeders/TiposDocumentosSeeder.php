<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('tipos_documentos')->truncate();
        DB::table('tipos_documentos')->insert(['tipodocumento'=>'Sin especificar',]);
        DB::table('tipos_documentos')->insert(['tipodocumento'=>'LC',]);
        DB::table('tipos_documentos')->insert(['tipodocumento'=>'CUIT',]);
        DB::table('tipos_documentos')->insert(['tipodocumento'=>'CUIL',]);
        DB::table('tipos_documentos')->insert(['tipodocumento'=>'DNI',]);
    }
}
