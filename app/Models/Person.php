<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nacimiento',
        'activo',
        'alias',
        'beneficio_id',
        'documento',
        'tipodocumento_id',
        'domicilio',
        'localidad',
        'sexo',
        'nacionalidad',
        'estadocivil_id',
        'tipopersona_id',
        'email',
    ];

}
