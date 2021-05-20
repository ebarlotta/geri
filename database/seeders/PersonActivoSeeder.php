<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\PersonalActivo;

class PersonActivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Activos1 = new PersonActivo();
        $Activos1->estado = "Activo";
        $Activos1->save();
        $Activos2 = new PersonActivo();
        $Activos2->estado = "Baja";
        $Activos2->save();
        $Activos3 = new PersonActivo();
        $Activos3->estado = "En proceso de baja";
        $Activos3->save();
        $Activos4 = new PersonActivo();
        $Activos4->estado = "Otros";
        $Activos4->save();
    }
}
