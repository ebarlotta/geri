<?php

namespace App\Models;

use App\Models\Informes\Informe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgenteInforme extends Model
{
    use HasFactory;

    protected $fillable=[
        'agente_id', 
        'informe_id',
        'nroperiodo',
        'anio',
        'profesional_id',
    ];

    public function datosagente()
    {
        return $this->hasOne(Actor::class,'id','agente_id');
    }

    public function datosinforme()
    {
        return $this->hasOne(Informe::class,'id','informe_id');
    }

    public function datosprofesional()
    {
        return $this->hasOne(Actor::class,'id','profesional_id');
    }

}
