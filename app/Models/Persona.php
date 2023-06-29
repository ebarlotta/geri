<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'nacimiento',
        'alias',
        'documento',
        'domicilio',
        'sexo',
        'cama_id',
        'nacionalidad_id',
        'localidad_id',
        'estado_id',
        'beneficio_id',
        'tipodocumento_id',
        'estadocivil_id',
        'tipopersona_id',
        'gradodependencia_id', 
        'escolaridad_id',
    ];

}

class PersonaClass {
    public $id;
    public $nombre='';
    public $telefono;
    public $email;
    public $direccion;
    public $localidad_id;
    public $nacimiento;
    public $documentonro;
    public $documentotipo_id;
    public $sexo_id;
    public $nacionalidad_id;
    public $estadocivil_id;
    public $escolaridad_id;
    public $obrasocial_id;
    public $empresa_id;
    public $Activo;
}

class Personas extends PersonaClass {
    public $modalidad;
    public $ultimaocupacion;
    public $viviendapropia;
    public $canthijosvarones;
    public $canthijasmujeres;
}

class Referente extends PersonaClass {
    public $vinculo;
}

class Personal extends PersonaClass {
    public $modalidad;
    public $fingreso;
    public $iminimo;
    public $cbu;
    public $nrotramite;
    public $patente;
    public $nrocta;
}

class Agente extends PersonaClass {
    public $fingreso;
    public $fegreso;
    public $alias;
    public $peso_id;
    public $referente_id;
    public $cama;
    public $datossociales_id;
    public $datosmedicos_id;
    public $motivoegreso_id;
    public $dependencia_id;
    public $historiadevida_id;
    public $informes_id;
}

class Proveedor extends PersonaClass {
    public $iva_id;
}

class Cliente extends PersonaClass {
    public $iva_id;
}

class Vendedor extends PersonaClass {
    public $iva_id;
}

class empresa extends PersonaClass {
    public $iva_id;
    public $actividad;
    public $caracterdeltitular;
    public $titular_id;  //Hace referencia a Persona

    //public function __constructor() {
    //    $this->titular = new PersonaClass;
    //}
}