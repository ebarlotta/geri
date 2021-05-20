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
        'idbeneficio',
        'documento',
        'idtipodocumento',
        'domicilio',
        'localidad',
        'sexo',
        'nacionalidad',
        'idestadocivil',
        'idtipopersona',
        'email',
    ];

}
