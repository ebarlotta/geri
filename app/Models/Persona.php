<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tipodocumento_id',
        'documento',
        'nacimiento',
        'domicilio',
        'estadocivil_id',
        'sexo_id',
        'email',
        'cama_id', //no esta
        'nacionalidad_id',
        'localidad_id', 
        //Obra social no esta
        'escolaridad_id',
        //telefono no esta
        'estado_id',
        'beneficio_id',
        'tipopersona_id',
        'gradodependencia_id',
        // estadocivil_id no esta
        // tipodocumento_id no esta
    ];
    public function TipoDePersona() {
        return $this->hasOne('\\App\Models\TipoDePersona','id','tipopersona_id');
    }
}

class Actor extends Model {
    public $id;
    public $nombre='';
    public $documentotipo_id;
    public $documento;
    public $tipo_de_persona;
    public $domicilio;
    public $email;
<<<<<<< HEAD
    public $imagenurl;
    //Tipo de persona
=======
>>>>>>> 86840e65a81a6f13184b41b0ecff7ec5433b682b
    public $nacionalidad_id;
    public $localidad_id;
    public $telefono;

    public $empresa_id;
    public $activo;
    
    public function nueva() {
        return "entro";
    }

    
}

<<<<<<< HEAD
// class Personas extends Actor {
//     public $modalidad;
//     public $ultimaocupacion;
//     public $viviendapropia;
//     public $canthijosvarones;
//     public $canthijasmujeres;
//     public $persona_id;
// }
class DatosAdicionales {
=======
class Personas extends Actor { //Aplica para referentes y residentes
    
    public $alias;
    public $nacimiento;
    public $estadocivil_id;
    public $sexo_id;
    public $obrasocial_id;
    public $escolaridad_id;
>>>>>>> 86840e65a81a6f13184b41b0ecff7ec5433b682b
    public $modalidad;
    public $ultimaocupacion;
    public $viviendapropia;
    public $canthijosvarones;
    public $canthijasmujeres;
<<<<<<< HEAD
}este es el nuevo cambio

=======

}
>>>>>>> 86840e65a81a6f13184b41b0ecff7ec5433b682b

class Referente extends Actor {
    public $datosadicionales_id;
    public $vinculo;
    public $persona_id;
}

class Personal extends Actor {
    public $modalidad;
    public $fingreso;
    public $iminimo;
    public $cbu;
    public $nrotramite;
    public $patente;
    public $nrocta;
    public $persona_id;
}

class Agente extends Actor {
    public $fingreso;
    public $fegreso;
    public $alias;
    public $peso;
    public $referente_id;
    public $cama_id;
    public $datossociales_id;
    public $datosmedicos_id;
    public $motivoegreso_id;
    public $dependencia_id;
    public $historiadevida_id;
    public $informes_id;
    public $persona_id;
    public $datosadicionales_id;
}

class Proveedor extends Actor {
    public $iva_id;
    public $persona_id;
}

class Cliente extends Actor {
    public $iva_id;
    public $persona_id;
}

class Vendedor extends Actor {
    public $iva_id;
    public $persona_id;
}

class empresa extends Actor {
    public $iva_id;
    public $logourl;
    public $actividad;
    public $caracterdeltitular;
<<<<<<< HEAD
    public $persona_id;  //Hace referencia a Persona   $titular_id

    // public $nacimiento;
    // public $estadocivil_id;
    // public $sexo_id;
    // public $nacionalidad_id;
    // public $obrasocial_id;
    // public $escolaridad_id;

    // function __construct() {
    //     $this->nacimiento=date('Y-m-d');
    //     $this->estadocivil_id=0; // 0 = sin especificar
    //     $this->sexo_id=0;        // 0 = sin especificar
    //     $this->nacionalidad_id=0;// 0 = sin especificar
    //     $this->obrasocial_id=0;  // 0 = sin especificar
    //     $this->escolaridad_id=0; // 0 = sin especificar
    // }
=======
    public $titular_id;  //Hace referencia a Persona
    public $fechainicio;

    
    function __construct() {
        $this->nacimiento=date('Y-m-d');
        $this->estadocivil_id=0; // 0 = sin especificar
        $this->sexo_id=0;        // 0 = sin especificar
        $this->nacionalidad_id=0;// 0 = sin especificar
        $this->obrasocial_id=0;  // 0 = sin especificar
        $this->escolaridad_id=0; // 0 = sin especificar
    }
>>>>>>> 86840e65a81a6f13184b41b0ecff7ec5433b682b
}