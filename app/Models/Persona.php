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
