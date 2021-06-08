<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PersonasCampos;

class Interfaces extends Model
{
    use HasFactory;

    protected $fillable=[
        'NombreInterface',
    ];

    public function campos()
    {
        return $this->hasMany('App\PersonasCampos');
        //return $this->hasMany(PersonasCampos::class);
    }
}
