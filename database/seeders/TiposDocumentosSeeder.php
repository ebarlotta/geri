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
        DB::table('tipos_documentos')->truncate();
        DB::table('tipos_documentos')->insert(['tipodocumento'=>'DNI',]);
        DB::table('tipos_documentos')->insert(['tipodocumento'=>'LC',]);
    }
}
