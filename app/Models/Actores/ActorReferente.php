<?php

namespace App\Models\Actores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorReferente extends Model
{
    use HasFactory;

    protected $fillable = [
        'vinculo',
        'modalidad',
        'ultimaocupacion',
        'viviendapropia',
        'canthijosvarones',
        'canthijasmujeres',
        'activo',
        'actor_id',
    ];
}
