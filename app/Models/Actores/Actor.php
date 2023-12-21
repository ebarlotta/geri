<?php

namespace App\Models\Actores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
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
