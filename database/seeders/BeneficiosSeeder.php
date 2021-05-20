<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Beneficios;

class BeneficiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Beneficio = new Beneficios();
        $Beneficio->descripcionbeneficio = "PARTICULAR";
        $Beneficio->save();
        $Beneficio1 = new Beneficios();
        $Beneficio1->descripcionbeneficio = "PAMI";
        $Beneficio1->save();
    }
}
