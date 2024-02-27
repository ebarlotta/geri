<?php

namespace App\Models\Actores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorEmpresa extends Model
{
    use HasFactory;

    protected $fillable=[
        'iva_id',
        'actividad',
        'caracterdeltitular',
        'actor_id',
    ];
}
