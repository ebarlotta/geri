<?php

namespace App\Models\Actores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorPersonal extends Model
{
    use HasFactory;

    protected $fillable=[
        'modalidad',
        'fingreso',
        'iminimo',
        'cbu',
        'nrotramite',
        'patente',
        'nrocta',
        'actor_id',
        'activo',
    ];
}
