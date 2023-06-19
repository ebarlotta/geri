<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unidad;

class Ingredientes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreingrediente',
        'unidad_id',
        'categoria_id',
        'empresa_id',
    ];

    public function categorias()
    {
        return $this->hasOne(Categorias::class,'id','categoria_id');
        // return $this->hasMany('App\Models\Categorias');
    }

    public function unidades()
    {
        return $this->hasOne(Unidad::class,'id','unidad_id');
        // return $this->hasMany('App\Models\Unidad');
    }
}
