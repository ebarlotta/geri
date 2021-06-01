<?php

namespace Database\Seeders;

//use App\Models\TipoDePersona;
use Illuminate\Database\Seeder;
/*use \App\Models\PersonActivo;
use \App\Models\Beneficios;
use \App\Models\TiposDocumentos;
use \App\Models\EstadosCiviles;
use \App\Models\TipoDePersona;*/

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Person::factory(10)->create();
        // \App\Models\PersonActivo::factory(3)->create();   Desactivado hasta que aprenda a poner varios valores en un vector
        //$this->call(Person::class);
         /*$Activos1 = new PersonActivo();
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

        $Beneficio = new Beneficios();
        $Beneficio->descripcionbeneficio = "PARTICULAR";
        $Beneficio->save();
        $Beneficio1 = new Beneficios();
        $Beneficio1->descripcionbeneficio = "PAMI";
        $Beneficio1->save();

       $TiposDocumentos = new TiposDocumentos();
        $TiposDocumentos->tipodocumento = "DNI";
        $TiposDocumentos->save();
        $TiposDocumentos1 = new TiposDocumentos();
        $TiposDocumentos1->tipodocumento = "LC";
        $TiposDocumentos1->save();
        $TiposDocumentos2 = new TiposDocumentos();
        $TiposDocumentos2->tipodocumento = "LE";
        $TiposDocumentos2->save();
        $TiposDocumentos3 = new TiposDocumentos();
        $TiposDocumentos3->tipodocumento = "Otro";
        $TiposDocumentos3->save();

        $EstadoCivil = new EstadosCiviles();
        $EstadoCivil->estadocivil = "Casado/a";
        $EstadoCivil->save();
        $EstadoCivil1 = new EstadosCiviles();
        $EstadoCivil1->estadocivil = "Viudo/a";
        $EstadoCivil1->save();
        $EstadoCivil2 = new EstadosCiviles();
        $EstadoCivil2->estadocivil = "Separado/a";
        $EstadoCivil2->save();
        $EstadoCivil3 = new EstadosCiviles();
        $EstadoCivil3->estadocivil = "Divorsiado/a";
        $EstadoCivil3->save();

        $TipoDePersona = new TipoDePersona();
        $TipoDePersona->tipodepersona = "Residente";
        $TipoDePersona->save();
        $TipoDePersona = new TipoDePersona();
        $TipoDePersona->tipodepersona = "Referente";
        $TipoDePersona->save();*/
        
        $this->call(AreasSeeder::class);
        $this->call(EscolaridadesSeeder::class);
        //$this->call(TipoDePersona::class);
        //$this->call(EstadosCiviles::class);
        //$this->call(TiposDocumentos::class);
        //$this->call(Beneficios::class);
        //$this->call(PersonActivo::class);
        $this->call(NacionalidadesSeeder::class);
        $this->call(LocalidadesSeeder::class);
        $this->call(ProvinciasSeeder::class);
        $this->call(GradoDependenciaSeeder::class);
        $this->call(MotivosEgresosSeeder::class);
    }
}
