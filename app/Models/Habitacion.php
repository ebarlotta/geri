<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nrohabitacion',
        'descripcion',
        'activa',
        'sexo',
        'empresa_id',
    ];

    public function camas() {
        // return $this->hasMany(Camas::class,'id','cama_id');
        return $this->hasManyThrough(Habitacion::class,Camas::class,);
    }
}
