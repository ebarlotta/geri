<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model {

	use HasFactory;

   protected $fillable = [
      'nombre',
      'domicilio', 
      'documento',
      'tipos_documento', 
      'nacimiento',
      'sexo_id', 
      'email', 
      'nacionalidad_id',
      'localidad_id',
      'obrasocial_id',
		'escolaridad_id',
		'telefono',
		'empresa_id',
		'urlfoto',
		'activo',
		'tipopersona_id',
      'personactivo_id',
      // 'estado_id',
      // 'email_verified_at',
	];

	public function TipoDePersona() {
		return $this->hasOne('\\App\Models\TipoDePersona','id','tipopersona_id');
	}

   public function TipoDocumento() {
		return $this->hasOne('\\App\Models\TiposDocumentos','id','tipos_documento')->get();
	}

   public function Sexo() {
      return $this->hasOne('\\App\Models\Sexo','id','sexo_id')->get();
   }

   public function Nacionalidad() {
      return $this->hasOne('\\App\Models\Nacionalidad','id','nacionalidad_id')->get();
   }

   public function Localidad() {
      return $this->hasOne('\\App\Models\Localidades','id','localidad_id')->get();
   }

   public function Beneficio() {
      return $this->hasOne('\\App\Models\Beneficios','id','obrasocial_id')->get();
   }

   public function Escolaridad() {
      return $this->hasOne('\\App\Models\Escolaridades','id','escolaridad_id')->get();
   }

   public function Empresa() {
      return $this->hasOne('\\App\Models\Empresa','id','empresa_id')->get();
   }
//    public $id;
//    public $nombre='';
//    public $documentotipo_id;
//    public $documento;
//    //public $alias
//    // public $nacimiento;
//    public $domicilio;
//    public $estadocivil_id;
//    public $sexo_id;
//    public $email;
// 	public $tipopersona_id;
//    //Tipo de persona
//    public $nacionalidad_id;
//    public $localidad_id;
//    public $obrasocial_id;
//    public $escolaridad_id;
//    public $telefono;
//    public $empresa_id;
//    public $activo;

//    public function nueva() {
//       return "entro";
//    }

// 	function __construct() {
// 		$this->nacimiento=date('Y-m-d');
// 		$this->estadocivil_id=0; // 0 = sin especificar
// 		$this->sexo_id=0;        // 0 = sin especificar
// 		$this->nacionalidad_id=0;// 0 = sin especificar
// 		$this->obrasocial_id=0;  // 0 = sin especificar
// 		$this->escolaridad_id=0; // 0 = sin especificar
// 	}
   
// }

// // class Personas extends Actor { //Aplica para referentes y residentes
// //    public $modalidad;
// //    public $ultimaocupacion;
// //    public $viviendapropia;
// //    public $canthijosvarones;
// //    public $canthijasmujeres;

// //    public function agregar() {
   
// //       $a = $this->domicilio;
// //    }
// // }

// class Referente extends Actor {
// 	public $vinculo;
// 	public $modalidad;
//    public $ultimaocupacion;
//    public $viviendapropia;
//    public $canthijosvarones;
//    public $canthijasmujeres;
// 	public $activo;
// }

// class Personal extends Actor {
// 	public $modalidad;
// 	public $fingreso;
// 	public $iminimo;
// 	public $cbu;
// 	public $nrotramite;
// 	public $patente;
// 	public $nrocta;
// 	public $activo;
// }

// class Agente extends Actor {
// 	public $fingreso;
// 	public $fegreso;
// 	public $alias;
// 	public $peso_id;
// 	public $referente_id;
// 	public $cama;
// 	public $datossociales_id;
// 	public $datosmedicos_id;
// 	public $motivoegreso_id;
// 	public $dependencia_id;
// 	public $historiadevida_id;
// 	public $informes_id;
// 	public $modalidad;
//    public $ultimaocupacion;
//    public $viviendapropia;
//    public $canthijosvarones;
//    public $canthijasmujeres;
// }

// class Proveedor extends Actor {
// 	public $iva_id;
// }

// class Cliente extends Actor {
// 	public $iva_id;
// }

// class Vendedor extends Actor {
// 	public $iva_id;
// }

// class Empresa extends Actor {
// 	public $iva_id;
// 	public $actividad;
// 	public $caracterdeltitular;
// 	public $titular_id;  //Hace referencia a Persona

// 	public $nacimiento;
// 	public $estadocivil_id;
// 	public $sexo_id;
// 	public $nacionalidad_id;
// 	public $obrasocial_id;
// 	public $escolaridad_id;
// }

}



