<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObraSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obra_socials')->insert(['obrasocialdescripcion'=>'Sin espeficicar','empresa_id'=>1]);
        DB::table('obra_socials')->insert(['obrasocialdescripcion'=>'PARTICULAR','empresa_id'=>1]);
        DB::table('obra_socials')->insert(['obrasocialdescripcion'=>'PAMI','empresa_id'=>1]);
    }
}
