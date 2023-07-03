<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [    
    'nombre',
    'documentotipo_id',
    'documentonro',
    ' $alia',
    'nacimiento',
    'direccion',
    'estadocivil_id',
    'sexo_id',
    'email',
    'e person',
    'nacionalidad_id',
    'localidad_id',
    'obrasocial_id',
    'escolaridad_id',
    'telefono',
    'avatar',
    'empresa_id',
    'activo',
    ];

    
}
