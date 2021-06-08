<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonasCampos extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'NombreCampo',
        'TipoCampo',
        'OrdenCampo',
        'TipoPersona_id',
        'LabelCampo',
    ];
}
