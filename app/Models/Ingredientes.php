<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredientes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreingrediente',
        'unidad_id',
        'categoria_id',
        'empresa_id',
    ];

    // public function categorias()
    // {
    //     return $this->hasMany('App\Models\Categorias');
    // }

    // public function unidades()
    // {
    //     return $this->hasMany('App\Models\Unidad');
    // }
}
